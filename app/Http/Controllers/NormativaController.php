<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Digesto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class NormativaController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string)$request->get('q', ''));
        $perPage = 10; // cantidad por página

        $digestos = Digesto::when($q !== '', function ($query) use ($q) {
                $query->where(function ($w) use ($q) {
                    $w->where('titulo', 'like', "%{$q}%")
                      ->orWhere('descripcion', 'like', "%{$q}%");
                });
            })
            ->orderBy('fecha_subida', 'desc')
            ->paginate($perPage)
            ->appends(['q' => $q]); // mantener búsqueda al cambiar de página

        return view('edudata.normativa.index', compact('digestos', 'q'));
    }

    public function show($id)
    {
        $digesto = Digesto::findOrFail($id);
        return view('edudata.normativa.normativa', compact('digesto'));
    }

    // Sirve el PDF inline SIEMPRE (local o externo)
    public function file($id)
    {
        $digesto = Digesto::findOrFail($id);
        [$url, $path, $isExternal] = $this->resolveFileLocation($digesto->ruta_archivo);

        $filename = $digesto->nombre_archivo ?: ($path ? basename($path) : 'documento.pdf');

        // 1) LOCAL: stream directo de disco
        if ($path && file_exists($path)) {
            // Forzamos tipo PDF por si el mime guesser falla
            return response()->file($path, [
                'Content-Type'        => 'application/pdf',
                'Content-Disposition' => 'inline; filename="'.$filename.'"',
                // Opcionalmente:
                'X-Frame-Options'     => 'SAMEORIGIN',
            ]);
        }

        // 2) EXTERNO: proxy del contenido para evitar X-Frame-Options del host
        if ($isExternal && $url) {
            try {
                $resp = Http::timeout(20)->withHeaders([
                    'Accept' => 'application/pdf,*/*',
                ])->get($url);

                if ($resp->successful()) {
                    $body = $resp->body();

                    // Si el servidor externo manda otro tipo, lo normalizamos a PDF
                    return response($body, 200, [
                        'Content-Type'        => 'application/pdf',
                        'Content-Disposition' => 'inline; filename="'.$filename.'"',
                        'X-Frame-Options'     => 'SAMEORIGIN',
                        'Cache-Control'       => 'private, max-age=60',
                    ]);
                }
            } catch (\Throwable $e) {
                // loggear si querés
            }
        }

        // 3) Fallback
        abort(Response::HTTP_NOT_FOUND, 'Archivo no encontrado o no embebible.');
    }

    public function download($id)
    {
        $digesto = Digesto::findOrFail($id);
        [$url, $path] = $this->resolveFileLocation($digesto->ruta_archivo);

        if ($path && file_exists($path)) {
            $filename = $digesto->nombre_archivo ?: basename($path);
            return response()->download($path, $filename);
        }

        if ($url) {
            // Si es externo, redirigimos para que el navegador lo descargue desde allí
            return redirect()->away($url);
        }

        return back()->with('error', 'No se pudo localizar el archivo para descargar.');
    }

    /**
     * Resuelve [fileUrl, filePath, isExternal]
     */
    private function resolveFileLocation(?string $ruta): array
    {
        if (!$ruta) return [null, null, false];

        $ruta = str_replace('\\', '/', trim($ruta));

        // URL absoluta
        if (preg_match('#^https?://#i', $ruta)) {
            return [$ruta, null, true];
        }

        // Normalización
        $clean = ltrim($ruta, '/');
        $clean = preg_replace('#^\./#', '', $clean);
        $clean = preg_replace('#^\.\./#', '', $clean);

        // storage público (con o sin "public/")
        $storageCandidate = Str::startsWith($clean, 'public/')
            ? substr($clean, 7)
            : $clean;

        if (Storage::disk('public')->exists($storageCandidate)) {
            return [
                Storage::disk('public')->url($storageCandidate),
                Storage::disk('public')->path($storageCandidate),
                false
            ];
        }

        // /public directo
        $publicPath = public_path($clean);
        if (file_exists($publicPath)) {
            return [asset($clean), $publicPath, false];
        }

        // /public/archivos/basename
        $maybe = public_path('archivos/' . basename($clean));
        if (file_exists($maybe)) {
            return [asset('archivos/' . basename($clean)), $maybe, false];
        }

        // Si guardaron "storage/..."
        if (Str::startsWith($clean, 'storage/')) {
            $p = public_path($clean);
            if (file_exists($p)) {
                return [asset($clean), $p, false];
            }
        }

        return [null, null, false];
    }
}

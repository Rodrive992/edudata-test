<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdministracionEjecucion;

class AdministracionEjecucionController extends Controller
{
    public function index(Request $request)
    {
        $proveedor = trim($request->input('proveedor', ''));
        $objeto    = trim($request->input('objeto', ''));
        $perPage   = (int) $request->input('per_page', 20);
        if ($perPage <= 0) { $perPage = 20; }

        // Base query con filtros
        $baseQuery = AdministracionEjecucion::query()
            ->when($proveedor !== '', fn ($q) =>
                $q->where('proveedor', 'like', "%{$proveedor}%"))
            ->when($objeto !== '', fn ($q) =>
                // Si 'objeto' es numérico o texto, igual funciona con LIKE en MySQL
                $q->where('objeto', 'like', "%{$objeto}%"));

        // Totales del resultado filtrado (antes de paginar)
        $totalRegistros = (clone $baseQuery)->count();
        $sumaMontos     = (clone $baseQuery)->sum('monto');

        // Paginado y orden (más recientes primero)
        $items = (clone $baseQuery)
            ->orderByDesc('id')
            ->paginate($perPage)
            ->appends($request->query());

        return view('edudata.administracion.index', [
            'items'          => $items,
            'proveedor'      => $proveedor,
            'objeto'         => $objeto,
            'perPage'        => $perPage,
            'totalRegistros' => $totalRegistros,
            'sumaMontos'     => $sumaMontos,
        ]);
    }
}
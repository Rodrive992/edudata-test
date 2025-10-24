<?php

namespace App\Http\Controllers;

use App\Models\SolicitudInformacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class SolicitudInformacionController extends Controller
{
    public function index()
    {
        return view('edudata.solicitud-info.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'dni_solicitante'          => ['required', 'digits_between:7,10'],
            'nombre_solicitante'       => ['required', 'string', 'max:100'],
            'apellido_solicitante'     => ['required', 'string', 'max:100'],

            // NUEVO: dos archivos para DNI
            'dni_imagen_frente'        => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,pdf', 'max:4096'],
            'dni_imagen_reverso'       => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,pdf', 'max:4096'],

            'provincia_solicitante'    => ['required', 'string', 'max:100'],
            'departamento_solicitante' => ['nullable', 'string', 'max:100'],
            'codigo_postal'            => ['nullable', 'string', 'max:10'],
            'barrio_solicitante'       => ['nullable', 'string', 'max:100'],
            'telefono_solicitante'     => ['nullable', 'string', 'max:30'],
            'email_solicitante'        => ['required', 'email', 'max:150'],
            'asunto_solicitud'          => ['required', 'string', 'min:10', 'max:100'],
            'solicitud_texto'          => ['required', 'string', 'min:10', 'max:10000'],
        ]);

        // Guardar archivos (si llegan)
        $dniFrentePath = null;
        $dniReversoPath = null;

        if ($request->hasFile('dni_imagen_frente')) {
            $dniFrentePath = $request->file('dni_imagen_frente')->store('solicitudes/dni_frente', 'public');
        }
        if ($request->hasFile('dni_imagen_reverso')) {
            $dniReversoPath = $request->file('dni_imagen_reverso')->store('solicitudes/dni_reverso', 'public');
        }

        // Crear registro
        $sol = SolicitudInformacion::create([
            'dni_solicitante'           => $data['dni_solicitante'],
            'nombre_solicitante'        => $data['nombre_solicitante'],
            'apellido_solicitante'      => $data['apellido_solicitante'],
            'dni_imagen_frente'         => $dniFrentePath,
            'dni_imagen_reverso'        => $dniReversoPath,
            'provincia_solicitante'     => $data['provincia_solicitante'],
            'departamento_solicitante'  => $data['departamento_solicitante'] ?? null,
            'codigo_postal'             => $data['codigo_postal'] ?? null,
            'barrio_solicitante'        => $data['barrio_solicitante'] ?? null,
            'telefono_solicitante'      => $data['telefono_solicitante'] ?? null,
            'email_solicitante'         => $data['email_solicitante'],
            'solicitud_texto'           => $data['solicitud_texto'],
            'asunto_solicitud'           => $data['asunto_solicitud'],
            'estado_solicitud'          => 'pendiente',
        ]);

        return redirect()
            ->route('edudata.solicitud-info.store')
            ->with('ok', 'Tu solicitud fue registrada con el N° ' . $sol->id . '. Te contactaremos al correo indicado.');
    }
    public function registro()
    {
        $solicitudes = \App\Models\SolicitudInformacion::query()
            ->latest('id')
            ->paginate(15);

        return view('edudata.solicitud-info.registro_solicitudes_info', compact('solicitudes'));
    }
    public function gestionSolicitudes()
    {
        $solicitudes = SolicitudInformacion::query()
            ->latest('id')
            ->paginate(15);

        return view('edured.herramientas.solicitudes-info.index', compact('solicitudes'));
    }

    public function gestionPaso1(SolicitudInformacion $solicitud)
    {
        // Muestra TODO lo del solicitante (sin la descripción de la solicitud)
        return view('edured.herramientas.solicitudes-info.paso1', compact('solicitud'));
    }

    public function rechazar(Request $request, SolicitudInformacion $solicitud)
    {
        $solicitud->update([
            'estado_solicitud' => 'rechazada',
        ]);

        return redirect()
            ->route('edured.herramientas.solicitudes-info.index')
            ->with('ok', "Solicitud #{$solicitud->id} rechazada.");
    }

    public function continuar(Request $request, SolicitudInformacion $solicitud)
    {
        // Marcamos como "en_proceso" (o "en proceso") y vamos a Paso 2
        $solicitud->update([
            'estado_solicitud' => 'en_proceso',
        ]);

        return redirect()
            ->route('edured.herramientas.solicitudes-info.paso2', $solicitud);
    }

    public function gestionPaso2(SolicitudInformacion $solicitud)
    {
        // Paso 2: muestra datos del solicitante (compacto), la descripción y el formulario de respuesta
        return view('edured.herramientas.solicitudes-info.paso2', compact('solicitud'));
    }

    public function responder(Request $request, SolicitudInformacion $solicitud)
    {
        $data = $request->validate([
            'asunto_respuesta_solicitud'   => ['required', 'string', 'min:5', 'max:150'],
            'respuesta_solicitud'          => ['required', 'string', 'min:5', 'max:10000'],
            'archivo_respuesta_solicitud'  => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png,webp,doc,docx,xls,xlsx,zip', 'max:8192'],
            'enviar_email'                 => ['nullable', 'boolean'],
        ]);

        $rutaArchivo = $solicitud->archivo_respuesta_solicitud;
        if ($request->hasFile('archivo_respuesta_solicitud')) {
            $rutaArchivo = $request->file('archivo_respuesta_solicitud')->store('solicitudes/respuestas', 'public');
        }

        $solicitud->update([
            'asunto_respuesta_solicitud'  => $data['asunto_respuesta_solicitud'],
            'respuesta_solicitud'         => $data['respuesta_solicitud'],
            'archivo_respuesta_solicitud' => $rutaArchivo,
            'estado_solicitud'            => 'respondida',
        ]);

        // Envío opcional de email simple (sin Mailable, directo)
        if ($request->boolean('enviar_email')) {
            try {
                $asunto = $data['asunto_respuesta_solicitud'];
                $cuerpo = "Estimado/a {$solicitud->nombre_solicitante} {$solicitud->apellido_solicitante},\n\n" .
                    "En respuesta a su solicitud #{$solicitud->id} (Asunto: {$solicitud->asunto_solicitud}):\n\n" .
                    "{$data['respuesta_solicitud']}\n\n" .
                    "Atentamente,\nDirección de Transparencia Activa";

                Mail::raw($cuerpo, function ($message) use ($solicitud, $asunto) {
                    $message->to($solicitud->email_solicitante, "{$solicitud->nombre_solicitante} {$solicitud->apellido_solicitante}")
                        ->subject($asunto);
                });
            } catch (\Throwable $e) {
                // No interrumpimos el flujo si falla el correo
                // Podés loguearlo si querés: \Log::error($e->getMessage());
            }
        }

        return redirect()
            ->route('edured.herramientas.solicitudes-info.index')
            ->with('ok', "Respuesta enviada para la solicitud #{$solicitud->id}.");
    }
}

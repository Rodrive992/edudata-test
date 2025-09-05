<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlantaEduProvincia;

class SolicitudesEduRedController extends Controller
{
    /**
     * Mostrar el historial de solicitudes.
     */
    public function solicitudes()
    {
        // Por ahora simplemente devolvemos una vista básica
        return view('edured.historial');
    }

    public function nuevaSolicitudEdilicio(Request $request)
    {
        $request->validate([
            'asunto' => 'required|string|max:255',
            'requerimiento' => 'required|string',
            'archivos.*' => 'nullable|file|mimes:jpeg,png,pdf|max:2048'
        ]);

        // Guardar en tabla solicitudes_edilicias
        // Ejemplo: SolicitudEdilicia::create(...);

        return back()->with('success', 'Solicitud edilicia generada correctamente.');
    }

     public function buscarCargos(Request $request)
    {
        $dni = $request->input('dni');

        // 👇 Ya podemos usar PlantaEduProvincia directamente:
        $cargos = PlantaEduProvincia::where('dni', $dni)->get([
            'id', 'nombre', 'dni', 'dependencia', 'cargo', 
            'caracter', 'dedicacion', 'puntaje',     'hs', 'alta_cargo'
        ]);

        return response()->json($cargos);
    }
    public function nuevaSolicitudVacante(Request $request)
    {
        $request->validate([
            'dni' => 'required|string',
            'cargos' => 'required|array|min:1',
            'fecha_inicio' => 'required|date'
        ]);

        // Guardar en tabla solicitud_cobertura_vacante
        // Ejemplo: SolicitudCoberturaVacante::create(...);

        return back()->with('success', 'Solicitud de cobertura por vacante generada correctamente.');
    }
}

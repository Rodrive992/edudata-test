<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EduRedController extends Controller
{
    public function index()
    {
        return view('edured.index');
    }
    
     /**
     * Mostrar el historial de solicitudes.
     */
    public function solicitudes()
    {
        // Por ahora simplemente devolvemos una vista básica
        return view('edured.historial');
    }

    /**
     * Mostrar formulario o pantalla para iniciar una nueva solicitud.
     */
    public function nuevaSolicitud(Request $request)
    {
        $tipo = $request->input('tipo');

        return view('edured.solicitud-nueva', compact('tipo'));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capacitaciones;

class FormacionController extends Controller
{
    public function index(Request $request)
    {
        $anio = $request->input('anio');
        $mes = $request->input('mes');
        $localidad = $request->input('localidad');
        $modalidad = $request->input('modalidad');

        $query = Capacitaciones::query();

        if ($anio) {
            $query->whereYear('fecha_inicio', $anio);
        }

        if ($mes) {
            $query->whereMonth('fecha_inicio', $mes);
        }

        if ($localidad) {
            $query->where('localidad', 'like', '%' . $localidad . '%');
        }        

        if ($modalidad) {
            $query->where('modalidad', 'like', '%' . $modalidad . '%');
        }

        $capacitaciones = $query->orderBy('fecha_inicio')->paginate(5)->appends($request->query());

        return view('edudata.formacion.index', compact('capacitaciones', 'anio', 'mes', 'localidad','modalidad'));
    }
}
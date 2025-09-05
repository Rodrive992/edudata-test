<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mantenimiento;
use App\Models\MantenimientoPendiente;
use App\Models\MantenimientoComision;

class MantenimientoController extends Controller
{
    public function index(Request $request)
    {
        $tarea = $request->input('tarea', 'realizadas'); // realizadas | pendientes | comisiones

        // Variables comunes de filtros
        $anio = $request->input('anio');
        $mes  = $request->input('mes');

        // Para realizadas
        $establecimiento = $request->input('establecimiento');

        // Para pendientes
        $localidadPend = $request->input('localidad'); // input único para pendientes

        // Para comisiones
        $qComisiones = $request->input('q'); // busca por localidad o establecimiento

        // Datos a pasar a la vista
        $registros = collect();     // para realizadas (agrupados por tipo_tarea)
        $pendientes = collect();    // para pendientes
        $comisiones = collect();    // para comisiones

        if ($tarea === 'realizadas') {
            $query = Mantenimiento::query();

            if ($anio) {
                $query->whereYear('fecha', $anio);
            }
            if ($mes) {
                $query->whereMonth('fecha', $mes);
            }
            if ($establecimiento) {
                $query->where('establecimiento', 'like', '%' . $establecimiento . '%');
            }

            $registros = $query->orderBy('fecha')->get()->groupBy('tipo_tarea');
        }

        if ($tarea === 'pendientes') {
            $query = MantenimientoPendiente::query();

            if ($localidadPend) {
                $query->where('localidad', 'like', '%' . $localidadPend . '%');
            }

            $pendientes = $query->orderBy('id', 'desc')->get();
        }

        if ($tarea === 'comisiones') {
            $query = MantenimientoComision::query();

            if ($anio) {
                $query->whereYear('fecha', $anio);
            }
            if ($mes) {
                $query->whereMonth('fecha', $mes);
            }
            if ($qComisiones) {
                $query->where(function ($qq) use ($qComisiones) {
                    $qq->where('localidad', 'like', '%' . $qComisiones . '%')
                       ->orWhere('establecimiento', 'like', '%' . $qComisiones . '%');
                });
            }

            $comisiones = $query->orderBy('fecha', 'desc')->get();
        }

        return view('edudata.mantenimiento.index', [
            'tarea'           => $tarea,
            'anio'            => $anio,
            'mes'             => $mes,
            'establecimiento' => $establecimiento,
            'localidadPend'   => $localidadPend,
            'qComisiones'     => $qComisiones,
            'registros'       => $registros,
            'pendientes'      => $pendientes,
            'comisiones'      => $comisiones,
        ]);
    }
}
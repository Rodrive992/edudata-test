<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class MantenimientoComision extends Model
{
    protected $table = 'mantenimiento_comisiones';
    public $timestamps = false;

    protected $fillable = [
        'fecha',
        'establecimiento',
        'localidad',
        'departamento',
        'detalle_obra',
        'personas',
        'dias',
        'agentes',
        'estado',
    ];

    protected $casts = [
        'fecha' => 'date:Y-m-d',
        'personas' => 'integer',
        'dias' => 'integer',
    ];

    /** Scopes útiles */
    public function scopeEntreFechas(Builder $q, ?string $desde, ?string $hasta): Builder
    {
        if ($desde) $q->whereDate('fecha', '>=', $desde);
        if ($hasta) $q->whereDate('fecha', '<=', $hasta);
        return $q;
    }

    public function scopeEstado(Builder $q, ?string $estado): Builder
    {
        return $estado ? $q->where('estado', $estado) : $q;
    }

    public function scopeBuscar(Builder $q, ?string $term): Builder
    {
        if (!$term) return $q;
        return $q->where(function($qq) use ($term) {
            $qq->where('establecimiento', 'like', "%{$term}%")
               ->orWhere('localidad', 'like', "%{$term}%")
               ->orWhere('departamento', 'like', "%{$term}%")
               ->orWhere('detalle_obra', 'like', "%{$term}%")
               ->orWhere('agentes', 'like', "%{$term}%")
               ->orWhere('estado', 'like', "%{$term}%");
        });
    }
}

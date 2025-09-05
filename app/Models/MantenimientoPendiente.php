<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class MantenimientoPendiente extends Model
{
    protected $table = 'mantenimiento_pendientes';
    public $timestamps = false;

    protected $fillable = [
        'localidad',
        'establecimiento',
        'pedido',
    ];

    /** Scopes útiles */
    public function scopeLocalidad(Builder $q, ?string $loc): Builder
    {
        return $loc ? $q->where('localidad', 'like', "%{$loc}%") : $q;
    }

    public function scopeEstablecimiento(Builder $q, ?string $est): Builder
    {
        return $est ? $q->where('establecimiento', 'like', "%{$est}%") : $q;
    }

    public function scopeBuscar(Builder $q, ?string $term): Builder
    {
        if (!$term) return $q;
        return $q->where(function($qq) use ($term) {
            $qq->where('establecimiento', 'like', "%{$term}%")
               ->orWhere('localidad', 'like', "%{$term}%")
               ->orWhere('pedido', 'like', "%{$term}%");
        });
    }
}

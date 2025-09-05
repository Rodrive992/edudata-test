<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacitaciones extends Model
{
    use HasFactory;

    protected $table = 'capacitaciones';

    protected $fillable = [
    'id',
    'oferente',
    'denominacion_proyecto',
    'tipo_proyecto',
    'modalidad',
    'eje',
    'equipo',
    'nivel',
    'localidad',
    'direccion',
    'fecha_inicio',
    'fecha_finalizacion',
    ];
}
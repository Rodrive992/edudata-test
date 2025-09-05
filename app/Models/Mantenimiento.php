<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    use HasFactory;

    protected $table = 'mantenimiento';

    protected $fillable = [
    'id',
    'fecha',
    'establecimiento',
    'tarea',
    'tipo_tarea',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministracionEjecucion extends Model
{
    use HasFactory;

    // Nombre real de la tabla
    protected $table = 'administracion_compras';

    // Clave primaria
    protected $primaryKey = 'id';

    // Laravel espera por defecto que sea auto_increment y entero
    public $incrementing = true;

    // Si la PK no es int usarías protected $keyType = 'string';
    protected $keyType = 'int';

    // Si no usás created_at y updated_at en la tabla
    public $timestamps = false;

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'objeto',
        'monto',
        'tipo_proceso',
        'proveedor',
        'estado',
        'tipo_compra',
    ];
}

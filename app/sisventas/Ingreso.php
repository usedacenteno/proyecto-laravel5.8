<?php

namespace App\sisventas;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table ='ingreso';
    protected $fillable = [
        'proveedor_id',
        'tipo_comprobante',
        'serie_comprobante',
        'num_comprobante',
        'fecha_hora',
        'impuesto',
        'estado'
    ];
    protected $guarded = 'id';
}


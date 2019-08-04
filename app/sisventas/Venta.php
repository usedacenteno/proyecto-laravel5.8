<?php

namespace App\sisventas;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table ='venta';
    protected $fillable = [
        'cliente_id',
        'usuario_id',
        'tipo_comprobante',
        'serie_comprobante',
        'num_comprobante',
        'fecha_hora',
        'impuesto',
        'total_venta',
        'estado'
    ];
    protected $guarded = 'id';
}

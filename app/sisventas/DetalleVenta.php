<?php

namespace App\sisventas;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table ='detalleventa';
    protected $fillable = [
    'venta_id',
    'articulo_id',
    'cantidad',
    'precio_venta',
    'descuento'
  ];
    protected $guarded ='id';
       
}
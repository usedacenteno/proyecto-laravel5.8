<?php

namespace App\sisventas;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    protected $table ='detalleingreso';
    protected $fillable = [
    'ingreso_id',
    'articulo_id',
    'cantidad',
    'precio_compra',
    'precio_venta'
  ];
    protected $guarded ='id';
       
}

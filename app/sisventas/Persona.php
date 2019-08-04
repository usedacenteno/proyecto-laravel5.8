<?php

namespace App\sisventas;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table ='persona';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable = ['tipo_persona','nombre','tipo_documento','num_documento','direccion','telefono','email'];
    protected $guarded = [

    ]; 

   /* public function ingresos()
    {
        return $this->hasMany('App\sisventas\Ingreso','proveedor_id');
    }*/
}

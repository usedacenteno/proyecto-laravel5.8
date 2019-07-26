<?php

namespace App\sisventas;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table ='persona';
    protected $fillable = ['tipo_persona','nombre','tipo_documento','num_documento','direccion','telefono','email'];
    protected $guarded = 'id'; 
}

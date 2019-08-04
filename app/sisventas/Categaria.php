<?php

namespace App\sisventas;

use Illuminate\Database\Eloquent\Model;

class Categaria extends Model
{
    protected $table ='categoria';
    protected $fillable = ['nombre','descripcion','estado'];
    protected $guarded = 'id';    
}

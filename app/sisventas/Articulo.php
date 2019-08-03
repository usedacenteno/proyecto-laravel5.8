<?php

namespace App\sisventas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Articulo extends Model
{
    protected $table ='articulo';
    protected $fillable = ['categoria_id','codigo','nombre','stock','descripcion','imagen','estado'];
    protected $guarded = 'id'; 
    
   

}


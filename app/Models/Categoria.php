<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    //exerder modelo para relacionarlo con Producto
    public function productos(){

        //1 cagegoria tiene muchos productos
        return $this->hasMany(Producto::class);
    }
}

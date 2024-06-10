<?php

// app/Models/Categoria.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_categoria';

    protected $fillable = [
        'nombre'
    ];

    public function productos()//relacion tabla productos
    {
        return $this->hasMany(Producto::class, 'categoria_id', 'id_categoria');
    }

    public function ventas()//relacion tabla vetnas
    {
        return $this->hasMany(Venta::class, 'categoria_id', 'id_categoria');
    }
}

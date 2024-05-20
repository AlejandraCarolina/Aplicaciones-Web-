<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Propiedades que se pueden llenar masivamente
    protected $fillable = [
        'code', // Código del producto
        'name', // Nombre del producto
        'quantity', // Cantidad en stock del producto
        'price', // Precio del producto
        'description' // Descripción del producto
    ];
}

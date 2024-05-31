<?php

// app/Models/Inventario.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_inventario';

    protected $fillable = [
        'producto_id', 'fecha_entrada', 'fecha_salida', 'cantidad', 'descripcion'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id', 'id_producto');
    }
}

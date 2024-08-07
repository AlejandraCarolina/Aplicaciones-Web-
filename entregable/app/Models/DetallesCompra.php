<?php

// app/Models/DetallesCompra.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallesCompra extends Model
{
    use HasFactory;

    protected $table = 'detallescompras';
    
    protected $primaryKey = 'id_detallecompra'; // clave primaria

    protected $fillable = [
        'producto_id',
        'cantidad',
        'precio'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id', 'id_producto');
    }
}

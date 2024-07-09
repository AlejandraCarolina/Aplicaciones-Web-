<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    
    protected $table = 'compras';
    protected $primaryKey = 'id_compra';

    protected $fillable = [
        'proveedor_id', 'producto_id', 'cantidad', 'precio', 'fecha_compra', 'descuento'
    ];

    public function producto()//relacion a tabla productos
    {
        return $this->belongsTo(Producto::class, 'producto_id', 'id_producto');
    }

    public function proveedor()//relacion a tabla proveedores
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id', 'id_proveedor');
    }
}

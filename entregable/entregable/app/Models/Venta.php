<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_venta';

    protected $fillable = [
        'producto_id', 'categoria_id', 'cliente_id', 'fecha_venta', 'subtotal', 'iva', 'total'
    ];

    public function producto()//relacion tabla productos
    {
        return $this->belongsTo(Producto::class, 'producto_id', 'id_producto');
    }

    public function categoria()//relacion tabla categorias
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id_categoria');
    }

    public function cliente()//relacion tabla clientes
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id_cliente');
    }
}

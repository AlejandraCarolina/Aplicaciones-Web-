<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;

    protected $table = 'cotizaciones';
    protected $primaryKey = 'id_cotizacion';

    protected $fillable = [
        'producto_id', 'cliente_id', 'fecha_cot', 'vigencia', 'cantidad', 'comentarios'
    ];  

    public function producto()//relacion a tabla productos
    {
        return $this->belongsTo(Producto::class, 'producto_id', 'id_producto');
    }

    public function cliente()//relacion a tabla clientes
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id_cliente');
    }
}

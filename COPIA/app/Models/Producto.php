<?php
// app/Models/Producto.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_producto';

    protected $fillable = [
        'nombre', 'cantidad', 'precio', 'descripcion', 'categoria_id', 'precio_venta', 'precio_compra', 'fecha_venta'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id_categoria');
    }

    public function inventarios()
    {
        return $this->hasMany(Inventario::class, 'producto_id', 'id_producto');
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'producto_id', 'id_producto');
    }
}

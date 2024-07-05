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
        'nombre', 'cantidad', 'precio', 'descripcion','descripcion_corta', 'categoria_id', 'precio_venta', 'precio_compra', 'fecha_venta'
    ];

    public function category()//relacion tabla categorias
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id_categoria');
    }

    public function inventarios()//relacion tabla inventario
    {
        return $this->hasMany(Inventario::class, 'producto_id', 'id_producto');
    }

    public function ventas()//relacion tabla ventas
    {
        return $this->hasMany(Venta::class, 'producto_id', 'id_producto');
    }

}

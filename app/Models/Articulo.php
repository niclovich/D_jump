<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;
    protected $table='articulos';

    protected $fillable = [
        'comercio_id',
        'categoria_id',
        'articulo_nom',
        'image_url',
        'articulo_descripcion',
        'stock',
        'estado',
        'precioxmayor',
        'precioxmenor',
        'cantidadminima'
    ];
    public function comercio()
    {
        return $this->belongsTo(Comercio::class, 'comercio_id');
    }
    public function categoria_articulo()
    {
        return $this->belongsTo(CategoriaArticulo::class,'categoria_id');
    }
    public function detallepedidos()
    {
        return $this->hasMany(Detallepedido::class);
    }
}

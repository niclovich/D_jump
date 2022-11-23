<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaArticulo extends Model
{
    use HasFactory;
    protected $table='categoria_articulos';

    protected $fillable = [
        'categoria_nombre',
        'categoria_descripcion',
        'image_url'
    ];
    public function articulos()
    {
        return $this->hasMany(Articulos::class);
    }
}

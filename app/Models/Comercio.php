<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comercio extends Model
{
    use HasFactory;
    protected $table='comercios';

    protected $fillable = [
        'user_id',
        'comercio_nom',
        'image_url',
        'comercio_descripcion',
        'comercio_horario',
        'comercio_telefono',
        'estado',
        'longitud',
        'latitud',
        
    ];
    public function articulos()
    {
        return $this->hasMany(Articulo::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class Comercio extends Model
{
    use HasFactory;
    use Searchable;
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
    public function toSearchableArray()
    {
        return [
            'comercio_nom' => $this->comercio_nom,
            'comercio_descripcion' => $this->comercio_descripcion,
            'comercio_horario'=>$this->comercio_horario
        ];
    }
}

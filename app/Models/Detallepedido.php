<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallepedido extends Model
{
    use HasFactory;
    protected $table='detallepedidos';
    protected $fillable = [
        'articulo_id',
        'pedido_id',
        'cantidad'
    ];
    public function articulo()
    {
        return $this->belongsTo(Articulo::class,'articulo_id');
    }
    public function pedido()
    {
        return $this->belongsTo(Pedido::class,'pedido_id');
    }
    
}



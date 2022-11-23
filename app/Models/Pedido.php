<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $table='pedidos';

    protected $fillable = [
        'comercio_id',
        'estado',    //
        'totalpedido',
        'venta_id'
    ];
    public function comercio()
    {
        return $this->belongsTo(Comercio::class, 'comercio_id');
    }
    public function venta()
    {
        return $this->belongsTo(Venta::class, 'venta_id');
    }
    public function detallepedidos()
    {
        return $this->hasMany(Detallepedido::class );
    }

}


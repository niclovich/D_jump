<?php

namespace Database\Seeders;

use App\Models\Pedido;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pedido::create([
            'comercio_id'=> 4,
            'estado'=>'Entregado', //Entregado,,En camino,Cancelado,
            'totalpedido'=> 99.9,
            'venta_id'=>1
        ]);
        Pedido::create([
            'comercio_id'=> 1 ,
            'estado'=>'En Camino', //Entregado,En camino , Empaquetando
            'totalpedido'=> 99.9,
            'venta_id'=>1
        ]);
    }
}

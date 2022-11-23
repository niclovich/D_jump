<?php

namespace Database\Seeders;

use App\Models\Detallepedido;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetallepedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Detallepedido::create([
            'articulo_id'=>18,
            'pedido_id'=>1,
            'cantidad'=>2,
        ]);
        Detallepedido::create([
            'articulo_id'=>3,
            'pedido_id'=>1,
            'cantidad'=>2
        ]);
    }
}

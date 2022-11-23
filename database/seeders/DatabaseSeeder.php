<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CategoriaArticulo;
use App\Models\Comercio;
use App\Models\Detallepedido;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategoriaArticuloSeeder::class);
        $this->call(ComercioSeeder::class);
        //Comercio::factory(10)->create();
        $this->call(ArticuloSeeder::class);
       // $this->call(VentaSeeder::class);
        //$this->call(PedidoSeeder::class);
        //$this->call(DetallepedidoSeeder::class);

    }
}

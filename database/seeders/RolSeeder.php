<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol_admin= Role::create(['name'=> 'admin']);
        $rol_vendedor = Role::create(['name'=>'vendedor']);
        $rol_cliente = Role::create(['name'=>'cliente']);

        //admin
        Permission::create(['name' => 'allusuarios'])->assignRole($rol_admin);
        Permission::create(['name' => 'allcomercios'])->assignRole($rol_admin);
        Permission::create(['name'=>'allpedidos'])->assignRole($rol_admin);
        Permission::create(['name'=>'allarticulos'])->assignRole($rol_admin);


        //Vendedor

        Permission::create(['name' => 'comerciopedidos'])->assignRole($rol_vendedor);
        Permission::create(['name' => 'comercioarticulos'])->assignRole($rol_vendedor);
        Permission::create(['name' => 'mi_comercio'])->assignRole($rol_vendedor);

        Permission::create(['name' => 'miscomprasvendedor'])->assignRole($rol_vendedor);

        //cliente

        
        Permission::create(['name' => 'clientepedidos'])->assignRole($rol_cliente);
        Permission::create(['name' => 'favoarticulos'])->assignRole($rol_cliente);
        Permission::create(['name' => 'quierovender'])->assignRole($rol_cliente);


        //todos

        


    }
}

<?php

namespace Database\Seeders;

use App\Models\CategoriaArticulo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CategoriaArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoriaArticulo::create([
            'categoria_nombre'=>'Bebidas',
            'categoria_descripcion'=>'Bebidas pa consumo',
            'image_url'=>'https://superchannel12.com/images/publicaciones/401168/401168.jpg'
        ]);
        CategoriaArticulo::create([
            'categoria_nombre'=>'Bebidas alcholicas',
            'categoria_descripcion'=>'Bebidas alcholcias +18',
            'image_url'=>'https://i.blogs.es/7fc543/alcohol/1366_2000.jpg'
        ]);
        CategoriaArticulo::create([
            'categoria_nombre'=>'Almacen',
            'categoria_descripcion'=>'Articulos de Almacen',
            'image_url' => 'https://www.mdzol.com/u/fotografias/m/2020/5/20/f608x342-44900_74623_0.jpg'
        ]);
        CategoriaArticulo::create([
            'categoria_nombre'=>'Limpieza',
            'categoria_descripcion'=>'Articulos de limpieza',
            'image_url'=> 'https://blog.induquim.com/wp-content/uploads/2017/03/producos-de-limpieza-940x600.jpg'
        ]);
        CategoriaArticulo::create([
            'categoria_nombre'=>'Congelados',
            'categoria_descripcion'=>'Articulos de Congelados',
            'image_url'=> 'https://www.sotomano.com/produtos/original/1-23014.jpg'
        ]);
        CategoriaArticulo::create([
            'categoria_nombre'=>'Frutas',
            'categoria_descripcion'=>'Frutas  demas',
            'image_url'=> 'https://www.mendoza.gov.ar/wp-content/uploads/sites/49/2021/09/box-B.jpg'
        ]);        
        CategoriaArticulo::create([
            'categoria_nombre'=>'Verduras',
            'categoria_descripcion'=>'Verduras y   demas',
            'image_url'=> 'https://img.freepik.com/fotos-premium/cajones-verduras-fruteria_339569-1039.jpg?w=2000'
        ]);
        CategoriaArticulo::create([
            'categoria_nombre'=>'Ropa',
            'categoria_descripcion'=>'Ropa varias',
            'image_url'=> 'https://img.freepik.com/foto-gratis/tienda-ropa-tienda-ropa-perchas-tienda-boutique-moderna_1150-8886.jpg'
        ]);
        CategoriaArticulo::create([
            'categoria_nombre'=>'Combos',
            'categoria_descripcion'=>'Combos de articulos ',
            'image_url'=> 'https://http2.mlstatic.com/D_NQ_NP_642281-MLA44859524662_022021-W.jpg'
        ]);        
        CategoriaArticulo::create([
            'categoria_nombre'=>'Librería y Mercería',
            'categoria_descripcion'=>'Articulos de libreria y mercerias ',
            'image_url'=> 'https://http2.mlstatic.com/D_NQ_NP657477-MLA43230937556_082020-B.jpg'
        ]);    
    }
}
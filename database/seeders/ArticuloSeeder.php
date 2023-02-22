<?php
namespace Database\Seeders;

use App\Models\Articulo;
use App\Models\Articulos;
use App\Models\CategoriaArticulo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ArticuloSeeder extends Seeder{
    public function run(){
        Articulo::create([
            'articulo_nom'=>'Cocacola 2 litros',
            'image_url'=>'https://cdn-pro.elsalvador.com/wp-content/uploads/2020/05/6-56.jpg',
            'articulo_descripcion'=>'Bebida cocacola',
            'stock'=> 99,
            'estado'=> 'Validado',
            'comercio_id'=>1,
            'categoria_id'=>1,
            'precioxmayor'=>60,
            'precioxmenor'=>90,
            'cantidadminima'=>6
        ]);    
        Articulo::create([
            'articulo_nom'=>'Pepsi 1,5 litros',
            'image_url'=>'https://http2.mlstatic.com/D_NQ_NP_859921-MLA44546588359_012021-O.jpg',
            'articulo_descripcion'=>'Bebida Pepsi',
            'stock'=> 99,
            'estado'=> 'Validado',
            'comercio_id'=>1,
            'categoria_id'=>1,
            'precioxmayor'=>60,
            'precioxmenor'=>90,
            'cantidadminima'=>6
        ]);    
        Articulo::create([
            'articulo_nom'=>'Cocacola latas',
            'image_url'=>'https://pbs.twimg.com/media/EZDmFLTXYAQd3ts.jpg',
            'articulo_descripcion'=>'Latas de Cocacola',
            'stock'=> 99,
            'estado'=> 'Validado',
            'comercio_id'=>1,
            'categoria_id'=>1,
            'precioxmayor'=>60,
            'precioxmenor'=>90,
            'cantidadminima'=>6
        ]);    
        Articulo::create([
            'articulo_nom'=>'Marinaro 2 litros',
            'image_url'=>'https://fiambreriasofi.com.ar/wp-content/uploads/2021/05/04802e17396168.5603c3e75857e.jpg',
            'articulo_descripcion'=>'Bebida marinaro',
            'stock'=> 99,
            'estado'=> 'Validado',
            'comercio_id'=>1,
            'categoria_id'=>1,
            'precioxmayor'=>60,
            'precioxmenor'=>90,
            'cantidadminima'=>6
        ]); 
        Articulo::create([
            'articulo_nom'=>'Fernet Branca 2 litros',
            'image_url'=>'http://imagenes.cordobavende.com/7adf7c2dd36fae8950c4196036d091f0.jpg',
            'articulo_descripcion'=>'Bebida Alcholicas Branca',
            'stock'=> 99,
            'estado'=> 'Validado',
            'comercio_id'=>2,
            'categoria_id'=>2,
            'precioxmayor'=>60,
            'precioxmenor'=>90,
            'cantidadminima'=>6
        ]);  
        Articulo::create([
            'articulo_nom'=>'Cerveza Corona 1 litro',
            'image_url'=>'https://i.pinimg.com/736x/0a/81/50/0a81504b005eebff9d7dc2550c2bdbde.jpg',
            'articulo_descripcion'=>'Bebida Alcholicas Corona',
            'stock'=> 99,
            'estado'=> 'Validado',
            'comercio_id'=>2,
            'categoria_id'=>2,
            'precioxmayor'=>70,
            'precioxmenor'=>100,
            'cantidadminima'=>6
        ]);  
        Articulo::create([
            'articulo_nom'=>'Cerveza Corona 1 litro',
            'image_url'=>'https://i.pinimg.com/736x/0a/81/50/0a81504b005eebff9d7dc2550c2bdbde.jpg',
            'articulo_descripcion'=>'Bebida Alcholicas Corona',
            'stock'=> 99,
            'estado'=> 'Validado',
            'comercio_id'=>2,
            'categoria_id'=>2,
            'precioxmayor'=>70,
            'precioxmenor'=>100,
            'cantidadminima'=>6
        ]);  
        Articulo::create([
            'articulo_nom'=>'Marinaro 2 litros',
            'image_url'=>'https://fiambreriasofi.com.ar/wp-content/uploads/2021/05/04802e17396168.5603c3e75857e.jpg',
            'articulo_descripcion'=>'Bebida marinaro',
            'stock'=> 99,
            'estado'=> 'Validado',
            'comercio_id'=>2,
            'categoria_id'=>1,
            'precioxmayor'=>60,
            'precioxmenor'=>90,
            'cantidadminima'=>6
        ]);
        Articulo::create([
            'articulo_nom'=>'Cocacola latas',
            'image_url'=>'https://pbs.twimg.com/media/EZDmFLTXYAQd3ts.jpg',
            'articulo_descripcion'=>'Latas de Cocacola',
            'stock'=> 99,
            'estado'=> 'Validado',
            'comercio_id'=>2,
            'categoria_id'=>1,
            'precioxmayor'=>60,
            'precioxmenor'=>90,
            'cantidadminima'=>6
        ]);    
        Articulo::create([
            'articulo_nom'=>'Arroz Perseguido x 1 kilo ',
            'image_url'=>'https://i0.wp.com/keylut.com/wp-content/uploads/2021/02/display-perseguido-10kg-200g.jpg',
            'articulo_descripcion'=>'Arrox Perseguido largo fino',
            'stock'=> 99,
            'estado'=> 'Validado',
            'comercio_id'=>4,
            'categoria_id'=>3,
            'precioxmayor'=>60,
            'precioxmenor'=>90,
            'cantidadminima'=>6
        ]);    
        Articulo::create([
            'articulo_nom'=>'Arroz 10 minutos x 1 kilo ',
            'image_url'=>'https://ar.all.biz/img/ar/catalog/121570.jpeg',
            'articulo_descripcion'=>'Arroz 10 minutos largo fino',
            'stock'=> 99,
            'estado'=> 'Validado',
            'comercio_id'=>4,
            'categoria_id'=>3,
            'precioxmayor'=>60,
            'precioxmenor'=>90,
            'cantidadminima'=>6
        ]);    
        Articulo::create([
            'articulo_nom'=>'Cafe la virgia Instanteano x  170 gr  ',
            'image_url'=>'https://media.f2h.shop/media/catalog/product/cache/ab45d104292f1bb63d093e6be8310c97/7/7/7790150101353_01.jpg',
            'articulo_descripcion'=>'Cafe en frasco 170gr',
            'stock'=> 99,
            'estado'=> 'Validado',
            'comercio_id'=>4,
            'categoria_id'=>3,
            'precioxmayor'=>60,
            'precioxmenor'=>90,
            'cantidadminima'=>6
        ]);    
        Articulo::create([
            'articulo_nom'=>'Cafe la virgia Instanteano x 50 gr  ',
            'image_url'=>'https://maxiconsumo.com/media/catalog/product/cache/8313a15b471f948db4d9d07d4a9f04a2/7/3/734.jpg',
            'articulo_descripcion'=>'Cafe en frasco 50gr',
            'stock'=> 99,
            'estado'=> 'Validado',
            'comercio_id'=>4,
            'categoria_id'=>3,
            'precioxmayor'=>60,
            'precioxmenor'=>90,
            'cantidadminima'=>6
        ]);
        Articulo::create([
            'articulo_nom'=>'Cafe la virgia Instanteano x 50 gr ',
            'image_url'=>'https://maxiconsumo.com/media/catalog/product/cache/8313a15b471f948db4d9d07d4a9f04a2/7/3/734.jpg',
            'articulo_descripcion'=>'Cafe en frasco 50gr',
            'stock'=> 99,
            'estado'=> 'Validado',
            'comercio_id'=>4,
            'categoria_id'=>3,
            'precioxmayor'=>60,
            'precioxmenor'=>90,
            'cantidadminima'=>6
        ]);
        Articulo::create([
            'articulo_nom'=>'SALSA GOLF NATURA 125 CC ',
            'image_url'=>'https://maxiconsumo.com/media/catalog/product/cache/8313a15b471f948db4d9d07d4a9f04a2/2/0/20673.jpg',
            'articulo_descripcion'=>'SALSA GOLF NATURA 125 CC Marca Natura',
            'stock'=> 99,
            'estado'=> 'Validado',
            'comercio_id'=>4,
            'categoria_id'=>3,
            'precioxmayor'=>60,
            'precioxmenor'=>90,
            'cantidadminima'=>6
        ]);
        Articulo::create([
            'articulo_nom'=>'ARROZ MAROLIO LARGO FINO 500 GR',
            'image_url'=>'https://maxiconsumo.com/media/catalog/product/cache/8313a15b471f948db4d9d07d4a9f04a2/8/7/875.jpg',
            'articulo_descripcion'=>'ARROZ MAROLIO LARGO FINO 500 GR',
            'stock'=> 99,
            'estado'=> 'Validado',
            'comercio_id'=>4,
            'categoria_id'=>3,
            'precioxmayor'=>60,
            'precioxmenor'=>78.29,
            'cantidadminima'=>6
        ]);
        Articulo::create([
            'articulo_nom'=>'ARROZ ALA DORADO 500 GR',
            'image_url'=>'https://maxiconsumo.com/media/catalog/product/cache/8313a15b471f948db4d9d07d4a9f04a2/5/6/568.jpg',
            'articulo_descripcion'=>'ARROZ ALA DORADO 500 GR',
            'stock'=> 99,
            'estado'=> 'Validado',
            'comercio_id'=>4,
            'categoria_id'=>3,
            'precioxmayor'=>73,
            'precioxmenor'=>89.48,
            'cantidadminima'=>6
        ]);
        Articulo::create([
            'articulo_nom'=>'ACEITE MAROLIO MEZCLA 900 CC',
            'image_url'=>'https://maxiconsumo.com/media/catalog/product/cache/8313a15b471f948db4d9d07d4a9f04a2/3/0/304.jpg',
            'articulo_descripcion'=>'ACEITE MAROLIO MEZCLA 900 CC',
            'stock'=> 99,
            'estado'=> 'Validado',
            'comercio_id'=>4,
            'categoria_id'=>3,
            'precioxmayor'=>200,
            'precioxmenor'=>211.68,
            'cantidadminima'=>6
        ]);
        Articulo::create([
            'articulo_nom'=>'ACEITE NATURA GIRASOL PVC 500 CC',
            'image_url'=>'https://maxiconsumo.com/media/catalog/product/cache/8313a15b471f948db4d9d07d4a9f04a2/1/2/129.jpg',
            'articulo_descripcion'=>'ACEITE NATURA GIRASOL PVC 500 CC',
            'stock'=> 99,
            'estado'=> 'Validado',
            'comercio_id'=>4,
            'categoria_id'=>3,
            'precioxmayor'=>270,
            'precioxmenor'=>358.29,
            'cantidadminima'=>6
        ]);
        Articulo::create([
            'articulo_nom'=>'AACEITE NATURA AEROSOLOLIVA 120 CC',
            'image_url'=>'https://maxiconsumo.com/media/catalog/product/cache/8313a15b471f948db4d9d07d4a9f04a2/2/2/22268.jpg',
            'articulo_descripcion'=>'ACEITE NATURA AEROSOLOLIVA 120 CC',
            'stock'=> 99,
            'estado'=> 'Validado',
            'comercio_id'=>4,
            'categoria_id'=>3,
            'precioxmayor'=>350,
            'precioxmenor'=>398.30,
            'cantidadminima'=>6
        ]);
        Articulo::create([
            'articulo_nom'=>'LECHE COSALTA DESCREMADA X 1LT ',
            'image_url'=>'https://fiambreriasofi.com.ar/wp-content/uploads/2021/05/cosalta-ltda-SS307502-400x350-1.jpg',
            'articulo_descripcion'=>'LECHE COSALTA DESCREMADA X 1LT',
            'stock'=> 99,
            'estado'=> 'Validado',
            'comercio_id'=>4,
            'categoria_id'=>11,
            'precioxmayor'=>120,
            'precioxmenor'=>170,
            'cantidadminima'=>6
        ]);
        Articulo::create([
            'articulo_nom'=>'LECHE COSALTA ENTERA X 1LT',
            'image_url'=>'https://fiambreriasofi.com.ar/wp-content/uploads/2021/05/leche-entera-larga-vida-cosalta-x-1-lt1-001572b0f7be08e51e15906116685723-640-0-1.jpg',
            'articulo_descripcion'=>'LECHE COSALTA ENTERA X 1LT',
            'stock'=> 99,
            'estado'=> 'Validado',
            'comercio_id'=>4,
            'categoria_id'=>11,
            'precioxmayor'=>120,
            'precioxmenor'=>171,
            'cantidadminima'=>6
        ]);
        Articulo::create([
            'articulo_nom'=>'YOGURT MOMY BEBIBLE X 1LT',
            'image_url'=>'https://fiambreriasofi.com.ar/wp-content/uploads/2021/08/unnamed-1.jpg',
            'articulo_descripcion'=>'YOGURT MOMY BEBIBLE X 1LT',
            'stock'=> 99,
            'estado'=> 'Validado',
            'comercio_id'=>4,
            'categoria_id'=>11,
            'precioxmayor'=>172,
            'precioxmenor'=>198,
            'cantidadminima'=>6
        ]);
        Articulo::create([
            'articulo_nom'=>'YOGURT DESCREMADO MOMY X 1LT',
            'image_url'=>'https://fiambreriasofi.com.ar/wp-content/uploads/2021/08/unnamed-3.jpg',
            'articulo_descripcion'=>'YOGURT DESCREMADO MOMY X 1LT',
            'stock'=> 99,
            'estado'=> 'Validado',
            'comercio_id'=>4,
            'categoria_id'=>11,
            'precioxmayor'=>180,
            'precioxmenor'=>209,
            'cantidadminima'=>6
        ]);
        Articulo::create([
            'articulo_nom'=>'Galletitas Oreo 117grs',
            'image_url'=>'https://www.distribuidorapop.com.ar/wp-content/uploads/2019/05/galletitas-oreo-venta-ml.jpg',
            'articulo_descripcion'=>'Galletitas Oreo 117grs',
            'stock'=> 99,
            'estado'=> 'Validado',
            'comercio_id'=>4,
            'categoria_id'=>12,
            'precioxmayor'=>250,
            'precioxmenor'=>280,
            'cantidadminima'=>12
        ]);
        Articulo::create([
            'articulo_nom'=>'Bizcochos salados Jorgito x 200gr.',
            'image_url'=>'https://www.distribuidorapop.com.ar/wp-content/uploads/2016/08/bizcochos-salados-jorgito-venta.jpg',
            'articulo_descripcion'=>'Bizcochitos de grasa,Salados,Cada paquete trae 200gr,La caja trae 24 paquetes',
            'stock'=> 99,
            'estado'=> 'Validado',
            'comercio_id'=>4,
            'categoria_id'=>12,
            'precioxmayor'=>120,
            'precioxmenor'=>131,
            'cantidadminima'=>24
        ]);
        Articulo::create([
            'articulo_nom'=>'Galletitas Opera 55grs',
            'image_url'=>'https://www.distribuidorapop.com.ar/wp-content/uploads/2019/05/galletitas-opera-venta-ml.jpg',
            'articulo_descripcion'=>'Obleas Rellenas de crema sabor naranja Paquete x 55gr. La caja contiene 24 paquetes',
            'stock'=> 99,
            'estado'=> 'Validado',
            'comercio_id'=>4,
            'categoria_id'=>12,
            'precioxmayor'=>100,
            'precioxmenor'=>136,
            'cantidadminima'=>24
        ]);
        Articulo::create([
            'articulo_nom'=>'Galletitas Cachafaz integral avena con chips 225gr.',
            'image_url'=>'https://www.distribuidorapop.com.ar/wp-content/uploads/2019/05/galletitas-opera-venta-ml.jpg',
            'articulo_descripcion'=>'Galletitas Integrales Azucar Mascabo El paquete trae 225gr. La caja trae 21 paquetes',
            'stock'=> 99,
            'estado'=> 'Validado',
            'comercio_id'=>4,
            'categoria_id'=>12,
            'precioxmayor'=>350,
            'precioxmenor'=>391,
            'cantidadminima'=>21
        ]);


    }
    

}


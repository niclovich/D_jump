<?php

namespace Database\Seeders;

use App\Models\Comercio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComercioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comercio::create([
            'user_id' => 2,
            'comercio_nom'=>'Carlitos',
            'image_url'=> 'https://imagenes.elpais.com/resizer/A_R_QBvWXTG8G3EzIaaw2gOZe8M=/1960x0/cloudfront-eu-central-1.images.arcpublishing.com/prisa/FGVRU4ALGVUKRIOJEPLT4TCPZA.jpg',
            'comercio_descripcion' => 'descripcion',
            'comercio_horario'=> '08:00-14:00',
            'comercio_telefono'=>  '3874199824',
            'estado'=> 'validado',
            'longitud'=>-65.414107,
            'latitud'=> -24.79333

        ]);
        Comercio::create([
            'user_id' => 3,
            'comercio_nom'=>'Carlitos new',
            'image_url'=> 'https://imagenes.elpais.com/resizer/A_R_QBvWXTG8G3EzIaaw2gOZe8M=/1960x0/cloudfront-eu-central-1.images.arcpublishing.com/prisa/FGVRU4ALGVUKRIOJEPLT4TCPZA.jpg',
            'comercio_descripcion' => 'descripcion',
            'comercio_horario'=> '08:00-14:00',
            'comercio_telefono'=>  '3874199824',
            'estado'=> 'validado',
            'longitud'=>-65.415363,
            'latitud'=>-24.793113
        ]);
        Comercio::create([
            'user_id' => 4,
            'comercio_nom'=>'Carlitosxd',
            'image_url'=> 'https://imagenes.elpais.com/resizer/A_R_QBvWXTG8G3EzIaaw2gOZe8M=/1960x0/cloudfront-eu-central-1.images.arcpublishing.com/prisa/FGVRU4ALGVUKRIOJEPLT4TCPZA.jpg',
            'comercio_descripcion' => 'descripcion',
            'comercio_horario'=> '08:00-14:00',
            'comercio_telefono'=>  '3874199824',
            'estado'=> 'validado',
            'longitud'=> -65.413952,
            'latitud'=>-24.792207
        ]);
        Comercio::create([
            'user_id' => 5,
            'comercio_nom'=>'Nicolandia',
            'image_url'=> 'https://imagenes.elpais.com/resizer/A_R_QBvWXTG8G3EzIaaw2gOZe8M=/1960x0/cloudfront-eu-central-1.images.arcpublishing.com/prisa/FGVRU4ALGVUKRIOJEPLT4TCPZA.jpg',
            'comercio_descripcion' => 'descripcion',
            'comercio_horario'=> '08:00-14:00',
            'comercio_telefono'=>  '3874199824',
            'estado'=> 'validado',
            'longitud'=>-65.414188,
            'latitud'=>-24.792158
        ]);
        Comercio::create([
            'user_id' => 19,
            'comercio_nom'=>'Todo Deporte',
            'image_url'=> 'https://imagenes.elpais.com/resizer/A_R_QBvWXTG8G3EzIaaw2gOZe8M=/1960x0/cloudfront-eu-central-1.images.arcpublishing.com/prisa/FGVRU4ALGVUKRIOJEPLT4TCPZA.jpg',
            'comercio_descripcion' => 'Venta de articulos de deporte',
            'comercio_horario'=> '08:00-14:00',
            'comercio_telefono'=>  '3874199824',
            'estado'=> 'validado',
            'longitud'=>-65.415326,
            'latitud'=>-24.793238,
        ]);


        Comercio::create([
            'user_id' => 20,
            'comercio_nom'=>'Todo Perrito',
            'image_url'=> 'https://imagenes.elpais.com/resizer/A_R_QBvWXTG8G3EzIaaw2gOZe8M=/1960x0/cloudfront-eu-central-1.images.arcpublishing.com/prisa/FGVRU4ALGVUKRIOJEPLT4TCPZA.jpg',
            'comercio_descripcion' => 'Venta de Alimento,Jugetes,Casitas para perros',
            'comercio_horario'=> '08:00-14:00',
            'comercio_telefono'=>  '3874199824',
            'estado'=> 'validado',
            'longitud'=>-65.415318,
            'latitud'=>-24.792637,
        ]);


        Comercio::create([
            'user_id' => 21,
            'comercio_nom'=>'Mayorista Maxi',
            'image_url'=> 'https://imagenes.elpais.com/resizer/A_R_QBvWXTG8G3EzIaaw2gOZe8M=/1960x0/cloudfront-eu-central-1.images.arcpublishing.com/prisa/FGVRU4ALGVUKRIOJEPLT4TCPZA.jpg',
            'comercio_descripcion' => 'Venta de articulos de limpieza,para el hogar y mucho mas',
            'comercio_horario'=> '08:00-14:00',
            'comercio_telefono'=>  '3874199824',
            'estado'=> 'validado',
            'longitud'=>-65.414160,
            'latitud'=>-24.793082,
        ]);

        Comercio::create([
            'user_id' => 22,
            'comercio_nom'=>'El Trompo',
            'image_url'=> 'https://imagenes.elpais.com/resizer/A_R_QBvWXTG8G3EzIaaw2gOZe8M=/1960x0/cloudfront-eu-central-1.images.arcpublishing.com/prisa/FGVRU4ALGVUKRIOJEPLT4TCPZA.jpg',
            'comercio_descripcion' => 'Venta de ropa, a mayor y menor',
            'comercio_horario'=> '08:00-14:00',
            'comercio_telefono'=>  '3874199824',
            'estado'=> 'validado',
            'longitud'=>-65.414720,
            'latitud'=> -24.792079,
        ]);


        Comercio::create([
            'user_id' => 23,
            'comercio_nom'=>'El Trompo',
            'image_url'=> 'https://imagenes.elpais.com/resizer/A_R_QBvWXTG8G3EzIaaw2gOZe8M=/1960x0/cloudfront-eu-central-1.images.arcpublishing.com/prisa/FGVRU4ALGVUKRIOJEPLT4TCPZA.jpg',
            'comercio_descripcion' => 'Venta de ropa, a mayor y menor',
            'comercio_horario'=> '08:00-14:00',
            'comercio_telefono'=>  '3874199824',
            'estado'=> 'validado',
            'longitud'=>-65.412585,
            'latitud'=>-24.790954,
        ]);


        Comercio::create([
            'user_id' => 24,
            'comercio_nom'=>'TutuFruti',
            'image_url'=> 'https://imagenes.elpais.com/resizer/A_R_QBvWXTG8G3EzIaaw2gOZe8M=/1960x0/cloudfront-eu-central-1.images.arcpublishing.com/prisa/FGVRU4ALGVUKRIOJEPLT4TCPZA.jpg',
            'comercio_descripcion' => 'Venta de verduras  a mayor',
            'comercio_horario'=> '08:00-14:00',
            'comercio_telefono'=>  '3874199824',
            'estado'=> 'validado',
            'longitud'=>-65.412574,
            'latitud'=>-24.793428,
        ]);


        Comercio::create([
            'user_id' => 25,
            'comercio_nom'=>'El Mastil',
            'image_url'=> 'https://imagenes.elpais.com/resizer/A_R_QBvWXTG8G3EzIaaw2gOZe8M=/1960x0/cloudfront-eu-central-1.images.arcpublishing.com/prisa/FGVRU4ALGVUKRIOJEPLT4TCPZA.jpg',
            'comercio_descripcion' => 'venta de bebidas alcholicas',
            'comercio_horario'=> '08:00-14:00',
            'comercio_telefono'=>  '3874199824',
            'estado'=> 'validado',
            'longitud'=>-65.414160,
            'latitud'=>-24.794083,
        ]);
        /*Comercio::create([
            'user_id' => 6,
            'comercio_nom'=>'milo',
            'image_url'=> 'https://imagenes.elpais.com/resizer/A_R_QBvWXTG8G3EzIaaw2gOZe8M=/1960x0/cloudfront-eu-central-1.images.arcpublishing.com/prisa/FGVRU4ALGVUKRIOJEPLT4TCPZA.jpg',
            'comercio_descripcion' => 'descripcion',
            'comercio_horario'=> '08:00-14:00',
            'comercio_telefono'=>  '3874199824',
            'estado'=> 'validado',
            'longitud'=> 15478,
            'latitud'=>54548
        ]);
        Comercio::create([
            'user_id' => 7,
            'comercio_nom'=>'Mahia',
            'image_url'=> 'https://imagenes.elpais.com/resizer/A_R_QBvWXTG8G3EzIaaw2gOZe8M=/1960x0/cloudfront-eu-central-1.images.arcpublishing.com/prisa/FGVRU4ALGVUKRIOJEPLT4TCPZA.jpg',
            'comercio_descripcion' => 'descripcion',
            'comercio_horario'=> '08:00-14:00',
            'comercio_telefono'=>  '3874199824',
            'estado'=> 'validado',
            'longitud'=> 15478,
            'latitud'=>54548
        ]);
        Comercio::create([
            'user_id' => 8,
            'comercio_nom'=>'Todo x 2',
            'image_url'=> 'https://imagenes.elpais.com/resizer/A_R_QBvWXTG8G3EzIaaw2gOZe8M=/1960x0/cloudfront-eu-central-1.images.arcpublishing.com/prisa/FGVRU4ALGVUKRIOJEPLT4TCPZA.jpg',
            'comercio_descripcion' => 'descripcion',
            'comercio_horario'=> '08:00-14:00',
            'comercio_telefono'=>  '3874199824',
            'estado'=> 'validado',
            'longitud'=> 15478,
            'latitud'=>54548
        ]);*/
    }
}

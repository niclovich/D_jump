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
            'longitud'=> 15478,
            'latitud'=>54548

        ]);
        Comercio::create([
            'user_id' => 3,
            'comercio_nom'=>'Carlitos new',
            'image_url'=> 'https://imagenes.elpais.com/resizer/A_R_QBvWXTG8G3EzIaaw2gOZe8M=/1960x0/cloudfront-eu-central-1.images.arcpublishing.com/prisa/FGVRU4ALGVUKRIOJEPLT4TCPZA.jpg',
            'comercio_descripcion' => 'descripcion',
            'comercio_horario'=> '08:00-14:00',
            'comercio_telefono'=>  '3874199824',
            'estado'=> 'validado',
            'longitud'=> 15478,
            'latitud'=>54548
        ]);
        Comercio::create([
            'user_id' => 4,
            'comercio_nom'=>'Carlitosxd',
            'image_url'=> 'https://imagenes.elpais.com/resizer/A_R_QBvWXTG8G3EzIaaw2gOZe8M=/1960x0/cloudfront-eu-central-1.images.arcpublishing.com/prisa/FGVRU4ALGVUKRIOJEPLT4TCPZA.jpg',
            'comercio_descripcion' => 'descripcion',
            'comercio_horario'=> '08:00-14:00',
            'comercio_telefono'=>  '3874199824',
            'estado'=> 'validado',
            'longitud'=> 15478,
            'latitud'=>54548
        ]);
        Comercio::create([
            'user_id' => 5,
            'comercio_nom'=>'Nicolandia',
            'image_url'=> 'https://imagenes.elpais.com/resizer/A_R_QBvWXTG8G3EzIaaw2gOZe8M=/1960x0/cloudfront-eu-central-1.images.arcpublishing.com/prisa/FGVRU4ALGVUKRIOJEPLT4TCPZA.jpg',
            'comercio_descripcion' => 'descripcion',
            'comercio_horario'=> '08:00-14:00',
            'comercio_telefono'=>  '3874199824',
            'estado'=> 'validado',
            'longitud'=> 15478,
            'latitud'=>54548
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

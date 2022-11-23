<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\CategoriaArticulo;
use App\Models\Comercio;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {    
        //$comercios = Comercio::where('estado','Validando')->take(6)->get();
        //$comercios->load('user');
        $articuloscategoria2= Articulo::where('estado','Validado')->where('categoria_id',1)->get();
        $articuloscategoria1= Articulo::where('estado','Validado')->where('categoria_id',2)->get();
        $articuloscategoria3= Articulo::where('estado','Validado')->where('categoria_id',3)->get();


        $articuloscategoria1->load('comercio');
        $articuloscategoria1->load('categoria_articulo');
        $articuloscategoria2->load('comercio');
        $articuloscategoria2->load('categoria_articulo');
        $articuloscategoria3->load('comercio');
        $articuloscategoria3->load('categoria_articulo');
        $listadoarticulos=[$articuloscategoria3,$articuloscategoria2,$articuloscategoria1];
        
        $categorias = CategoriaArticulo::get();
        return view('welcome',compact('listadoarticulos','categorias'));
    }
    public function articulos()
    {    

        $articulos= Articulo::where('estado','Validado')->get();
        $categoria_nom = "Todos los  Articulos";
        $categorias = CategoriaArticulo::get();
        return view('articuloshome',compact('categorias','articulos','categoria_nom'));
    }         
    
}

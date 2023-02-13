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
        $articulos= Articulo::where('estado','Validado')->take(18)->get();
        
        return view('welcome',compact('articulos'));
    }

    public function articulos()
    {    

        $articulos= Articulo::where('estado','Validado')->paginate(10);
        $articulos->load('categoria_articulo');
        $categoria_nom = "Todos los  Articulos";
        $categorias = CategoriaArticulo::get();
        return view('articulos.index',compact('categorias','articulos','categoria_nom'));
    } 
    public function Mapa(){
        return view( 'mapa');
    }        
    
}

<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\CategoriaArticulo;
use App\Models\Comercio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {    
        $user = Auth::user();
        if (is_null($user)) {
            $articulos= Articulo::where('estado','Validado')->take(18)->get();

        }
        else{
            if($user->rol=="vendedor"){
                $articulos= Articulo::join('comercios','articulos.comercio_id','=','comercios.id')
                ->where('articulos.estado','Validado')
                ->where('comercios.user_id','!=',$user->id)
                ->take(18)->get();
            }
            else{
                $articulos= Articulo::where('estado','Validado')->take(18)->get();

            }




        }

        $categorias=CategoriaArticulo::get();
        return view('welcome',compact('articulos','categorias'));
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

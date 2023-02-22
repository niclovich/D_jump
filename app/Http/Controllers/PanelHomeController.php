<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\CategoriaArticulo;
use App\Models\Comercio;
use App\Models\Detallepedido;
use App\Models\Pedido;
use App\Models\User;
use App\Models\Venta;
use Database\Seeders\VentaSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanelHomeController extends Controller
{
    public function index()
    {    
        $user = Auth::user();
        if($user->rol=='admin'){
            $users =User::count();
            $comercios =Comercio::count();
            $venta =Venta::count();
            $producto =Articulo::count();
            return view('panel.roleshome.homeadmin',compact('users','comercios','venta','producto'));
        }
        else {
            if(($user->rol=='vendedor')){
                $comercio=Comercio::where('user_id',$user->id)->first();
                $cantpedios= Pedido::where('comercio_id',$comercio->id)->count();
                $cantarticulos = Articulo::where('comercio_id',$comercio->id)->where('estado','Validado')->count();
                return view('panel.roleshome.homevendedor',compact('cantarticulos','cantpedios','comercio'));
            }
            else{
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
                $ventas = Venta::where('user_id',$user->id)->count();
                return view('panel.roleshome.homecliente',compact('listadoarticulos','categorias','user','ventas'));
        
            }
        }

    }
}

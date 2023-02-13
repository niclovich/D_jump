<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\CategoriaArticulo;
use App\Models\Comercio;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $articulos = Articulo::search($request->search)->paginate(10);

            $categorias = CategoriaArticulo::get();
        }else{
            $articulos = Articulo::paginate(10);
            $categorias = CategoriaArticulo::get();


        }
        return view('articulos.index',compact('categorias','articulos'));
    }

    public function comerciosautocomplete(Request $request)
    {
        $data = Comercio::select("comercio_nom as value", "id")
                    ->where('comercio_nom', 'LIKE', '%'. $request->get('search2'). '%')
                    ->get();
    
        return response()->json($data);
    }

    public function searchcomercio(Request $request){
        if($request->has('search')){
            $comercios = Comercio::search($request->search)->paginate(10);

        }else{
            $comercios = Comercio::paginate(10);
        }
        return view('comercios.index',compact('comercios'));
    }

    
}

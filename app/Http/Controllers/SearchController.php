<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\CategoriaArticulo;
use App\Models\Comercio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();


        if ($request->has('search')) {
            $val="1";
            if (is_null($user)) {
                $articulos = Articulo::search($request->search)
                    ->query(function ($query) {
                        $user = Auth::user();
                        $query->join('comercios', 'articulos.comercio_id', '=', 'comercios.id')
                            ->join('categoria_articulos', 'categoria_articulos.id', 'articulos.categoria_id')
                            ->select('articulos.*', 'comercios.user_id')
                            ->where('articulos.estado', 'Validado');
                    })
                    ->paginate(10);
            } else {
                if ($user->rol == "vendedor") {
                    $articulos = Articulo::search($request->search)
                        ->query(function ($query) {
                            $user = Auth::user();
                            $query->join('comercios', 'articulos.comercio_id', '=', 'comercios.id')
                                ->join('categoria_articulos', 'categoria_articulos.id', 'articulos.categoria_id')

                                ->select('articulos.*', 'comercios.user_id')
                                ->where('comercios.user_id', '!=', $user->id)
                                ->where('articulos.estado', 'Validado');
                        })
                        ->paginate(10);
                } else {
                    $articulos = Articulo::search($request->search)
                        ->query(function ($query) {
                            $user = Auth::user();
                            $query->join('comercios', 'articulos.comercio_id', '=', 'comercios.id')
                                ->join('categoria_articulos', 'categoria_articulos.id', 'articulos.categoria_id')

                                ->select('articulos.*', 'comercios.user_id')
                                ->where('articulos.estado', 'Validado');
                        })
                        ->paginate(10);
                }
            }
        }
        else{
            $val="0";
            if (is_null($user)) {
                $articulos = Articulo::query(function ($query) {
                        $user = Auth::user();
                        $query->join('comercios', 'articulos.comercio_id', '=', 'comercios.id')
                            ->join('categoria_articulos', 'categoria_articulos.id', 'articulos.categoria_id')
                            ->select('articulos.*', 'comercios.user_id')
                            ->where('articulos.estado', 'Validado');
                    })
                    ->paginate(10);
            } else {
                if ($user->rol == "vendedor") {
                    $articulos = Articulo::query(function ($query) {
                            $user = Auth::user();
                            $query->join('comercios', 'articulos.comercio_id', '=', 'comercios.id')
                                ->join('categoria_articulos', 'categoria_articulos.id', 'articulos.categoria_id')

                                ->select('articulos.*', 'comercios.user_id')
                                ->where('comercios.user_id', '!=', $user->id)
                                ->where('articulos.estado', 'Validado');
                        })
                        ->paginate(10);
                } else {
                    $articulos = Articulo::query(function ($query) {
                            $user = Auth::user();
                            $query->join('comercios', 'articulos.comercio_id', '=', 'comercios.id')
                                ->join('categoria_articulos', 'categoria_articulos.id', 'articulos.categoria_id')

                                ->select('articulos.*', 'comercios.user_id')
                                ->where('articulos.estado', 'Validado');
                        })
                        ->paginate(10);
                }
            }

        }
        $categorias = CategoriaArticulo::get();
    
        return view('articulos.index', compact('categorias', 'articulos','val'));
    }

    public function comerciosautocomplete(Request $request)
    {
        $data = Comercio::select("comercio_nom as value", "id")
            ->where('comercio_nom', 'LIKE', '%' . $request->get('search2') . '%')
            ->get();

        return response()->json($data);
    }

    public function searchcomercio(Request $request)
    {
        if ($request->has('search')) {
            $comercios = Comercio::search($request->search)->paginate(10);
        } else {
            $comercios = Comercio::paginate(10);
        }
        return view('comercios.index', compact('comercios'));
    }
}

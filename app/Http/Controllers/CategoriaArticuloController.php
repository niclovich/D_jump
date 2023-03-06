<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\CategoriaArticulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriaArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriaArticulo $categoria)
    {
        $ruta='search='.$categoria->categoria_nombre;
        return redirect()->route('articulos.search',$ruta);


        /*
        $user = Auth::user();
        $val="1";
        if (is_null($user)) {
            $articulos = Articulo::where('estado', 'Validado')->where('categoria_id', $categoria->id)->paginate(10);
            $categoria_nom = $categoria->categoria_nombre;
            $categorias = CategoriaArticulo::get();
        }
        else{
            if($user->rol=="vendedor"){
                $articulos= Articulo::join('comercios','articulos.comercio_id','=','comercios.id')
                ->where('articulos.estado','Validado')
                ->where('categoria_id', $categoria->id)
                ->where('comercios.user_id','!=',$user->id)
                ->paginate(10);
                $categoria_nom = $categoria->categoria_nombre;
                $categorias = CategoriaArticulo::get();
            }
            else{
                $articulos = Articulo::where('estado', 'Validado')->where('categoria_id', $categoria->id)->paginate(10);
                $categoria_nom = $categoria->categoria_nombre;
                $categorias = CategoriaArticulo::get();

            }



        }

        return view('articulos.index', compact('categorias', 'articulos', 'categoria_nom','val'));*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

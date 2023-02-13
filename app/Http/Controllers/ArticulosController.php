<?php

namespace App\Http\Controllers;

use App\Exports\ArticulosExport;
use App\Models\Articulo;
use App\Models\CategoriaArticulo;
use App\Models\Comercio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class ArticulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        
        $user = Auth::user()->rol;
        if ($user == 'admin') {
            $articulos = Articulo::where('estado', 'Validado')->latest()->get();
            //$articulos=Articulo::all();

            $articulos->load('comercio');
            $articulos->load('categoria_articulo');

            //return $articulos;
        } else {
                $comercios = Comercio::where('user_id', Auth::user()->id)->first();
                $articulos = Articulo::where('comercio_id', $comercios->id)->where('estado', 'Validado')->orderBy('stock', 'asc')->get();
                //return $articulos;
                $articulos->load('comercio');
                $articulos->load('categoria_articulo');
            
    
        }
        $data = [
            'title' => 'Listado de articulos',
            'date' => date('m/d/Y'),
            'articulos' => $articulos
        ];

        $pdf = FacadePdf::loadView('panel.admin.articulos.articulos-pdf', $data);

        return $pdf->download('Articulos.pdf');
    }

    public function export(){
        return Excel::download(new ArticulosExport, 'Articulos.xlsx');
    }
    public function index()
    {
        $user = Auth::user()->rol;
        if ($user == 'admin') {
            $articulos = Articulo::where('estado', 'Validado')->latest()->get();
            //$articulos=Articulo::all();

            $articulos->load('comercio');
            $articulos->load('categoria_articulo');

            //return $articulos;
            return view('panel.admin.articulos.index', compact('articulos'));
        } else {
            if (($user == 'vendedor')) {
                $comercios = Comercio::where('user_id', Auth::user()->id)->first();
                $articulos = Articulo::where('comercio_id', $comercios->id)->where('estado', 'Validado')->orderBy('stock', 'asc')->get();
                //return $articulos;
                $articulos->load('comercio');
                $articulos->load('categoria_articulo');
                return view('panel.admin.articulos.index', compact('articulos'));
            }
            else{
                if($user == 'cliente'){
                    $articulos= Articulo::where('estado','Validado')->get();
                    $categoria_nom = "Todos los  Articulos";
                    $categorias = CategoriaArticulo::get();
                    return view('panel.admin.articulos.listado',compact('categorias','articulos','categoria_nom'));
                }         
            }
        }
    }

    public function create()
    {
        $user = Auth::user();
        $user->load('comercios');
        $comercio = $user->comercios->first();
        $categorias = CategoriaArticulo::get();
        return view('panel.admin.articulos.create', compact('comercio', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'comercio_id'=>'required',
                'articulo_nom' => 'required',
                'categoria_articulo' => 'required',
                'articulo_descripcion' => 'required',
                'stock' => 'required',
                'cantidadminima' => 'required',
                'precioxmayor' => 'required',
                'precioxmenor' => 'required',
            ]);

            $articulo = Articulo::create([
                'articulo_nom'=>$request->get('articulo_nom'),
                'image_url'=>'https://via.placeholder.com/1024',
                'articulo_descripcion'=>$request->get('articulo_descripcion'),
                'stock'=> $request->get('stock'),
                'estado'=> 'Validado',
                'comercio_id'=>$request->get('comercio_id'),
                'categoria_id'=>$request->get('categoria_articulo'),
                'precioxmayor'=>$request->get('precioxmayor'),
                'precioxmenor'=>$request->get('precioxmenor'),
                'cantidadminima'=>$request->get('cantidadminima')
            ]);    
            DB::commit();
            return redirect()->route('articulos.index')->with('success_msg', 'Articulo creado!' .$articulo->articulo_nom);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('articulos.index')->with('alert_msg', "eror Artiiclo no creado");;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        $user = Auth::user();
        if (empty($user)) {
            $articulo->load('categoria_articulo');
            $articulo->load('comercio');
            $idcategoria = $articulo->categoria_articulo->id;
            $articulosrelacioandos = Articulo::where('articulos.categoria_id', $idcategoria)->get();
            return view('articulos.show', compact('articulo', 'articulosrelacioandos'));
        } else {
            $articulo->load('categoria_articulo');
            $articulo->load('comercio');
            $idcategoria = $articulo->categoria_articulo->id;
            $articulosrelacioandos = Articulo::where('articulos.categoria_id', $idcategoria)->get();
            return view('panel.admin.articulos.show', compact('articulo', 'articulosrelacioandos'));
        }
    }
    public function showinico(Articulo $articulo)
    {
        $articulo->load('categoria_articulo');
        $articulo->load('comercio');
        $idcategoria = $articulo->categoria_articulo->id;
        $articulosrelacioandos = Articulo::where('articulos.categoria_id', $idcategoria)->get();
        return view('articulos.show', compact('articulo', 'articulosrelacioandos'));

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        $categorias=CategoriaArticulo::get();
        return view('panel.admin.articulos.edit', compact('articulo','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
        $request->validate([
            'articulo_nom' => 'required',
            'categoria_id' => 'required',
            'articulo_descripcion' => 'required',
            'stock' => 'required',
            'precioxmayor' => 'required',
            'precioxmenor' => 'required',
        ]);

        $articulo->articulo_nom = $request->get('articulo_nom');
        $articulo->categoria_id = $request->get('categoria_id');
        $articulo->articulo_descripcion = $request->get('articulo_descripcion');
        $articulo->stock= $request->get('stock');
        $articulo->precioxmayor= $request->get('precioxmayor');
        $articulo->precioxmenor= $request->get('precioxmenor');
        $articulo->save();


        return redirect()->route('articulos.index')->with('success_msg', 'Articulo actualizado!' .$articulo->articulo_nom);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //en el rquest pasa el token + es id
        //return $request;
        $comercio = Articulo::find($request->comercio_delete_id); //Buscamos el comercio  con el id y elinamos
        $comercio->estado = 'Eliminado';
        $comercio->save();

        return redirect()->route('articulos.index')->with('alert', 'Post eliminado exitosamente.');
    }
}

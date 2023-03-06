<?php

namespace App\Http\Controllers;

use App\Exports\ComerciosExport;
use App\Models\Articulo;
use App\Models\Comercio;
use App\Models\Venta;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

use function Ramsey\Uuid\v1;

class ComercioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comercios = Comercio::where('estado', 'Validando')->orWhere('estado', 'Validado')->get();
        $comercios->load('user');
        return view('panel.admin.comercios.index', compact('comercios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if($user->rol=='vendedor'){
            
        }
        return view('panel.admin.comercios.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        DB::beginTransaction();
        try {
            $request->validate([
                'user_id' => 'required',
                'comercio_nom' => 'required',
                'comercio_horario' => 'required',
                'comercio_descripcion' => 'required',
                'comercio_telefono' => 'required',

            ]);
            $user->rol = 'vendedor';
            $user->removeRole('cliente');
            $user->assignRole('vendedor');
            $user->save();
            Comercio::create([
                'user_id' => $request->get("user_id"),
                'comercio_nom' => $request->get("comercio_nom"),
                'image_url' => 'https://imagenes.elpais.com/resizer/A_R_QBvWXTG8G3EzIaaw2gOZe8M=/1960x0/cloudfront-eu-central-1.images.arcpublishing.com/prisa/FGVRU4ALGVUKRIOJEPLT4TCPZA.jpg',
                'comercio_descripcion' => $request->get('comercio_descripcion'),
                'comercio_horario' => $request->get('comercio_horario'),
                'comercio_telefono' =>  $request->get('comercio_telefono'),
                'estado' => 'validado',
                'longitud' => $request->get('longitud'),
                'latitud' =>  $request->get('latitud')
            ]);

            
            DB::commit();
            return redirect()->route('/home.index')->with("success_msg","Bievenido! Ahora pruebalo tu mismo");
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('comercios.create');
        }
    }


    public function show(Comercio $comercio)
    {
        $comercio->load('user');
        return view('panel.admin.comercios.show', compact('comercio'));
    }

    public function show2(Comercio $comercio)
    {
        $comercio->load('user');
        $articulos = Articulo::Where('comercio_id', $comercio->id)->get();
        $cantventas = Venta::selectRaw("count(*) as Total")
            ->join('pedidos', 'ventas.id', 'pedidos.venta_id')
            ->where('pedidos.comercio_id', $comercio->id)->get();
        $cantventas = $cantventas[0]->Total;
        //calcular fechas//
        $fechaActual = Carbon::now();
        $fechacreacion = $comercio->created_at;
        $diasregistrados = $fechacreacion->diffInDays($fechaActual);
        return view('comercios.show', compact('comercio', 'articulos', 'cantventas','diasregistrados'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comercio  $comercio
     * @return \Illuminate\Http\Response
     */
    public function edit(Comercio $comercio)
    {
        $comercio->load('user');
        return view('panel.admin.comercios.edit', compact('comercio'));
    }

    public function update(Request $request, Comercio $comercio)
    {
        $request->validate([
            'comercio_nom' => 'required',
            'comercio_descripcion' => 'required',
            'comercio_horario' => 'required',
            'comercio_telefono' => 'required',
        ]);

        $comercio->comercio_nom = $request->get('comercio_nom');
        $comercio->comercio_descripcion = $request->get('comercio_descripcion');
        $comercio->comercio_horario = $request->get('comercio_horario');
        $comercio->comercio_telefono = $request->get('comercio_telefono');
        $comercio->longitud = $request->get('longitud');
        $comercio->latitud = $request->get('latitud');
        $comercio->save();
        //$comercio->update($request->all());
        //return $comercio;

        //$comercio->fill($request->post())->update();
        $user = Auth::user();
        if ($user->rol == 'vendedor') {
            return redirect()->route('/home.index')->with('success_msg', 'Comercio   updated successfully');
        } else {
            return redirect()->route('comercios.index')->with('success_msg', 'Comercio   updated successfully');
        }
    }
    public function destroy(Request $request)
    {
        //en el rquest pasa el token + es id
        //return $request;
        $comercio = Comercio::find($request->comercio_delete_id); //Buscamos el comercio  con el id y elinamos
        $comercio->estado = 'Eliminado';
        $comercio->save();

        return redirect()->route('comercios.index')->with('alert', 'Post eliminado exitosamente.');
    }
    public function export()
    {
        return Excel::download(new ComerciosExport, 'comercios.xlsx');
    }
    public function generatePDF()
    {
        $comercios = Comercio::where('estado', 'Validando')->orWhere('estado', 'Validado')->get();
        $comercios->load('user');
        $data = [
            'title' => 'Listado de comercios',
            'date' => date('m/d/Y'),
            'comercios' => $comercios
        ];

        $pdf = FacadePdf::loadView('panel.admin.comercios.comercios-pdf', $data);

        return $pdf->download('Comercios.pdf');
    }
    public function comercioindex()
    {
        $comercios = Comercio::selectRaw('comercios.*, (SELECT COUNT(*) from articulos where articulos.comercio_id=comercios.id) as articulos,(SELECT COUNT(*)   FROM ventas inner join pedidos on pedidos.venta_id=ventas.id WHERE pedidos.comercio_id=comercios.id) as ventas ')
        ->where('estado', 'Validado')
        ->orderby('articulos','desc')
        ->paginate(10);
        $comercios->load('user');
        return view('comercios.index', compact('comercios'));
    }
    public function comerciodata()
    {
        $comercios = Comercio::where('estado', 'Validando')->orWhere('estado', 'Validado')->get();
        $comercios->load('user');
        return response()->json(['success' => true, 'comercios' => $comercios], 200);
    }

    public function comercioshow(Request $request,$id){

        $comercios = Comercio::where('estado', 'Validando')->orWhere('estado', 'Validado')
        ->where('id',$id)
        ->get();
        $comercios->load('user');
        return response()->json(['success' => true, 'comercios' => $comercios], 200);
    }
}

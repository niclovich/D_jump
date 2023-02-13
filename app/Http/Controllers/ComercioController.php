<?php

namespace App\Http\Controllers;

use App\Exports\ComerciosExport;
use App\Models\Articulo;
use App\Models\Comercio;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

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
                'comercio_telefono' => 'required'
            ]);
            $user->rol = 'vendedor';
            $user->removeRole('cliente');
            $user->assignRole('vendedor');
            $user->save();
            Comercio::create([
                'user_id' => $request->get("user_id"),
                'comercio_nom'=>$request->get("comercio_nom"),
                'image_url'=> 'https://imagenes.elpais.com/resizer/A_R_QBvWXTG8G3EzIaaw2gOZe8M=/1960x0/cloudfront-eu-central-1.images.arcpublishing.com/prisa/FGVRU4ALGVUKRIOJEPLT4TCPZA.jpg',
                'comercio_descripcion' => $request->get('comercio_descripcion'),
                'comercio_horario'=> $request->get('comercio_horario'),
                'comercio_telefono'=>  $request->get('comercio_telefono'),
                'estado'=> 'validado',
                'longitud'=> 15478,
                'latitud'=>54548
            ]);            
            DB::commit();
            return redirect()->route('/home.index');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('/home.index');
        }

    }


    public function show(Comercio $comercio)
    {
        $comercio->load('user');
        return view('panel.admin.comercios.show', compact('comercio'));
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

        $comercio->save();
        //$comercio->update($request->all());
        //return $comercio;

        //$comercio->fill($request->post())->update();
        $user = Auth::user();
        if($user->rol=='vendedor'){
            return redirect()->route('/home.index')->with('success_msg', 'Comercio   updated successfully');

        }
        else
        {
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
        $comercios = Comercio::where('estado', 'Validando')->orWhere('estado', 'Validado')->get();
        $comercios->load('user');
        return view('comercios.index', compact('comercios'));
             
    }
    public function comerciodata()
    {
        $comercios = Comercio::where('estado', 'Validando')->orWhere('estado', 'Validado')->get();
        $comercios->load('user');
        return response()->json(['success' => true, 'comercios' => $comercios], 200);
    }
    
}

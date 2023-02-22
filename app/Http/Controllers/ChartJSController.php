<?php

namespace App\Http\Controllers;

use App\Models\Comercio;
use App\Models\Detallepedido;
use App\Models\Pedido;
use App\Models\User;
use App\Models\Venta;
use DateTime;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChartJSController extends Controller
{
    //SELECT  categoria_articulos.categoria_nombre,count(*) from pedidos INNER join detallepedidos on pedidos.id = detallepedidos.pedido_id INNER JOIN articulos on detallepedidos.articulo_id = articulos.id INNER JOIN categoria_articulos on articulos.categoria_id=categoria_articulos.id  GROUP by categoria_articulos.id;
    public function allcategorygraphics()
    {
        $data = Detallepedido::select('categoria_articulos.id', 'categoria_articulos.categoria_nombre')
            ->selectRaw("count(*) as Total")
            ->join('articulos', 'detallepedidos.articulo_id', '=', 'articulos.id')
            ->join('categoria_articulos', 'articulos.categoria_id', 'categoria_articulos.id')
            ->groupBy('categoria_articulos.id', 'categoria_articulos.categoria_nombre')
            ->orderBy(DB::raw("count(*)"))
            ->limit(6)
            ->get();
        return response()->json($data, 200);
    }
    // SELECT  categoria_articulos.categoria_nombre,count(*) from pedidos INNER join detallepedidos on pedidos.id = detallepedidos.pedido_id INNER JOIN articulos on detallepedidos.articulo_id = articulos.id INNER JOIN categoria_articulos on articulos.categoria_id=categoria_articulos.id WHERE pedidos.comercio_id="4" GROUP by categoria_articulos.id;

    public function comerciocategorygraphics()
    {
        $user = Auth::user();
        $user->load('comercios');
        $comercio = $user->comercios->first();
        $data = Pedido::select('categoria_articulos.id', 'categoria_articulos.categoria_nombre')
            ->selectRaw("count(*) as Total")
            ->join('detallepedidos', 'pedidos.id', "=", "detallepedidos.pedido_id")
            ->join('articulos', 'detallepedidos.articulo_id', '=', 'articulos.id')
            ->join('categoria_articulos', 'articulos.categoria_id', 'categoria_articulos.id')
            ->where('pedidos.comercio_id', '=', $comercio->id)
            ->orderBy(DB::raw("count(*)"))
            ->groupBy('categoria_articulos.id', 'categoria_articulos.categoria_nombre')
            ->limit(6)
            ->get();
        return response()->json($data, 200);
    }

    //SELECT count(*),EXTRACT(MONTH FROM created_at)  from pedidos;SELECT count(*),EXTRACT(MONTH FROM created_at)  from pedidos;
    public function ordersshop(Response $response)
    {
        $user = Auth::user();
        $user->load('comercios');
        $comercio = $user->comercios->first();
        $data = Pedido::select(DB::raw("MONTH(created_at) as mes"))
            ->selectRaw("count(*) as Total")
            ->where('pedidos.comercio_id', '=', $comercio->id)
            ->orderBy('created_at')->groupBy(DB::raw("MONTH(created_at)"))->get();
        foreach ($data as $item) {
            if ($item->mes == '1') {
                $item->mes = 'Enero';
            }
            if ($item->mes == '2') {
                $item->mes = 'Febrero';
            }
            if ($item->mes == '3') {
                $item->mes = 'Marzo';
            }
            if ($item->mes == '4') {
                $item->mes = 'Abril';
            }
            if ($item->mes == '5') {
                $item->mes = 'Mayo';
            }
            if ($item->mes == '6') {
                $item->mes = 'Junio';
            }
            if ($item->mes == '7') {
                $item->mes = 'Julio';
            }
            if ($item->mes == '8') {
                $item->mes = 'Agosto';
            }
            if ($item->mes == '9') {
                $item->mes = 'Septiembre';
            }
            if ($item->mes == '10') {
                $item->mes = 'Octubre';
            }
            if ($item->mes == '11') {
                $item->mes = 'Noviembre';
            }
            if ($item->mes == '12') {
                $item->mes = 'Diciembre';
            }
        }
        return  $data;
    }
    public function allorders(Response $response)
    {
        $data = Venta::select(DB::raw("MONTH(created_at) as mes"))
            ->selectRaw("count(*) as Total")
            ->orderBy('created_at')->groupBy(DB::raw("MONTH(created_at)"))->get();
        foreach ($data as $item) {
            if ($item->mes == '1') {
                $item->mes = 'Enero';
            }
            if ($item->mes == '2') {
                $item->mes = 'Febrero';
            }
            if ($item->mes == '3') {
                $item->mes = 'Marzo';
            }
            if ($item->mes == '4') {
                $item->mes = 'Abril';
            }
            if ($item->mes == '5') {
                $item->mes = 'Mayo';
            }
            if ($item->mes == '6') {
                $item->mes = 'Junio';
            }
            if ($item->mes == '7') {
                $item->mes = 'Julio';
            }
            if ($item->mes == '8') {
                $item->mes = 'Agosto';
            }
            if ($item->mes == '9') {
                $item->mes = 'Septiembre';
            }
            if ($item->mes == '10') {
                $item->mes = 'Octubre';
            }
            if ($item->mes == '11') {
                $item->mes = 'Noviembre';
            }
            if ($item->mes == '12') {
                $item->mes = 'Diciembre';
            }
        }
        return  $data;
    }
    public function comercioorderssday()
    {
        /*SELECT COUNT(*),EXTRACT(day FROM ventas.created_at) as day  
  from ventas INNER join pedidos on ventas.id=pedidos.venta_id  
  WHERE EXTRACT(year FROM ventas.created_at)=2023 and   
  EXTRACT(MONTH FROM ventas.created_at)=2  AND
  pedidos.comercio_id="4"
  GROUP by  EXTRACT(day FROM ventas.created_at);*/
        $user = Auth::user();
        $user->load('comercios');
        $comercio = $user->comercios->first();
        $now = Carbon::now();
        $month = $now->format('m');


        $data = Venta::selectRaw("count(*) as Total,day(ventas.created_at) as day")
            ->join('pedidos', 'ventas.id', 'pedidos.venta_id')
            ->where(DB::raw("year(ventas.created_at)"), $now->format('Y'))
            ->where(DB::raw("MONTH(ventas.created_at)"), $month)
            ->where('pedidos.comercio_id', $comercio->id)
            ->groupBy(DB::raw("day(ventas.created_at)"))->get();
        return $data;
    }
    public function allorderssday()
    {
        /*SELECT COUNT(*),EXTRACT(day FROM ventas.created_at) as day  
  from ventas INNER join pedidos on ventas.id=pedidos.venta_id  
  WHERE EXTRACT(year FROM ventas.created_at)=2023 and   
  EXTRACT(MONTH FROM ventas.created_at)=2  AND
  pedidos.comercio_id="4"
  GROUP by  EXTRACT(day FROM ventas.created_at);*/
        $now = Carbon::now();
        $month = $now->format('m');


        $data = Venta::selectRaw("count(*) as Total,day(ventas.created_at) as day")
            ->join('pedidos', 'ventas.id', 'pedidos.venta_id')
            ->where(DB::raw("year(ventas.created_at)"), $now->format('Y'))
            ->where(DB::raw("MONTH(ventas.created_at)"), $month)
            ->groupBy(DB::raw("day(ventas.created_at)"))->get();
        return $data;
    }

    public function allusersformonth()
    {
        $now = Carbon::now();
        $mes = $now->format('m');
        $data = User::selectRaw("count(*) as Total,MONTH(users.created_at) as month")
            ->where(DB::raw("year(users.created_at)"), $now->format('Y'))
            ->groupBy(DB::raw("month(users.created_at)"))->get();
        return  $data;
    }
    public function allcomerciosformonth()
    {
        $now = Carbon::now();
        $mes = $now->format('m');
        $data = Comercio::selectRaw("count(*) as Total,MONTH(comercios.created_at) as month")
            ->where(DB::raw("year(comercios.created_at)"), $now->format('Y'))
            ->groupBy(DB::raw("month(comercios.created_at)"))->get();
        return  $data;
    }
}

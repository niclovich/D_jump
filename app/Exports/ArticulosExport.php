<?php

namespace App\Exports;

use App\Models\Articulo;
use App\Models\Comercio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ArticulosExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'id',
            'Nombre Articulo',
            'Categoria ',
            'stock',
            'precioxmayor',
            'precioxmenor',
            'cantidadminima'
        ];
    }
    public function collection()
    {
        $user = Auth::user();
        if ($user->rol == "admin") {
            $articulos = DB::table('articulos')->join('categoria_articulos', 'categoria_articulos.id', 'articulos.categoria_id')
                ->select('articulos.id', 'articulo_nom', 'categoria_nombre', 'stock', 'precioxmayor', 'precioxmenor', 'cantidadminima')->get();
        }
        else{
            $comercio =Comercio::where('user_id',$user->id)->first();
            $articulos = DB::table('articulos')->join('categoria_articulos', 'categoria_articulos.id', 'articulos.categoria_id')
            ->select('articulos.id', 'articulo_nom', 'categoria_nombre', 'stock', 'precioxmayor', 'precioxmenor', 'cantidadminima')
            ->where('comercio_id',$comercio->id)
            ->get();

        }
        return $articulos;
    }
}

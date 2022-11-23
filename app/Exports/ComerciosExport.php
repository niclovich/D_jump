<?php

namespace App\Exports;

use App\Models\Comercio;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ComerciosExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array {
        return [
        'Id',
        'Nombre comercio',
        'Dueño',
        'Telefono',
        'Estado',
        'Logiutd',
        'Latitud'
        ];
    }
    public function collection()
    {
        $comercios = DB::table('comercios')->join('users','comercios.user_id','users.id')->select('comercios.id','comercio_nom','users.name', 'comercio_telefono','estado','longitud','latitud')->get();

        return $comercios;
    }
}

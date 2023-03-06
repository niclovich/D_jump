<?php

namespace App\Http\Controllers;

use App\Mail\SendMailVenta;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail as FacadesMail;

class EmailController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $mailData = [
            'factura'=>1,
            'nombre' => 'Nicolas muñoz ',
            'dirreccion' => 'Gracias por formar parte de Djump, Difruta de nuestro sistema y encuentra el mejor precio $$ ',
            'telefono' => "xd"
        ];
        FacadesMail::to('sintumba295@gmail.com')->send(new SendMailVenta($mailData));
        dd('Success! Email has been sent successfully.');
    }


}
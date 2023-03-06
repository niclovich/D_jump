<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        $users = User::role(['vendedor', 'cliente'])->get();
        return view('panel.admin.users.index', compact('users'));
    }
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    public function generatePDF()
    {
        $users = User::role(['vendedor', 'cliente'])->get();

        $data = [
            'title' => 'Listado de usuarios',
            'date' => date('m/d/Y'),
            'users' => $users
        ];

        $pdf = FacadePdf::loadView('panel.admin.users.user-pdf', $data);

        return $pdf->download('listadousuarios.pdf');
    }
    public function edit(User $user)
    {
        return view('panel.admin.users.edit', compact('user'));
    }
    public function show(User $user)
    {
        return view('panel.admin.users.show', compact('user'));
    }
    public function update(Request $request, User $user)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',

        ]);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->save();
        $url = $request->get('urlactual');
        $stringSeparado = explode('/', $url);
        if($stringSeparado[1]=='settings'){
            return redirect()->route('settings')->with('alert', 'Post eliminado exitosamente.');
        }
        else{
            return view('panel.admin.users.edit', compact('user'));

        }
    }
    /*
    public function destroy(User $user)
    {
        // Eliminamos la imagen
        $user->delete();
        return redirect()->route('panel.admin.users.index')->with('alert', 'Post eliminado exitosamente.');
    }*/
    public function destroy(Request $request)
    {
        //en el rquest pasa el token + es id
        $user = User::find($request->user_delete_id); //Buscamos el comercio  con el id y elinamos
        $user->delete();
        return redirect()->route('users.index')->with('alert', 'Post eliminado exitosamente.');
    }

    public function settings()
    {
        $user = Auth::user();

        return view('panel.admin.users.edit', compact('user'));
    }
    public function  change_password()
    {
        $user = Auth::user();

        return view('panel.admin.users.change_password', compact('user'));
    }

    public function updatechange_password(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'passwordnueva' => 'required',
            'passwordconfirmar' => 'required',

        ]);
        $passwordconfirmar=$request->get('passwordconfirmar');
        $passwordnueva=$request->get('passwordnueva');
        if($passwordconfirmar==$passwordnueva){
            $user->password = Hash::make($passwordnueva);
            $user->save();
            //$comercio->update($request->all());
            //return $comercio;
    
            //$comercio->fill($request->post())->update();
            return redirect()->route('change_password')->with('succes', 'Password  actualizada ');
        }
        else{
            return redirect()->route('change_password')->with('error', 'Password diferentes verificaar!');

        }

    }
}

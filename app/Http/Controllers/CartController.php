<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class CartController extends Controller
{

    public function cart()  {
        $cartCollection = CartFacade::getContent();
        return view('articulos.cart',compact('cartCollection'));
    }
    public function remove(Request $request){
        CartFacade::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    }
 
    public function add(Request $request){
        /*
        $user=Auth::user()->rol;
        if($user=='cliente'){
            CartFacade::add(array(
                'id' => $request->id,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'attributes' => array(
                    'image' => $request->img,
                    'comercio'=> $request->comercio,
                    'pricemayor'=> $request->pricemayor,
                    'pricemenor'=> $request->pricemenor,
                    'cantidadminima'=> $request->cantidadminima
                )
            ));
            return redirect()->route('/home.index')->with('success_msg', 'Item Agregado a sú Carrito!');
        }
        else{
            return redirect()->route('/');
        }*/
        $cartCollection = CartFacade::getContent();
        CartFacade::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->img,
                'comercionombre'=> $request->comercionombre,
                'comercioid'=> $request->comercioid,
                'pricemayor'=> $request->pricemayor,
                'pricemenor'=> $request->pricemenor,
                'cantidadminima'=> $request->cantidadminima
            )
        ));
        return redirect()->route($request->page)->with('success_msg', 'Item Agregado a sú Carrito!');
    }

    public function update(Request $request){
        CartFacade::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
    }

    public function clear(){
        CartFacade::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Car is cleared!');
    }
}
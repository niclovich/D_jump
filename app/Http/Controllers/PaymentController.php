<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Detallepedido;
use App\Models\Pedido;
use App\Models\Venta;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\PaymentExecution;
use Illuminate\Support\Facades\Request;
use Psy\ConfigPaths;

class PaymentController extends Controller
{
    private $_api_context;

    public function __construct()
    {
        $paypal_conf = Config::get('paypal'); //levanta la conf. de paypal.php
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret']
        ));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    public function payWithpaypal(HttpRequest $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName('Item 1')
            /** nombre del item **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount'));
        /** precio unitario **/
        /** amount está en el form como atributo name del input**/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('La descripcion de la transaccion');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status'))
            /** URL de retorno **/
            ->setCancelUrl(URL::to('status'));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($this->_api_context);
        } catch (PayPalConnectionException $ex) {
            if (Config::get('app.debug')) {
                Session::put('error', 'El tiempo de conexion expiro');
                return Redirect::route('/');
            } else {
                Session::put('error', 'Ocurrio un error, perdon por el
       inconveniente');
                return Redirect::route('/');
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        /** agrega payment ID a la session **/
        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {

            /** redirect a paypal **/
            return Redirect::away($redirect_url);
        }


        Session::put('error', 'Error desconocido');
        return Redirect::to('/');
    }
    public function getPaymentStatus(HttpRequest $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
            return redirect('/')->with(compact('status'));
        }

        $payment = Payment::get($paymentId, $this->_api_context);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() === 'approved') {
            $status = 'Gracias! El pago a través de PayPal se ha ralizado correctamente.';
            $player=$result->payer->payer_info;
            $user = Auth::user();
            $cartArticulos = CartFacade::getContent();
        
            $cartTotal = CartFacade::getTotal(); // the total w
            if(is_null($user)){
                //no esta logeado//
                return redirect()->route('login');
            }
            else {
                DB::beginTransaction();
                try {
                    $venta = Venta::create([
                        'user_id' => $user->id,
                        'estado' => 'Empaquetando',
                        'total' => $cartTotal,
                        'firstName'=>$player->first_name,
                        'lastName'=>$player->last_name,
                        'address'=>$player->shipping_address->line1,
                        'address2'=>"null",
                        'country'=>$player->shipping_address->country_code,
                        'state'=>$player->shipping_address->state,
                    ]);
    
                    $pedidosComercio = [];
                    //obtengo los comercios para armar los pedidos
                    foreach ($cartArticulos  as $articarrito) {
                        $comercio = $articarrito->attributes->comercioid;
                        if (!in_array($comercio, $pedidosComercio)) {
                            array_push($pedidosComercio, $comercio);
                        }
                    }
                    foreach ($pedidosComercio  as $comercio) {
                        $pedido = Pedido::create([
                            'comercio_id' => $comercio,
                            'estado' => 'Empaquetando', //Recibido,,En camino,Cancelado,Empaquetando
                            'totalpedido' => 0,
                            'venta_id' => $venta->id
                        ]);
        
                        foreach ($cartArticulos  as $articarrito) {
                            $comercioArticulo = $articarrito->attributes->comercioid;
                            if ($comercio == $comercioArticulo) {
                                $articuloac = Articulo::where('id', $articarrito->id)->get()->first();
                                if ($articuloac->stock >= $articarrito->quantity) {
                                    $articuloac->stock=$articuloac->stock - $articarrito->quantity;
                                    $articuloac->save();
                                    Detallepedido::create([
                                        'articulo_id' => $articarrito->id,
                                        'pedido_id' => $pedido->id,
                                        'cantidad' => $articarrito->quantity
                                    ]);
                                    $pedido->totalpedido=CartFacade::get($articarrito->id)->getPriceSum();
                                    $pedido->save();
                                } else {
                                    DB::rollback();
                                    CartFacade::clear();
                                    return redirect()->route('cart.index')->with('alert_msg', 'Error cantidad no disponible');
                                }
                            }
                        }
                    }
                    CartFacade::clear();
                    DB::commit();
                    return redirect()->route('cart.index')->with('succes_venta', 'Pago realizado Realizado');
                } catch (\Exception $e) {
                    DB::rollback();
                    return redirect()->route('cart.index')->with('alert_msg', 'Error Vuelva a intentar');
                }
            }
        }

        $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
        return redirect('/results')->with(compact('status'));
    }
}

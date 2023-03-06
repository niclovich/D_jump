@extends('layouts.plantilla')
@section('contenido')
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="bg-success text-white text-left">
                <span onclick="this.parentElement.style.display='none'">&times;</span>
                <p>{{ $message }}</p>
            </div>
            <?php Session::forget('success'); ?>
        @endif
        @if ($message = Session::get('error'))
            <div class="bg-danger text-white text-left">
                <span onclick="this.parentElement.style.display='none'">&times;</span>
                <p>{{ $message }}</p>
            </div>
            <?php Session::forget('error'); ?>
        @endif
    </div>

<br>
    <div class="container">
        <main>


            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last " style="padding-top:100px">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Carrito</span>
                        <span class="badge bg-primary rounded-pill">{{ \Cart::getTotalQuantity() }}</span>
                    </h4>
                    <ul class="list-group mb-3 ">
                        @foreach ($cartArticulos as $articulo)
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">{{ $articulo->name }}</h6>
                                    <small class="text-muted">Cantidad:{{ $articulo->quantity }}</small>
                                </div>
                                <span class="text-muted">${{ $articulo->price*$articulo->quantity}}</span>
                            </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 class="my-0">Promo code</h6>
                                <small>EXAMPLECODE</small>
                            </div>
                            <span class="text-success">−$5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total </span>
                            <strong>${{ \Cart::getTotal() }}</strong>
                        </li>
                    </ul>

                    <form class="card p-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Promo code">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3"> Metodo de pago Payment</h4>
                    <div class="my-3">
                        <div class="form-check">
                            <input id="debit" name="paymentMethod" type="radio" class="form-check-input" checked
                                required onclick="mostrarselec()">
                            <label class="form-check-label" for="debit">Debit card</label>
                        </div>
                        <div class="form-check">
                            <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required
                                onclick="mostrarselec()">
                            <label class="form-check-label" for="paypal">PayPal</label>
                        </div>
                    </div>
                    <hr class="my-4">
                    <div id="container-pagos">
                        <div id="container-tarjeta">
                            <h4 class="mb-3">Dirección de Envio</h4>

                            <form class="card p-2 my-4 shadow " method="post" action="{{ url('/ventavalida') }}">
                                {{ csrf_field() }}

                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label for="firstName" class="form-label"> Nombre</label>
                                        <input type="text" class="form-control" name="firstName" id="firstName"
                                            placeholder="" value="" required>
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="lastName" class="form-label">Apellido</label>
                                        <input type="text" class="form-control" name="lastName" id="lastName"
                                            placeholder="" value="" required>
                                        <div class="invalid-feedback">
                                            Valid last name is required.
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="email" class="form-label">Email <span
                                                class="text-muted"></span></label>

                                        <div class="input-group has-validation">
                                            <span class="input-group-text">@</span>
                                            <input type="text" class="form-control" name="email" id="email"
                                                placeholder="email" required>
                                            <div class="invalid-feedback">
                                                Your Email is required.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="address" class="form-label">Dirrecion</label>
                                        <input type="text" class="form-control" name="address" id="address"
                                            placeholder="1234 Main St" required>
                                        <div class="invalid-feedback">
                                            Please enter your shipping address.
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="address2" class="form-label">Dirrecion 2 <span
                                                class="text-muted">(Optional)</span></label>
                                        <input type="text" class="form-control" name="address2" id="address2"
                                            placeholder="Apartment or suite">
                                    </div>

                                    <div class="col-md-5">
                                        <label for="country" class="form-label">Country</label>
                                        <select class="form-select" name="country" id="country" required>
                                            <option value="">Choose...</option>
                                            <option value="argentina">Argentina</option>

                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid country.
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="state" class="form-label">State</label>
                                        <select class="form-select" name='state' id="state" required>
                                            <option value="">Choose...</option>
                                            <option value="salta">Salta</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please provide a valid state.
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="zip" class="form-label">Zip</label>
                                        <input type="text" class="form-control" id="zip" placeholder=""
                                            required>
                                        <div class="invalid-feedback">
                                            Zip code required.
                                        </div>
                                    </div>
                                </div>
                                <div class="row gy-3">
                                    <div class="col-md-6">
                                        <label for="cc-name" class="form-label">Name on card</label>
                                        <input type="text" class="form-control" id="cc-name" placeholder="">
                                        <small class="text-muted">Full name as displayed on card</small>
                                        <div class="invalid-feedback">
                                            Name on card is required
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cc-number" class="form-label">Credit card number</label>
                                        <input type="text" class="form-control" id="cc-number" placeholder="">
                                        <div class="invalid-feedback">
                                            Credit card number is required
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="cc-expiration" class="form-label">Expiration</label>
                                        <input type="text" class="form-control" id="cc-expiration" placeholder="">
                                        <div class="invalid-feedback">
                                            Expiration date required
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="cc-cvv" class="form-label">CVV</label>
                                        <input type="text" class="form-control" id="cc-cvv" placeholder="">
                                        <div class="invalid-feedback">
                                            Security code required
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4">
                                <button class="w-100 btn btn-success btn-lg" type="submit">Confirmar Compra</button>
                            </form>
                        </div>
                        <div id="container-paypal" style="display: none">
                            <form class="card p-2 my-4 shadow" method="POST" id="payment-form"
                                action="{{ route('paypal') }}">
                                {{ csrf_field() }}

                                
                                
                                <h4 class="mb-3 bg-fondo text-center py-2">Pago con Paypal</h4>

                                <div class="form-group">
                                    <input type="text" style="display: none" name="amount"
                                        value="{{ \Cart::getTotal() }}">
                                </div>
                                <button class="btn btn-success btn-lg btn-block mt-3" type="submit">Pagar con
                                    PayPal</button>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </main>

    </div>
@endsection
@section('js')
    <script>
        function mostrarselec() {
            if (document.getElementById('paypal').checked) {
                //Mostrar tarjeta
                var x = document.getElementById("container-tarjeta");
                x.style.display = "none";


                //ocultar paypal
                var paypal = document.getElementById("container-paypal");
                paypal.style.display = "block";


            }
            if (document.getElementById('debit').checked) {

                //Mostrar paypl
                var paypal = document.getElementById("container-paypal");
                paypal.style.display = "none"


                //ocultar tarjeta
                var tarjeta = document.getElementById("container-tarjeta");
                tarjeta.style.display = "block";

            }
        }
    </script>
@endsection

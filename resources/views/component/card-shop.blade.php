<div class="row p-2 bg-white border rounded">
    <div class="col-md-2 mt-1"><img class="img-fluid img-responsive rounded product-image" src="{{$comercio->image_url}}" style="padding: 5px;  height : 100px;width: 150px"></div>
    <div class="col-md-3 mt-1">
        <h5 >{{$comercio->comercio_nom}}</h5>
        <div class="d-flex flex-row" >
            <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
        </div>
    </div>
    <div class="col-4" style="">
        <div class="mt-1 mb-1 spec-1"><span>Horario : </span><span class="dot"></span><span>{{$comercio->comercio_horario}}</span></div>
        <p class="text-justify text-truncate para mb-0">{{$comercio->comercio_descripcion}}<br><br></p>
    </div>
    <div class="align-items-center align-content-center col-md-3 border-left mt-1">
        <div class="d-flex flex-row align-items-center">
            <h6 class="mr-1">Cant Articulos   </h6><span class="strike-text">     {{$comercio->articulos}}</span>
        </div>
        <h6 class="text-success">Ventas realizadas {{$comercio->ventas}}</h6>
        <div class="d-flex flex-column mt-1">
            <a href="{{route('comercios.show2',$comercio)}}" class="btn btn-primary btn-sm" type="button">Ver mas</a>
        </div>
    </div>
</div>
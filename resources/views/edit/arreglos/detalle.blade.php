@extends('layout')


@section('content')

  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


	@include('queries.sections.pdfExport')

    <div class="content-wrapper">

    @include('queries.sections.header')

  	<h2>Datos del arreglo floral</h2>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>ocasión</th>
            <th>contenedor</th>
            <th>nombre</th>
            <th>total</th>
          </tr>
        </thead>
        <tbody>

          <tr>
            <td>{{ $arreglo->id }}</td>
            <td>{{ $arreglo->ocasion->nombre }}</td>
            <td>{{ $arreglo->contenedor->material }}</td>
            <td>{{ $arreglo->nombre }}</td>
            <td>{{ $arreglo->total }}</td>
          </tr>


        </tbody>
      </table>

    </div>

    <h2>Flores que contiene el arreglo</h2>

    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th># Arreglo</th>
            <th>Flor</th>
            <th>Precio unidad</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
        	@foreach($arreglo->detalles as $detalle)
          <tr>
            <td>{{ $detalle->id_arreglo_floral }}</td>
            <td>{{ $detalle->flor->nombre }}</td>
            <td>{{ $detalle->flor->precio }}</td>
            <td>{{ $detalle->cantidad }}</td>
            <td>{{ $detalle->subtotal }}</td>
          </tr>
          	@endforeach

        </tbody>
      </table>

    </div>

    <h2>Contenedor del arreglo</h2>

    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th># Arreglo</th>
            <th>Material</th>
            <th>Precio</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $arreglo->id }}</td>
            <td>{{ $arreglo->contenedor->material }}</td>
            <td>{{ $arreglo->contenedor->precio }}</td>
          </tr>

        </tbody>
      </table>

    </div>

    @include('queries.sections.footer')

  </div>
   </div>










@endsection
@extends('layout')  

@section('content')

{{-- */$cont=0;/* --}}
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main page">

	@include('queries.sections.pdfExport')

	
<div class="content-wrapper">

	@include('queries.sections.header')

<div class="datosEmpresa">
<table border="1">  
			<tr>  

				<td class="campo">NOMBRE DE LA EMPRESA</td>  
				<td class="campo"> FACTURA DE VENTA</td>
				
			</tr>
			<tr>
				<td class="dato">enviaflores.com</td>
				<td class="dato"> {{ $pedido->id }}</td>
			</tr>

   			<tr>
      			<td colspan="2" style="text-align:center"> San Luis Potosí, S.L.P., Víctor Rosales #580, Col. Las Palmas, Tel: 4445630013 				</td>
  	  		</tr>
    			
		</table>


</div>

<div class="datosCliente">
	<table border="1">  
		<tr>
      			<td colspan="2" class="campo">Datos del Cliente</td>
  	  	</tr>
		<tr>  
			<td class="campo">Cliente</td>  
			<td class="dato"> {{ $pedido->cliente->nombre}}</td>
		</tr>
		<tr>
			<td class="campo">Dirección</td>
			<td class="dato"> {{ $pedido->cliente->direccion }}</td>
		</tr>

		<tr>
			<td class="campo">Teléfono</td>
			<td class="dato"> {{ $pedido->cliente->telefono }}</td>
		</tr>
			
	</table>
</div>

<h2>Detalle del pedido</h2>
<div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th># Arreglo</th>
            <th>Nombre arreglo</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
	        @foreach($pedido->detalles as $detalle)
	        {{ $cont = $cont + $detalle->subtotal }}
	          <tr>
	            <td>{{ $detalle->id_arreglo_floral }}</td>
	            <td>{{ $detalle->arreglo->nombre }}</td>
	            <td>{{ $detalle->cantidad }}</td>
	            <td>{{ $detalle->subtotal }}</td>
	          </tr>
	        @endforeach

        </tbody>
      </table>
  </div>

  <h2>Detalle del envío</h2>
<div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nombre destinatario</th>
            <th>Dirección</th>
            <th>CP</th>
            <th>Hora entrega</th>
            <th>Estado</th>
            <th>Costo</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $pedido->direccion->nombre_destinat }}</td>
            <td>{{ $pedido->direccion->direccion }}</td>
            <td>{{ $pedido->direccion->cp }}</td>
            <td>{{ $pedido->direccion->hora_entrega }}</td>
            <td>{{ $pedido->direccion->estado->nombre }}</td>
            <td>{{ $pedido->direccion->costo }}</td>
          </tr>
        </tbody>
      </table>
  </div>

  <div class="datosCliente" align="right">
	<table border="1">  
		<tr>  
			<td class="campo">Arreglos</td>  
			<td class="dato"> {{ $cont }}</td>
		</tr>
		<tr>  
			<td class="campo">Envío</td>  
			<td class="dato"> {{ $pedido->direccion->costo}}</td>
		</tr>
		<tr>
			<td class="campo">Descuento</td>
			<td class="dato">0%</td>
		</tr>

		<tr>
			<td class="campo">Total</td>
			<td class="dato"> {{ $pedido->total }}</td>
		</tr>
			
	</table>
   </div>


@include('queries.sections.footer')

</div>
</div>

<script>

$(document).ready(function (){
	$('.header').css('display', 'block');
	$('.footer').css('display', 'block');

});

</script>

@endsection
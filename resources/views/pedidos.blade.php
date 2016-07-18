@extends('layer')  

@section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Dashboard</h1>

    <div class="row placeholders">
      <div class="col-xs-6 col-sm-3 placeholder">
        <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4>Label</h4>
        <span class="text-muted">Something else</span>
      </div>
      <div class="col-xs-6 col-sm-3 placeholder">
        <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4>Label</h4>
        <span class="text-muted">Something else</span>
      </div>
      <div class="col-xs-6 col-sm-3 placeholder">
        <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4>Label</h4>
        <span class="text-muted">Something else</span>
      </div>
      <div class="col-xs-6 col-sm-3 placeholder">
        <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4>Label</h4>
        <span class="text-muted">Something else</span>
      </div>
    </div>

    <h2 class="sub-header">Pedidos</h2>
    <p>Hay {{ $pedidos->lastPage() }} páginas de {{ $pedidos->total() }} registros</p>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>id_cliente</th>
            <th>id_dir_envio</th>
            <th>fecha_ped</th>
            <th>fecha_ent</th>
            <th>total</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($pedidos as $pedido)
          <tr>
            <td>{{ $pedido->id }}</td>
            <td>{{ $pedido->id_cliente }}</td>
            <td>{{ $pedido->id_direccion_envio }}</td>
            <td>{{ $pedido->fecha_pedido }}</td>
            <td>{{ $pedido->fecha_entrega }}</td>
            <td>{{ $pedido->total }}</td>
          </tr>

          @endforeach

        </tbody>
      </table>

      {!! $pedidos->render() !!}

    </div>
  </div>


  @endsection
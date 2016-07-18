@extends('layout')  

@section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    
    <h1 class="sub-header">Selecciona el estado de la dirección</h1>
    <p>Hay {{ $estados_envio->lastPage() }} páginas de {{ $estados_envio->total() }} registros</p>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>nombre</th>
            <th>costo</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($estados_envio as $estado_envio)
          <tr>
            <td>{{ $estado_envio->id }}</td>
            <td>{{ $estado_envio->nombre }}</td>
            <td>{{ $estado_envio->costo }}</td>
            <th>
              <a href="{{ route('admin.direcciones_envio.create', 'estado_envio='.$estado_envio) }}">Seleccionar</a>
            </th>
          </tr>

          @endforeach

        </tbody>
      </table>

      {!! $estados_envio->render() !!}

    </div>
  </div>


  @endsection
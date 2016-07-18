@extends('layout')  

@section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    
    <h1 class="sub-header">Selecciona la ocasión para el nuevo arreglo</h1>
    <p>Hay {{ $ocasiones->lastPage() }} páginas de {{ $ocasiones->total() }} registros</p>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>nombre</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($ocasiones as $ocasion)
          <tr>
            <td>{{ $ocasion->id }}</td>
            <td>{{ $ocasion->nombre }}</td>
            <td>
                <a href="{{ route('admin.arreglos.create', 'ocasion='.$ocasion) }}">Seleccionar</a>
            </td>
          </tr>

          @endforeach

        </tbody>
      </table>

      {!! $ocasiones->render() !!}

    </div>
  </div>


  @endsection
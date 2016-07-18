@extends('layout')  

@section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    
    <h1 class="sub-header">Selecciona el tipo de flor</h1>
    <p>Hay {{ $tipos_flores->lastPage() }} páginas de {{ $tipos_flores->total() }} registros</p>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>nombre</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($tipos_flores as $tipo_flor)
          <tr>
            <td>{{ $tipo_flor->id }}</td>
            <td>{{ $tipo_flor->nombre }}</td>
            <th>
              <a href="{{ route('admin.flores.create', 'tipo_flor='.$tipo_flor) }}">Seleccionar</a>
            </th>
          </tr>

          @endforeach

        </tbody>
      </table>

      {!! $tipos_flores->render() !!}

    </div>
  </div>


  @endsection
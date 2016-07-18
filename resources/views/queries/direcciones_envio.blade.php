@extends('layout')  

@section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    
    <h1 class="sub-header">Direcciones de envío</h1>

    <div class="dropdown">
      <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
        Año de la gráfica
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('direcciones_envio', 'year=2014&chart='.$chart) }}">2014</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('direcciones_envio', 'year=2013&chart='.$chart) }}">2013</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('direcciones_envio', 'year=2012&chart='.$chart) }}">2012</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('direcciones_envio', 'year=2011&chart='.$chart) }}">2011</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('direcciones_envio', 'year=2010&chart='.$chart) }}">2010</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('direcciones_envio', 'year=2009&chart='.$chart) }}">2009</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('direcciones_envio', 'year=2008&chart='.$chart) }}">2008</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('direcciones_envio', 'year=2007&chart='.$chart) }}">2007</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('direcciones_envio', 'year=2006&chart='.$chart) }}">2006</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('direcciones_envio', 'year=2005&chart='.$chart) }}">2005</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('direcciones_envio', 'year=2004&chart='.$chart) }}">2004</a></li>
      </ul>
    </div>

    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
        Tipo de gráfica
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('direcciones_envio', 'year='.$year.'&chart=bars') }}">Barras</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('direcciones_envio', 'year='.$year.'&chart=lines') }}">Líneas</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('direcciones_envio', 'year='.$year.'&chart=pie') }}">Pie</a></li>
      </ul>
    </div>

    @include('queries.sections.pdfExport')

    <div class="content-wrapper">

    @include('queries.sections.header')

    @if($chart === 'bars')
      @include('queries.charts.bars')
    @elseif ($chart === 'lines')
      @include('queries.charts.lines')
    @elseif ($chart === 'pie')
      @include('queries.charts.pie')
    @endif


    <p id="boton">
        <a class="btn btn-info" href="{{ route('admin.direcciones_envio.create') }}" role="button">Nueva dirección</a>
    </p>

    <a id="verTabla">Tabla</a>

    <p id="pages">Hay {{ $direcciones_envio->lastPage() }} páginas de {{ $direcciones_envio->total() }} registros</p>

    <div id="table2" class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th># Dirección</th>
            <th>Dirección</th>
            <th>CP</th>
            <th>Total envíos</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($repos as $repo)
          <tr>
            <td>{{ $repo->nombre }}</td>
            <td>{{ $repo->name }}</td>
            <td>{{ $repo->cp }}</td>
            <td>{{ $repo->total }}</td>
          </tr>

          @endforeach

        </tbody>
      </table>

    </div>

    <div id="table1" class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>estado</th>
            <th>cp</th>
            <th>direccion</th>
            <th>destinatario</th>
            <th>hora entrega</th>
            <th>costo</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($direcciones_envio as $direccion)
          <tr>
            <td>{{ $direccion->id }}</td>
            <td>{{ $direccion->estado->nombre }}</td>
            <td>{{ $direccion->cp }}</td>
            <td>{{ $direccion->direccion }}</td>
            <td>{{ $direccion->nombre_destinat }}</td>
            <td>{{ $direccion->hora_entrega }}</td>
            <td>{{ $direccion->costo }}</td>
            <th>
              <a href="{{ route('admin.direcciones_envio.edit', $direccion) }}">Editar</a>
            </th>
          </tr>

          @endforeach

        </tbody>
      </table>

      {!! $direcciones_envio->render() !!}

    </div>
    @include('queries.sections.footer')

  </div>
  </div>


  @endsection
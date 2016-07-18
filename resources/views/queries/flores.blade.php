@extends('layout')  

@section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    
    <h1 class="sub-header">Flores</h1>
    <div class="dropdown">
      <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
        Año de la gráfica
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('flores', 'year=2014&chart='.$chart) }}">2014</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('flores', 'year=2013&chart='.$chart) }}">2013</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('flores', 'year=2012&chart='.$chart) }}">2012</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('flores', 'year=2011&chart='.$chart) }}">2011</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('flores', 'year=2010&chart='.$chart) }}">2010</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('flores', 'year=2009&chart='.$chart) }}">2009</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('flores', 'year=2008&chart='.$chart) }}">2008</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('flores', 'year=2007&chart='.$chart) }}">2007</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('flores', 'year=2006&chart='.$chart) }}">2006</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('flores', 'year=2005&chart='.$chart) }}">2005</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('flores', 'year=2004&chart='.$chart) }}">2004</a></li>
      </ul>
    </div>

    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
        Tipo de gráfica
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('flores', 'year='.$year.'&chart=bars') }}">Barras</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('flores', 'year='.$year.'&chart=lines') }}">Líneas</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('flores', 'year='.$year.'&chart=pie') }}">Pie</a></li>
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
        <a class="btn btn-info" href="{{ route('admin.flores.create') }}" role="button">Nueva flor</a>
    </p>

    <p id="pages">Hay {{ $flores->lastPage() }} páginas de {{ $flores->total() }} registros</p>

    <div id="table2" class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th># Flor</th>
            <th>Nombre</th>
            <th>Total vendidas</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($repos as $repo)
          <tr>
            <td>{{ $repo->nombre }}</td>
            <td>{{ $repo->name }}</td>
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
            <th>tipo</th>
            <th>nombre</th>
            <th>costo_temp</th>
            <th>costo_fuera_temp</th>
            <th>precio</th>
            <th>disponibles</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($flores as $flor)
          <tr>
            <td>{{ $flor->id }}</td>
            <td>{{ $flor->tipo->nombre }}</td>
            <td>{{ $flor->nombre }}</td>
            <td>{{ $flor->costo_temp }}</td>
            <td>{{ $flor->costo_fuera_temp }}</td>
            <td>{{ $flor->precio }}</td>
            <td>{{ $flor->disponibles }}</td>
          </tr>

          @endforeach

        </tbody>
      </table>

      {!! $flores->render() !!}

    </div>
    @include('queries.sections.footer')

  </div>
  </div>


  @endsection
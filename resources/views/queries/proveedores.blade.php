@extends('layout')  

@section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    
    <h1 class="sub-header">Proveedores</h1>

    <div class="dropdown">
      <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
        Año de la gráfica
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('proveedores', 'year=2014&chart='.$chart) }}">2014</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('proveedores', 'year=2013&chart='.$chart) }}">2013</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('proveedores', 'year=2012&chart='.$chart) }}">2012</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('proveedores', 'year=2011&chart='.$chart) }}">2011</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('proveedores', 'year=2010&chart='.$chart) }}">2010</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('proveedores', 'year=2009&chart='.$chart) }}">2009</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('proveedores', 'year=2008&chart='.$chart) }}">2008</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('proveedores', 'year=2007&chart='.$chart) }}">2007</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('proveedores', 'year=2006&chart='.$chart) }}">2006</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('proveedores', 'year=2005&chart='.$chart) }}">2005</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('proveedores', 'year=2004&chart='.$chart) }}">2004</a></li>
      </ul>
    </div>

    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
        Tipo de gráfica
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('proveedores', 'year='.$year.'&chart=bars') }}">Barras</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('proveedores', 'year='.$year.'&chart=lines') }}">Líneas</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('proveedores', 'year='.$year.'&chart=pie') }}">Pie</a></li>
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
        <a class="btn btn-info" href="{{ route('admin.proveedores.create') }}" role="button">Nuevo proveedor</a>
    </p>

    {!! Form::open(['route' => 'proveedores', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
    <div class="form-group">
      {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
    </div>

    <button type="submit" class="btn btn-default">Buscar</button>

    {!! Form::close() !!}

    <a id="verTabla">Tabla</a>

    <p id="pages">Hay {{ $proveedores->lastPage() }} páginas de {{ $proveedores->total() }} registros</p>

    <div id="table2" class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th># Proveedor</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Total $ compras</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($repos as $repo)
          <tr>
            <td>{{ $repo->nombre }}</td>
            <td>{{ $repo->name }}</td>
            <td>{{ $repo->correo }}</td>
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
            <th>nombre</th>
            <th>dirección</th>
            <th>teléfono</th>
            <th>correo</th>
            <th>total_compras</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($proveedores as $proveedor)
          <tr>
            <td>{{ $proveedor->id }}</td>
            <td>{{ $proveedor->nombre }}</td>
            <td>{{ $proveedor->direccion }}</td>
            <td>{{ $proveedor->telefono }}</td>
            <td>{{ $proveedor->correo }}</td>
            <td>{{ $proveedor->total_pagos }}</td>
            <th>
              <a href="{{ route('admin.proveedores.edit', $proveedor) }}">Editar</a>
            </th>
          </tr>

          @endforeach

        </tbody>
      </table>

      {!! $proveedores->render() !!}

    </div>
    @include('queries.sections.footer')

  </div>
  </div>


  @endsection
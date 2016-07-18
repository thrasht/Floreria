@extends('layout')  

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="height:1000px">

<h2>Reporte de comparativas de ventas por día</h2>
{!! Form::open(['route' => 'admin.reportes.index', 'method' => 'GET']) !!}
<div class="form-group">
		{!! Form::label('date1', 'Fecha 1') !!}
		{!! Form::text('date1', '', ['class' => 'datepicker']) !!}
</div>	
<div class="form-group">
		{!! Form::label('date2', 'Fecha 2') !!}
		{!! Form::text('date2', '', ['class' => 'datepicker']) !!}
</div>
<div class="form-group">
		{!! Form::label('date3', 'Fecha 3') !!}
		{!! Form::text('date3', '', ['class' => 'datepicker']) !!}
</div>
<div class="form-group">
		{!! Form::label('date4', 'Fecha 4') !!}
		{!! Form::text('date4', '', ['class' => 'datepicker']) !!}
</div>
<div class="form-group">
		{!! Form::label('date5', 'Fecha 5') !!}
		{!! Form::text('date5', '', ['class' => 'datepicker']) !!}
</div>
<div class="form-group">
		{!! Form::label('date6', 'Fecha 6') !!}
		{!! Form::text('date6', '', ['class' => 'datepicker']) !!}
</div>
		  <button type="submit" class="btn btn-primary">Submit</button>

{!! Form::close() !!}

<h2>Reporte de comparativa de ventas por mes según el año</h2>
<a href="{{route('repoPedidos')}}" class="btn btn-primary">Crear reporte</a>

<h2>Reporte de comparativa de compras por mes según el año</h2>
<a href="{{route('repoCompras')}}" class="btn btn-primary">Crear reporte</a>


<h2>Reporte de ganancias anuales</h2>
<a href="{{route('repoGanancias')}}" class="btn btn-primary">Crear reporte</a>

</div>



@endsection
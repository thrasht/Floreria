@extends('layout')  

@section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    
    <h1 class="sub-header">Editar Proveedor</h1>
    <div class="panel-heading">Editar proveedor: {{ $proveedor->nombre }} </div>

    {!! Form::model($proveedor, ['route' => ['admin.proveedores.update', $proveedor], 'method' => 'PUT']) !!}

		@include('edit.proveedores.partials.fields')
		  <button type="submit" class="btn btn-default">Submit</button>

    {!! Form::close() !!}

    @include('edit.proveedores.partials.delete')
</div>    


@endsection
@extends('layout')  

@section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    
    <h1 class="sub-header">Nuevo Proveedor</h1>

    {!! Form::open(['route' => 'admin.proveedores.store', 'method' => 'POST']) !!}

		@include('edit.proveedores.partials.fields')
		  <button type="submit" class="btn btn-default">Submit</button>

    {!! Form::close() !!}
</div>    


@endsection
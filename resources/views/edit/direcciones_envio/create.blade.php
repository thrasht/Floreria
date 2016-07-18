@extends('layout')  

@section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    
    <h1 class="sub-header">Llena los campos para el estado {{ $estado_envio->nombre }} con costo ${{ $estado_envio->costo }}</h1>

    {!! Form::open(['route' => 'admin.direcciones_envio.store', 'method' => 'POST']) !!}

		@include('edit.direcciones_envio.partials.fields')
		  <button type="submit" class="btn btn-default">Submit</button>

    {!! Form::close() !!}
</div>    


@endsection
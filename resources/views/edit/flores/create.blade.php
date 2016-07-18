@extends('layout')  

@section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    
    <h1 class="sub-header">Llena los campos para agregar una flor de tipo {{ $tipo_flor->nombre }}</h1>

    {!! Form::open(['route' => 'admin.flores.store', 'method' => 'POST']) !!}

		@include('edit.flores.partials.fields')
		  <button type="submit" class="btn btn-default">Submit</button>

    {!! Form::close() !!}
</div>    


@endsection
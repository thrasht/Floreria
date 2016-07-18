@extends('layout')  

@section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    
    <h1 class="sub-header">Editar contenedor</h1>
    <div class="panel-heading">Editar contenedor: {{ $contenedor->nombre }} </div>

    {!! Form::model($contenedor, ['route' => ['admin.contenedores.update', $contenedor], 'method' => 'PUT']) !!}

		@include('edit.contenedores.partials.fields')
		  <button type="submit" class="btn btn-default">Submit</button>

    {!! Form::close() !!}

    @include('edit.contenedores.partials.delete')
</div>    


@endsection
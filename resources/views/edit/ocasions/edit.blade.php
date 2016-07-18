@extends('layout')  

@section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    
    <h1 class="sub-header">Ocasiones</h1>
    <div class="panel-heading">Editar ocasión: {{ $ocasion->nombre }} </div>

    {!! Form::model($ocasion, ['route' => ['admin.ocasions.update', $ocasion], 'method' => 'PUT']) !!}

		@include('edit.ocasions.partials.fields')
		  <button type="submit" class="btn btn-default">Editar</button>

    {!! Form::close() !!}

    @include('edit.ocasions.partials.delete')
</div>    




@endsection
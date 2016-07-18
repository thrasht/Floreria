@extends('layout')  

@section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    
    <h1 class="sub-header">Editar Tipo de Flor</h1>
    <div class="panel-heading">Editar tipo de flor: {{ $tipo_flor->nombre }} </div>

    {!! Form::model($tipo_flor, ['route' => ['admin.tipos_flores.update', $tipo_flor], 'method' => 'PUT']) !!}

		@include('edit.tipos_flores.partials.fields')
		  <button type="submit" class="btn btn-default">Submit</button>

    {!! Form::close() !!}

    @include('edit.tipos_flores.partials.delete')
</div>    


@endsection
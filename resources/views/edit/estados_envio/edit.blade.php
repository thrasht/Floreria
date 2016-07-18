@extends('layout')  

@section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    
    <h1 class="sub-header">Editar Estado de Envío</h1>
    <div class="panel-heading">Editar estado: {{ $estado_envio->nombre }} </div>

    {!! Form::model($estado_envio, ['route' => ['admin.estados_envio.update', $estado_envio], 'method' => 'PUT']) !!}

		@include('edit.estados_envio.partials.fields')
		  <button type="submit" class="btn btn-default">Submit</button>

    {!! Form::close() !!}

    @include('edit.estados_envio.partials.delete')
</div>    


@endsection
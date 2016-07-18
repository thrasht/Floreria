@extends('layout')  

@section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    
    <h1 class="sub-header">Nuevo Cliente</h1>
    <div class="panel-heading">Editar ocliente: {{ $cliente->nombre }} </div>

    {!! Form::model($cliente, ['route' => ['admin.clientes.update', $cliente], 'method' => 'PUT']) !!}

		@include('edit.clientes.partials.fields')
		  <button type="submit" class="btn btn-default">Submit</button>

    {!! Form::close() !!}

    @include('edit.clientes.partials.delete')
</div>    


@endsection
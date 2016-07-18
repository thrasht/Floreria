

{!! Form::hidden('id_estado', $estado_envio->id, ['type' => 'hidden']) !!}
{!! Form::hidden('costo', $estado_envio->costo, ['type' => 'hidden']) !!}
<div class="form-group">
	{!! Form::label('cp', 'CP del cliente') !!}
	{!! Form::text('cp', null, ['class' => 'form-control', 'placeholder' => 'Escriba el CP del destinatario']) !!}
</div>
<div class="form-group">
	{!! Form::label('direccion', 'Dirección') !!}
	{!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Escriba la dirección del destinatario']) !!}
</div>
<div class="form-group">
	{!! Form::label('nombre_destinat', 'Nombre destinatario') !!}
	{!! Form::text('nombre_destinat', null, ['class' => 'form-control', 'placeholder' => 'Escriba el nombre del destinatario']) !!}
</div>
<div class="form-group">
	{!! Form::label('hora_entrega', 'Hora para la entrega') !!}
	{!! Form::text('hora_entrega', null, ['class' => 'form-control', 'placeholder' => 'Escriba la hora preferida de entrega']) !!}
</div>
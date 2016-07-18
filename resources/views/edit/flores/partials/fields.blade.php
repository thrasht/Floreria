

{!! Form::hidden('id_tipo', $tipo_flor->id, ['type' => 'hidden']) !!}
{!! Form::hidden('disponibles', 0, ['type' => 'hidden']) !!}
<div class="form-group">
	{!! Form::label('nombre', 'Nombre de la flor') !!}
	{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Escriba el nombre de la flor']) !!}
</div>
<div class="form-group">
	{!! Form::label('costo_temp', 'Costo de la flor dentro de temporada') !!}
	{!! Form::text('costo_temp', null, ['class' => 'form-control', 'placeholder' => 'Escriba el costo de la flor dentro de temporada']) !!}
</div>
<div class="form-group">
	{!! Form::label('costo_fuera_temp', 'Costo de la flor fuera de temporada') !!}
	{!! Form::text('costo_fuera_temp', null, ['class' => 'form-control', 'placeholder' => 'Escriba el costo de la flor fuera de temporada']) !!}
</div>
<div class="form-group">
	{!! Form::label('precio', 'Precio al público') !!}
	{!! Form::text('precio', null, ['class' => 'form-control', 'placeholder' => 'Escriba precio de la flor para el cliente']) !!}
</div>
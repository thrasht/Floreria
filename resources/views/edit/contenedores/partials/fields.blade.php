
<div class="form-group">
	{!! Form::label('material', 'Nombre del material') !!}
	{!! Form::text('material', null, ['class' => 'form-control', 'placeholder' => 'Escriba el nombre del material']) !!}
</div>
<div class="form-group">
	{!! Form::label('precio', 'Precio del material') !!}
	{!! Form::text('precio', null, ['class' => 'form-control', 'placeholder' => 'Escriba el precio del material']) !!}
</div>
<div class="form-group">
	{!! Form::label('disponibles', 'Cantidad disponible') !!}
	{!! Form::text('disponibles', null, ['class' => 'form-control', 'placeholder' => 'Escriba la cantidad disponible']) !!}
</div>
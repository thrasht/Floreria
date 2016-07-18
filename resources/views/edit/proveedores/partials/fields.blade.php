
<div class="form-group">
	{!! Form::label('nombre', 'Nombre del proveedor') !!}
	{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Escriba el nombre del proveedor']) !!}
</div>
<div class="form-group">
	{!! Form::label('direccion', 'Dirección') !!}
	{!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Escriba la dirección del proveedor']) !!}
</div>
<div class="form-group">
	{!! Form::label('telefono', 'Teléfono') !!}
	{!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Escriba el número de teléfono']) !!}
</div>
<div class="form-group">
	{!! Form::label('correo', 'Dirección de correo electrónico') !!}
	{!! Form::text('correo', null, ['class' => 'form-control', 'placeholder' => 'Escriba el correo electrónico']) !!}
</div>
<div class="form-group">
	{!! Form::label('total_pagos', 'Monto de pagos $') !!}
	{!! Form::text('total_pagos', null, ['class' => 'form-control', 'placeholder' => 'Escriba el monto']) !!}
</div>
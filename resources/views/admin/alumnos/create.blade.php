@extends ('admin.template.main')

@section('title', 'Agregar Alumnos')

@section('content')

	@if(count($errors)>0)
	<div class="alert alert-danger" role="alert">
		<ul>
		@foreach($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
		</ul>
	</div>
	@endif
	<h3 align="center">Datos del Alumno</h3>
{!!Form::open(['route'=>'admin.alumnos.store', 'method'=>'POST']) !!}

	<div class="form-group">
	{!!Form::label('nombres', 'Nombres')!!}
	{!!Form::text('nombres',Input::old('nombres'),['class'=>'form-control','placeholder'=> 'Nombres', 'required'])!!}
	</div>
	<div class="form-group">
	{!!Form::label('apellidos', 'Apellidos')!!}
	{!!Form::text('apellidos',null,['class'=>'form-control','placeholder'=> 'Apellidos', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('fechanacimiento', 'Fecha Nacimiento')!!}
	{!!Form::date('fechanacimiento',null,['class'=>'form-control','placeholder'=> 'Edad', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('carné', 'Carné o Codigo Personal')!!}
	{!!Form::text('carnet',null,['class'=>'form-control','placeholder'=> 'Carné o Codigo Personal'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('nivel_id', 'Nivel')!!}
	{!!Form::select('Nivel', $niveles, null, ['class'=>'form-control', 'placeholder'=> 'Seleccione un Nivel', 'required', 'id'=>'Nivel'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('grado_id', 'Grado')!!}
	{!!Form::select('grado_id', $grados, null, ['class'=>'form-control', 'placeholder'=> 'Seleccione un Grado', 'required'])!!}
	</div>

	<!--<h3 align="center">Datos del Encargado</h3>
	<div class="form-group">
	{!!Form::label('encargado', 'Nombre Encargado')!!}
	{!!Form::text('encargado',null,['class'=>'form-control','placeholder'=> 'Encargado', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('edadencargado', 'Edad Encargado')!!}
	{!!Form::number('edadencargado',null,['class'=>'form-control','placeholder'=> 'Edad en números', 'required'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('estadocivilencargado','Estado Civil')!!}
		{!!Form::select('estadocivilencargado', ['Soltero(a)'=>'Soltero(a)','Casado(a)'=>'Casado(a)','Viudo(a)'=>'Viudo(a)', 'Divorciado(a)'=>'Divorciado(a)', 'Union de hecho'=>'Union de hecho'], null, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('nacionalidadencargado', 'Nacionalidad')!!}
		{!!Form::select('nacionalidadencargado', ['guatemalteco(a)'=>'guatemalteco(a)','extranjero(a)'=>'extranjero(a)'], null, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('dpiencargado', 'DPI Encargado')!!}
	{!!Form::text('dpiencargado',null,['class'=>'form-control','placeholder'=> 'DPI', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('profesionencargado', 'Profesión Encargado')!!}
	{!!Form::text('profesionencargado',null,['class'=>'form-control','placeholder'=> 'Profesión', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('direccionencargado', 'Dirección')!!}
	{!!Form::text('direccionencargado',null,['class'=>'form-control','placeholder'=> 'Dirección', 'required'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('relacionencargado','Relación')!!}
		{!!Form::select('relacionencargado', ['padre'=>'Padre','madre'=>'Madre','tutor'=>'Tutor', 'encargado'=>'Encargado'], null, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('emailencargado','Correo Electrónico')!!}
		{!!Form::text('emailencargado', null, ['class'=>'form-control', 'placeholder'=>'example@correo.com (opcional)'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('telefono', 'Telefono Casa')!!}
	{!!Form::text('telefono',null,['class'=>'form-control','placeholder'=> '####-####', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('telefono2', 'Telefono Oficina')!!}
	{!!Form::text('telefono2',null,['class'=>'form-control','placeholder'=> '####-####', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('telefono3', 'Telefono Celular')!!}
	{!!Form::text('telefono3',null,['class'=>'form-control','placeholder'=> '####-####', 'required'])!!}
	</div>-->

	<div class="form-group">
	{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
	<a class="btn btn-danger" href="{{route('admin.alumnos.index')}}" role="button">Cancelar</a>
	</div>

{!!Form::close()!!}

@endsection
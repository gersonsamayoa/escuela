@extends ('admin.template.main')
@section('title', 'Editar '. $alumno->nombres . ' ' . $alumno->apellidos)
@section('content')

{!! Form::open(['route'=>['admin.alumnos.update', $alumno], 'method'=>'PUT']) !!}
<h3 align="center">Datos del Alumno</h3>
<div class="form-group">
	{!!Form::label('nombres', 'Nombres')!!}
	{!!Form::text('nombres',$alumno->nombres,['class'=>'form-control','placeholder'=> 'Nombres', 'required'])!!}
	</div>
	<div class="form-group">
	{!!Form::label('apellidos', 'Apellidos')!!}
	{!!Form::text('apellidos',$alumno->apellidos,['class'=>'form-control','placeholder'=> 'Apellidos', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('fechanacimiento', 'Fecha Nacimiento')!!}
	{!!Form::date('fechanacimiento',$alumno->fechanacimiento,['class'=>'form-control','placeholder'=> 'Edad', 'required'])!!}
	</div>


	<div class="form-group">
	{!!Form::label('carnet', 'Carnet')!!}
	{!!Form::text('carnet',$alumno->carnet,['class'=>'form-control','placeholder'=> 'Carnet'])!!}
	</div>

		<div class="form-group">
	{!!Form::label('nivel_id', 'Nivel')!!}
	{!!Form::select('Nivel', $niveles, null, ['class'=>'form-control', 'placeholder'=> 'Seleccione un Nivel', 'id'=>'Nivel'])!!}
	</div>
	
	<div class="form-group">
	{!!Form::label('grado_id', 'Grado')!!}
	{!!Form::select('grado_id', $grados, $alumno->grado_id, ['class'=>'form-control', 'placeholder'=> 'Seleccione un Grado', 'required'])!!}
	</div>

		<div class="form-group">
		{!!Form::label('alumnonuevo','Es alumno Nuevo:')!!}
		{!!Form::select('alumnonuevo', ['si'=>'Si','no'=>'No'], $alumno->alumnonuevo, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
	</div>


	<h3 align="center">Datos del Encargado</h3>

	<div class="form-group">
	{!!Form::label('encargado', 'Nombre Encargado')!!}
	{!!Form::text('encargado',$alumno->encargado,['class'=>'form-control','placeholder'=> 'Encargado', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('edadencargado', 'Edad Encargado')!!}
	{!!Form::number('edadencargado',$alumno->edadencargado,['class'=>'form-control','placeholder'=> 'Edad', 'required'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('estadocivilencargado','Estado Civil')!!}
		{!!Form::select('estadocivilencargado', ['Soltero(a)'=>'Soltero(a)','Casado(a)'=>'Casado(a)','Viudo(a)'=>'Viudo(a)', 'Divorciado(a)'=>'Divorciado(a)', 'Union de hecho'=>'Union de hecho'], $alumno->estadocivilencargado, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('nacionalidadencargado', 'Nacionalidad')!!}
		{!!Form::select('nacionalidadencargado', ['guatemalteco(a)'=>'guatemalteco(a)','extranjero(a)'=>'extranjero(a)'], $alumno->nacionalidadencargado, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('dpiencargado', 'DPI Encargado')!!}
	{!!Form::text('dpiencargado',$alumno->dpiencargado,['class'=>'form-control','placeholder'=> 'DPI', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('profesionencargado', 'Profesión Encargado')!!}
	{!!Form::text('profesionencargado',$alumno->profesionencargado,['class'=>'form-control','placeholder'=> 'Profesión', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('direccionencargado', 'Dirección')!!}
	{!!Form::text('direccionencargado',$alumno->direccionencargado,['class'=>'form-control','placeholder'=> 'Dirección', 'required'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('relacionencargado','Relación')!!}
		{!!Form::select('relacionencargado', ['padre'=>'Padre','madre'=>'Madre','tutor'=>'Tutor', 'encargado'=>'Encargado'], $alumno->relacionencargado, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('emailencargado','Correo Electrónico')!!}
		{!!Form::text('emailencargado', $alumno->emailencargado, ['class'=>'form-control', 'placeholder'=>'example@correo.com (opcional)'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('telefono', 'Telefono Casa')!!}
	{!!Form::text('telefono',$alumno->telefono,['class'=>'form-control','placeholder'=> 'Telefono', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('telefono2', 'Telefono Oficina')!!}
	{!!Form::text('telefono2',$alumno->telefono2,['class'=>'form-control','placeholder'=> '####-####', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('telefono3', 'Telefono Celular')!!}
	{!!Form::text('telefono3',$alumno->telefono3,['class'=>'form-control','placeholder'=> '####-####', 'required'])!!}
	</div>


	<div class="form-group">
	{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
	<a class="btn btn-danger" href="{{route('admin.alumnos.index',['grado_id'=>$alumno->grado_id])}}" role="button">Cancelar</a>
	</div>



{!!Form::close()!!}



@endsection

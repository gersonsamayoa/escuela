@extends ('admin.template.main')

@section('title', 'Editar Falta de: ' . $alumno->nombres . ' '. $alumno->apellidos)

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

{!!Form::open(['route'=>['admin.faltasalumno.update', $alumno_faltas], 'method'=>'PUT']) !!}

	<div class="form-group">
	{!!Form::label('fecha', 'Fecha')!!}
	{!!Form::date('fecha',$alumno_faltas->fecha,['class'=>'form-control','placeholder'=> 'dd/mm/aaaa', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('nombredocente', 'Nombre Docente')!!}
	{!!Form::text('nombredocente',$alumno_faltas->nombredocente,['class'=>'form-control','placeholder'=> 'Nombre Docente', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('falta id', 'Tipo de Falta')!!}
	{!!Form::select('falta_id', $faltas, $myfaltas, ['multiple'=>false, 'class'=>'form-control', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('descripcion', 'Descripción de la Falta')!!}
	{!!Form::textarea('descripcion',$alumno_faltas->descripcion,['class'=>'form-control','placeholder'=> 'Descripción de la falta', 'rows'=>'2', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::hidden('alumno_id',$alumno->id,['class'=>'form-control'])!!}
	</div>


	<div class="form-group">
	{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
	<a class="btn btn-danger" href="{{route('admin.faltasalumno.detalles', $alumno->id)}}" role="button">Cancelar</a>
	</div>

{!!Form::close()!!}

@endsection

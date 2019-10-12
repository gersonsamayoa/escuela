@extends ('admin.template.main')

@section('title', 'Agregar Falta a: ' . $alumno->nombres . ' '. $alumno->apellidos)

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

{!!Form::open(['route'=>'admin.faltasalumno.store', 'method'=>'POST']) !!}

	<div class="form-group">
	{!!Form::label('fecha', 'Fecha')!!}
	{!!Form::date('fecha',null,['class'=>'form-control','placeholder'=> 'dd/mm/aaaa', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('nombre', 'Nombre de Docente')!!}
	{!!Form::text('nombredocente',null,['class'=>'form-control','placeholder'=> 'Nombre Docente', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('falta_id', 'Tipo de Falta')!!}
	{!!Form::select('falta_id', $faltas, null, ['multiple'=>false, 'class'=>'form-control', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('descripcion', 'Descripción')!!}
	{!!Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=> 'Descripción de la falta', 'rows'=>'2', 'required'])!!}
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

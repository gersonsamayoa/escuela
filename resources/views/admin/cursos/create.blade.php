@extends ('admin.template.main')

@section('title', 'Agregar Cursos al grado: ' . $grados->grado . " " . $grados->nombre )

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

{!!Form::open(['route'=>'admin.cursos.store', 'method'=>'POST']) !!}
	<div class="form-group">
	{!!Form::label('nombre', 'Nombre del Curso')!!}
	{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=> 'Nombres', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::hidden('grado_id', $grados->id, ['class'=>'form-control'])!!}
	</div>

	<div class="form-group">
	{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
	<a class="btn btn-danger" href="{{route('admin.grados.cursos.show', $grados->id)}}" role="button">Cancelar</a>
	</div>

{!!Form::close()!!}

@endsection

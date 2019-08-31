@extends ('admin.template.main')
@section('title', 'Editar '. $cursos->nombre)
@section('content')
{!! Form::open(['route'=>['admin.cursos.update', $cursos], 'method'=>'PUT']) !!}

<div class="form-group">
{!!Form::label('name', 'Nuevo Curso')!!}
{!!Form::text('nombre',$cursos->nombre,['class'=>'form-control','placeholder'=> 'Nombre', 'required'])!!}
</div>

<div class="form-group">
	{!!Form::hidden('grado_id', $grados->id, ['class'=>'form-control'])!!}
	</div>

<div class="form-group">
{!!Form::submit('Editar',['class'=>'btn btn-primary'])!!}
<a class="btn btn-danger" href="{{route('admin.grados.cursos.show', $grados->id)}}" role="button">Cancelar</a>
</div>



{!!Form::close()!!}


@endsection

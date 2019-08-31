@extends ('admin.template.main')
@section('title', 'Crear Ciclo')
@section('content')
{!! Form::open(['route'=>'admin.ciclos.store', 'method'=>'POST']) !!}

<div class="form-group">
{!!Form::label('ciclo', 'Ciclo')!!}
{!!Form::number('descripcion',null,['class'=>'form-control','placeholder'=> 'Año', 'required'])!!}
</div>

<div class="form-group">
{!!Form::label('activo', 'Activo')!!}
{!!Form::select('activo',array('1'=>'Activo', '0'=>'Desactivo'),null,['class'=>'form-control','placeholder'=> 'Seleccione', 'required'])!!}
</div>

<div class="form-group">
{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
<a class="btn btn-danger" href="{{route('admin.ciclos.index')}}" role="button">Cancelar</a>
</div>

{!!Form::close()!!}
@endsection
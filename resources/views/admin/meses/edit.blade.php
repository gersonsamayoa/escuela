@extends ('admin.template.main')
@section('title', 'Editar '. $meses->nombre)
@section('content')
{!! Form::open(['route'=>['admin.meses.update', $meses], 'method'=>'PUT']) !!}

<div class="form-group">
{!!Form::label('name', 'Nuevo Nombre')!!}
{!!Form::text('nombre',$meses->nombre,['class'=>'form-control','placeholder'=> 'Nombre', 'required'])!!}
</div>

<div class="form-group">
{!!Form::label('numeromes', 'Numero de Mes')!!}
{!!Form::text('numeromes',$meses->numeromes,['class'=>'form-control','placeholder'=> 'Nombre', 'required'])!!}
</div>


<div class="form-group">
{!!Form::submit('Editar',['class'=>'btn btn-primary'])!!}
<a class="btn btn-danger" href="{{route('admin.meses.index')}}" role="button">Cancelar</a>
</div>



{!!Form::close()!!}


@endsection

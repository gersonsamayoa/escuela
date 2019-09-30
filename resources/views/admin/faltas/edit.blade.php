@extends ('admin.template.main')
@section('title', 'Editar '. $faltas->descripcion)
@section('content')
{!! Form::open(['route'=>['admin.faltas.update', $faltas], 'method'=>'PUT']) !!}

<div class="form-group">
{!!Form::label('name', 'Descripción')!!}
{!!Form::text('descripcion',$faltas->descripcion,['class'=>'form-control','placeholder'=> 'Descripcion', 'required'])!!}
</div>


<div class="form-group">
{!!Form::submit('Editar',['class'=>'btn btn-primary'])!!}
<a class="btn btn-danger" href="{{route('admin.faltas.index')}}" role="button">Cancelar</a>
</div>



{!!Form::close()!!}


@endsection

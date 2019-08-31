@extends ('admin.template.main')
@section('title', 'Editar '. $niveles->nombre)
@section('content')
{!! Form::open(['route'=>['admin.niveles.update', $niveles], 'method'=>'PUT']) !!}

<div class="form-group">
{!!Form::label('name', 'Nuevo Nombre')!!}
{!!Form::text('nombre',$niveles->nombre,['class'=>'form-control','placeholder'=> 'Nombre', 'required'])!!}
</div>


<div class="form-group">
{!!Form::submit('Editar',['class'=>'btn btn-primary'])!!}
<a class="btn btn-danger" href="{{route('admin.niveles.index')}}" role="button">Cancelar</a>
</div>



{!!Form::close()!!}


@endsection

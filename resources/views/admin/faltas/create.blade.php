@extends ('admin.template.main')
@section('title', 'Crear Falta')
@section('content')
{!! Form::open(['route'=>'admin.faltas.store', 'method'=>'POST']) !!}

<div class="form-group">
{!!Form::label('name', 'Descripción')!!}
{!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=> 'Descripcion de la falta', 'required'])!!}
</div>


<div class="form-group">
{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
<a class="btn btn-danger" href="{{route('admin.faltas.index')}}" role="button">Cancelar</a>
</div>



{!!Form::close()!!}


@endsection

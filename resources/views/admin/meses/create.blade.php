@extends ('admin.template.main')
@section('title', 'Crear Mes')
@section('content')
{!! Form::open(['route'=>'admin.meses.store', 'method'=>'POST']) !!}

<div class="form-group">
{!!Form::label('name', 'Nombre')!!}
{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=> 'Nombre', 'required'])!!}
</div>

<div class="form-group">
{!!Form::label('numeromes', 'Numero de Mes')!!}
{!!Form::text('numeromes',null,['class'=>'form-control','placeholder'=> 'Nombre', 'required'])!!}
</div>


<div class="form-group">
{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
<a class="btn btn-danger" href="{{route('admin.meses.index')}}" role="button">Cancelar</a>
</div>



{!!Form::close()!!}


@endsection

@extends ('admin.template.main')
@section('title', 'Crear Grado')
@section('content')
{!! Form::open(['route'=>'admin.grados.store', 'method'=>'POST']) !!}

<div class="form-group">
  {!!Form::label('grado', 'Grado')!!}
  {!!Form::select('grado',['1o.'=>'1o.','2o.'=>'2o.','3o.'=>'3o.','4o.'=>'4o.','5o.'=>'5o.','6o.'=>'6o.'],'1o.',['class'=>'form-control','required'])!!}
</div>

<div class="form-group">
{!!Form::label('name', 'Nombre')!!}
{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=> 'Nombre', 'required'])!!}
</div>

<div class="form-group">
  {!!Form::label('cantidadbimestres', 'Cantidad de bimestres')!!}
  {!!Form::text('cantidadbimestres',null,['class'=>'form-control', 'placeholder'=>'Cantidad de Bimestres','required'])!!}
</div>

<div class="form-group">
{!!Form::label('nivel_id', 'Nivel')!!}
{!!Form::select('nivel_id', $niveles, $niveles2->id, ['class'=>'form-control', 'placeholder'=> 'Seleccione un Nivel', 'required'])!!}
</div>

<div class="form-group">
{!!Form::label('ciclo_id', 'Ciclo')!!}
{!!Form::select('ciclo_id', $ciclos, null, ['class'=>'form-control', 'placeholder'=> 'Seleccione un Nivel', 'required'])!!}
</div>

<div class="form-group">
{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
<a class="btn btn-danger" href="{{route('admin.niveles.grados', $niveles2->id)}}" role="button">Cancelar</a>
</div>



{!!Form::close()!!}
@endsection

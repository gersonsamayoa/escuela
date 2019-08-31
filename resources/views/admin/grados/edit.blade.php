@extends ('admin.template.main')
@section('title', 'Editar '. $grados->nombre)
@section('content')
{!! Form::open(['route'=>['admin.grados.update', $grados], 'method'=>'PUT']) !!}

<div class="form-group">
  {!!Form::label('grado', 'Grado')!!}
  {!!Form::select('grado',['1o.'=>'1o.','2o.'=>'2o.','3o.'=>'3o.','4o.'=>'4o.','5o.'=>'5o.','6o.'=>'6o.'],$grados->grado,['class'=>'form-control','required'])!!}
</div>

<div class="form-group">
{!!Form::label('name', 'Nombre Grado')!!}
{!!Form::text('nombre',$grados->nombre,['class'=>'form-control','placeholder'=> 'Nombre', 'required'])!!}
</div>

<div class="form-group">
  {!!Form::label('cantidadbimestres', 'Cantidad de bimestres')!!}
  {!!Form::text('cantidadbimestres', $grados->cantidadbimestres,['class'=>'form-control', 'placeholder'=>'Cantidad de Bimestres','required'])!!}
</div>

<div class="form-group">
{!!Form::label('nivel_id', 'Nivel')!!}
{!!Form::select('nivel_id', $niveles, $grados->nivel_id, ['class'=>'form-control', 'placeholder'=> 'Seleccione un Nivel', 'required'])!!}
</div>

<div class="form-group">
{!!Form::label('ciclo_id', 'Ciclo')!!}
{!!Form::select('ciclo_id', $ciclos, $grados->ciclo_id, ['class'=>'form-control', 'placeholder'=> 'Seleccione un Nivel', 'required'])!!}
</div>

<div class="form-group">
{!!Form::submit('Editar',['class'=>'btn btn-primary'])!!}
<a class="btn btn-danger" href="{{route('admin.niveles.grados', $grados->nivel_id)}}" role="button">Cancelar</a>
</div>



{!!Form::close()!!}


@endsection

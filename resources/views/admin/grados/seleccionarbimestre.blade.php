@extends('admin.template.main')
@section('title', 'Vaciado de Notas '.  $grado->grado . ' ' . $grado->nombre)
@section('content')
<hr>
@include('flash::message')
@if($grado->cantidadbimestres==4)
{!! Form::open(['route'=>['admin.niveles.grados.vaciado',$grado->id], 'method'=>'POST']) !!}
<div class="form-group">
	{!! Form::label('bimestre', 'Bimestre') !!}
	{!!Form::select('bim', ['bim1'=>'Bimestre1','bim2'=>'Bimestre2','bim3'=>'Bimestre3', 'bim4'=>'Bimestre4', 'promedio'=>'Promedio'], null, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
</div>

<div class="form-gropu">
{!! Form::submit('Mostrar', ['class'=>'btn btn-primary']) !!}
<a href="{{route('admin.niveles.grados', $grado->nivel_id)}}" class="btn btn-success">Regresar</a>
</div>
{!! Form::close() !!}
@endif

@if($grado->cantidadbimestres==3)
{!! Form::open(['route'=>['admin.niveles.grados.vaciado',$grado->id], 'method'=>'POST']) !!}
<div class="form-group">
	{!! Form::label('bimestre', 'Bimestre') !!}
	{!!Form::select('bim', ['bim1'=>'Bimestre1','bim2'=>'Bimestre2','bim3'=>'Bimestre3', 'promedio'=>'Promedio'], null, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
</div>

<div class="form-gropu">
{!! Form::submit('Mostrar', ['class'=>'btn btn-primary']) !!}
<a href="{{route('admin.niveles.grados', $grado->nivel_id)}}" class="btn btn-success">Regresar</a>
</div>
{!! Form::close() !!}
@endif


@endsection
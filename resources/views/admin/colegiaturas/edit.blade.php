@extends ('admin.template.main')

@section('title', 'Editar Colegiatura de: ' . $alumno->nombres . ' '. $alumno->apellidos)

@section('content')

	@if(count($errors)>0)
	<div class="alert alert-danger" role="alert">
		<ul>
		@foreach($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
		</ul>
	</div>
	@endif

{!!Form::open(['route'=>['admin.colegiaturas.update', $colegiaturas], 'method'=>'PUT']) !!}

	<div class="form-group">
	{!!Form::label('fecha', 'Fecha')!!}
	{!!Form::date('fecha',$colegiaturas->fecha,['class'=>'form-control','placeholder'=> 'dd/mm/aaaa', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('nit', 'Nit')!!}
	{!!Form::text('nit',$colegiaturas->nit,['class'=>'form-control','placeholder'=> 'Nit', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('nombre', 'Nombre')!!}
	{!!Form::text('nombre',$colegiaturas->nombre,['class'=>'form-control','placeholder'=> 'Nombre', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('numerodocumento', 'Número de Boleta')!!}
	{!!Form::text('numerodocumento',$colegiaturas->numerodocumento,['class'=>'form-control','placeholder'=> 'Número de Boleta', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('mes_id', 'Mes')!!}
	{!!Form::select('mes_id', $meses, $mymeses, ['multiple'=>true, 'class'=>'form-control', 'placeholder'=> 'Seleccione un Mes', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('monto', 'Monto')!!}
	Q{!!Form::number('monto',$colegiaturas->monto,['class'=>'form-control', 'step'=>'0.01','placeholder'=>'####.##', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('descripcion', 'Descripción')!!}
	{!!Form::textarea('descripcion',$colegiaturas->descripcion,['class'=>'form-control','placeholder'=> 'Descripción', 'rows'=>'2', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::hidden('alumno_id',$alumno->id,['class'=>'form-control'])!!}
	</div>


	<div class="form-group">
	{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
	<a class="btn btn-danger" href="{{route('admin.colegiaturas.detalles', $alumno->id)}}" role="button">Cancelar</a>
	</div>

{!!Form::close()!!}

@endsection

@extends ('admin.template.main')

@section('title', 'Agregar Colegiatura a: ' . $alumno->nombres . ' '. $alumno->apellidos)

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

{!!Form::open(['route'=>'admin.colegiaturas.store', 'method'=>'POST']) !!}

	<div class="form-group">
	{!!Form::label('fecha', 'Fecha')!!}
	{!!Form::date('fecha',null,['class'=>'form-control','placeholder'=> 'dd/mm/aaaa', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('nit', 'Nit')!!}
	{!!Form::text('nit',null,['class'=>'form-control','placeholder'=> 'Nit', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('nombre', 'Nombre de Persona')!!}
	{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=> 'Nombre', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('numerodocumento', 'Número de Boleta')!!}
	{!!Form::text('numerodocumento',null,['class'=>'form-control','placeholder'=> 'Número de Boleta', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('numerofactura', 'Número de Factura')!!}
	{!!Form::text('numerofactura',null,['class'=>'form-control','placeholder'=> 'Número de Factura', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('mes_id', 'Mes')!!}
	{!!Form::select('mes_id[]', $meses, null, ['multiple'=>true, 'class'=>'form-control', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('monto', 'Monto de cada Pago')!!}
	Q{!!Form::number('monto',null,['class'=>'form-control', 'step'=>'0.01','placeholder'=>'####.##', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('descripcion', 'Descripción')!!}
	{!!Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=> 'Descripción', 'rows'=>'2', 'required'])!!}
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

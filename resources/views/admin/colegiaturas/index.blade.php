@extends ('admin.template.main')
@section('title', 'Detalle de Colegiaturas de: '. $alumno->nombres . ' ' . $alumno->apellidos)
@section('content')

<a href="{{route('admin.colegiaturas.create', $alumno->id)}}" class="btn btn-info">Nuevo Pago</a>
<hr>
@include('flash::message')
	<table class="table  table-hover">
		<thead>
			<th>ID</th>
			<th class="col-sm-1">Fecha</th>
			<th class="col-sm-1">Nit</th>
			<th class="col-sm-1">Nombre</th>
			<th class="col-sm-1">Num. de Boleta</th>
			<th class="col-sm-1">Num. de Factura</th>
			<th class="col-sm-1">Mes</th>
			<th class="col-sm-1">Monto</th>
			<th class="col-sm-1">Descripción</th>
			<th class="col-sm-3">Operaciones</th>
		</thead>
		<tbody>
			@foreach($colegiaturas as $colegiatura)
				<tr>
					<td>{{$colegiatura->id}}</td>
					<td>{{date("d-m-Y", strtotime($colegiatura->fecha))}}</td>
					<td>{{$colegiatura->nit}}</td>
					<td>{{$colegiatura->nombre}}</td>
					<td>{{$colegiatura->numerodocumento}}</td>
					<td>{{$colegiatura->numerofactura}}</td>
					<td>{{$colegiatura->mes->nombre}}</td>
					<td>Q{{number_format($colegiatura->monto, '2','.' , ',')}}</td>
					<td width="175px">{{$colegiatura->descripcion}}</td>
				
					
					<td><a href="{{route('admin.colegiaturas.edit', $colegiatura->id)}}" class="btn btn-primary">Editar
					</a> <a href="{{route('admin.colegiaturas.destroy', $colegiatura->id)}}" onclick="return confirm ('Seguro que deseas elimnarlo?')" class="btn btn-danger">Eliminar</a>
					<a href="{{route('admin.pdf', $colegiatura->id)}}" class="btn btn-primary" target="_blank">Imprimir
					</a>
					</td>
				</tr>
			@endforeach
		</tbody>

	</table>
	
<a href="{{route('admin.alumnos.index',['grado_id'=>$alumno->grado_id])}}" class="btn btn-success">Regresar</a>

	{!!$colegiaturas->render()!!}



@endsection

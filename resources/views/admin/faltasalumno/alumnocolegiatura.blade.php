@extends ('admin.template.main')
@section('title', 'Detalle de Colegiaturas de: '. $alumnos->nombres . " " . $alumnos->apellidos )
@section('content')
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
			<th class="col-sm-1">Alumno</th>
			<th class="col-sm-3">Operaciones</th>
		</thead>
		<tbody>
				<tr>
					<td>{{$colegiaturas->id}}</td>
					<td>{{date("d-m-Y", strtotime($colegiaturas->fecha))}}</td>
					<td>{{$colegiaturas->nit}}</td>
					<td>{{$colegiaturas->nombre}}</td>
					<td>{{$colegiaturas->numerodocumento}}</td>
					<td>{{$colegiaturas->numerofactura}}</td>
					<td><span class="label label-default">{{$colegiaturas->meses->nombre}}</span></td>
					<td>Q{{number_format($colegiaturas->monto, '2','.' , ',')}}</td>
					<td width="175px">{{$colegiaturas->descripcion}}</td>
					<td>{{$colegiaturas->alumno->nombres . " ". $colegiaturas->alumno->apellidos}}</td>

					<td><a href="{{route('admin.colegiaturas.edit', $colegiaturas->id)}}" class="btn btn-primary">Editar
					</a> <a href="{{route('admin.colegiaturas.eliminar', $colegiaturas->id)}}" onclick="return confirm ('Seguro que deseas elimnarlo?')" class="btn btn-danger">Eliminar</a>
					<a href="{{route('admin.pdf', $colegiaturas->id)}}" class="btn btn-primary">Imprimir
					</a>
					</td>
				</tr>
		</tbody>
	</table>

@endsection
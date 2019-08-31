@extends ('admin.template.main')
@section('title', 'Listado Total de Grados: ')
@section('content')
<hr>
@include('flash::message')
<div class="table-responsive">
	<table class="table table-striped table-hover">
		<thead>
			<th>Grado</th>
			<th>Nombre</th>
			<th>CantidadBimestres</th>
			<th>Nivel</th>
			<th>Operaciones</th>
		</thead>
		<tbody>
			@foreach($grados as $grado)
				<tr>
					<td>{{ $grado->grado }}</td>
					<td>{{$grado->nombre}}</td>
					<td>{{$grado->cantidadbimestres}}</td>
					<td>{{$grado->nivel->nombre}}</td>
					<td><a href="{{route('admin.grados.edit', $grado->id)}}" class="btn btn-primary glyphicon glyphicon-pencil" title="Editar">
					</a> <!--<a href="{{route('admin.grados.destroy', $grado->id)}}" onclick="return confirm ('Seguro que deseas elimnarlo?')" class="btn btn-danger glyphicon glyphicon-remove" title="Eliminar"></a>-->
					<a href="{{route('admin.grados.cursos.show', $grado->id)}}" class="btn btn-warning glyphicon glyphicon-book" title="Crear Cursos"></a>
					<a href="{{route('admin.grados.boleta', $grado->id)}}" class="btn btn-success glyphicon glyphicon-education" title="Imprimir Boletas de Calificaciones"></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
	{!!$grados->render()!!}
	<br>
	<a href="{{route('admin.niveles.index')}}" class="btn btn-success">Regresar</a>
	@endsection

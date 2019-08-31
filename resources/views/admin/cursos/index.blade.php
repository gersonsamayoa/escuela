@extends ('admin.template.main')
@section('title', 'Listado de Cursos')
@section('subtitle', ''. $grados->grado .' '. $grados->nombre)
@section('content')
<hr>
@include('flash::message')

	<table class="table table-striped table-hover">
		<thead>
			<th>No.</th>
			<th>Curso</th>
			<th>Grado</th>
			<th>Operaciones</th>
		</thead>
		<tbody>
			<?php
			$contador=1;?>
			@foreach($cursos as $curso)
				<tr>
					<td>{{ $contador }}</td> <?php $contador++; ?>
					<td>{{$curso->nombre}}</td>
					<td>{{$curso->grado->grado . " " . $curso->grado->nombre}}</td>
					<td>
						<a href="{{route('admin.cursos.edit', $curso->id)}}" class="btn btn-primary glyphicon glyphicon-pencil" title="Editar"></a>
					 	<a href="{{route('admin.cursos.destroy', $curso->id)}}" onclick="return confirm ('Seguro que deseas elimnarlo?')" class="btn btn-danger glyphicon glyphicon-remove" title="Eliminar"></a>
					 	<a href="{{route('admin.calificaciones.listCalificaciones', $curso->id)}}" class="btn btn-info">Ingresar Notas</a>
					</td>
				</tr>
			@endforeach
		</tbody>

	</table>

	<a href="{{route('admin.cursos.create', $grados->id)}}" class="btn btn-info">Nuevo Curso</a>
	<a href="{{route('admin.niveles.grados', $grados->nivel_id)}}" class="btn btn-success">Regresar</a>
	<hr>

	@endsection

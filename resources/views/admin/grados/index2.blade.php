@extends ('admin.template.main')
@section('title', 'Listado de Grados Nivel: ' . $niveles->nombre)
@section('content')
<hr>
@include('flash::message')
<div class="table-responsive">
	<table class="table table-striped table-hover">
		<thead>
			<th>Grado</th>
			<th>Nombre</th>
			<th>Cantidad<br> Bimestres</th>
			<th>Nivel</th>
			<th>Ciclo</th>
			<th>Operaciones</th>
		</thead>
		<tbody>
			@foreach($grados as $grado)
				<tr>
					<td>{{ $grado->grado}}</td>
					<td>{{$grado->nombre}}</td>
					<td class="text-center">{{$grado->cantidadbimestres}}</td>
					<td>{{$grado->nivel->nombre}}</td>
					<td>@if($grado->ciclo_id)
						{{$grado->ciclo->descripcion}}
						@else
						{{$grado->ciclo_id}}
						@endif
					</td>
					<td>
					@if(Auth::user()->admin() OR Auth::user()->secretaria())
					<a href="{{route('admin.grados.edit', $grado->id)}}" class="btn btn-primary glyphicon glyphicon-pencil" title="Editar">
					</a> 
					@endif
					<a href="{{route('admin.grados.destroy', $grado->id)}}" onclick="return confirm ('Seguro que deseas elimnarlo?')" class="btn btn-danger glyphicon glyphicon-remove" title="Eliminar"></a>
					@if(Auth::user()->admin() OR Auth::user()->secretaria())
					<a href="{{route('admin.grados.cursos.show', $grado->id)}}" class="btn btn-warning glyphicon glyphicon-book" title="Cursos"></a>
					@endif
					<a href="{{route('admin.grados.boleta', $grado->id)}}" class="btn btn-success glyphicon glyphicon-education" title="Imprimir Boletas de Calificaciones"></a>
					<a href="{{route('admin.niveles.grados.listado', $grado->id)}}" class="btn btn-default glyphicon glyphicon-file" title="Generar Listado de Grado"></a>

					<a href="{{route('admin.niveles.grados.selectbim', $grado->id)}}" class="btn btn-default glyphicon glyphicon-th-list" title="Generar Vaciado"></a>

					<!--<a href="" class="btn btn-danger glyphicon glyphicon-usd" title="Pendientes de Pago"></a>-->
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
	{!!$grados->render()!!}
	<br>
	<a href="{{route('admin.niveles.grados.create',  $niveles->id)}}" class="btn btn-info">Nuevo Grado</a>
	<a href="{{route('admin.niveles.index')}}" class="btn btn-success">Regresar</a>
	@endsection
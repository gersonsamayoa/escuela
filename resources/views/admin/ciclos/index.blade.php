@extends ('admin.template.main')
@section('title', 'Listado Ciclos Activos: ')
@section('content')
<hr>
@include('flash::message')
<a href="{{route('admin.ciclos.create')}}" class="btn btn-info">Nuevo Ciclo</a>
<table class="table table-striped table-hover">
		<thead>
			<th>Ciclo</th>
			<th>Activo</th>
			<th>Operaciones</th>
		</thead>
		<tbody>
			@foreach($ciclos as $ciclo)
				<tr>
					<td>{{$ciclo->descripcion}}</td>
					<td style="color:Red">@if($ciclo->activo==1)
						<b>Activo</b>
						@else

						@endif
					</td>
					<td>
						<a href="{{route('admin.ciclos.edit', $ciclo->id)}}" class="btn btn-primary glyphicon glyphicon-pencil" title="Editar"></a>
					 	<!--<a href="{{route('admin.ciclos.destroy', $ciclo->id)}}" onclick="return confirm ('Seguro que deseas elimnarlo?')" class="btn btn-danger glyphicon glyphicon-remove" title="Eliminar"></a>-->
					</td>
				</tr>
			@endforeach
		</tbody>

	</table>
	<hr>
@endsection
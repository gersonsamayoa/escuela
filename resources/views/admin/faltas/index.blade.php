@extends ('admin.template.main')
@section('title', 'Listado de tipos de Faltas')
@section('content')
<a href="{{route('admin.faltas.create')}}" class="btn btn-info">Nueva falta</a>
<hr>
@include('flash::message')
<div class="row">
	<div class="col-md-12">
		<table class="table table-striped table-hover">
			<thead>
				<th>ID</th>
				<th>Falta</th>
				<th>Descripción</th>
			</thead>
			<tbody>
				@foreach($faltas as $falta)
							<tr><td>{{$falta->id}}</td>
							<td>{{$falta->descripcion}}</td>
							<td><a href="{{route('admin.faltas.edit', $falta->id)}}" class="btn btn-primary">Editar
							</a> 
							<a href="{{route('admin.faltas.destroy', $falta->id)}}" onclick="return confirm ('Seguro que deseas elimnarlo?')" class="btn btn-danger">Eliminar</a></td></tr>
				@endforeach
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection
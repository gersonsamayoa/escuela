@extends ('admin.template.main')
@section('title', 'Listado de Niveles')
@section('content')
<a href="{{route('admin.niveles.create')}}" class="btn btn-info">Nuevo Nivel</a>
<hr>
@include('flash::message')
	<table class="table table-striped table-hover">
		<thead>
			<th>ID</th>
			<th>Nivel</th>
			<th>Operaciones</th>
		</thead>
		<tbody>
			@foreach($niveles as $nivel)
				<tr>
					<td>{{$nivel->id}}</td>
					<td><a href="{{route('admin.niveles.grados', $nivel->id)}}">{{$nivel->nombre}}</a></td>
					<td><a href="{{route('admin.niveles.edit', $nivel->id)}}" class="btn btn-primary	">Editar</a> 
						<!--<a href="{{route('admin.niveles.destroy', $nivel->id)}}" onclick="return confirm ('Seguro que deseas elimnarlo?')" class="btn btn-danger">Eliminar</a>-->
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
{!!$niveles->render()!!}
@endsection

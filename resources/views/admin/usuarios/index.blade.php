@extends ('admin.template.main')
@section('title', 'Listado de usuarios')
@section('content')
<a href="{{route('admin.usuarios.create')}}" class="btn btn-info">Nuevo Usuario</a>
<hr>
@include('flash::message')
<div class="table-responsive">
	<table class="table table-striped table-hover">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Correo</th>
			<th>Tipo</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($usuarios as $user)
				<tr>
					<td>{{$user->id}}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td>
					@if ($user->type=="admin")
					<span class="label label-danger">{{$user->type}}</span>
					@else 
					@if ($user->type=="director")
					<span class="label label-primary">{{$user->type}}</span>
					@else 
					@if ($user->type=="secretaria")
					<span class="label label-info">{{$user->type}}</span>
					@endif
					@endif
					@endif
					</td>

					<td><a href="{{route('admin.usuarios.edit', $user->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>

					<a href="{{ route('admin.usuarios.destroy', $user->id)}}" onclick="return confirm('¿Seguro que desaes eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>

				</tr>
			@endforeach
		</tbody>
	</table>
</div>
	{!!$usuarios->render()!!}

@endsection

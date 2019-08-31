@extends ('admin.template.main')
@section('title', 'Listado de Pagos')
@section('content')
<a href="{{route('admin.meses.create')}}" class="btn btn-info">Nuevo Mes</a>
<hr>
@include('flash::message')
<div class="row">
	<div class="col-md-6">
		<table class="table table-striped table-hover">
			<thead>
				<th>ID</th>
				<th>Mes</th>
				<th>NumeroMes</th>
				<th>Operaciones</th>
			</thead>
			<tbody>
				<?php
				$j=1; ?>
				@foreach($meses as $mes)
					@if($mes->id<7)
							<tr><td>{{$mes->id}}</td>
							<td>{{$mes->nombre}}</td>
							<td>{{$mes->numeromes}}</td>
							<td><a href="{{route('admin.meses.edit', $mes->id)}}" class="btn btn-primary">Editar
							</a> 
							<!--<a href="{{route('admin.meses.destroy', $mes->id)}}" onclick="return confirm ('Seguro que deseas elimnarlo?')" class="btn btn-danger">Eliminar</a></td>--></tr>
							<?php $j++; ?>	
					@endif
				@endforeach
				</tr>
			</tbody>
		</table>
	</div>
	<div class="col-md-6">
		<table class="table table-striped table-hover">
			<thead>
				<th>ID</th>
				<th>Mes</th>
				<th>NumeroMes</th>
				<th>Operaciones</th>
			</thead>
			<tbody>
				<?php
				$j=1; ?>
				@foreach($meses as $mes)
					@if($mes->id>6)
							<tr><td>{{$mes->id}}</td>
							<td>{{$mes->nombre}}</td>
							<td>{{$mes->numeromes}}</td>
							<td><a href="{{route('admin.meses.edit', $mes->id)}}" class="btn btn-primary">Editar
							</a> 
							<!--<a href="{{route('admin.meses.destroy', $mes->id)}}" onclick="return confirm ('Seguro que deseas elimnarlo?')" class="btn btn-danger">Eliminar</a></td>--></tr>
							<?php $j++; ?>	
					@endif
				@endforeach
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection
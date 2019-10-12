@extends ('admin.template.main')
@section('title', 'Detalle de Faltas de: '. $alumno->nombres . ' ' . $alumno->apellidos)
@section('content')

<a href="{{route('admin.faltasalumno.create', $alumno->id)}}" class="btn btn-info">Nueva Falta</a>
<hr>
@include('flash::message')
	<table class="table  table-hover">
		<thead>
			<th class="col-sm-1">id</th>
			<th class="col-sm-1">Fecha</th>
			<th class="col-sm-2">Nombre Docente</th>
			<th class="col-sm-3">Descripción de la falta</th>
			<th class="col-sm-2">Tipo de Falta</th>
			<th class="col-sm-3">Operaciones</th>
		</thead>
		<tbody>
			@foreach($faltas as $falta)
				<tr>
					<td>{{$falta->id}}</td>
					<td>{{date("d-m-Y", strtotime($falta->fecha))}}</td>
					<td>{{$falta->nombredocente}}</td>
					<td>{{$falta->descripcion}}</td>
					<td>
					@if ($falta->falta->descripcion=="Falta grave")
					<span class="label label-danger">{{$falta->falta->descripcion}}</span>
					@else 
					<span class="label label-info">{{$falta->falta->descripcion}}</span>
					</td>
					@endif
								
					<td><a href="{{route('admin.faltasalumno.edit', $falta->id)}}" class="btn btn-primary btn-sm glyphicon glyphicon-pencil" title="Editar"></a>
					 <a href="{{route('admin.faltasalumno.destroy', $falta->id)}}" onclick="return confirm ('Seguro que deseas elimnarlo?')" class="btn btn-danger btn-sm glyphicon glyphicon-remove" title="Eliminar"> </a>
					<a href="{{route('admin.pdf', $falta->id)}}" class="btn btn-warning btn-sm glyphicon glyphicon-file" title="Imprimir Reporte" target="_blank"> </a>
					
					</td>
				</tr>
			@endforeach
		</tbody>

	</table>
	
<a href="{{route('admin.alumnos.index',['grado_id'=>$alumno->grado_id])}}" class="btn btn-success">Regresar</a>

	{!!$faltas->render()!!}



@endsection

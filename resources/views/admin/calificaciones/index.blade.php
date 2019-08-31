@extends ('admin.template.main')
@section('title', 'Ingreso de Notas del Curso de: '. $cursos->nombre)
@section('subtitle', 'Grado: '.$grados->grado . " " . $grados->nombre)

@section('content')
@include('flash::message')
<h3 class="text-center">Alumnos con notas</h3>
<div>
<a href="{{route('admin.grados.cursos.show', $grados->id)}}" class="btn btn-success pull-right">Regresar</a>
</div>
@if($grados->cantidadbimestres==4)
<table class="table table-striped table-hover">
		<thead>
			<th>Alumno</th>
			<th class="col-sm-1">Bim1</th>
			<th class="col-sm-1">Bim2</th>
		    <th class="col-sm-1">Bim3</th>
			<th class="col-sm-1">Bim4</th>
		    <th class="col-sm-1">Promedio</th>
		    <th class="col-sm-1">Cantidad<br>Bimestres</th>
      		<th>Acción</th>
		</thead>
		<tbody>
			{!!Form::open(['route'=>['admin.actualizar.update', $cursos->id], 'method'=>'PUT']) !!}
			@foreach($cursosalumnosasignados as $cursoalumnoasignado)
			@if($cursoalumnoasignado->curso_id==$cursos->id)

				
					{!!Form::hidden('alumno_id[]',$cursoalumnoasignado->alumno_id,['class'=>'form-control', 'readonly'])!!}
				
				
					<td>{{$cursoalumnoasignado->apellidos . " " . $cursoalumnoasignado->nombres}}</td>

			
					{!!Form::hidden('curso_id[]',$cursoalumnoasignado->curso_id,['class'=>'form-control', 'readonly'])!!}
		
				
					<td><div class="form-group">
						{!!Form::number('bim1[]',$cursoalumnoasignado->bim1,['class'=>'form-control', 'min'=>'0','max'=>'100', 'placeholder'=> '', '', 'tabindex'=>'1'])!!}
					</div></td>

					<td><div class="form-group">
							{!!Form::number('bim2[]',$cursoalumnoasignado->bim2,['class'=>'form-control', 'min'=>'0','max'=>'100', 'placeholder'=> '', '', 'tabindex'=>'2'])!!}
					</div></td>

					<td><div class="form-group">
								{!!Form::number('bim3[]',$cursoalumnoasignado->bim3,['class'=>'form-control', 'min'=>'0','max'=>'100','placeholder'=> '', '', 'tabindex'=>'3'])!!}
					</div></td>

					<td><div class="form-group">
								{!!Form::number('bim4[]',$cursoalumnoasignado->bim4,['class'=>'form-control', 'min'=>'0','max'=>'100', 'placeholder'=> '', '', 'tabindex'=>'4'])!!}
					</div></td>

					<td><div class="form-group">
								{!!Form::label(round($cursoalumnoasignado->promedio) ,$cursoalumnoasignado->promedio,['class'=>'form-control','placeholder'=> '', ''])!!}
					</div></td>

					<td><div class="form-group">
								{!!Form::number('cantidad_bimestres[]',$cursoalumnoasignado->cantidad_bimestres,['class'=>'form-control', 'min'=>'1','max'=>'4','placeholder'=> '', '', 'tabindex'=>'5'])!!}
					</div></td>

					<td>
						<div class="form-group">
						<a href="{{route('admin.calificaciones.destroy', ['alumnoid'=>$cursoalumnoasignado->alumno_id,'curso_id'=> $cursoalumnoasignado->curso_id])}}"  onclick="return confirm('Seguro que quiere eliminar esta calificación?')" class="btn btn-danger btn-delete">Eliminar</a>
						</div>
					</td>
				</tr>
			@endif
		@endforeach
	</tbody>
</table>
	<div class="form-group pull-right">
		{!!Form::submit('Asignar Notas',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
	</div>
@else
	<table class="table table-striped table-hover">
		<thead>
			<th>Alumno</th>
			<th class="col-sm-1">Bim1</th>
			<th class="col-sm-1">Bim2</th>
		    <th class="col-sm-1">Bim3</th>
		    <th class="col-sm-1">Promedio</th>
		    <th class="col-sm-1">Cantidad<br>Bimestres</th>
      		<th>Acción</th>
		</thead>
		{!!Form::open(['route'=>['admin.actualizar.update', $cursos->id], 'method'=>'PUT']) !!}
			@foreach($cursosalumnosasignados as $cursoalumnoasignado)
			@if($cursoalumnoasignado->curso_id==$cursos->id)

			
					{!!Form::hidden('alumno_id[]',$cursoalumnoasignado->alumno_id,['class'=>'form-control', 'readonly'])!!}
			
				
					<td>{{$cursoalumnoasignado->apellidos . " " . $cursoalumnoasignado->nombres}}</td>

				
					{!!Form::hidden('curso_id[]',$cursoalumnoasignado->curso_id,['class'=>'form-control', 'readonly'])!!}
			
				
					<td><div class="form-group">
						{!!Form::number('bim1[]',$cursoalumnoasignado->bim1,['class'=>'form-control', 'min'=>'0','max'=>'100','placeholder'=> '', '','tabindex'=>'1'])!!}
					</div></td>

					<td><div class="form-group">
							{!!Form::number('bim2[]',$cursoalumnoasignado->bim2,['class'=>'form-control', 'min'=>'0','max'=>'100','placeholder'=> '', '' , 'tabindex'=>'2'])!!}
					</div></td>

					<td><div class="form-group">
								{!!Form::number('bim3[]',$cursoalumnoasignado->bim3,['class'=>'form-control', 'min'=>'0','max'=>'100','placeholder'=> '', '', 'tabindex'=>'3'])!!}
					</div></td>


					<td><div class="form-group">
								{!!Form::label(round($cursoalumnoasignado->promedio), ($cursoalumnoasignado->promedio),['class'=>'form-control','placeholder'=> '', ''])!!}
					</div></td>

					<td><div class="form-group">
								{!!Form::number('cantidad_bimestres[]',$cursoalumnoasignado->cantidad_bimestres,['class'=>'form-control', 'min'=>'1','max'=>'4','placeholder'=> '', '', 'tabindex'=>'4'])!!}

					<td>
						<div class="form-group">
						<a href="{{route('admin.calificaciones.destroy', ['alumnoid'=>$cursoalumnoasignado->alumno_id,'curso_id'=> $cursoalumnoasignado->curso_id])}}"  onclick="return confirm('Seguro que quiere eliminar esta calificación?')" class="btn btn-danger btn-delete">Eliminar</a>
						</div>
					</td>
				</tr>
			@endif
		@endforeach
	</tbody>
</table>
<div class="form-group pull-right">
		{!!Form::submit('Asignar Notas',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
	</div>
@endif

@if($grados->cantidadbimestres==4)
	<h3 class="text-center">Alumnos sin  notas</h3>
	<table class="table table-striped table-hover">
		<thead>
			<th>Alumno_id</th>
			<th>Alumno</th>
			<th>Curso_id</th>
			<th class="col-sm-1">Bim1</th>
			<th class="col-sm-1">Bim2</th>
			<th class="col-sm-1">Bim3</th>
			<th class="col-sm-1">Bim4</th>
		</thead>
		<tbody>
		<tr>
		{!!Form::open(['route'=>['admin.calificaciones.store', $cursos->id], 'method'=>'POST'])!!}
		@foreach($cursos_alumnos as $curso_alumno)
			@if($curso_alumno->grado_id==$grados->id)
				<td><div class="form-group">
				{!!Form::text('alumno_id[]',$curso_alumno->id,['class'=>'form-control', 'readonly'])!!}
				</div></td>
				
				<td>{{$curso_alumno->apellidos . " " . $curso_alumno->nombres}}</td>

				<td><div class="form-group">
					{!!Form::text('curso_id[]',$cursos->id,['class'=>'form-control', 'readonly'])!!}
				</div></td>

				<td><div class="form-group">
					{!!Form::number('bim1[]',null,['class'=>'form-control', 'min'=>'0','max'=>'100','placeholder'=> '', '', 'tabindex'=>'1'])!!}
				</div></td>

				<td><div class="form-group">
					{!!Form::number('bim2[]',null,['class'=>'form-control', 'min'=>'0','max'=>'100','placeholder'=> '', '', 'tabindex'=>'2'])!!}
				</div></td>

				<td><div class="form-group">
					{!!Form::number('bim3[]',null,['class'=>'form-control', 'min'=>'0','max'=>'100','placeholder'=> '', '', 'tabindex'=>'3'])!!}
				</div></td>

				<td><div class="form-group">
					{!!Form::number('bim4[]',null,['class'=>'form-control', 'min'=>'0','max'=>'100','placeholder'=> '', '', 'tabindex'=>'4'])!!}
				</div></td>
			</tr>
			@endif
		@endforeach
	</tbody>
</table>
		<div class="form-group pull-right">
			{!!Form::submit('Asignar Alumnos',['class'=>'btn btn-primary'])!!}
			{!!Form::close()!!}
		</div>
@else
<h3 class="text-center">Alumnos sin  notas</h3>
	<table class="table table-striped table-hover">
		<thead>
			<th>Id_alumno</th>
			<th>Alumno</th>
			<th>Curso_id</th>
			<th class="col-sm-1">Bim1</th>
			<th class="col-sm-1">Bim2</th>
			<th class="col-sm-1">Bim3</th>
		</thead>
		<tbody>
		<tr>
		{!!Form::open(['route'=>['admin.calificaciones.store', $cursos->id], 'method'=>'POST'])!!}
			@foreach($cursos_alumnos as $curso_alumno)
				@if($curso_alumno->grado_id==$grados->id)
					<td><div class="form-group">
						{!!Form::text('alumno_id[]',$curso_alumno->id,['class'=>'form-control', 'readonly'])!!}
					</div></td>
					
					<td>{{$curso_alumno->apellidos . " " . $curso_alumno->nombres}}</td>

					<td><div class="form-group">
						{!!Form::text('curso_id[]',$cursos->id,['class'=>'form-control', 'readonly'])!!}
					</div></td>

					<td><div class="form-group">
						{!!Form::number('bim1[]',null,['class'=>'form-control', 'min'=>'0','max'=>'100','placeholder'=> '', '', 'tabindex'=>'1'])!!}
					</div></td>

					<td><div class="form-group">
						{!!Form::number('bim2[]',null,['class'=>'form-control', 'min'=>'0','max'=>'100','placeholder'=> '', '', 'tabindex'=>'2'])!!}
					</div></td>

					<td><div class="form-group">
						{!!Form::number('bim3[]',null,['class'=>'form-control', 'min'=>'0','max'=>'100','placeholder'=> '', '', 'tabindex'=>'3'])!!}
					</div></td>
				</tr>
			@endif
		@endforeach
	</tbody>
</table>
	<div class="form-group pull-right">
		{!!Form::submit('Asignar Alumnos',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
	</div>
@endif
<br><br><br>

@endsection

@section('scripts')
<script>

</script>
@endsection

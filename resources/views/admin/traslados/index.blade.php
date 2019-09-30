@extends ('admin.template.main')
@section('title', 'Traslado de Alumnos')
<script type="text/javascript">
	function marcar(source) 
	{
		checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
		for(i=0;i<checkboxes.length;i++) //recoremos todos los controles
		{
			if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
			{
				checkboxes[i].checked=source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
			}
		}
	}
</script>
@section('content')

<!--Buscador-->
	{!!Form::model(Request::all(),['route'=>'admin.traslados.index','method'=>'GET', 'class'=>'navbar-form pull-left'])!!}
	<b>Buscar:</b> <div class="input-group">
		  {!!Form::text('nombres', null, ['class'=>'form-control', 'placeholder'=>'Nombre o Carné'])!!}
			 <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
	 		 </div>
	 <b>Grado ciclo Anterior:</b> <div class="input-group">
		{!!Form::select('grado_id', $grados,null,['class'=>'form-control', 'placeholder'=>'Seleccione un Grado'])!!}
		</div>
		
	{!!Form::submit('Buscar',['class'=>'btn btn-primary'])!!}
    {!!Form::close()!!}
<br><br><br>
@include('flash::message')
<div class="table-responsive">
	<table class="table table-striped table-hover">
		<thead>
			<th class="col-sm-1">Seleccionar</th>
			<th class="col-sm-1">No.</th>
			<th class="col-sm-3">Apellidos</th>
			<th class="col-sm-3">Nombres</th>
			<th class="col-sm-1">Carné</th>
			<th class="col-sm-3">Grado</th>
	
		</thead>
		<tbody>
			<?php
      		$contador=1;?>
			{!!Form::open(['route'=>['admin.traslados.store'], 'method'=>'POST']) !!}
			<input type="checkbox" onclick="marcar(this);" /> Marcar/Desmarcar Todos
			@foreach($alumnos as $alumno)
			<tr>
				<td><input type="checkbox" name="id_alumno[]" value="{{$alumno->id}}"> </td>
					<td>{{ $contador }}</td> <?php $contador++; ?>
					<td>{{$alumno->apellidos}}</td>
					<td>{{$alumno->nombres}}</td>
					<td>{{$alumno->carnet}}</td>
					<td width=400>{{$alumno->grado->grado . " " . $alumno->grado->nombre}}</td>
					<td>
						
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="form-group">
	  	<b>Nuevo Grado:</b>{!! Form::select('nuevogrado_id', $grados2,null,['class'=>'form-control', 'placeholder'=>'Seleccione un Grado', 'required'])!!}	
	</div>

	<div class="form-group pull-right">
		{!!Form::submit('Asignar Grado',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
	</div>
	
</div>


@endsection

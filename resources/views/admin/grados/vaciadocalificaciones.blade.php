@extends('admin.template.main')
@section('title', 'Vaciado de Notas '.  $grado->grado . ' ' . $grado->nombre)
@section('content')
<a href="{{route('admin.niveles.grados.selectbim.imprimir', ['id'=>$grado->id,'bim'=> $bim])}}" class="btn btn-primary pull-right glyphicon glyphicon-print" target="_blank"></a>
<br>
<hr>
@include('flash::message')

@if($grado->cantidadbimestres==4)
{!! Form::open(['route'=>['admin.niveles.grados.vaciado',$grado->id], 'method'=>'POST']) !!}
<div class="form-group">
	{!! Form::label('bimestre', 'Bimestre') !!}
	{!!Form::select('bim', ['bim1'=>'Bimestre1','bim2'=>'Bimestre2','bim3'=>'Bimestre3', 'bim4'=>'Bimestre4', 'promedio'=>'Promedio'], null, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
</div>

<div class="form-gropu">
{!! Form::submit('Mostrar', ['class'=>'btn btn-primary']) !!}
<a href="{{route('admin.niveles.grados', $grado->nivel_id)}}" class="btn btn-success">Regresar</a>
</div>
{!! Form::close() !!}
@endif

@if($grado->cantidadbimestres==3)
{!! Form::open(['route'=>['admin.niveles.grados.vaciado',$grado->id], 'method'=>'POST']) !!}
<div class="form-group">
	{!! Form::label('bimestre', 'Bimestre') !!}
	{!!Form::select('bim', ['bim1'=>'Bimestre1','bim2'=>'Bimestre2','bim3'=>'Bimestre3', 'promedio'=>'Promedio'], null, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
</div>

<div class="form-gropu">
{!! Form::submit('Mostrar', ['class'=>'btn btn-primary']) !!}
<a href="{{route('admin.niveles.grados', $grado->nivel_id)}}" class="btn btn-success">Regresar</a>
</div>
{!! Form::close() !!}
@endif
<br>
 <?php
          $contador=1;?>
	<table id="table_id" class="table table-striped table-hover">
		<thead>
			<tr>
			<th style="font-size:10px">No.</th>
					<th style="font-size:12px">Nombres</th>
			@foreach($cursos as $curso)
			<th style="font-size:8px; text-align: center; padding: 10px 12px;">{{ $contador }}</th>
      <?php $contador++; ?>
			@endforeach
			<th style="font-size:8px; text-align: center;">Promedio</th>
			</tr>
			</thead>
		<tbody>
			 <?php
      		$contador=1;?>
      		@foreach($alumnos as $alumno)
      		<tr>
      			<td>{{ $contador }}</td> <?php $contador++; ?>
      			<td>{{ $alumno->apellidos . ' ' . $alumno->nombres}}</td>
      			@foreach($alumno_cursos as $alumno_curso)
      				@if($alumno_curso->alumno_id == $alumno->id)
      					@if($alumno_curso->nota>59.9)
      					<td style="text-align: center;">{{$alumno_curso->nota }}</td>
      					@else
      					<td style="text-align: center; color:red;">{{$alumno_curso->nota }}</td>
      					@endif
      					 <?php
      					 $totalpromedio=$totalpromedio+$alumno_curso->nota;
      					 ?>
      				@endif
      			@endforeach
      			<td style="text-align: center">{{ number_format($totalpromedio/$cantidadcursos, 2) }}</td>
      			<?php
      			 $totalpromedio=0;
      			?>
      		</tr>
      		@endforeach

		</tbody>
	</table>
  
   <?php
    $contador=1;?>
        <table  class="table table-striped table-hover" >
          <tr>
          @foreach($cursos as $curso)
          <th style="font-size:12px; text-align: center;">{{ $contador }}</th>
          <?php $contador++; ?>
          @endforeach
    </tr>
    <tr>
      @foreach($cursos as $curso)
      <th style="font-size:8px; text-align: center">{{ $curso->nombre }}</th>
       @endforeach
    </tr>
        </table>

   <div class="row">
      <div class="col-md-8 col-md-offset-2 text-center">
        
      <table  class="table table-striped table-hover" >
            <thead>
                  <tr>
                        <th>No.</th>
                        <th style="text-align: center;">Curso</th>
                        <th style="text-align: center;">Cantidad de Alumnos con nota menor a 40</th>
                        <th style="text-align: center;">Cantidad de Alumnos con nota entre 40 y 49</th>
                        <th style="text-align: center;">Cantidad de Alumnos con nota entre a 50 y 59</th>
                        <th style="text-align: center;">Total de alumnos que perdieron la Clase</th>
                  </tr>
            </thead>
            <tbody>
                  <?php
              $contador=1;?>
                        @foreach($cursos as $curso)
                         <tr>
                        <td>{{ $contador }}</td>
                        <td style="text-align: left;">{{ $curso->nombre }}</td>
                              @foreach($alumnos_perdidos as $alumno_perdido)
                                    @if($alumno_perdido->curso_id == $curso->id AND $alumno_perdido->nota<40)
                                    <?php
                                    $totalperdido=$totalperdido+1;
                                     ?>
                                    @endif
                              
                              @endforeach
                                   
                               <td>{{ $totalperdido }}</td>
                                <?php
                               $totalperdido=0;
                                $contador=$contador+1;
                               ?>

                               @foreach($alumnos_perdidos as $alumno_perdido)
                                    @if($alumno_perdido->curso_id == $curso->id AND $alumno_perdido->nota>39 AND $alumno_perdido->nota<50)
                                    <?php
                                    $totalperdido=$totalperdido+1;
                                     ?>
                                    @endif
                              @endforeach
                              <td>{{ $totalperdido }}</td>
                             
                              <?php
                               $totalperdido=0;
                               ?>

                               @foreach($alumnos_perdidos as $alumno_perdido)
                                    @if($alumno_perdido->curso_id == $curso->id AND $alumno_perdido->nota>49 AND $alumno_perdido->nota<60)
                                    <?php
                                    $totalperdido=$totalperdido+1;
                                     ?>
                                    @endif
                              @endforeach
                              <td>{{ $totalperdido }}</td>
                             
                              <?php
                               $totalperdido=0;
                               ?>

                                @foreach($alumnos_perdidos as $alumno_perdido)
                                    @if($alumno_perdido->curso_id == $curso->id)
                                    <?php
                                    $totalperdido=$totalperdido+1;
                                     ?>
                                    @endif
                              @endforeach
                              <td>{{ $totalperdido }}</td>
                             
                              <?php
                               $totalperdido=0;
                               ?>
                        </tr>
                         @endforeach
            </tbody>
      </table>
      </div>
      </div>

      <div style="width:100%;">
      {!! $chartjs->render() !!}
      </div>
      <br>

      @endsection

      @section('scripts')
       <script type="text/javascript">
        $(document).ready( function () {
        $('#table_id').DataTable({
          paging: false,
          } );
        } );
        </script>
    @endsection

        

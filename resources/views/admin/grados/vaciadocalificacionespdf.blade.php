<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Vaciado</title>
    <style type="text/css">
    	html {
		margin: 0;
		}
		body {
		margin: 10mm 7mm 10mm 7mm;
		}
    </style>
  </head>
  <body>
  	<h1>Grado: {{ $grado->grado . ' ' . $grado->nombre}}</h1>
	 <table width="100%" border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
	 	<thead>
			<tr>
			<th style="font-size:8px">No.</th>
			<th style="font-size:8px">Nombres</th>
			@foreach($cursos as $curso)
			<th style="font-size:8px; text-align: center;">{{ $curso->nombre }}</th>
			@endforeach
      <th style="font-size:8px; text-align: center;">Promedio</th>
			</tr>
			</thead>
		<tbody>
			
			 <?php
      		$contador=1;?>
      		@foreach($alumnos as $alumno)
      		<tr>
      			<td style="font-size:10px">{{ $contador }}</td> <?php $contador++; ?>
      			<td style="font-size:10px">{{ $alumno->apellidos . ' ' . $alumno->nombres}}</td>
      			@foreach($alumno_cursos as $alumno_curso)
      				@if($alumno_curso->alumno_id == $alumno->id)
      					@if($alumno_curso->nota>59.9)
      					<td style="font-size:12px; text-align: center;">{{$alumno_curso->nota }}</td>
      					@else
                <td style="font-size:12px; text-align: center;"><font color="red">{{$alumno_curso->nota }}</font></td>
                @endif
                <?php
                 $totalpromedio=$totalpromedio+$alumno_curso->nota;
                 ?>
              @endif
            @endforeach
            <td style="font-size:12px; text-align: center;">{{ round($totalpromedio/$cantidadcursos) }}</td>
            <?php
             $totalpromedio=0;
            ?>
      		</tr>
      		@endforeach
		</tbody>
	</table>

  <div style="page-break-after:always;"></div>
  <h2 align="center">Resumen de: {{ $grado->grado . ' ' . $grado->nombre}}</h2>
      <table width="75%" align="center" border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
             <thead>
                  <tr>
                    <th>No.</th>
                        <th style="font-size: 12px; text-align: center;">Curso</th>
                        <th style="font-size: 12px; text-align: center;">Cantidad de Alumnos con nota menor a 40</th>
                        <th style="font-size: 12px; text-align: center;">Cantidad de Alumnos con nota entre 40 y 49</th>
                        <th style="font-size: 12px; text-align: center;">Cantidad de Alumnos con nota entre a 50 y 59</th>
                        <th style="font-size: 12px; text-align: center;">Total de alumnos que perdieron la Clase</th>
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
                                   
                               <td style="text-align: center;">{{ $totalperdido }}</td>
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
                              <td style="text-align: center;">{{ $totalperdido }}</td>
                             
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
                              <td style="text-align: center;">{{ $totalperdido }}</td>
                             
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
                              <td style="text-align: center;">{{ $totalperdido }}</td>
                             
                              <?php
                               $totalperdido=0;
                               ?>
                        </tr>
                         @endforeach
            </tbody>
      </table>
      </div>
      </div>
    </body>
    </html>
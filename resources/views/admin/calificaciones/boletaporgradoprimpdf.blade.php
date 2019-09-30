<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Boleta de Calificaciones</title>
  </head>
  <body>

@foreach($alumnos as $alumno)
<?php
      $contador=1;?>
<div style="page-break-after:always;"> 
     <table width="100%" >
      <tr>
        <td width="15%">
        <img src="" width="70px">
        </td>
        <td width="85%" align="center">
        <h1>Escuela Asentamiento 19 de Septiembre </h1>
         <p>Chiquimulilla, Santa Rosa <br> Ciclo 2,019 <br> </p>
        </td>
      </tr>
      </table>
<hr>
<h2>{{$alumno->apellidos . ", " . $alumno->nombres}}</h2>
<p>Grado: {{$grados->nombre}}</p>
<table border=1 cellspacing=0 bordercolor=black>
    <thead>
      <tr>
          <th>No.</th>
          <th width="350px">Curso</th>
          <th>Bim1</th>
          <th>Bim2</th>
          <th>Bim3</th>
          <th>Bim4</th>
          <th>Promedio</th>
        </tr>
    </thead>
  <tbody>
  @foreach($alumnos2 as $alumno_curso)
    @if($alumno->id==$alumno_curso->alumno_id)
          <tr>
              <td>{{ $contador }}</td> <?php $contador++; ?>
              <td style="font-size: 14px">{{$alumno_curso->curso->nombre}}</td>
              @if($alumno_curso->bim1<60)<td><font color='red'>{{$alumno_curso->bim1}}</font></td>@else<td>{{$alumno_curso->bim1}}</td>@endif
              @if($alumno_curso->bim2<60)<td><font color='red'>{{$alumno_curso->bim2}}</font></td>@else<td>{{$alumno_curso->bim2}}</td>@endif
              @if($alumno_curso->bim3<60)<td><font color='red'>{{$alumno_curso->bim3}}</font></td>@else<td>{{$alumno_curso->bim3}}</td>@endif
              @if($alumno_curso->bim4<60)<td><font color='red'>{{$alumno_curso->bim4}}</font></td>@else<td>{{$alumno_curso->bim4}}</td>@endif
              <td>{{round($alumno_curso->promedio,2)}}</td>
              <?php
              $totalbim1=$totalbim1+$alumno_curso->bim1;
              $totalbim2=$totalbim2+$alumno_curso->bim2;
              $totalbim3=$totalbim3+$alumno_curso->bim3;
              $totalbim4=$totalbim4+$alumno_curso->bim4;
              $totalpromedio=$totalpromedio+$alumno_curso->promedio;
              ?>
          </tr>
       @endif
      @endforeach
      <tr>
        <td><strong>Promedio</strong></td>
        <td></td>
        <td>{{ round($totalbim1/$totalcursos,2) }}</td>
        <td>{{ round($totalbim2/$totalcursos,2) }}</td>
        <td>{{ round($totalbim3/$totalcursos,2) }}</td>
        <td>{{ round($totalbim4/$totalcursos,2) }}</td>
        <td><strong>{{round($totalpromedio/$totalcursos,2)}}</strong></td>
      </tr>
          <?php
              $totalbim1=0;
              $totalbim2=0;
              $totalbim3=0;
              $totalbim4=0;
              $totalpromedio=0;
              ?>
        </tbody>
      </table>
        <br><br><br>
        <table width="100%">
          <tr>
            <td width="50%" align="center"><p>f._____________________________<br> <br> Maestra de Grado  </p> </td>
            <td width="50%" align="center"><p>f._____________________________<br>Profa. Alma Lisseth Botello E.<br> Director </p></td>
          </tr>
        </table>
   </div>
@endforeach  
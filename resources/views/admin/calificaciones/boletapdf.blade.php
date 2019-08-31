<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Boleta de Calificaciones</title>
  </head>
  <body>
    <table width="100%">
      <tr>
        <td width="15%">
        <img src="http://colegio.cts.edu.gt/img/logo-header1.png" width="70px">
        </td>
        <td width="85%" align="center">
        <h1>Colegio Técnico de Computación CTS </h1>
        <p>Colonia Vista Hermosa, Chiquimulilla, Santa Rosa <br> Ciclo 2,019 <br> Tel. 78851522</p>
        </td>
      </tr>
      </table>
      <hr>
 <h2>{{$alumnos->apellidos . ", " . $alumnos->nombres}}</h2>
 <p>Grado: {{$grados->grado . " " . $grados->nombre}}</p>
<br>
@if ($grados->cantidadbimestres==4)
<table border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
  <thead>
    <tr>
      <th>No.</th>
      <th  width="230px">Curso</th>
        <th  width="75px">Bim1</th>
        <th  width="75px">Bim2</th>
        <th  width="75px">Bim3</th>
        <th  width="75px">Bim4</th>
        <th  width="75px">Promedio</th>
      </tr>
  </thead>
  <tbody>
    <?php
      $contador=1;?>
      @foreach($alumnos2 as $alumno_curso)
        <tr>
          <td>{{ $contador }}</td> <?php $contador++; ?>
          <td>{{$alumno_curso->curso->nombre}}</td>
              @if($alumno_curso->bim1<60)<td><font color='red'>{{$alumno_curso->bim1}}</font></td>@else<td>{{$alumno_curso->bim1}}</td>@endif
              @if($alumno_curso->bim2<60)<td><font color='red'>{{$alumno_curso->bim2}}</font></td>@else<td>{{$alumno_curso->bim2}}</td>@endif
              @if($alumno_curso->bim3<60)<td><font color='red'>{{$alumno_curso->bim3}}</font></td>@else<td>{{$alumno_curso->bim3}}</td>@endif
              @if($alumno_curso->bim4<60)<td><font color='red'>{{$alumno_curso->bim4}}</font></td>@else<td>{{$alumno_curso->bim4}}</td>@endif
          <td>{{round($alumno_curso->promedio)}}</td>
        </tr>
      @endforeach
      <tr>
          <td><strong>Promedio</strong></td>
          <td></td>
          <td>{{ round($totalbim1) }}</td>
          <td>{{ round($totalbim2) }}</td>
          <td>{{ round($totalbim3) }}</td>
          <td>{{ round($totalbim4) }}</td>
          <td><strong>{{round($totalpromedio)}}</strong></td>
      </tr>
    </tbody>
  </table>
  <br><br><br>
        <table width="100%">
           <tr>
            <td width="50%" align="center"><p>f._____________________________<br> Secretario <br>o Maestro de Grado  </p> </td>
            <td width="50%" align="center"><p>f._____________________________<br><br> Director </p></td>
          </tr>
        </table>
  @else

  <table border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
  <thead>
    <tr>
      <th>No.</th>
      <th  width="300px">Curso</th>
        <th  width="75px">Bim1</th>
        <th  width="75px">Bim2</th>
        <th  width="75px">Bim3</th>
        <th  width="75px">Promedio</th>
      </tr>
  </thead>
  <tbody>
    <?php
      $contador=1;?>
      @foreach($alumnos2 as $alumno_curso)
        <tr>
          <td>{{ $contador }}</td> <?php $contador++; ?>
          <td>{{$alumno_curso->curso->nombre}}</td>
              @if($alumno_curso->bim1<60)<td><font color='red'>{{$alumno_curso->bim1}}</font></td>@else<td>{{$alumno_curso->bim1}}</td>@endif
              @if($alumno_curso->bim2<60)<td><font color='red'>{{$alumno_curso->bim2}}</font></td>@else<td>{{$alumno_curso->bim2}}</td>@endif
              @if($alumno_curso->bim3<60)<td><font color='red'>{{$alumno_curso->bim3}}</font></td>@else<td>{{$alumno_curso->bim3}}</td>@endif
          <td>{{round($alumno_curso->promedio)}}</td>
        </tr>
      @endforeach
      <tr>
          <td><strong>Promedio</strong></td>
          <td></td>
          <td>{{ round($totalbim1) }}</td>
          <td>{{ round($totalbim2) }}</td>
          <td>{{ round($totalbim3) }}</td>
          <td><strong>{{round($totalpromedio)}}</strong></td>
      </tr>
    </tbody>
  </table>
  <br><br><br>
        <table width="100%">
           <tr>
            <td width="50%" align="center"><p>f._____________________________<br> Secretario <br>o Maestro de Grado  </p> </td>
            <td width="50%" align="center"><p>f._____________________________<br><br> Director </p></td>
          </tr>
        </table>
@endif
@extends ('admin.template.main')
@section('title', 'Boleta de Calificaciones por grado')
@section('subtitle', 'Grado: '.$grados->grado . " " . $grados->nombre)

@section('content')
@include('flash::message')
<a href="{{route('admin.grados.imprimir', $grados->id)}}" class="btn btn-primary pull-right glyphicon glyphicon-print" target="_blank"></a>
<br>
<br>
<br>
@if ($grados->cantidadbimestres==4)

@foreach($alumnos as $alumno)
      <?php
      $contador=1;?>

<h3>{{$alumno->apellidos . ", " . $alumno->nombres}}</h3>
<table class="table table-striped table-hover">
      <thead class="info">
      <th class=" info">No.</th>
      <th class=" info">Curso</th>
        <th class=" info">Bim1</th>
        <th class=" info">Bim2</th>
        <th class=" info">Bim3</th>
        <th class=" info">Bim4</th>
        <th class=" info">Promedio</th>
  </thead>
  <tbody>
    
@foreach($alumnos2 as $alumno_curso)
  @if($alumno->id==$alumno_curso->alumno_id)
      <tr>
          <td>{{ $contador }}</td> <?php $contador++; ?>
          <td>{{$alumno_curso->curso->nombre}}</td>
          @if($alumno_curso->bim1==0)<td  class="danger">{{$alumno_curso->bim1}}</td>
          @else <td>{{$alumno_curso->bim1}}</td>@endif
          @if($alumno_curso->bim2==0)<td  class="danger">{{$alumno_curso->bim2}}</td>
          @else <td>{{$alumno_curso->bim2}}</td>@endif
          @if($alumno_curso->bim3==0)<td  class="danger">{{$alumno_curso->bim3}}</td>
          @else <td>{{$alumno_curso->bim3}}</td>@endif
          @if($alumno_curso->bim4==0)<td  class="danger">{{$alumno_curso->bim4}}</td>
          @else <td>{{$alumno_curso->bim4}}</td>@endif
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
        @endforeach

@else

        @foreach($alumnos as $alumno)
        <?php
      $contador=1;?>
<h3>{{$alumno->apellidos . ", " . $alumno->nombres}}</h3>
<table class="table table-striped table-hover">
      <thead class="info">
      <th class="info">No.</th>
      <th class="info">Curso</th>
        <th class="info">Bim1</th>
        <th class="info">Bim2</th>
        <th class="info">Bim3</th>
        <th class="info">Promedio</th>
  </thead>
  <tbody>

@foreach($alumnos2 as $alumno_curso)
  @if($alumno->id==$alumno_curso->alumno_id)
      <tr>
          <td>{{ $contador }}</td> <?php $contador++; ?>
          <td>{{$alumno_curso->curso->nombre}}</td>
          @if($alumno_curso->bim1==0)<td  class="danger">{{$alumno_curso->bim1}}</td>
          @else <td>{{$alumno_curso->bim1}}</td>@endif
          @if($alumno_curso->bim2==0)<td  class="danger">{{$alumno_curso->bim2}}</td>
          @else <td>{{$alumno_curso->bim2}}</td>@endif
          @if($alumno_curso->bim3==0)<td  class="danger">{{$alumno_curso->bim3}}</td>
          @else <td>{{$alumno_curso->bim3}}</td>@endif
          <td>{{round($alumno_curso->promedio,2)}}</td>
          <?php
          $totalbim1=$totalbim1+$alumno_curso->bim1;
          $totalbim2=$totalbim2+$alumno_curso->bim2;
          $totalbim3=$totalbim3+$alumno_curso->bim3;
          $totalpromedio=$totalpromedio+$alumno_curso->promedio;
          ?>
      </tr>
       @endif
      @endforeach
      <tr>
        <td><strong>Promedio</strong></td>
        <td></td>
        <td>{{round($totalbim1/$totalcursos,2) }}</td>
        <td>{{ round($totalbim2/$totalcursos,2) }}</td>
        <td>{{ round($totalbim3/$totalcursos,2) }}</td>
        <td><strong>{{round($totalpromedio/$totalcursos,2)}}</strong></td>
      </tr>
      <?php
          $totalbim1=0;
          $totalbim2=0;
          $totalbim3=0;
          $totalpromedio=0;
          ?>
        </tbody>
      </table>
        @endforeach
        @endif
        <a href="{{route('admin.niveles.grados', $grados->nivel_id)}}" class="btn btn-success">Regresar</a>
   @endsection

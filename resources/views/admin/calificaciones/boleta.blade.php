@extends ('admin.template.main')
@section('title', 'Boleta de Calificaciones de: '. $alumnos->apellidos . ", " . $alumnos->nombres)
@section('subtitle', 'Grado: '.$grados->grado . " " . $grados->nombre)

@section('content')
@include('flash::message')
<a href="{{route('admin.boleta.imprimir', $alumnos->id)}}" class="btn btn-primary pull-right glyphicon glyphicon-print" target="_blank"></a>
<br>
<br>
<br>
@if ($grados->cantidadbimestres==4)
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
    <?php
      $contador=1;?>
      @foreach($alumnos2 as $alumno_curso)
      <tr>
          <td>{{ $contador }}</td> <?php $contador++; ?>
          <td>{{$alumno_curso->curso->nombre}}</td>
          @if($alumno_curso->bim1==0)<td class="danger">{{$alumno_curso->bim1}}</td>
          @else<td>{{$alumno_curso->bim1}}</td>@endif
          @if($alumno_curso->bim2==0)<td class="danger">{{$alumno_curso->bim2}}</td>
          @else<td>{{$alumno_curso->bim2}}</td>@endif
          @if($alumno_curso->bim3==0)<td class="danger">{{$alumno_curso->bim3}}</td>
          @else<td>{{$alumno_curso->bim3}}</td>@endif
          @if($alumno_curso->bim4==0)<td class="danger">{{$alumno_curso->bim4}}</td>
          @else<td>{{$alumno_curso->bim4}}</td>@endif
            <td>{{round($alumno_curso->promedio,2)}}</td>
      </tr>
      @endforeach
      <tr>
          <td><strong>Promedio</strong></td>
          <td></td>
          <td>{{ round($totalbim1,2) }}</td>
          <td>{{ round($totalbim2,2) }}</td>
          <td>{{ round($totalbim3,2) }}</td>
          <td>{{ round($totalbim4,2) }}</td>
          <td><strong>{{round($totalpromedio,2)}}</strong></td>
        </tr>
    </tbody>
  </table>
  @else

  <table class="table table-striped table-hover">
  <thead class="info">
      <th class=" info">No.</th>
      <th class=" info">Curso</th>
        <th class=" info">Bim1</th>
        <th class=" info">Bim2</th>
        <th class=" info">Bim3</th>
        <th class=" info">Promedio</th>
  </thead>
  <tbody>
    <?php
      $contador=1;?>
      @foreach($alumnos2 as $alumno_curso)
      <tr>
      <td>{{ $contador }}</td> <?php $contador++; ?>
      <td>{{$alumno_curso->curso->nombre}}</td>
        @if($alumno_curso->bim1==0)<td class="danger">{{$alumno_curso->bim1}}</td>
          @else<td>{{$alumno_curso->bim1}}</td>@endif
          @if($alumno_curso->bim2==0)<td class="danger">{{$alumno_curso->bim2}}</td>
          @else<td>{{$alumno_curso->bim2}}</td>@endif
          @if($alumno_curso->bim3==0)<td class="danger">{{$alumno_curso->bim3}}</td>
          @else<td>{{$alumno_curso->bim3}}</td>@endif
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
@endif
<a href="{{route('admin.alumnos.index',['grado_id'=>$alumnos->grado_id])}}" class="btn btn-success">Regresar</a>
  @endsection

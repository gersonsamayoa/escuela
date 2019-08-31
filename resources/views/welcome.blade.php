@extends('admin.template.main')

@section('title', '')
@section('content')
<div class="jumbotron" style="background-image: url('{{asset('img/dashescuela.png')}}'); background-repeat: no-repeat;
    background-position: center bottom;
    -webkit-background-size: cover;
    background-size: cover; text-shadow: 2px 2px 5px black; height: 325px; padding-top: 2cm;" >
  <h1 class="text-center"><span style="color:#ffffff;">Escuela 19 de Septiembre</span></h1>
  <p class="text-center" style="color:#00FFAA">Control de Calificaciones y Rendimiento Académico</p>
  <div style="text-shadow: 0px 0px 0px black;">
  @if(Auth::user())
  </div>
 </div>
 <div class="row">
<div class="col-md-6">
<h2 style="color:#e69900">Niveles</h2>
<p>En esta vista, se mostrarán todos las <span style="color:#e69900">Niveles</span> que han
sido creadas y se podrán <span style="color:#f40700">Modificar</span>, si fuese necesario.
</p>
<p><a class="btn btn-default" href="{{route('admin.niveles.index')}}" role="button">Ver Niveles &raquo;</a></p>
</div>
<div class="col-md-6">
<h2 style="color:#f40700">Alumnos</h2>
<p>En esta vista, se mostrarán todos los <span style="color:#f40700">Alumnos</span> que han
sido creados y se podrán <span style="color:#f40700">Modificar</span>, si fuese necesario.
</p>
<a class="btn btn-default" href="{{route('admin.alumnos.index')}}" role="
button">Ver Alumnos &raquo;</a></p>
</div>
</div>
<hr>
  @else
  <br>
  <p class="text-center"><a class="btn btn-default" href="{{route('admin.usuarios.index')}}" role="button">Iniciar Sesion</a></p>
  </div>
 </div>
  @endif
@endsection

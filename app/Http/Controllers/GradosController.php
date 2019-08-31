<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\grado;
use App\nivel;
use App\alumno;
use App\curso;
use App\alumno_curso;
use App\ciclo;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use Barryvdh\DomPDF\Facade as PDF;

class GradosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $grados= grado::orderby('nombre', 'ASC')->orderby('grado', 'ASC')->paginate(10);
      return view('admin.grados.index')->with('grados', $grados);
    }

    public function gradosnivel($id)
    {
      $ciclos=ciclo::where('activo', 1)->first();/*Ciclo Activo*/

      $niveles=Nivel::Find($id);
      $grados= grado::where('nivel_id', $id)->where('ciclo_id', $ciclos->id)->orderby('id', 'ASC')->orderby('grado', 'ASC')->orderby('nombre', 'ASC')->paginate(21);

      return view('admin.grados.index2', compact('grados', 'niveles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $niveles=Nivel::orderby('nombre','ASC')->lists('nombre', 'id');
      $ciclos=ciclo::where('activo', 1)->orderby('descripcion','ASC')->lists('descripcion', 'id');
      $niveles2=Nivel::Find($id);
      return view('admin.grados.create', compact('niveles', 'niveles2', 'ciclos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $grados=new grado($request->all());
      $grados->save();
      flash('Grado Guardado Exitosamente')->success()->important();
      return redirect()->route('admin.niveles.grados', $grados->nivel_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $ciclos=ciclo::where('activo', 1)->orderby('descripcion','ASC')->lists('descripcion', 'id');
      $niveles=Nivel::orderby('nombre','ASC')->lists('nombre', 'id');
      $grados=Grado::Find($id);

      return view('admin.grados.edit', compact('grados', 'niveles', 'ciclos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $grados=grado::Find($id);
      $grados->Fill($request->all());
      $grados->save();

      flash('El Grado '. $grados->nombre . ' ha sido editado con éxito')->warning()->important();
      return redirect()->route('admin.niveles.grados', $grados->nivel_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $grados= grado::Find($id);
      $grados->delete();

      flash('El Grado ' . $grados->nombre . ' ha sido borrado de forma exitosa')->error()->important();
      return redirect()->route('admin.niveles.grados', $grados->nivel_id);
    }

    public function listado($id)
    {
      $alumnos=alumno::where('grado_id', $id)->orderby('apellidos', 'ASC')->get();
      $grado=grado::find($id);
      return view('admin.grados.listadoalumnos', compact('alumnos', 'grado'));

    }

    public function vaciado(Request $request, $id)
    {
      $grado=grado::find($id);

      $bim=$request->bim;
      $cursos=curso::where('grado_id', $id)->orderby('id')->get();
      $cantidadcursos=count($cursos);
   
      $totalpromedio=0;
      $totalperdido=0;
      $alumnos=alumno::where('grado_id', $id)->orderby('apellidos', 'ASC')->get();
      $alumnos2=alumno::where('grado_id', $id)->orderby('apellidos', 'ASC')->select(['id'])->get();

      /*Cursos del nuevo grado*/
      $cursos2=curso::where('grado_id', $id)->orderby('id')->select(['id'])->get();


      if ($request->bim =="bim1"){ /*Corregi solo primer bimestre*/
      $alumno_cursos=DB::table('alumno_curso')->whereIn('alumno_id', $alumnos2)->whereIn('curso_id', $cursos2)->select('alumno_curso.bim1 as nota', 'alumno_curso.alumno_id')->orderBy('alumno_id', 'ASC')->orderBy('curso_id', 'ASC')->get();


      $alumnos_perdidos=DB::table('alumno_curso')->whereIn('alumno_id', $alumnos2)->whereIn('curso_id', $cursos2)->where('alumno_curso.bim1', '<', 60)->select('alumno_curso.bim1 as nota', 'alumno_curso.alumno_id', 'alumno_curso.curso_id')->orderBy('curso_id', 'ASC')->orderBy('curso_id', 'ASC')->get();
        }

      if ($request->bim =="bim2"){
      $alumno_cursos=DB::table('alumno_curso')->whereIn('alumno_id', $alumnos2)->whereIn('curso_id', $cursos2)->select('alumno_curso.bim2 as nota', 'alumno_curso.alumno_id')->orderBy('alumno_id', 'ASC')->orderBy('curso_id', 'ASC')->get();

      $alumnos_perdidos=DB::table('alumno_curso')->whereIn('alumno_id', $alumnos2)->whereIn('curso_id', $cursos2)->where('alumno_curso.bim2', '<', 60)->select('alumno_curso.bim2 as nota', 'alumno_curso.alumno_id', 'alumno_curso.curso_id')->orderBy('curso_id', 'ASC')->orderBy('curso_id', 'ASC')->get();
      }

      if ($request->bim =="bim3"){
      $alumno_cursos=DB::table('alumno_curso')->whereIn('alumno_id', $alumnos2)->whereIn('curso_id', $cursos2)->select('alumno_curso.bim3 as nota', 'alumno_curso.alumno_id')->orderBy('alumno_id', 'ASC')->orderBy('curso_id', 'ASC')->get();

         $alumnos_perdidos=DB::table('alumno_curso')->whereIn('alumno_id', $alumnos2)->whereIn('curso_id', $cursos2)->where('alumno_curso.bim3', '<', 60)->select('alumno_curso.bim3 as nota', 'alumno_curso.alumno_id', 'alumno_curso.curso_id')->orderBy('curso_id', 'ASC')->orderBy('curso_id', 'ASC')->get();
      }

      if ($request->bim =="bim4"){
      $alumno_cursos=DB::table('alumno_curso')->whereIn('alumno_id', $alumnos2)->whereIn('curso_id', $cursos2)->select('alumno_curso.bim4 as nota', 'alumno_curso.alumno_id')->orderBy('alumno_id', 'ASC')->orderBy('curso_id', 'ASC')->get();

         $alumnos_perdidos=DB::table('alumno_curso')->whereIn('alumno_id', $alumnos2)->whereIn('curso_id', $cursos2)->where('alumno_curso.bim4', '<', 60)->select('alumno_curso.bim4 as nota', 'alumno_curso.alumno_id', 'alumno_curso.curso_id')->orderBy('curso_id', 'ASC')->orderBy('curso_id', 'ASC')->get();
        }

      if ($request->bim =="promedio"){
      $alumno_cursos=DB::table('alumno_curso')->whereIn('alumno_id', $alumnos2)->whereIn('curso_id', $cursos2)->select('alumno_curso.promedio as nota', 'alumno_curso.alumno_id')->orderBy('alumno_id', 'ASC')->orderBy('curso_id', 'ASC')->get();

         $alumnos_perdidos=DB::table('alumno_curso')->whereIn('alumno_id', $alumnos2)->whereIn('curso_id', $cursos2)->where('alumno_curso.promedio', '<', 60)->select('alumno_curso.promedio as nota', 'alumno_curso.alumno_id', 'alumno_curso.curso_id')->orderBy('curso_id', 'ASC')->orderBy('curso_id', 'ASC')->get();

    }
    $tamaño=count($cursos);
    $posicion=0;
    $cantidad=0;
    foreach($cursos as $curso){
    foreach($alumnos_perdidos as $alumno_perdido){
      if($curso->id==$alumno_perdido->curso_id AND $alumno_perdido->nota<60){
        $cantidad++;
      }
    }
    $resultados[$posicion]=$cantidad;
    $cantidad=0;
    $posicion++;
    }

     /*Array para label*/
    $nombres=curso::where('grado_id', $id)->orderby('id')->select('nombre')->get();
    $plucked=$nombres->pluck('nombre')->toarray();
  

    $chartjs = app()->chartjs
        ->name('pieChart')
        ->type('bar')
        ->size(['width' => 600, 'height' => 400])
        ->labels($plucked)
        ->datasets([
            [
                'backgroundColor' => ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850",'#FF6384', '#F4FA58','#00FFFF', '#2E9AFE', '#DA81F5', '#EEE8AA', '#DF7401',' #00FA9A','#FFD700','#7B68EE'],
                'data' => $resultados
            ],
        ])
        ->options([]);

        $chartjs->optionsRaw([
    'legend' => ['display' => false],
    'scales' => ['xAxes' => [['ticks'=>['fontSize'=>12, 'autoSkip'=>false, 'maxRotation'=>90, 'minRotation'=>90],
            ]  
        ],
        'yAxes'=>[['ticks'=>['min'=>0]]]
    ]
]);

$miarreglo=array();
$indice=0;
$promediomayor=0;
$totalpromedio2=0;

  foreach($alumnos as $alumno){
  foreach($alumno_cursos as $alumno_curso){
      if($alumno_curso->alumno_id == $alumno->id){
          $totalpromedio2=$totalpromedio2+$alumno_curso->nota;
        }
    }
    $promedio=$totalpromedio2/$cantidadcursos;
    $promedio=number_format($promedio,2);
    $miarreglo[$alumno->id]=$promedio;
    $totalpromedio2=0;
  }

/*  dd($miarreglo);*/


      return view('admin.grados.vaciadocalificaciones', compact('alumnos', 'grado', 'cursos', 'alumno_cursos', 'bim', 'cantidadcursos', 'totalpromedio', 'alumnos_perdidos', 'totalperdido', 'chartjs'));

    }

    public function selectbim($id)
    {
      $grado=grado::find($id);

      return view('admin.grados.seleccionarbimestre', compact('grado'));
    }

    public function imprimir($id, $bim)
    {
      $grado=grado::find($id);
      $cursos=curso::where('grado_id', $id)->orderby('id')->get();
      $cantidadcursos=count($cursos);
      $totalpromedio=0;
      $totalperdido=0;
      $alumnos=alumno::where('grado_id', $id)->orderby('apellidos', 'ASC')->get();
      $alumnos2=alumno::where('grado_id', $id)->orderby('apellidos', 'ASC')->select(['id'])->get();
      if ($bim =="bim1"){
      $alumno_cursos=DB::table('alumno_curso')->whereIn('alumno_id', $alumnos2)->select('alumno_curso.bim1 as nota', 'alumno_curso.alumno_id')->orderBy('alumno_id', 'ASC')->orderBy('curso_id', 'ASC')->get();

       $alumnos_perdidos=DB::table('alumno_curso')->whereIn('alumno_id', $alumnos2)->where('alumno_curso.bim1', '<', 60)->select('alumno_curso.bim1 as nota', 'alumno_curso.alumno_id', 'alumno_curso.curso_id')->orderBy('curso_id', 'ASC')->orderBy('curso_id', 'ASC')->get();

        }

      if ($bim =="bim2"){
      $alumno_cursos=DB::table('alumno_curso')->whereIn('alumno_id', $alumnos2)->select('alumno_curso.bim2 as nota', 'alumno_curso.alumno_id')->orderBy('alumno_id', 'ASC')->orderBy('curso_id', 'ASC')->get();

      $alumnos_perdidos=DB::table('alumno_curso')->whereIn('alumno_id', $alumnos2)->where('alumno_curso.bim2', '<', 60)->select('alumno_curso.bim2 as nota', 'alumno_curso.alumno_id', 'alumno_curso.curso_id')->orderBy('curso_id', 'ASC')->orderBy('curso_id', 'ASC')->get();

    }

      if ($bim =="bim3"){
      $alumno_cursos=DB::table('alumno_curso')->whereIn('alumno_id', $alumnos2)->select('alumno_curso.bim3 as nota', 'alumno_curso.alumno_id')->orderBy('alumno_id', 'ASC')->orderBy('curso_id', 'ASC')->get();

      $alumnos_perdidos=DB::table('alumno_curso')->whereIn('alumno_id', $alumnos2)->where('alumno_curso.bim3', '<', 60)->select('alumno_curso.bim3 as nota', 'alumno_curso.alumno_id', 'alumno_curso.curso_id')->orderBy('curso_id', 'ASC')->orderBy('curso_id', 'ASC')->get();

    }

      if ($bim =="bim4"){
      $alumno_cursos=DB::table('alumno_curso')->whereIn('alumno_id', $alumnos2)->select('alumno_curso.bim4 as nota', 'alumno_curso.alumno_id')->orderBy('alumno_id', 'ASC')->orderBy('curso_id', 'ASC')->get();

       $alumnos_perdidos=DB::table('alumno_curso')->whereIn('alumno_id', $alumnos2)->where('alumno_curso.bim4', '<', 60)->select('alumno_curso.bim4 as nota', 'alumno_curso.alumno_id', 'alumno_curso.curso_id')->orderBy('curso_id', 'ASC')->orderBy('curso_id', 'ASC')->get();

    }

      if ($bim =="promedio"){
      $alumno_cursos=DB::table('alumno_curso')->whereIn('alumno_id', $alumnos2)->select('alumno_curso.promedio as nota', 'alumno_curso.alumno_id')->orderBy('alumno_id', 'ASC')->orderBy('curso_id', 'ASC')->get();

       $alumnos_perdidos=DB::table('alumno_curso')->whereIn('alumno_id', $alumnos2)->where('alumno_curso.promedio', '<', 60)->select('alumno_curso.promedio as nota', 'alumno_curso.alumno_id', 'alumno_curso.curso_id')->orderBy('curso_id', 'ASC')->orderBy('curso_id', 'ASC')->get();

    }

      $pdf=new PDF();

        $pdf=PDF::loadview('admin.grados.vaciadocalificacionespdf',compact('alumnos', 'grado', 'cursos', 'alumno_cursos', 'bim', 'cantidadcursos', 'totalpromedio', 'alumnos_perdidos', 'totalperdido'));
  
        return $pdf->stream('vaciado.pdf');
    }
}

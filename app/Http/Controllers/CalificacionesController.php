<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\curso;
use App\grado;
use App\alumno;
use App\alumno_curso;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\DB;


class CalificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //
    }

    public function listCalificaciones($id)
    {
        $cursos=curso::find($id);
        $grados=grado::find($cursos->grado_id);
        $alumnos=alumno::where('grado_id', $grados->id)->get();

        //Alumnos con notas ya consignadas segun el curso seleccionado
        $cursosalumnosasignados=DB::table('alumno_curso')->leftjoin('alumnos', 'alumno_curso.alumno_id', '=', 'alumnos.id')->where('alumno_curso.curso_id','=',$id)->orderBy('apellidos', 'ASC')->orderBy('nombres', 'ASC')->get();

        // Primero sacas los id alumnos que si están asignados al curso
        $alumno_curso = alumno_curso::where('curso_id','=',$id)
        ->select(['alumno_id'])->get();

        //busqueda de alumnos que no tienen la nota en el curso
        $cursos_alumnos=DB::table('alumnos')->whereNotIn('id', $alumno_curso)->select('alumnos.*')->orderBy('apellidos', 'ASC')->orderBy('nombres', 'ASC')->get();


        return view('admin.calificaciones.index', compact('cursos', 'grados', 'alumnos', 'cursosalumnosasignados', 'cursos_alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idcurso)
    {   
        $cantidad=count($request->alumno_id);
        $mensaje="";
 
        for ($i=0; $i<$cantidad ; $i++) { 
            $alumnos=alumno::find($request->alumno_id[$i]);
            $grados=grado::find($alumnos->grado_id);
            $cantidadbimestres=$grados->cantidadbimestres;

        /*Calculo del Promedio con base a cantidad de bimestres del grado*/
        if($cantidadbimestres==4){
                            
                $promedio=($request->bim1[$i]+$request->bim2[$i]+$request->bim3[$i]+$request->bim4[$i])/$cantidadbimestres;


                $alumnos->cursos()->attach($request->curso_id[$i], ['bim1' => round($request->bim1[$i],0), 'bim2' => round($request->bim2[$i],0), 'bim3' => round($request->bim3[$i],0), 'bim4' => round($request->bim4[$i],0), 'cantidad_bimestres'=>$cantidadbimestres, 'promedio' => round($promedio,2)]);

                $mensaje=$mensaje . $alumnos->nombres . ', ';
                }

            else
             {
                $promedio=($request->bim1[$i]+$request->bim2[$i]+$request->bim3[$i])/$cantidadbimestres;

                $alumnos->cursos()->attach($request->curso_id[$i], ['bim1' => round($request->bim1[$i],0), 'bim2' => round($request->bim2[$i],0), 'bim3' => round($request->bim3[$i],0), 'cantidad_bimestres'=>$cantidadbimestres, 'promedio' => round($promedio,2)]);

                $mensaje=$mensaje . $alumnos->nombres . ', ';
            
            }}   

        if ($mensaje!=null) {
           flash('Las calificaciones de: ' . $mensaje . ' se guardaron exitosamente')->success()->important();
        }
         
        return redirect()->route('admin.calificaciones.listCalificaciones', $idcurso);

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idcurso)
    { 
        $cantidad=count($request->alumno_id);
        $mensaje="";

        for ($i=0; $i<$cantidad ; $i++) { 
            $alumnos=alumno::find($request->alumno_id[$i]);
            $grados=grado::find($alumnos->grado_id);
            $cantidadbimestres=$grados->cantidadbimestres;
           if($request->cantidad_bimestres[$i]!=null)
           {
            $cantidadbimestres=$request->cantidad_bimestres[$i];
           }

            if($cantidadbimestres==4){
                            
                $promedio=($request->bim1[$i]+$request->bim2[$i]+$request->bim3[$i]+$request->bim4[$i])/$cantidadbimestres;


                $cursos=$alumnos->cursos()->where('curso_id', $request->curso_id[$i])->first();

                  $cursos->pivot->bim1=round($request->bim1[$i],0);
                  $cursos->pivot->bim2=round($request->bim2[$i],0);
                  $cursos->pivot->bim3=round($request->bim3[$i],0);
                  $cursos->pivot->bim4=round($request->bim4[$i],0);
                  $cursos->pivot->cantidad_bimestres=$request->cantidad_bimestres[$i];
                  $cursos->pivot->promedio=$promedio;
                  $cursos->pivot->save();
                  $mensaje=$mensaje . $alumnos->nombres . ', ';
              }
               else
             {
                $promedio=($request->bim1[$i]+$request->bim2[$i]+$request->bim3[$i]+$request->bim4[$i])/$cantidadbimestres;

                $cursos=$alumnos->cursos()->where('curso_id', $request->curso_id[$i])->first();

                $cursos->pivot->bim1=round($request->bim1[$i],0);
                  $cursos->pivot->bim2=round($request->bim2[$i],0);
                  $cursos->pivot->bim3=round($request->bim3[$i],0);
                  $cursos->pivot->cantidad_bimestres=$request->cantidad_bimestres[$i];
                  $cursos->pivot->promedio=$promedio;
                  $cursos->pivot->save();

                $mensaje=$mensaje . $alumnos->nombres . ', ';

             }
          }

      if ($mensaje!=null) {
           flash('Las calificaciones de: ' . $mensaje . ' se guardaron exitosamente')->success()->important();
        }

      return redirect()->route('admin.calificaciones.listCalificaciones', $idcurso);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($alumnoid, $cursoid)
    {
      $alumnos=alumno::find($alumnoid);
      $alumnos->cursos()->detach($cursoid);

      flash('Calificaciones eliminada Exitosamente')->error()->important();
      return redirect()->route('admin.calificaciones.listCalificaciones', $cursoid);
    }
}

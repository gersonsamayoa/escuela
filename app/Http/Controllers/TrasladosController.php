<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\alumno;
use App\grado;
use App\ciclo;

class TrasladosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $ciclos=ciclo::where('activo', 1)->first(); /*Ciclo Activo*/

        $cicloanterior=$ciclos->descripcion-1; /*Ciclo Anterior*/
                
        $cicloanterior=ciclo::where('descripcion',$cicloanterior)->first();

        if($cicloanterior){ /*Validar que primer ciclo es 2018*/
        $gradoanterior=$request->grado_id;

       /*Grados ciclo anterior*/
      $grados=grado::select(DB::raw('concat (grado, " ", nombre) as fullgrado, id'))->where('ciclo_id', $cicloanterior->id)->orderBy('nombre','ASC')->orderBy('grado', 'ASC')->lists('fullgrado', 'id');

      /*Grados nuevo ciclo*/
      $grados2=grado::select(DB::raw('concat (grado, " ", nombre, " Jornada ", jornada) as fullgrado, id'))->where('ciclo_id', $ciclos->id)->orderBy('nombre','ASC')->orderBy('grado', 'ASC')->lists('fullgrado', 'id');

      /*Grado del ciclo anterior para busqueda por nombre o carnet*/
       $grados3=grado::where('ciclo_id', $cicloanterior->id)->select('id')->get();

            if($request->nombres){
         $alumnos= alumno::search($request->nombres)->whereIn('grado_id', $grados3)->orderBy('apellidos', 'ASC')->paginate(100);
         return view('admin.traslados.index', compact('alumnos', 'grados', 'grados2', 'gradoanterior'));
                }
            else {
             $alumnos= alumno::buscar($request->grado_id)->orderBy('apellidos', 'ASC')->paginate(100);
             return view('admin.traslados.index', compact('alumnos', 'grados', 'grados2', 'gradoanterior'));
            }     
        
        }
        else{
            flash('No hay ciclo anterior para trasladar alumnos')->error()->important();
             return redirect()->route('admin.alumnos.index');
        }

        
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
    public function store(Request $request)
    {
       
   
        $ciclos=ciclo::where('activo', 1)->first(); /*Ciclo Activo*/
        $cantidad=count($request->id_alumno);
        $alumnosrepetidos=0;
        $alumnostrasladados=0;
         $gradosactual=grado::where('ciclo_id',  $ciclos->id)->select(['id'])->get(); /*Grados del ciclo activo*/

 
        for ($i=0; $i<$cantidad ; $i++) { 
             $totalalumnos=alumno::all(); /*Se cuenta total de alumnos*/
             $ultimoAgregado=$totalalumnos->last(); /*se obtiene el ultimo agregado a la tabla*/
            $alumnos=alumno::where('id', $request->id_alumno[$i])->first();
            /*Se busca el alumno dentro de los alumnos ya en grado nuevo por medio de su id*/
            $alumnosactual=count(alumno::where('carnet', $alumnos->carnet)->whereIn('grado_id', $gradosactual)->get()); 
            
            if ($alumnosactual>0){
                  $alumnosrepetidos= $alumnosrepetidos+1;
            }
            else{
                 $hoy = date("Y-m-d");
                $alumno= new alumno();
                $alumno->fecha=$hoy;
                $alumno->nombres=$alumnos->nombres;
                $alumno->apellidos=$alumnos->apellidos;
                $alumno->encargado=$alumnos->encargado;
                $alumno->telefono=$alumnos->telefono;
                $alumno->carnet=$alumnos->carnet;
                $alumno->alumnonuevo="no";
                $alumno->grado_id=$request->nuevogrado_id;
                $alumno->correlativo=$ultimoAgregado->correlativo+1;
                $alumno->save();
                $alumnostrasladados=$alumnostrasladados+1;
           }

            }
            flash('Trasladados '.$alumnostrasladados.' Correctos '. $alumnosrepetidos . ' Incorrectos')->success()->important();
            return redirect()->route('admin.traslados.index');
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
    public function update(Request $request, $id)
    {
       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

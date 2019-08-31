<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\MesRequest;
use App\Http\Controllers\Controller;
use App\alumno;
use App\mes;
use App\colegiatura;
use Laracasts\Flash\Flash;
use App\carrera;
use App\grado;
use DB;
use App\Http\Requests\ColegiaturaRequest;
use App\ciclo;



class ColegiaturasController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {  
      $colegiaturas=colegiatura::where('alumno_id', $id)->select('mes_id')->get();
      $meses=DB::table('meses')->wherenotin('id', $colegiaturas)->lists('nombre', 'id');
  
      $alumno=Alumno::Find($id);
      return view('admin.colegiaturas.create', compact('alumno', 'meses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColegiaturaRequest $request)
    {
        $cantidad=count($request->mes_id);
          for ($i=0; $i<$cantidad ; $i++) { 
                 $colegiatura= new colegiatura();
                $colegiatura->fecha=$request->fecha;
                $colegiatura->nit=$request->nit;
                $colegiatura->nombre=$request->nombre;
                $colegiatura->numerodocumento=$request->numerodocumento;
                $colegiatura->numerofactura=$request->numerofactura;
                $colegiatura->monto=$request->monto;
                $colegiatura->descripcion=$request->descripcion;
                $colegiatura->alumno_id=$request->alumno_id;
                $colegiatura->mes_id=$request->mes_id[$i];
                $colegiatura->save();
             }

        flash('Colegiatura Guardada Exitosamente')->success()->important();
        return redirect()->route('admin.colegiaturas.detalles', $colegiatura->alumno_id);
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
        $meses=Mes::orderBy('id', 'ASC')->lists('nombre', 'id');
        $colegiaturas=colegiatura::Find($id);
        $mymeses=$colegiaturas->mes_id;
      
        $alumno=Alumno::Find($colegiaturas->alumno_id);

        return view('admin.colegiaturas.edit', compact('colegiaturas', 'alumno', 'meses', 'mymeses'));
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

        $colegiaturas=colegiatura::Find($id);
        $colegiaturas->Fill($request->all());
        $colegiaturas->save();

       

        flash('La colegiatura se ha sido editada con éxito')->warning()->important();
        return redirect()->route('admin.colegiaturas.detalles', $colegiaturas->alumno_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $colegiaturas= colegiatura::Find($id);
        $colegiaturas->delete();

        flash('La colegiatura ha sido borrado de forma exitosa')->error()->important();
        return redirect()->route('admin.colegiaturas.detalles', $colegiaturas->alumno_id);
    }

     public function detalles($id)
    {

        $colegiaturas= colegiatura::where('alumno_id', $id)->orderby('mes_id', 'ASC')->paginate(12);
        
        $alumno=Alumno::Find($id);

       
    
        return view('admin.colegiaturas.index', compact ('colegiaturas','alumno'));

    }

    public function solvencias($id)
    {
        $alumnos=Alumno::where('grado_id', $id)->get();
        dd($alumnos->all());
    }

   public function consultagrado(Request $request)
  {
    $meses=array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Graduación", "Inscripción");

    $ciclos=ciclo::where('activo', 1)->first(); /*Ciclo Activo*/

    $grados=grado::select(DB::raw('concat (grado, " ", nombre) as fullgrado, id'))->where('ciclo_id', $ciclos->id)->orderBy('nombre','ASC')->orderBy('grado', 'ASC')->lists('fullgrado', 'id');



    if ($request->nombres){
        $alumnos=alumno::Search($request->nombres)->orderby('apellidos','ASC')->get();
        $alumnos2=alumno::Search($request->nombres)->select(['id'])->get();
         $colegiaturas= colegiatura::WhereIn('alumno_id', $alumnos2)->orderby('mes_id','ASC')->orderby('alumno_id', 'ASC')->get();
       
        return view('admin.colegiaturas.consultagrado', compact ('colegiaturas', 'alumnos', 'grados', 'meses'));
    }
    else {
        $alumnos=alumno::buscar($request->grado_id)->orderby('apellidos','ASC')->get();
        $alumnos2=alumno::buscar($request->grado_id)->select(['id'])->get();
        $colegiaturas= colegiatura::WhereIn('alumno_id', $alumnos2)->orderby('mes_id','ASC')->orderby('alumno_id', 'ASC')->get();
 
        return view('admin.colegiaturas.consultagrado', compact ('colegiaturas', 'alumnos', 'grados', 'meses'));
        }
  }

  public function alumnocolegiatura($id)
  {
    $colegiaturas= colegiatura::Find($id);
    $alumnos=alumno::Find($colegiaturas->alumno_id);

  
    
    return view('admin.colegiaturas.alumnocolegiatura', compact('colegiaturas', 'alumnos'));
  }

    public function eliminar($id)
    {
        $colegiaturas= colegiatura::Find($id);
        $colegiaturas->delete();

        flash('La colegiatura ha sido borrado de forma exitosa')->error()->important();
        return redirect()->route('admin.colegiaturas.consultagrado');
    }
}

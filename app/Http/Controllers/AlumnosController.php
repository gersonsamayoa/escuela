<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AlumnoRequest;
use App\Http\Controllers\Controller;
use App\alumno;
use App\grado;
use App\nivel;
use App\ciclo;
use DB;
use Laracasts\Flash\Flash;


class AlumnosController extends Controller
{
  
    public function index(Request $request)
    {
       
        $contador=1;
      $ciclos=ciclo::where('activo', 1)->first(); /*Ciclo Activo*/
     
      $grados=grado::select(DB::raw('concat (grado, " ", nombre) as fullgrado, id'))->where('ciclo_id', $ciclos->id)->orderBy('nombre','ASC')->orderBy('grado', 'ASC')->lists('fullgrado', 'id');

      /*Grados de ciclo actual*/
      $gradosactual=grado::where('ciclo_id',  $ciclos->id)->select(['id'])->get();
 
      if($request->nombres){
        $alumnos=alumno::search($request->nombres)->orderBy('apellidos', 'ASC')->whereIn('grado_id', $gradosactual)->paginate(50);
          /*return view('admin.alumnos.index')->with ('alumnos', $alumnos);*/
          return view('admin.alumnos.index', compact('alumnos', 'grados', 'contador', 'ciclos'));
      }else {
        $alumnos= alumno::buscar($request->grado_id)->orderBy('apellidos', 'ASC')->whereIn('grado_id', $gradosactual)->paginate(50);
        /*return view('admin.alumnos.index')->with ('alumnos', $alumnos);*/
        return view('admin.alumnos.index', compact('alumnos', 'grados', 'contador', 'ciclos'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciclos=ciclo::where('activo', 1)->first(); /*Ciclo Activo*/
        $niveles=nivel::orderBy('id','ASC')->lists('nombre', 'id');
        $grados=grado::select(DB::raw('concat (grado, " ", nombre) as fullgrado, id'))->where('ciclo_id', $ciclos->id)->orderBy('nombre','ASC')->orderBy('grado', 'ASC')->lists('fullgrado', 'id');

        return view('admin.alumnos.create', compact('niveles', 'grados'));
    }

    /*Metodo para llenar combos anidados*/
    public function getGrados(Request $request, $id)
    {
      if($request->ajax()){
        $grados=grado::grados($id);
            return response()->json($grados);
        }
    }

    public function getGrados2(Request $request, $id)
    {
      if($request->ajax()){
        $grados=grado::grados2($id);
            return response()->json($grados);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumnoRequest $request)
    {

        $hoy = date("Y-m-d");
        $nombres=alumno::where('nombres', $request->nombres)->where('grado_id', $request->grado_id)->get();
        $apellidos=alumno::where('apellidos', $request->apellidos)->where('grado_id', $request->grado_id)->get();
        $totalalumnos=alumno::all(); /*Se cuenta total de alumnos*/
        $ultimoAgregado=$totalalumnos->last(); /*se obtiene el ultimo agregado a la tabla*/

        if ($nombres->all() OR $apellidos->all())
        {
        $alumno= new alumno();
        $alumno->fecha=$hoy;
        $alumno->nombres=$request->nombres;
        $alumno->apellidos=$request->apellidos;
        $alumno->fechanacimiento=$request->fechanacimiento;
        $alumno->encargado=$request->encargado;
        $alumno->dpiencargado=$request->dpiencargado;
        $alumno->profesionencargado=$request->profesionencargado;
        $alumno->direccionencargado=$request->direccionencargado;
        $alumno->relacionencargado=$request->relacionencargado;
        $alumno->emailencargado=$request->emailencargado;
        $alumno->edadencargado=$request->edadencargado;
        $alumno->estadocivilencargado=$request->estadocivilencargado;
        $alumno->nacionalidadencargado=$request->nacionalidadencargado;
        $alumno->telefono=$request->telefono;
        $alumno->telefono2=$request->telefono2;
        $alumno->telefono3=$request->telefono3;
        $alumno->carnet=$request->carnet;
        $alumno->correlativo=$ultimoAgregado->correlativo+1;
        $alumno->alumnonuevo=$request->alumnonuevo;
        $alumno->grado_id=$request->grado_id;
        $alumno->save();

        flash('Alumno Guardado con Nombre o Apellidos Repetido')->success()->warning();
        return redirect()->route('admin.alumnos.index',  $request->except('nombres'));
        }
        else
        {
        $alumno= new alumno();
        $alumno->fecha=$hoy;
        $alumno->nombres=$request->nombres;
        $alumno->apellidos=$request->apellidos;
        $alumno->fechanacimiento=$request->fechanacimiento;
        $alumno->encargado=$request->encargado;
        $alumno->dpiencargado=$request->dpiencargado;
        $alumno->profesionencargado=$request->profesionencargado;
        $alumno->direccionencargado=$request->direccionencargado;
        $alumno->relacionencargado=$request->relacionencargado;
        $alumno->emailencargado=$request->emailencargado;
        $alumno->edadencargado=$request->edadencargado;
        $alumno->estadocivilencargado=$request->estadocivilencargado;
        $alumno->nacionalidadencargado=$request->nacionalidadencargado;
        $alumno->telefono=$request->telefono;
        $alumno->telefono2=$request->telefono2;
        $alumno->telefono3=$request->telefono3;
        $alumno->carnet=$request->carnet;
        $alumno->correlativo=$ultimoAgregado->correlativo+1;
        $alumno->alumnonuevo=$request->alumnonuevo;
        $alumno->grado_id=$request->grado_id;
        $alumno->save();

        flash('Alumno Guardado Exitosamente')->success()->important();
        return redirect()->route('admin.alumnos.index',  $request->except('nombres'));
        
        }
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
        $ciclos=ciclo::where('activo', 1)->first(); /*Ciclo Activo*/
        $alumno=Alumno::Find($id);
        $niveles=nivel::orderBy('nombre','ASC')->lists('nombre', 'id');
        $grados=grado::select(DB::raw('concat (grado, " ", nombre, " Jornada ", jornada) as fullgrado, id'))->where('ciclo_id', $ciclos->id)->orderBy('nombre','ASC')->orderBy('grado', 'ASC')->lists('fullgrado', 'id');


        return view('admin.alumnos.edit', compact('alumno', 'grados', 'niveles'));
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
        $alumno=alumno::Find($id);
         $alumno->nombres=$request->nombres;
        $alumno->apellidos=$request->apellidos;
        $alumno->fechanacimiento=$request->fechanacimiento;
        $alumno->encargado=$request->encargado;
        $alumno->dpiencargado=$request->dpiencargado;
        $alumno->profesionencargado=$request->profesionencargado;
        $alumno->direccionencargado=$request->direccionencargado;
        $alumno->relacionencargado=$request->relacionencargado;
        $alumno->emailencargado=$request->emailencargado;
        $alumno->edadencargado=$request->edadencargado;
        $alumno->estadocivilencargado=$request->estadocivilencargado;
        $alumno->nacionalidadencargado=$request->nacionalidadencargado;
        $alumno->telefono=$request->telefono;
        $alumno->telefono2=$request->telefono2;
        $alumno->telefono3=$request->telefono3;
        $alumno->carnet=$request->carnet;
        $alumno->alumnonuevo=$request->alumnonuevo;
        $alumno->grado_id=$request->grado_id;
  
        $alumno->save();
        $request = new Request();

        flash('La alumno '. $alumno->nombres . ' ' . $alumno->apellidos . ' ha sido editada con éxito')->warning()->important();

        $request->merge(['grado_id'=> $alumno->grado_id]);

        return redirect()->route('admin.alumnos.index',  $request->except('nombres'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request = new Request();
        $alumno= alumno::Find($id);
        $alumno->delete();
       flash('Alumno ' . $alumno->nombre . ' ha sido eliminado de forma exitosa')->error()->important();
       
       $request->merge(['grado_id'=> $alumno->grado_id]);

    return redirect()->route('admin.alumnos.index',  $request->except('nombres'));
    }

}

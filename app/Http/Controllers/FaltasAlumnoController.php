<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\alumno_falta;
use App\alumno;
use App\falta;
use DB;

class FaltasAlumnoController extends Controller
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
        $cantidadfaltas=alumno_falta::where('alumno_id', $id)->select('falta_id')->count(); //contamos cantidad de faltas que lleva el alumno
   
        if ($cantidadfaltas<5)
        {
          $faltas=DB::table('faltas')->lists('descripcion', 'id');
        }
        else
        {
            flash('El alumno ya tiene demasiadas faltas')->error()->important();
            return redirect()->route('admin.faltasalumno.detalles', $id);
            
        }
    
        $alumno=Alumno::Find($id);
        return view('admin.faltasalumno.create', compact('alumno', 'faltas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
                $alumno_falta= new alumno_falta($request->all());
                $alumno_falta->save();
             

        flash('Falta Guardada Exitosamente')->success()->important();
        return redirect()->route('admin.faltasalumno.detalles', $alumno_falta->alumno_id);
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
        $faltas=falta::orderBy('id', 'ASC')->lists('descripcion', 'id');
        $alumno_faltas=alumno_falta::Find($id);
        $myfaltas=$alumno_faltas->falta_id;
      
        $alumno=Alumno::Find($alumno_faltas->alumno_id);

        return view('admin.faltasalumno.edit', compact('alumno_faltas', 'alumno', 'faltas', 'myfaltas'));
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
        $alumno_faltas=alumno_falta::Find($id);
        $alumno_faltas->Fill($request->all());
        $alumno_faltas->save();

       

        flash('La Falta ha sido editada con éxito')->warning()->important();
        return redirect()->route('admin.faltasalumno.detalles', $alumno_faltas->alumno_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno_faltas= alumno_falta::Find($id);
        $alumno_faltas->delete();

        flash('La Falta ha sido borrado de forma exitosa')->error()->important();
        return redirect()->route('admin.faltasalumno.detalles', $alumno_faltas->alumno_id);
    }

    public function detalles($id)
    {
        $faltas= alumno_falta::where('alumno_id', $id)->orderby('id', 'ASC')->paginate(12);
        
        $alumno=Alumno::Find($id);
  
        return view('admin.faltasalumno.index', compact ('faltas','alumno'));

    }
}

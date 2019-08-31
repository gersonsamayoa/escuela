<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\curso;
use App\grado;
use App\nivel;
use DB;


class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $grados=grado::find($id);
        return view('admin.cursos.create', compact('grados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cursos=new curso();
        $cursos->nombre=$request->nombre;
        $cursos->grado_id=$request->grado_id;
        $cursos->save();
        flash('Curso Guardado Exitosamente')->success()->important();;
        return redirect()->route('admin.grados.cursos.show', $request->grado_id );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grados=grado::find($id);
        $cursos=curso::where('grado_id', $id)->get();
        return view('admin.cursos.index', compact('cursos', 'grados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cursos=curso::find($id);
        $grados=grado::find($cursos->grado_id);
        
        return view ('admin.cursos.edit', compact('cursos', 'grados'));

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
        $cursos=curso::find($id);
        $cursos->fill($request->all());
        $cursos->save();

        flash('El curso '. $cursos->nombre . ' ha sido guardado exitosamente')->warning()->important();

        return redirect()->route('admin.grados.cursos.show', $request->grado_id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $cursos=curso::Find($id);
      $cursos->delete();

      flash('El curso '. $cursos->nombre . ' Ha sido borrado de forma exitosa')->error()->important();
      return redirect()->route('admin.grados.cursos.show', $cursos->grado_id );
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ciclo;

class CiclosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciclos= ciclo::orderby('descripcion', 'ASC')->paginate(10);
        return view('admin.ciclos.index', compact('ciclos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ciclos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $ciclos1=ciclo::where('activo', 1)->get();
      
      if($ciclos1 and $request->activo){
        flash('No es posible guardar ciclo activo ya existe un ciclo Activo')->error()->important();
      return redirect()->route('admin.ciclos.index');
      }
      else{
          $ciclos=new ciclo($request->all());
          $ciclos->save();
          flash('Ciclo Guardado Exitosamente')->success()->important();
          return redirect()->route('admin.ciclos.index');
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
      $ciclos=ciclo::Find($id);
      return view('admin.ciclos.edit', compact('ciclos'));
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
      $ciclos=ciclo::Find($id);
      $ciclos1=ciclo::where('activo', 1)->first();
      
      if($ciclos1 and $request->activo){
        $ciclos1->activo=0;
        $ciclos1->save();
        $ciclos->Fill($request->all());
        $ciclos->save();

        flash('El Nivel '. $ciclos->descripcion . ' ha sido editada con éxito')->warning()->important();
        return redirect()->route('admin.ciclos.index');
      }
      else{
        $ciclos->Fill($request->all());
        $ciclos->save();

        flash('El Nivel '. $ciclos->descripcion . ' ha sido editada con éxito')->warning()->important();
        return redirect()->route('admin.ciclos.index');
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $ciclos= ciclo::Find($id);
      $ciclos->delete();

      flash('El Nivel ' . $ciclos->descripcion . ' ha sido eliminado de forma exitosa')->error()->important();
      return redirect()->route('admin.ciclos.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\falta;

class FaltasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faltas=falta::orderby('id', 'ASC')->paginate(4);
        return view('admin.faltas.index')->with('faltas', $faltas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faltas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faltas=new  falta($request->all());
        $faltas->save();
        flash('Mes Guardado Exitosamente')->success()->important();
        return redirect()->route('admin.faltas.index');
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
        $faltas=falta::Find($id);
        return view('admin.faltas.edit')->with('faltas', $faltas);
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
        $faltas=falta::Find($id);
        $faltas->Fill($request->all());
        $faltas->save();

        flash('La falta '. $faltas->descripcion . ' ha sido editada con éxito')->warning()->important();
        return redirect()->route('admin.faltas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faltas= falta::Find($id);
        $faltas->delete();
 
        flash('La falta ' . $faltas->descripcion . ' ha sido borrado de forma exitosa')->error()->important();
        return redirect()->route('admin.faltas.index');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\nivel;
use Laracasts\Flash\Flash;

class NivelesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $niveles=nivel::orderby('id', 'ASC')->paginate(4);
        return view('admin.niveles.index')->with('niveles', $niveles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.niveles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $niveles=new nivel($request->all());
      $niveles->save();
      flash('Nivel Guardado Exitosamente')->success()->important();
      return redirect()->route('admin.niveles.index');
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
      $niveles=nivel::Find($id);
      return view('admin.niveles.edit')->with('niveles', $niveles);
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
      $niveles=nivel::Find($id);
      $niveles->Fill($request->all());
      $niveles->save();

      flash('El Nivel '. $niveles->nombre . ' ha sido editada con éxito')->warning()->important();
      return redirect()->route('admin.niveles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $niveles= nivel::Find($id);
      $niveles->delete();

      flash('El Nivel ' . $niveles->nombre . ' ha sido eliminado de forma exitosa')->error()->important();
      return redirect()->route('admin.niveles.index');
    }
}

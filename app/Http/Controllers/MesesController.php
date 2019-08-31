<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\mes;
use Laracasts\Flash\Flash;

class MesesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meses= mes::orderBy('id', 'ASC')->get();
        return view('admin.meses.index')->with ('meses', $meses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.meses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $meses=new  mes($request->all());
        $meses->save();
        flash('Mes Guardado Exitosamente')->success()->important();
        return redirect()->route('admin.meses.index');
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
        $meses=mes::Find($id);
        return view('admin.meses.edit')->with('meses', $meses);
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
        $meses=mes::Find($id);
        $meses->Fill($request->all());
        $meses->save();

        flash('El Mes '. $meses->nombre . ' ha sido editada con éxito')->warning()->important();
        return redirect()->route('admin.meses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       $meses= mes::Find($id);
       $meses->delete();

       flash('El Pago ' . $meses->nombre . ' ha sido borrado de forma exitosa')->error()->important();
       return redirect()->route('admin.meses.index');
    }
}

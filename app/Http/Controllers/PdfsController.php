<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\alumno;
use App\colegiatura;
use App\mes;
use App\grado;
use App\alumno_falta;
use Barryvdh\DomPDF\Facade as PDF;

class PdfsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

      $faltas=alumno_falta::find($id);
      $pdf	= PDF::loadview('admin.alumnos.reporte', ['faltas' => $faltas]);
      return $pdf->stream('archivo.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function compromiso($id)
    {
        $alumnos=alumno::find($id);
        $grados=grado::find($alumnos->grado_id);
        $hoy=date("Y");
        $edad=$hoy-(date('Y', strtotime($alumnos->fechanacimiento)));

        $pdf=new PDF();
        $paper_size = array(0,0,609.4488,935.433);
   
        if($grados->nivel_id==2 OR $grados->nivel_id==1){
            $pdf=PDF::loadview('admin.alumnos.compromisoprimariapdf',compact('alumnos', 'edad'))->setpaper($paper_size);;
        
            return $pdf->stream('compromiso.pdf');}
        else {
            $pdf=PDF::loadview('admin.alumnos.compromisopdf',compact('alumnos', 'edad'))->setpaper($paper_size);;
        
            return $pdf->stream('compromiso.pdf');

        }
      
    }

    public function contrato($id)
    {
        $alumnos=alumno::find($id);
        $grados=grado::find($alumnos->grado_id);
        $hoy=date("Y");
        $edad=$hoy-(date('Y', strtotime($alumnos->fechanacimiento)));

        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $mes=date('F', strtotime($alumnos->fecha));
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);

        $pdf=new PDF();
        $paper_size = array(0,0,609.4488,935.433);
   
        if($grados->nivel_id==2 OR $grados->nivel_id==1){
            $pdf=PDF::loadview('admin.alumnos.contratoprimariapdf',compact('alumnos', 'edad', 'nombreMes'))->setpaper($paper_size);;
        
            return $pdf->stream('contrato.pdf');}
        else {
            $pdf=PDF::loadview('admin.alumnos.contratopdf',compact('alumnos', 'edad', 'nombreMes'))->setpaper($paper_size);;
        
            return $pdf->stream('contrato.pdf');

        }
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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

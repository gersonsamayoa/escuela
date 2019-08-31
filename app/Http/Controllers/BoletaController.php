<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\alumno;
use App\grado;
use App\curso;
use App\alumno_curso;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection as Collection;
use Barryvdh\DomPDF\Facade as PDF;


class BoletaController extends Controller
{
   
    public function index($idalumno)
    {
        $totalpromedio=0;
        $totalcursos=0;
        $totalbim1=0;
        $totalbim2=0;
        $totalbim3=0;
        $totalbim4=0;
        $alumnos=alumno::find($idalumno);
        $grados=grado::find($alumnos->grado_id);

        /*Cursos del nuevo grado 2019*/
        $cursos2=curso::where('grado_id', $alumnos->grado_id)->orderby('id')->select(['id'])->get();

        $alumnos2=alumno_curso::where('alumno_id', $idalumno)->whereIn('curso_id', $cursos2)->orderby('curso_id', 'ASC')->get();

       foreach ($alumnos2 as $alumno) {
            $totalpromedio=$totalpromedio+$alumno->promedio;
            $totalcursos=$totalcursos+1;
            $totalbim1=$totalbim1+$alumno->bim1;
            $totalbim2=$totalbim2+$alumno->bim2;
            $totalbim3=$totalbim3+$alumno->bim3;
            $totalbim4=$totalbim4+$alumno->bim4;
        }
        if($totalcursos>0){
        $totalpromedio=$totalpromedio/$totalcursos;
        $totalbim1=$totalbim1/$totalcursos;
        $totalbim2=$totalbim2/$totalcursos;
        $totalbim3=$totalbim3/$totalcursos;
        $totalbim4=$totalbim4/$totalcursos;
        }

        return view('admin.calificaciones.boleta', compact('alumnos', 'grados', 'alumnos2', 'totalpromedio', 'totalbim1','totalbim2','totalbim3','totalbim4'));
    }

    public function imprimir($idalumno)
    {
        $totalpromedio=0;
        $totalcursos=0;
        $totalbim1=0;
        $totalbim2=0;
        $totalbim3=0;
        $totalbim4=0;
        $alumnos=alumno::find($idalumno);
        $grados=grado::find($alumnos->grado_id);

        /*Cursos del nuevo grado 2019*/
        $cursos2=curso::where('grado_id', $alumnos->grado_id)->orderby('id')->select(['id'])->get();

        $alumnos2=alumno_curso::where('alumno_id', $idalumno)->whereIn('curso_id', $cursos2)->orderby('curso_id', 'ASC')->get();

        foreach ($alumnos2 as $alumno) {
            $totalpromedio=$totalpromedio+$alumno->promedio;
            $totalcursos=$totalcursos+1;
            $totalbim1=$totalbim1+$alumno->bim1;
            $totalbim2=$totalbim2+$alumno->bim2;
            $totalbim3=$totalbim3+$alumno->bim3;
            $totalbim4=$totalbim4+$alumno->bim4;
        }
        if($totalcursos>0){
        $totalpromedio=$totalpromedio/$totalcursos;
        $totalbim1=$totalbim1/$totalcursos;
        $totalbim2=$totalbim2/$totalcursos;
        $totalbim3=$totalbim3/$totalcursos;
        $totalbim4=$totalbim4/$totalcursos;
        }

        $pdf=new PDF();

         if($grados->nivel_id==2 OR $grados->nivel_id==1){
        $pdf=PDF::loadview('admin.calificaciones.boletaprimpdf',compact('alumnos', 'grados', 'alumnos2', 'totalpromedio', 'totalbim1','totalbim2','totalbim3','totalbim4'));
  
        return $pdf->stream('archivo.pdf');}
        else{
        $pdf=PDF::loadview('admin.calificaciones.boletapdf',compact('alumnos', 'grados', 'alumnos2', 'totalpromedio', 'totalbim1','totalbim2','totalbim3','totalbim4'));
  
        return $pdf->stream('archivo.pdf');
        }
    }

    public function BoletaporGrado($idgrado)
    {
        $totalpromedio=0;
        $totalcursos=0;
        $totalbim1=0;
        $totalbim2=0;
        $totalbim3=0;
        $totalbim4=0;
        $contador[]="";
        $grados=grado::find($idgrado);
        $totalcursos=count(curso::where('grado_id', $idgrado)->get());
        $alumnos=alumno::where('grado_id', $idgrado)->orderby('apellidos', 'ASC')->get();

        $alumnos3 = alumno::where('grado_id','=',$idgrado)->select(['id'])->get();

        /*Cursos del nuevo grado 2019*/
        $cursos2=curso::where('grado_id', $idgrado)->orderby('id')->select(['id'])->get();
        
        $alumnos2=alumno_curso::wherein('alumno_id',$alumnos3)->whereIn('curso_id', $cursos2)->orderby('alumno_id', 'ASC')->orderby('curso_id', 'ASC')->get();


        return view('admin.calificaciones.boletaporgrado', compact('alumnos',
            'alumnos2', 'grados', 'totalpromedio', 'totalcursos', 'totalbim1','totalbim2','totalbim3','totalbim4'));
    }

    public function ImprimirPorGrado($idgrado)
    {
        $totalpromedio=0;
        $totalcursos=0;
        $totalbim1=0;
        $totalbim2=0;
        $totalbim3=0;
        $totalbim4=0;
        $grados=grado::find($idgrado);

        $totalcursos=count(curso::where('grado_id', $idgrado)->get());
        $alumnos=alumno::where('grado_id', $idgrado)->orderby('apellidos', 'ASC')->get();

        $alumnos3 = alumno::where('grado_id','=',$idgrado)->select(['id'])->get();
   
        $cursos2=curso::where('grado_id', $idgrado)->orderby('id')->select(['id'])->get();

        /*Cursos del nuevo grado*/
        $alumnos2=alumno_curso::wherein('alumno_id',$alumnos3)->whereIn('curso_id', $cursos2)->orderby('alumno_id', 'ASC')->orderby('curso_id', 'ASC')->get();

        $pdf=new PDF();
        if($grados->nivel_id==2 OR $grados->nivel_id==1){
        $pdf=PDF::loadview('admin.calificaciones.boletaporgradoprimpdf',compact('alumnos',
            'alumnos2', 'grados', 'totalpromedio', 'totalcursos', 'totalbim1','totalbim2','totalbim3','totalbim4'));}
        else{
            $pdf=PDF::loadview('admin.calificaciones.boletaporgradopdf',compact('alumnos',
            'alumnos2', 'grados', 'totalpromedio', 'totalcursos', 'totalbim1','totalbim2','totalbim3','totalbim4'));}
  
        return $pdf->stream('archivo.pdf');

    }

   
    public function create()
    {
       
    }

   
    public function store(Request $request)
    {
       
    }

    public function show($id)
    {
       
    }

   
    public function edit($id)
    {
     
    }

    public function update(Request $request, $id)
    {
       
    }

    public function destroy($id)
    {
       
    }
}

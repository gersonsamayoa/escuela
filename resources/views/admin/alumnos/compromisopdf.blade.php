<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Compromiso de Estudios</title>
    <style type="text/css">
      html {
    margin: 0;
    }
    body {
    margin: 4mm 10mm 10mm 10mm;
    }
    </style>
  </head>
  <body>
    <table width="100%" border="1">
      <tr>
        <td width="15%" align="center">
        <img src="http://colegio.cts.edu.gt/img/logo-header1.png" width="70px">
        </td>
        <td width="85%" align="center">
        <p><b>COLEGIO TÉCNICO DE COMPUTACIÓN “C.T.S.” <br> EDUCANDO CON TECNOLOGÍA PARA LA VIDA</b> <br>
        <font size="1">COLONIA VISTA HERMOSA, CHIQUIMULILLA, STA. ROSA<br>TEL. 7885-1522</font> </p>
        </td>
      </tr>
      </table>
      <table width="100%" border="1" cellpadding="0" cellspacing="0">
      <tr>
        <td valing="top" align="right">
        <font size="2">Carné alumno: <u>{{$alumnos->carnet}}</u></font><br><br></td>
      </tr>
      <tr>
        <td align="center"><b><font size="2">COMPROMISO DE RESPONSABILIDADES DE ESTUDIO Y PRESTACIÓN DE SERVICIOS<br>
        EDUCATIVOS PARA EL CICLO DIVERSIFICADO.</font><br></b></td>
      </tr>
      </td>
      </tr>
      </table>
      <p align="justify">En Chiquimulilla, Santa Rosa, el día <u>{{date('d/m/Y', strtotime($alumnos->fecha))}}</u> ante el Infrascrito Director de este Colegio, se presenta el (la) señor (a): <b><u>{{$alumnos->encargado}}</u></b>, mayor de edad, quien se identifica mediante el DPI, con Código Único de Identificación No: <u>{{$alumnos->dpiencargado}}</u> emitido por RENAP, de Profesión u oficio: <u>{{$alumnos->profesionencargado}}</u> con dirección en: <u>{{$alumnos->direccionencargado}}</u> Teléfono No: <u>{{$alumnos->telefono}}</u> manifiesta que es <u>{{$alumnos->relacionencargado}}</u> de: <u>{{$alumnos->nombres . ", " . $alumnos->apellidos}}</u> de: <u>{{$edad}}</u> años de edad y que por este medio lo inscribe en el grado de: <u>{{ $alumnos->grado->grado . " " .$alumnos->grado->nombre }}</u> del nivel: <u>{{ $alumnos->grado->nivel->nombre}}</u>
       y por este acto suscriben el presente COMPROMISO DE RESPONSABILIDADES DE ESTUDIOS Y PRESTACIÓN DE SERVICIOS EDUCATIVOS; de acuerdo a las cláusulas que se señalan  de la manera siguiente:<br><br> <b>PRIMERA:</b> el alumno (a) se compromete a cumplir con las obligaciones que establecen los ARTICULOS Nos. 34 y 35 de la Ley de Educación Nacional, Decreto No. 12-91 del Congreso de La República, con el Acuerdo Ministerial No. 001-2011 NORMATIVA DE CONVIVENCIA PACÍFICA Y DISCIPLINA emitido por el MINEDUC de fecha 03 de enero de 2011, y con el REGLAMENTO INTERNO DEL COLEGIO TÉCNICO DE COMPUTACIÓN CTS, autorizado según Resolución No. 092-2006 de fecha 23-11-2006 de la Dirección Departamental de Educación de Santa Rosa y con lo siguiente:<br><br>

a). Cumplir con todas las obligaciones inherentes a su calidad de alumno (a) y las que sean establecidas por la Dirección del Colegio, Personal Técnico-Administrativo y Personal Docente.<br><br>

b). Respetar a las Autoridades Técnico-Administrativas, a los Docentes, estudiantes del Colegio y personal de servicio.<br><br>

c). Observar buena conducta en todos sus actos, tanto dentro como fuera del Colegio.<br><br>
 
d). Asistir diariamente y puntual a sus clases.  Si por causa justificada no pudiera hacerlo  el padre de familia o encargado deberá presentar excusa por escrito a la Dirección del Colegio.<br><br>

e). Abstenerse de participar tanto dentro como fuera de este Colegio, en actividades no autorizadas por la Dirección del mismo.<br><br>

f). Colaborar por mantener en buenas condiciones el edificio, mobiliario y equipo y demás bienes del Colegio. En caso de deterioro o destrucción parcial o total el padre, madre, tutor o encargado deberá  pagar íntegramente el valor de los daños en donde resulte responsable su hijo (a).<br><br>

g). Asistir al Colegio debidamente uniformado y con buena presentación de acuerdo a lo establecido por la Dirección del Establecimiento, en caso contrario no se le permitirá el ingreso tanto en horarios de la mañana como por la tarde.<br><br>

h). Rendir el respeto que se merecen nuestros Símbolos Patrios, participar en actos  y  en eventos de carácter Social, Cultural, Deportivos y Cívicos que se programen por parte del Colegio o por el Ministerio de Educación. Quedan excluidos los estudiantes que por razones de credo no les permitan en su congregación participar.<br><br>

i). Abstenerse de salir del establecimiento durante el horario de clases sin autorización de la Dirección del Colegio.<br><br>

j). Entregar a su padre, madre, tutor o encargado, información que a ellos corresponda.<br><br>

k). Es prohibido el ingreso de cualquier objeto punzo cortante, arma de fuego, sustancia o material corrosivo, inflamables y sustancias prohibidas por la ley que pudiera poner en peligro la integridad física y mental de la comunidad educativa.<br><br>

l). No se permite el ingreso ni utilización de teléfonos celulares dentro de las instalaciones del Colegio.<br><br>

m). Regirse al horario de clases establecidas por la Dirección del Colegio.<br><br>

n). Dirigirse directamente a su casa cuando por cualquier motivo sea retirado del establecimiento antes de la hora de salida.  El Colegio no se responsabiliza de lo que al estudiante le suceda por quedarse en lugares no apropiados.<br><br>

o). Permanecer dentro de su aula durante el periodo de clases y en periodos libres.<br><br>

<b>SEGUNDA:</b> el señor padre o madre, tutor o encargado (a)  se compromete y responsabiliza por lo siguiente:<br><br>

a). Apoyar la orientación del Proceso Educativo de su hijo (a).<br><br>

b). Respetar a las Autoridades Técnico-Administrativas, a los Docentes, estudiantes del Colegio y personal de servicio.<br><br>

c). Velar porque su hijo(a) cumpla con todo lo consignado en la Primera Cláusula de este Compromiso de Responsabilidades de Estudio y con todas las medidas disciplinarias que disponga la Dirección del Colegio.<br><br>

d). Responder en forma directa y personal por el pago de daños y deterioro considerados en los incisos f) y p) de la primera cláusula de este compromiso de responsabilidades de estudio o por perdidas de objetos en donde el alumno (a) resulte responsable.<br><br>

e). Asistir a las reuniones planificadas por la Dirección del Colegio y cuando su presencia sea requerida.<br><br>

f). Cancelar las cuotas de Colegiaturas mensuales a más tardar el día 5 de cada mes.<br><br>

g). Presentar por escrito 24 horas después de una ausencia de su hijo o hija la justificación correspondiente ante la dirección<br><br>

h). Aportar una cuota económica para la celebración del aniversario del Colegio de acuerdo a las actividades planificadas.<br><br>

i). Estar solvente de pagos en el tiempo establecido por la Dirección para recibir calificaciones de su hijo (a).<br><br>

<b>TERCERA:</b>  para garantizar la buena disciplina del Colegio así como para sancionar las faltas en que incurra el alumno (a) la Dirección del Colegio podrá hacer uso de las sanciones contenidas en el Acuerdo No. 001-2011 Normativa de Convivencia Pacífica y disciplina; y el Reglamento Interno del Colegio, tomando como última medida el retiro definitivo del o la estudiante y la consecuente cancelación de su código estudiantil.<br><br>

<b>CUARTA:</b> cuando el alumno (a) cometa actos que sean constituidos como faltas y delitos, dentro o fuera del Colegio, será procesado conforme a las leyes del país, eximiendo de cualquier responsabilidad al Colegio por los hechos y actos que cometiera el estudiante.<br><br>

<b>QUINTA:</b> Los suscritos, plenamente conscientes del contenido, alcances y efectos del presente COMPROMISO DE RESPONSABILIDADES DE ESTUDIO Y PRESTACIÓN DE SERVICIOS EDUCATIVOS, lo firman juntamente con el Director del Colegio en el mismo lugar y fecha.<br><br>
  </p>

        <table width="100%">
           <tr>
            <td width="50%" align="center"><p>f._____________________________<br> (Padre, madre, tutor(a) o Encargado(a))</td>
            <td width="50%" align="center"><p><br>f._____________________________<br> Alumno(a) </p></td>
          </tr>
          <tr>
             <td colspan="2" align="center"><p>f._____________________________<br> Director </p></td>
          </tr>
        </table>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Contrato</title>
    <style type="text/css">
      html {
    margin: 0;
    }
    body {
    margin: 10mm 13mm 10mm 13mm;
    font-family: 'Helvetica';
    font-size: 14px;
    }
    p{
      font-size: 14px;
    }
    </style>
  </head>
  <body>
    <table width="100%" border="0">
      <tr>
        <td valing="top" align="left">
          <font size="2">CA-442-2016</font>
        </td>
      </tr>
      <tr>
        <td width="100%" align="center">
        <p><b><font size="4"><i>CONTRATO DE ADHESIÓN POR PRESTACIÓN DE SERVICIOS EDUCATIVOS <br> COLEGIO TÉCNICO DE COMPUTACIÓN "C.T.S."</i></font></b></p>
        </td>
      </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td valing="top" align="right">
        <font size="1"><i>Correlativo Interno Contrato No.<u>{{str_pad($alumnos->correlativo, 5 , 0, STR_PAD_LEFT)}}</u></i></font><br>
        <font size="1"><i>Aprobado y registrado según Resolución DIACO: DDC-____-2017</i></font></td>
      </tr>
      </table>
      <p align="justify">En el munipio de Chiquimulilla, del departamento de Santa Rosa, el día <u>{{date('d', strtotime($alumnos->fecha))}}</u> del mes de <u>{{$nombreMes}}</u> del año de <u>{{date('Y', strtotime($alumnos->fecha))}}</u> NOSOTROS: Luis Estuardo Gudiel Robledo, de <u>35</u> años de edad, casado, guatemalteco, Ingeniero en Sistemas, de este domicilio, me identifico con Documento Personal de Identificación, Código Único de Identificación 2295 90152 0101, extendido por el Registro Nacional de las Personas de la República de Guatemala, actuando en mi calidad de propietario del centro educativo denominado COLEGIO TÉCNICO DE COMPUTACIÓN "C.T.S", ubicado en Colonia Vista Hermosa, de este municipio, lo que acredito con: Resolución No. SAC-DTP 016-2014, de fecha 7 de noviembre del 2014, emitida por la Dirección Departamental de Educación de Santa Rosa: Y por la otra parte:</p>

      <p align="center"><b> (DATOS DEL REPRESENTANTE DEL EDUCANDO)</b></p>
      <table width="100%" border-bottom="1px" cellpadding="0" cellspacing="0" style="border-bottom:1px solid #000000">
      <tr border-bottom="1px">
        <td valing="top" align="center" border-bottom="1px">
        <i>{{$alumnos->encargado}}</i>
       </td>
      </tr>
      </table>

      <p align="center" style="margin-top: 0px"><font size="1"><b>Nombres y Apellidos</b></font></p>

      <table width="100%" cellpadding="0" cellspacing="0" >
      <tr>
        <td style="border: hidden">de:</td>
        <td width="33%" valing="top" align="center" style="border-bottom:1px solid #000000">
        <i>{{$alumnos->edadencargado}},</i>
       </td>
       <td width="33%" valing="top" align="center" style="border-bottom:1px solid #000000">
        <i>{{$alumnos->estadocivilencargado}},</i>
       </td>
       <td width="33%" valing="top" align="center" style="border-bottom:1px solid #000000">
        <i>{{$alumnos->nacionalidadencargado}},</i>
       </td>
      </tr>
      </table>

       <table width="100%" cellpadding="0" cellspacing="0" >
      <tr>
        <td style="border: hidden"><font color="white">de:</font></td>
        <td width="33%" valing="top" align="center">
        <font size="1"><b>(años de edad)</b></font>
       </td>
       <td width="33%" valing="top" align="center" >
        <font size="1"><b>(estado Civil)</b></font>
       </td>
       <td width="33%" valing="top" align="center">
        <font size="1"><b>(nacionalidad)</b></font>
       </td>
      </tr>
      </table>
      <br>

      <table width="100%" cellpadding="0" cellspacing="0" >
      <tr>
        <td width="65%" valing="top" align="center" style="border-bottom:1px solid #000000">
       <i>{{$alumnos->profesionencargado}},</i>
       </td>
       <td width="35%" valing="top" align="left" >
       <i>de este domicilio, me identifico con:</i>
       </td>
      </tr>
      </table>

      <table width="100%" cellpadding="0" cellspacing="0" >
      <tr>
        <td width="70%" valing="top" align="center">
        <font size="1"><b>(profesión u oficio)</b></font>
       </td>
       <td width="30%" valing="top" align="center" >
        <font size="1"><i><b></b></i></font>
       </td>
      </tr>
      </table>
      <br>

      <table width="100%" cellpadding="0" cellspacing="0" >
      <tr>
        <td width="100%" valing="top" align="center" style="border-bottom:1px solid #000000">
       <i>{{$alumnos->dpiencargado}},</i>
       </td>
      </tr>
      </table>

      <table width="100%" cellpadding="0" cellspacing="0" >
      <tr>
        <td width="100%" valing="top" align="center">
        <font size="1"><b>(Documento Personal de Identificación o Pasaporte)</b></font>
       </td>
       </tr>
      </table>
      <br>

      <table width="100%" cellpadding="0" cellspacing="0" >
      <tr>
        <td width="17%" valing="top" align="left">
       <i>con residencia en:</i>
       </td>
       <td width="83%" valing="top" align="center" style="border-bottom:1px solid #000000">
       <i>{{$alumnos->direccionencargado}},</i>
       </td>
      </tr>
      </table>
      <br>

      <table width="100%" cellpadding="0" cellspacing="0" >
      <tr>
        <td width="27%" valing="top" align="left">
       <i>con numero de telefono en casa </i>
       </td>
       <td width="14%" valing="top" align="center" style="border-bottom:1px solid #000000">
       <i>{{$alumnos->telefono}},</i>
       </td>
       <td width="10%" valing="top" align="center">
       <i>oficina</i>
       </td>
       <td width="14%" valing="top" align="center" style="border-bottom:1px solid #000000">
       <i>{{$alumnos->telefono2}},</i>
       </td>
       <td width="10%" valing="top" align="center">
       <i>y celular</i>
       </td>
       <td width="15%" valing="top" align="center" style="border-bottom:1px solid #000000">
       <i>{{$alumnos->telefono3}},</i>
       </td>
      </tr>
      </table>
      <p align="justify">
       declarando que la información personal proporcionada, es de carácter confidencial. Los comparecientes aseguramos ser de los datos de identificación anotados, estar en el libre ejercicio de nuestros derechos civiles y la calidad que se ejercita es amplia y suficiente para la celebración del <b>CONTRATO DE ADHESIÓN POR PRESTACIÓN DE SERVICIOS EDUCATIVOS</b>, de conformidad con las siguientes cláusulas: 
      </p>
      <p><b>PRIMERA: INFORMACIÓN DEL EDUCANDO Y SERVICIO EDUCATIVO CONTRATADO. </b></p>
      <table width="100%" border-bottom="1px" cellpadding="0" cellspacing="0" style="border-bottom:1px solid #000000">
      <tr border-bottom="1px">
        <td valing="top" align="center" border-bottom="1px">
        <i>{{$alumnos->nombres . " " . $alumnos->apellidos}}</i>
       </td>
      </tr>

      </table>
        <p align="center" style="margin-top: 0px"><font size="1"><b>(Nombres y Apellidos)</b></font></p>
      
        <table width="100%" cellpadding="0" cellspacing="0" >
      <tr>
         <td width="25%" valing="top" align="left" >
       <i>quien cursara el grado de:</i>
       </td>
        <td width="38%" valing="top" align="center" style="border-bottom:1px solid #000000">
       <i>{{$alumnos->grado->grado}}</i>
       </td>
       <td width="37%" valing="top" align="center" style="border-bottom:1px solid #000000">
       <i>{{$alumnos->grado->nivel->nombre}}</i>
       </td>
      
      </tr>
      </table>

      <table width="100%" cellpadding="0" cellspacing="0" >
      <tr>
        <td width="25%" valing="top" align="center" >
        <font size="1"><i><b></b></i></font>
       </td>
        <td width="38%" valing="top" align="center">
        <font size="1"><b>(grado)</b></font>
       </td> 
       <td width="37%" valing="top" align="center">
        <font size="1"><b>(nivel)</b></font>
       </td>       
      </tr>
      </table>
      <br>
     
     <table width="100%" cellpadding="0" cellspacing="0" >
      <tr>
         <td width="70%" valing="top" align="center" style="border-bottom:1px solid #000000">
       <i>{{$alumnos->grado->nombre}}</i>
       </td>
       <td width="30%" valing="top" align="center" style="border-bottom:1px solid #000000">
       <i>{{$alumnos->grado->jornada}}</i>
       </td>
      </tr>
      </table>
      <table width="100%" cellpadding="0" cellspacing="0" >
      <tr>
       <td width="70%" valing="top" align="center">
        <font size="1"><b>(carrera)</b></font>
       </td> 
       <td width="30%" valing="top" align="center">
        <font size="1"><b>(jornada/plan)</b></font>
       </td>       
      </tr>
      </table>
      <p align="justify">
        Servicio educativo debidamente autorizado por el Ministerio de Educación, de conformidad con  Resoluciones: REV. No. 035-2010, de fecha 14 de abril del 2010; No. SAC-DTP 016-2014, de fecha 7 de noviembre del 2014; No. RQ. 024-2014; No. RQ. 025-2014; No. RQ. 026-2014; No. RQ. 027-2014; No. RQ. 028-2014, de fecha 6 de octubre del 2014, No. SAC-DTP 047-2014; No. SAC-DTP 048-2014, de fecha 1 de diciembre del 2014, No. 022-2016/SAC-DTP, de fecha 10 marzo del 2016, todas emitidas por la Dirección Departamental de Educación de Santa Rosa, misma que se pone a la vista.<br><br>

      <b>SEGUNDA: <u>VOLUNTARIEDAD EN LA CONTRATACIÓN DEL SERVICIO.</u></b> Manifiesta el Representante del Educando que, conociendo la amplia oferta de instituciones privadas que prestan servicios educativos, de manera voluntaria y espontánea ha elegido al Centro Educativo para la educación académica del educando.<br><br>

      <b>TERCERA: PLAZO.</b> El servicio educativo convenido en este contrato será válido para el ciclo escolar del año <u>2019</u>, durante su vigencia no puede ser modificada ninguna de sus cláusulas, las que deberán cumplirse a cabalidad. El Representante del Educando y el Centro Educativo podrán suscribir un nuevo contrato para el ciclo escolar inmediato siguiente, en caso acuerden la continuidad del educando.<br><br>
      

      <b>CUARTA: DERECHOS DEL EDUCANDO Y SU REPRESENTANTE.</b> El Educando y su Representante como usuarios del servicio educativo contratado, tendrán derecho a:<br><br>

     <b>a.</b> <u>La protección a la vida, salud y seguridad en la adquisición, consumo y uso de bienes y servicios:</u> Las  instalaciones del  Centro Educativo están dotadas de todos los servicios básicos, condiciones higiénicas y adecuadas para que los educandos no corran ninguna clase de riesgo que ponga en peligro su integridad física, siempre y cuando hagan uso correcto de las mismas. <br><br>
      

      <b>b.</b> <u>La libertad de Elección y Contratación:</u> El Representante del Educando goza del derecho a elegir y contratar el Centro Educativo que se adecúe a sus necesidades y capacidades económicas. <br><br>

      Los servicios adicionales (bus, venta de útiles y uniformes escolares) pueden ser provistos por el Centro Educativo o por alguna empresa particular con fines comerciales. Estos servicios adicionales no educativos deberán estar regulados por las entidades gubernamentales respectivas. El Centro Educativo no podrá obligar a los Representantes de los Educandos a contratar estos servicios con determinada empresa, habiendo otras que presten el servicio de igual naturaleza y calidad a un menor precio. <br><br>

      No pueden considerarse servicios adicionales, aquellos materiales e insumos requeridos para el mantenimiento y funcionamiento del Centro Educativo, así como los utilizados en mejoras escolares.<br><br>

      <b>c.</b>  <u>La información veraz, suficiente, clara y oportuna sobre los bienes y servicios:</u> El Centro Educativo proporcionará al Representante del Educando la información completa sobre los bienes y servicios contratados, especialmente horarios de clases, grados y carreras autorizadas, sistemas de evaluación, cursos adicionales, el monto de las cuotas tanto de inscripción como cuota mensual, así como de las actividades extraescolares de carácter voluntario u optativas que se puedan realizar durante el ciclo escolar respectivo. Las autoridades del Centro Educativo tienen la obligación de cumplir con las leyes y Acuerdos Ministeriales aplicables a estas actividades.<br><br>

      <b>d.</b>  <u>Utilizar el Libro de Quejas o el medio legalmente autorizado por la Dirección de Atención y Asistencia al Consumidor para dejar registro de su disconformidad con respecto a un bien adquirido o servicio contratado:</u> El Representante del Educando podrá hacer constar su inconformidad respecto al bien adquirido o el servicio contratado en el libro de quejas  y  esperar un período de ocho días para que la misma sea resuelta por las autoridades del Centro Educativo, transcurrido ese tiempo sin que exista una solución satisfactoria podrá interponer la queja correspondiente ante la Dirección de Atención y Asistencia al Consumidor -DIACO-, quien procederá según corresponda.<br><br>

      <b>e.</b> <u> Observancia a las leyes y reglamentos en materia educativa.</u>El Centro Educativo deberá velar por el cumplimiento de las normas aplicables en materia educativa, respetando los valores culturales y derechos inherentes del Educando en su calidad de ser humano, a su vez proporcionar conocimientos científicos, técnicos y humanísticos a través de una metodología adecuada, así como evaluar con objetividad y justicia. <br><br>

      <b>QUINTA: OBLIGACIONES DEL REPRESENTANTE DEL EDUCANDO.</b> El Representante del Educando, en armonía con el Artículo 5 de la Ley de Protección al Consumidor y Usuario, tendrá las siguientes obligaciones:<br><br>

      <b>a.</b>  Pagar al Centro Educativo por los servicios proporcionados en el tiempo, modo y condiciones establecidas mediante el presente contrato.<br><br>

      <b>b.</b>  Utilizar los bienes y servicios en observancia a su uso normal, de conformidad con las especificaciones proporcionadas por el Centro Educativo y cumplir con las condiciones pactadas en el presente contrato, debiendo para tal efecto instruir al educando sobre el cuidado tanto de las instalaciones, como del mobiliario y equipo del Centro Educativo. En caso de daños y/o perjuicios ocasionados por el educando, el Representante del Educando será el responsable, siempre y cuando sean debidamente comprobados y atribuidos al mismo.<br><br>

      <b>c.</b>  Ser orientadores en el proceso educativo de los educandos y velar porque cumplan con las obligaciones establecidas en las leyes y reglamentos internos del Centro Educativo. <br><br>

      <b>SEXTA: CUOTAS.</b> Como Representante del Educando me comprometo a efectuar únicamente los siguientes pagos, sin necesidad de cobro, ni requerimiento alguno: 
      </p>

      <table width="100%" border="1" cellpadding="5" cellspacing="0" >
        <tr>
          <td width="50%" align="center"><b>EN CONCEPTO DE:</b></td>
          <td width="50%" align="center"><b>LA CANTIDAD DE:</b></td>
        </tr>
        <tr>
          <td width="50%" align="left"><b> a) INSCRIPCIÓN POR EDUCANDO:(UN SÓLO PAGO ANUAL)</b></td>
          <td width="50%" align="center">Q{{number_format($alumnos->grado->inscripcion,'2','.' , ',')}}</td>
        </tr>
        <tr>
          <td width="50%" align="left"><b> b) COLEGIATURA MENSUAL:(10 Cuotas en los meses de Enero a Octubre)</b></td>
          <td width="50%" align="center">Q{{number_format($alumnos->grado->mensualidad,'2','.' , ',')}}</td>
        </tr>
      </table>
      <p align="justify">
        Cuotas debidamente autorizadas por el Ministerio de Educación, según Resoluciones: No. D/084-2016, de fecha 25 de noviembre del 2016; No. SAC-DTPBI 05-2017, de fecha 24 de octubre del 2017, No. SAC-DTPBI 03-2017; No. SAC-DTPBI 04-2017, de fecha 23 de octubre del 2017, todas emitidas por la Dirección Departamental de Educación de Santa Rosa, valores que se informan a continuación:
          <br>
           <p align="center"><b>Jornada </b><u><i>{{$alumnos->grado->jornada}}</i></u>,<b> plan diario</b></p>
      </p>

      <table width="100%" border="1" cellpadding="0" cellspacing="0" >
        <tr>
          <td width="70%" align="center"><b>NIVEL DE EDUCACIÓN:</b></td>
          <td width="10%" align="center"><b>INSCRIPCIÓN</b></td>
          <td width="20%" align="center"><b>COLEGIATURA <br>MENSUAL</b></td>
        </tr>
        <tr>
          <td width="70%" align="left" style="padding-left: 2px;"><b>Preprimaria y Primaria<br>
          Básico<br>
          Bachillerato en Ciencias y Letras con Orientación en Computación<br>
          Bachillerato en Ciencias y Letras con Orientación en Mecánica Automotriz<br>
          Secretariado Bilingüe con Orientación en Computación<br>
          Perito Contador<br>
          Perito Contador Con Orientación en Computación<br>
          Magisterio de Educación Infantil Intercultural<br>
          Secretariado y Oficinista<br>
          Perito en Administración
           </b></td>
          <td width="10%" align="center"><b>
            Q. 200.00<br>
            Q. 262.00<br>
            Q. 345.00<br>
            Q. 300.00<br>
            Q. 345.00<br>
            Q. 345.00<br>
            Q. 345.00<br>
            Q. 345.00<br>
            Q. 345.00<br>
            Q. 345.00</b>
          </td>
          <td width="20%" align="center"><b>
            Q. 240.00<br>
            Q. 310.00<br>
            Q. 402.00<br>
            Q. 350.00<br>
            Q. 402.00<br>
            Q. 402.00<br>
            Q. 402.00<br>
            Q. 402.00<br>
            Q. 402.00<br>
            Q. 402.00  </b>
          </td>
        </tr>
      </table>
      <p align="justify">
        Para el pago de las cuotas, ambas partes acordamos que sea en forma anticipada, debiendo efectuar el pago durante 5 días hábiles del mes al cual corresponde el servicio educativo brindado.<br><br>

        <b>SÉPTIMA: INCUMPLIMIENTO DEL PAGO.</b> En caso que el Representante del Educando se atrase o incumpla con los pagos normados en la cláusula anterior, el Centro Educativo podrá exigir al Representante del Educando el cumplimiento de las obligaciones contraídas en el presente contrato. <br><br>

        <b>OCTAVA: DERECHOS  Y OBLIGACIONES DEL CENTRO EDUCATIVO: </b><br><br>

        De conformidad con la legislación aplicable y lo establecido en el presente contrato, tendrá los derechos siguientes:<br><br>

        a)  Exigir al Representante del Educando el cumplimiento de los contratos válidamente celebrados. <br><br>

        b)  El libre acceso a los órganos administrativos y judiciales para la solución de conflictos que surjan por la prestación del servicio educativo. <br><br> 

        c)  Los demás que establecen las leyes del país.  <br><br>

        El Centro Educativo deberá cumplir con lo siguiente: <br><br>

        a)  Atender los reclamos formulados por el Representante del Educando. <br><br>

        b)  Generar mecanismos para la información continua con el Representante del Educando, así como crear espacios que promuevan el aprendizaje de los educandos.<br><br> 

        c)  Asegurar un ambiente escolar que favorezca la autoestima, resolución pacífica de problemas, el reconocimiento de la dignidad humana, el respeto y la valorización de las identidades étnicas y culturales, la equidad de género, la formación de valores y los derechos humanos.  <br><br>

        d)  Cumplir con las leyes tributarias del país en lo aplicable. <br><br>

        e)  Las demás que establecen las leyes del país. <br><br>

        <b>NOVENA: CHEQUES RECHAZADOS.</b> Por concepto de cheques rechazados el Centro Educativo podrá cobrar como máximo el valor que por tal motivo debita o cobra el Banco que rechazó el pago del mismo. <br><br>

        <b>DÉCIMA: <u>TRASLADO O RETIRO DEL EDUCANDO.</u></b> De conformidad con lo establecido por el artículo 38 del Acuerdo Gubernativo número 52-2015 o cualquier otra disposición legal aplicable, el traslado o retiro del educando podrá realizarse en cualquier momento del ciclo escolar a otro Centro Educativo ya sea privado o público, siempre y cuando se cumpla con las regulaciones que para el efecto emita la autoridad competente. <br><br>

        El Representante del Educando debe cancelar la cuota mensual hasta el mes en que efectivamente sea retirado el educando del plantel educativo, sin que esto sea motivo o justificación para retener el expediente. <br><br>

        El establecimiento que recibe al estudiante queda obligado a informar sobre el traslado a la Unidad de Planificación de la Dirección Departamental de Educación, manteniendo el mismo código personal del estudiante y dentro de los quince días siguientes de efectuado. <br><br>

        <b>DÉCIMA PRIMERA: COPIA DEL CONTRATO.</b> El Centro Educativo deberá entregar una copia del presente contrato, quedando el original en poder de la autoridad del mismo, con el propósito que cada uno de los comparecientes estén enterados de sus derechos y obligaciones para que los ejerciten y cumplan de conformidad con lo establecido. La copia será entregada al Representante  del Educando al momento de firmar el contrato.<br><br>

        Ambas partes acuerdan que la legalización de las firmas del presente contrato, correrán por cuenta del Centro Educativo.<br><br>

        <b>DÉCIMA SEGUNDA: DERECHO DE RETRACTO. El Representante del Educando tendrá derecho a retractarse dentro de un plazo no mayor de cinco días hábiles, contados a partir de la firma del contrato. Si ejercita oportunamente este derecho le serán restituidos en su totalidad los valores pagados, siempre que no hubiere hecho uso del servicio. </b><br><br>

        <b>DÉCIMA TERCERA: ACEPTACIÓN.</b> Nosotros los comparecientes, damos lectura íntegra al presente contrato, enterados de su contenido, objeto, validez y demás efectos legales, lo ratificamos, aceptamos y firmamos. <br><br>
      </p>
      <br><br><br><br>
      <table width="100%" cellpadding="0" cellspacing="0">
           <tr>
            <td width="50%" align="center"><br>f._____________________________<br> Luis Estuardo Gudiel Robledo<br><b>Propietario</b></td>
            <td width="50%" align="center" valign="top"><br>f._____________________________<br> Representante del Educando </td>
          </tr>
        </table>

       



     
   
 


      
 
      

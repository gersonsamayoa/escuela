
<table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
      <tr>
      <td align="right"><br><br><?php echo date("Y-n-j"); ?></td>
      </tr>
      <tr>
      <td><h1>Reporte</h1></td>
</tr>


<tr>
<td>Por medio del presente documento se desea hacer de su conociminto que al alumno(a) <b> {{$faltas->alumno->nombres}} 
{{$faltas->alumno->apellidos}}</b> se le ha levantado un reporte de tipo: <b><i> {{$faltas->falta->descripcion}} </b></i>
en la fecha: {{date("d-m-Y", strtotime($faltas->fecha))}} por la siguiente razón:<i> {{$faltas->descripcion}}</i>
</td>
</tr>
<tr>
<td>
<br>Atte. </td>
</tr>
<tr>
<td align="center">
<br><br>
        f. ______________________________<br>{{ $faltas->nombredocente }}<br>
        Docente que Reporta

        </td>
</tr>
        </table>
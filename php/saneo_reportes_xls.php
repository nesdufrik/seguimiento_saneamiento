<?php

$year = $_POST['year'];
$mes = $_POST['mes'];
if($mes == 0){
    $filename = "REPORTE_GESTION_".$year.".xls";
}else{
    $filename = "REPORTE_MES_".$mes."-".$year.".xls";
}
header('Content-type:aplication/xls');
header("Content-Disposition: attachment; filename=$filename");

session_start();
require_once("sis_conexion.php");
require("sis_funciones.php");
require("auth_saneo.php");

$vusuario = $_SESSION['id_usuario'];
if($vusuario == 5 or $vusuario == 6){
    $vusuario = 2;
}

if($mes == 0){
    //Condicionante para REPORTE POR GESTION con FUNCION DE MYSQL REPORTES(tramite,usuario,año,mes,dia,0/1 activar reporte día)
    $vact = 0;
    $vdia = 0;
    $sql1 = "SELECT nom_tramite, REPORTES(id_tramite,$vusuario,$year,1,$vdia,$vact) AS ENERO, REPORTES(id_tramite,$vusuario,$year,2,$vdia,$vact) AS FEBRERO, REPORTES(id_tramite,$vusuario,$year,3,$vdia,$vact) AS MARZO, REPORTES(id_tramite,$vusuario,$year,4,$vdia,$vact) AS ABRIL, REPORTES(id_tramite,$vusuario,$year,5,$vdia,$vact) AS MAYO, REPORTES(id_tramite,$vusuario,$year,6,$vdia,$vact) AS JUNIO, REPORTES(id_tramite,$vusuario,$year,7,$vdia,$vact) AS JULIO, REPORTES(id_tramite,$vusuario,$year,8,$vdia,$vact) AS AGOSTO, REPORTES(id_tramite,$vusuario,$year,9,$vdia,$vact) AS SEPTIEMBRE, REPORTES(id_tramite,$vusuario,$year,10,$vdia,$vact) AS OCTUBRE, REPORTES(id_tramite,$vusuario,$year,11,$vdia,$vact) AS NOVIEMBRE, REPORTES(id_tramite,$vusuario,$year,12,$vdia,$vact) AS DICIEMBRE, REPORTES(id_tramite,$vusuario,$year,0,$vdia,$vact) AS TOTAL FROM tramites WHERE tipo_tramite = 'Tramite con Resolucion Administrativa'";
    $sql2 = "SELECT nom_tramite, REPORTES(id_tramite,$vusuario,$year,1,$vdia,$vact) AS ENERO, REPORTES(id_tramite,$vusuario,$year,2,$vdia,$vact) AS FEBRERO, REPORTES(id_tramite,$vusuario,$year,3,$vdia,$vact) AS MARZO, REPORTES(id_tramite,$vusuario,$year,4,$vdia,$vact) AS ABRIL, REPORTES(id_tramite,$vusuario,$year,5,$vdia,$vact) AS MAYO, REPORTES(id_tramite,$vusuario,$year,6,$vdia,$vact) AS JUNIO, REPORTES(id_tramite,$vusuario,$year,7,$vdia,$vact) AS JULIO, REPORTES(id_tramite,$vusuario,$year,8,$vdia,$vact) AS AGOSTO, REPORTES(id_tramite,$vusuario,$year,9,$vdia,$vact) AS SEPTIEMBRE, REPORTES(id_tramite,$vusuario,$year,10,$vdia,$vact) AS OCTUBRE, REPORTES(id_tramite,$vusuario,$year,11,$vdia,$vact) AS NOVIEMBRE, REPORTES(id_tramite,$vusuario,$year,12,$vdia,$vact) AS DICIEMBRE, REPORTES(id_tramite,$vusuario,$year,0,$vdia,$vact) AS TOTAL FROM tramites WHERE tipo_tramite = 'Tramite sin Resolucion Administrativa'";
    $sql3 = "SELECT REPORTES('c',$vusuario,$year,1,$vdia,$vact) AS ENERO, REPORTES('c',$vusuario,$year,2,$vdia,$vact) AS FEBRERO, REPORTES('c',$vusuario,$year,3,$vdia,$vact) AS MARZO, REPORTES('c',$vusuario,$year,4,$vdia,$vact) AS ABRIL, REPORTES('c',$vusuario,$year,5,$vdia,$vact) AS MAYO, REPORTES('c',$vusuario,$year,6,$vdia,$vact) AS JUNIO, REPORTES('c',$vusuario,$year,7,$vdia,$vact) AS JULIO, REPORTES('c',$vusuario,$year,8,$vdia,$vact) AS AGOSTO, REPORTES('c',$vusuario,$year,9,$vdia,$vact) AS SEPTIEMBRE, REPORTES('c',$vusuario,$year,10,$vdia,$vact) AS OCTUBRE, REPORTES('c',$vusuario,$year,11,$vdia,$vact) AS NOVIEMBRE, REPORTES('c',$vusuario,$year,12,$vdia,$vact) AS DICIEMBRE, REPORTES('c',$vusuario,$year,0,$vdia,$vact) AS TOTAL";
    $sql4 = "SELECT REPORTES('s',$vusuario,$year,1,$vdia,$vact) AS ENERO, REPORTES('s',$vusuario,$year,2,$vdia,$vact) AS FEBRERO, REPORTES('s',$vusuario,$year,3,$vdia,$vact) AS MARZO, REPORTES('s',$vusuario,$year,4,$vdia,$vact) AS ABRIL, REPORTES('s',$vusuario,$year,5,$vdia,$vact) AS MAYO, REPORTES('s',$vusuario,$year,6,$vdia,$vact) AS JUNIO, REPORTES('s',$vusuario,$year,7,$vdia,$vact) AS JULIO, REPORTES('s',$vusuario,$year,8,$vdia,$vact) AS AGOSTO, REPORTES('s',$vusuario,$year,9,$vdia,$vact) AS SEPTIEMBRE, REPORTES('s',$vusuario,$year,10,$vdia,$vact) AS OCTUBRE, REPORTES('s',$vusuario,$year,11,$vdia,$vact) AS NOVIEMBRE, REPORTES('s',$vusuario,$year,12,$vdia,$vact) AS DICIEMBRE, REPORTES('s',$vusuario,$year,0,$vdia,$vact) AS TOTAL";
    $sql5 = "SELECT REPORTES(0,$vusuario,$year,1,$vdia,$vact) AS ENERO, REPORTES(0,$vusuario,$year,2,$vdia,$vact) AS FEBRERO, REPORTES(0,$vusuario,$year,3,$vdia,$vact) AS MARZO, REPORTES(0,$vusuario,$year,4,$vdia,$vact) AS ABRIL, REPORTES(0,$vusuario,$year,5,$vdia,$vact) AS MAYO, REPORTES(0,$vusuario,$year,6,$vdia,$vact) AS JUNIO, REPORTES(0,$vusuario,$year,7,$vdia,$vact) AS JULIO, REPORTES(0,$vusuario,$year,8,$vdia,$vact) AS AGOSTO, REPORTES(0,$vusuario,$year,9,$vdia,$vact) AS SEPTIEMBRE, REPORTES(0,$vusuario,$year,10,$vdia,$vact) AS OCTUBRE, REPORTES(0,$vusuario,$year,11,$vdia,$vact) AS NOVIEMBRE, REPORTES(0,$vusuario,$year,12,$vdia,$vact) AS DICIEMBRE, REPORTES(0,$vusuario,$year,0,$vdia,$vact) AS TOTAL";
    $result1 = $conexion->query($sql1);
    $row1 = $result1->fetch_array(MYSQLI_ASSOC);
    $result2 = $conexion->query($sql2);
    $row2 = $result2->fetch_array(MYSQLI_ASSOC);
    $result3 = $conexion->query($sql3);
    $row3 = $result3->fetch_array(MYSQLI_ASSOC);
    $result4 = $conexion->query($sql4);
    $row4 = $result4->fetch_array(MYSQLI_ASSOC);
    $result5 = $conexion->query($sql5);
    $row5 = $result5->fetch_array(MYSQLI_ASSOC);
    ?>
    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sistema de Seguimiento y Control de Tramites de Saneamiento</title>
    </head>
    <body>
    <table border="1px" cellpadding="0" cellspacing="0" cellspadig="1px">
        <thead>
            <tr>
                <th colspan="14">SANEAMIENTO LEGAL Y MODIFICACIONES DE DATOS</th>
            </tr>
            <tr>
              <th colspan="5">Oficina: SUCRE</th>
              <th colspan="9">Departamental: Chuquisaca</th>
            </tr>
            <tr>
                <th rowspan="2" bgcolor="#C6E0B4">Descripción</th>
                <th colspan="13" bgcolor="#C6E0B4">Gestión <?php echo $year; ?></th>
            </tr>
            <tr>
                <th bgcolor="#C6E0B4">Ene</th>
                <th bgcolor="#C6E0B4">Feb</th>
                <th bgcolor="#C6E0B4">Mar</th>
                <th bgcolor="#C6E0B4">Abr</th>
                <th bgcolor="#C6E0B4">May</th>
                <th bgcolor="#C6E0B4">Jun</th>
                <th bgcolor="#C6E0B4">Jul</th>
                <th bgcolor="#C6E0B4">Ago</th>
                <th bgcolor="#C6E0B4">Sep</th>
                <th bgcolor="#C6E0B4">Oct</th>
                <th bgcolor="#C6E0B4">Nov</th>
                <th bgcolor="#C6E0B4">Dic</th>
                <th bgcolor="#C6E0B4"><strong>TOTAL</strong></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td bgcolor="#C6E0B4" >Tramites con Resolucion Administrativa</td>
                <td bgcolor="#C6E0B4" ><?php echo $row3['ENERO']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row3['FEBRERO']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row3['MARZO']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row3['ABRIL']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row3['MAYO']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row3['JUNIO']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row3['JULIO']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row3['AGOSTO']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row3['SEPTIEMBRE']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row3['OCTUBRE']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row3['NOVIEMBRE']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row3['DICIEMBRE']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row3['TOTAL']; ?></td>
            </tr>
            <?php $i = 0; do{ $i++;
                ?> 
                <tr>
                    <td><?php echo $row1['nom_tramite']; ?></td>
                    <td><?php echo $row1['ENERO']; ?></td>
                    <td><?php echo $row1['FEBRERO']; ?></td>
                    <td><?php echo $row1['MARZO']; ?></td>
                    <td><?php echo $row1['ABRIL']; ?></td>
                    <td><?php echo $row1['MAYO']; ?></td>
                    <td><?php echo $row1['JUNIO']; ?></td>
                    <td><?php echo $row1['JULIO']; ?></td>
                    <td><?php echo $row1['AGOSTO']; ?></td>
                    <td><?php echo $row1['SEPTIEMBRE']; ?></td>
                    <td><?php echo $row1['OCTUBRE']; ?></td>
                    <td><?php echo $row1['NOVIEMBRE']; ?></td>
                    <td><?php echo $row1['DICIEMBRE']; ?></td>
                    <td><strong><?php echo $row1['TOTAL']; ?></strong></td>
                </tr>
                <?php
            }while($row1 = $result1->fetch_array(MYSQLI_ASSOC));?>
            <tr>
                <td bgcolor="#C6E0B4" >Tramites sin Resolucion Administrativa</td>
                <td bgcolor="#C6E0B4" ><?php echo $row4['ENERO']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row4['FEBRERO']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row4['MARZO']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row4['ABRIL']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row4['MAYO']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row4['JUNIO']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row4['JULIO']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row4['AGOSTO']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row4['SEPTIEMBRE']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row4['OCTUBRE']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row4['NOVIEMBRE']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row4['DICIEMBRE']; ?></td>
                <td bgcolor="#C6E0B4" ><strong><?php echo $row4['TOTAL']; ?></strong></td>
            </tr>
            <?php $i = 0; do{ $i++;
                ?> 
                <tr>
                    <td><?php echo $row2['nom_tramite']; ?></td>
                    <td><?php echo $row2['ENERO']; ?></td>
                    <td><?php echo $row2['FEBRERO']; ?></td>
                    <td><?php echo $row2['MARZO']; ?></td>
                    <td><?php echo $row2['ABRIL']; ?></td>
                    <td><?php echo $row2['MAYO']; ?></td>
                    <td><?php echo $row2['JUNIO']; ?></td>
                    <td><?php echo $row2['JULIO']; ?></td>
                    <td><?php echo $row2['AGOSTO']; ?></td>
                    <td><?php echo $row2['SEPTIEMBRE']; ?></td>
                    <td><?php echo $row2['OCTUBRE']; ?></td>
                    <td><?php echo $row2['NOVIEMBRE']; ?></td>
                    <td><?php echo $row2['DICIEMBRE']; ?></td>
                    <td><strong><?php echo $row2['TOTAL']; ?></strong></td>
                </tr>
                <?php
            }while($row2 = $result2->fetch_array(MYSQLI_ASSOC));?>
            <tr>
                <td bgcolor="#C6E0B4" >TOTAL MES</td>
                <td bgcolor="#C6E0B4" ><?php echo $row5['ENERO']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row5['FEBRERO']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row5['MARZO']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row5['ABRIL']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row5['MAYO']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row5['JUNIO']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row5['JULIO']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row5['AGOSTO']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row5['SEPTIEMBRE']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row5['OCTUBRE']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row5['NOVIEMBRE']; ?></td>
                <td bgcolor="#C6E0B4" ><?php echo $row5['DICIEMBRE']; ?></td>
                <td bgcolor="#C6E0B4" ><strong><?php echo $row5['TOTAL']; ?></strong></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
<?php
}else{
    //Condicionante para REPORTE MENSUAL/DIAS
    $vact = 1;
    $sql1 = "SELECT id_dia AS DIA, REPORTES(1,$vusuario,$year,$mes,id_dia,1) AS T1, REPORTES(2,$vusuario,$year,$mes,id_dia,1) AS T2, REPORTES(3,$vusuario,$year,$mes,id_dia,1) AS T3, REPORTES(4,$vusuario,$year,$mes,id_dia,1) AS T4, REPORTES(5,$vusuario,$year,$mes,id_dia,1) AS T5, REPORTES(6,$vusuario,$year,$mes,id_dia,1) AS T6, REPORTES(7,$vusuario,$year,$mes,id_dia,1) AS T7, REPORTES(8,$vusuario,$year,$mes,id_dia,1) AS T8, REPORTES(9,$vusuario,$year,$mes,id_dia,1) AS T9, REPORTES(10,$vusuario,$year,$mes,id_dia,1) AS T10, REPORTES(11,$vusuario,$year,$mes,id_dia,1) AS T11, REPORTES(12,$vusuario,$year,$mes,id_dia,1) AS T12, REPORTES(13,$vusuario,$year,$mes,id_dia,1) AS T13, REPORTES(14,$vusuario,$year,$mes,id_dia,1) AS T14, REPORTES(15,$vusuario,$year,$mes,id_dia,1) AS T15, REPORTES(16,$vusuario,$year,$mes,id_dia,1) AS T16, REPORTES(17,$vusuario,$year,$mes,id_dia,1) AS T17, REPORTES(18,$vusuario,$year,$mes,id_dia,1) AS T18, REPORTES(19,$vusuario,$year,$mes,id_dia,1) AS T19, REPORTES(21,$vusuario,$year,$mes,id_dia,1) AS T20, REPORTES(22,$vusuario,$year,$mes,id_dia,1) AS T21, REPORTES(23,$vusuario,$year,$mes,id_dia,1) AS T22, REPORTES(24,$vusuario,$year,$mes,id_dia,1) AS T23, REPORTES(25,$vusuario,$year,$mes,id_dia,1) AS T24, REPORTES(26,$vusuario,$year,$mes,id_dia,1) AS T25, REPORTES(27,$vusuario,$year,$mes,id_dia,1) AS T26, REPORTES(28,$vusuario,$year,$mes,id_dia,1) AS T27, REPORTES(29,$vusuario,$year,$mes,id_dia,1) AS T28, REPORTES(30,$vusuario,$year,$mes,id_dia,1) AS T29, REPORTES(0,$vusuario,$year,$mes,id_dia,1) AS TOTAL FROM reporte_dia";
    $sql2 = "SELECT REPORTES(1,$vusuario,$year,$mes,0,1) AS T1, REPORTES(2,$vusuario,$year,$mes,0,1) AS T2, REPORTES(3,$vusuario,$year,$mes,0,1) AS T3, REPORTES(4,$vusuario,$year,$mes,0,1) AS T4, REPORTES(5,$vusuario,$year,$mes,0,1) AS T5, REPORTES(6,$vusuario,$year,$mes,0,1) AS T6, REPORTES(7,$vusuario,$year,$mes,0,1) AS T7, REPORTES(8,$vusuario,$year,$mes,0,1) AS T8, REPORTES(9,$vusuario,$year,$mes,0,1) AS T9, REPORTES(10,$vusuario,$year,$mes,0,1) AS T10, REPORTES(11,$vusuario,$year,$mes,0,1) AS T11, REPORTES(12,$vusuario,$year,$mes,0,1) AS T12, REPORTES(13,$vusuario,$year,$mes,0,1) AS T13, REPORTES(14,$vusuario,$year,$mes,0,1) AS T14, REPORTES(15,$vusuario,$year,$mes,0,1) AS T15, REPORTES(16,$vusuario,$year,$mes,0,1) AS T16, REPORTES(17,$vusuario,$year,$mes,0,1) AS T17, REPORTES(18,$vusuario,$year,$mes,0,1) AS T18, REPORTES(19,$vusuario,$year,$mes,0,1) AS T19, REPORTES(21,$vusuario,$year,$mes,0,1) AS T20, REPORTES(22,$vusuario,$year,$mes,0,1) AS T21, REPORTES(23,$vusuario,$year,$mes,0,1) AS T22, REPORTES(24,$vusuario,$year,$mes,0,1) AS T23, REPORTES(25,$vusuario,$year,$mes,0,1) AS T24, REPORTES(26,$vusuario,$year,$mes,0,1) AS T25, REPORTES(27,$vusuario,$year,$mes,0,1) AS T26, REPORTES(28,$vusuario,$year,$mes,0,1) AS T27, REPORTES(29,$vusuario,$year,$mes,0,1) AS T28, REPORTES(30,$vusuario,$year,$mes,0,1) AS T29, REPORTES(0,$vusuario,$year,$mes,0,1) AS TOTAL";
    $result1 = $conexion->query($sql1);
    $row1 = $result1->fetch_array(MYSQLI_ASSOC);
    $result2 = $conexion->query($sql2);
    $row2 = $result2->fetch_array(MYSQLI_ASSOC);
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sistema de Seguimiento y Control de Tramites de Saneamiento</title>
    </head>
    <body>
        <table width="1725" border="1" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th colspan="31">TRÁMITES EJECUTADOS POR DIA CORRESPONDIENTE A:</th>
                </tr>
                <tr>
                <th colspan="31">GESTION <?php echo $mes."/".$year; ?></th>
                </tr>
                <tr>
                    <th width="53" height="84" bgcolor="#ACB9CA" style="font-size: 10px">DIA</th>
                    <th width="43" bgcolor="#ACB9CA" style="font-size: 10px">MULTIP LICIDAD</th>
                    <th width="38" bgcolor="#ACB9CA" style="font-size: 10px">DIR 008/2019</th>
                    <th width="38" bgcolor="#ACB9CA" style="font-size: 10px">DIR 010/2019</th>
                    <th width="38" bgcolor="#ACB9CA" style="font-size: 10px">DIR 011/2019</th>
                    <th width="38" bgcolor="#ACB9CA" style="font-size: 10px">DIR 029/2019</th>
                    <th width="40" bgcolor="#ACB9CA" style="font-size: 10px">RANGO 823</th>
                    <th width="55" bgcolor="#ACB9CA" style="font-size: 10px">RECTIFIC. ART. 18</th>
                    <th width="67" bgcolor="#ACB9CA" style="font-size: 10px">REPOSICIÓN DE TIP</th>
                    <th width="68" bgcolor="#ACB9CA" style="font-size: 10px">ASIGNACIÓN DE NUEVA C.I.</th>
                    <th width="36" bgcolor="#ACB9CA" style="font-size: 10px">HOMO NIMIA</th>
                    <th width="85" bgcolor="#ACB9CA" style="font-size: 10px">MODIF. DE CONSOLIDADOS  ART. 33 I)</th>
                    <th width="85" bgcolor="#ACB9CA" style="font-size: 10px">MODIF. DE CONSOLIDADOS  ART. 33 II)</th>
                    <th width="60" bgcolor="#ACB9CA" style="font-size: 10px">ERROR DE OPERADOR ART. 35</th>
                    <th width="34" bgcolor="#ACB9CA" style="font-size: 10px">DUPLI CIDAD</th>
                    <th width="34" bgcolor="#ACB9CA" style="font-size: 10px">DUPLI CIDAD P/M</th>
                    <th width="34" bgcolor="#ACB9CA" style="font-size: 10px">DUPLI CIDAD P/F</th>
                    <th width="83" bgcolor="#ACB9CA" style="font-size: 10px">NO VISUALIZACIÓN N° COMPLEM</th>
                    <th width="54" bgcolor="#ACB9CA" style="font-size: 10px">UNIF. DE REGISTRO</th>
                    <th width="43" bgcolor="#ACB9CA" style="font-size: 10px">SUPLAN TACIÓN</th>
                    <th width="57" bgcolor="#ACB9CA" style="font-size: 10px">MULTIPLE IDENTIDAD</th>
                    <th width="50" bgcolor="#ACB9CA" style="font-size: 10px">DACTILO SCOPÍA</th>
                    <th width="80" bgcolor="#ACB9CA" style="font-size: 10px">HABILITACIÓN DE REGISTRO</th>
                    <th width="56" bgcolor="#ACB9CA" style="font-size: 10px">SANEAM. LICENCIAS</th>
                    <th width="66" bgcolor="#ACB9CA" style="font-size: 10px">SANEAM. FALLECIDOS</th>
                    <th width="57" bgcolor="#ACB9CA" style="font-size: 10px">CONVALID RES.ADM.</th>
                    <th width="49" bgcolor="#ACB9CA" style="font-size: 10px">BIOMET RIZACION</th>
                    <th width="74" bgcolor="#ACB9CA" style="font-size: 10px">FOTOGRAFIA EXCEPCIONAL</th>
                    <th width="49" bgcolor="#ACB9CA" style="font-size: 10px">SANEAM. ART. 17</th>
                    <th width="61" bgcolor="#ACB9CA" style="font-size: 10px">ERROR DE TRANSCRIP.</th>
                    <th width="36" bgcolor="#ACB9CA" style="font-size: 10px">TOTAL</th>
            </tr>
            </thead>
            <tbody>
                <?php $i = 0; do{ $i++;
                    ?> 
                    <tr>
                        <td><?php echo $row1['DIA']; ?></td>
                        <td><?php echo $row1['T1']; ?></td>
                        <td><?php echo $row1['T2']; ?></td>
                        <td><?php echo $row1['T3']; ?></td>
                        <td><?php echo $row1['T4']; ?></td>
                        <td><?php echo $row1['T5']; ?></td>
                        <td><?php echo $row1['T6']; ?></td>
                        <td><?php echo $row1['T7']; ?></td>
                        <td><?php echo $row1['T8']; ?></td>
                        <td><?php echo $row1['T9']; ?></td>
                        <td><?php echo $row1['T10']; ?></td>
                        <td><?php echo $row1['T11']; ?></td>
                        <td><?php echo $row1['T12']; ?></td>
                        <td><?php echo $row1['T13']; ?></td>
                        <td><?php echo $row1['T14']; ?></td>
                        <td><?php echo $row1['T15']; ?></td>
                        <td><?php echo $row1['T16']; ?></td>
                        <td><?php echo $row1['T17']; ?></td>
                        <td><?php echo $row1['T18']; ?></td>
                        <td><?php echo $row1['T19']; ?></td>
                        <td><?php echo $row1['T20']; ?></td>
                        <td><?php echo $row1['T21']; ?></td>
                        <td><?php echo $row1['T22']; ?></td>
                        <td><?php echo $row1['T23']; ?></td>
                        <td><?php echo $row1['T24']; ?></td>
                        <td><?php echo $row1['T25']; ?></td>
                        <td><?php echo $row1['T26']; ?></td>
                        <td><?php echo $row1['T27']; ?></td>
                        <td><?php echo $row1['T28']; ?></td>
                        <td><?php echo $row1['T29']; ?></td>
                        <td><strong><?php echo $row1['TOTAL']; ?></strong></td>
                    </tr>
                    <?php
                }while($row1 = $result1->fetch_array(MYSQLI_ASSOC));?>
                <tr>
                    <td bgcolor="#ACB9CA"><strong>TOTAL</strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T1']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T2']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T3']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T4']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T5']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T6']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T7']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T8']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T9']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T10']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T11']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T12']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T13']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T14']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T15']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T16']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T17']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T18']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T19']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T20']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T21']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T22']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T23']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T24']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T25']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T26']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T27']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T28']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['T29']; ?></strong></td>
                    <td bgcolor="#ACB9CA"><strong><?php echo $row2['TOTAL']; ?></strong></td>
                </tr>
            </tbody>
        </table>
    </body>
    </html>
<?php
}
?>
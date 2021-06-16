<?php
session_start();
require_once("sis_conexion.php");
require("sis_funciones.php");
require("auth_saneo.php");

$year = $_POST['year'];
$mes = $_POST['mes'];
$vusuario = $_SESSION['id_usuario'];

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
    <table class="table table-bordered table-sm table-hover">
        <thead class="thead-dark">
            <tr>
                <th rowspan="2" class="text-center">Descripción</th>
                <th colspan="13" class="text-center">Gestión <?php echo $year; ?></th>
            </tr>
            <tr>
                <th>Ene</th>
                <th>Feb</th>
                <th>Mar</th>
                <th>Abr</th>
                <th>May</th>
                <th>Jun</th>
                <th>Jul</th>
                <th>Ago</th>
                <th>Sep</th>
                <th>Oct</th>
                <th>Nov</th>
                <th>Dic</th>
                <th>TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-secondary text-white">
                <td>Tramites con Resolucion Administrativa</td>
                <td><?php echo $row3['ENERO']; ?></td>
                <td><?php echo $row3['FEBRERO']; ?></td>
                <td><?php echo $row3['MARZO']; ?></td>
                <td><?php echo $row3['ABRIL']; ?></td>
                <td><?php echo $row3['MAYO']; ?></td>
                <td><?php echo $row3['JUNIO']; ?></td>
                <td><?php echo $row3['JULIO']; ?></td>
                <td><?php echo $row3['AGOSTO']; ?></td>
                <td><?php echo $row3['SEPTIEMBRE']; ?></td>
                <td><?php echo $row3['OCTUBRE']; ?></td>
                <td><?php echo $row3['NOVIEMBRE']; ?></td>
                <td><?php echo $row3['DICIEMBRE']; ?></td>
                <td><?php echo $row3['TOTAL']; ?></td>
            </tr>
            <?php $i = 0; do{ $i++;
                ?> 
                <tr class="small">
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
                    <td class="table-active"><strong><?php echo $row1['TOTAL']; ?></strong></td>
                </tr>
                <?php
            }while($row1 = $result1->fetch_array(MYSQLI_ASSOC));?>
            <tr class="bg-secondary text-white">
                <td>Tramites sin Resolucion Administrativa</td>
                <td><?php echo $row4['ENERO']; ?></td>
                <td><?php echo $row4['FEBRERO']; ?></td>
                <td><?php echo $row4['MARZO']; ?></td>
                <td><?php echo $row4['ABRIL']; ?></td>
                <td><?php echo $row4['MAYO']; ?></td>
                <td><?php echo $row4['JUNIO']; ?></td>
                <td><?php echo $row4['JULIO']; ?></td>
                <td><?php echo $row4['AGOSTO']; ?></td>
                <td><?php echo $row4['SEPTIEMBRE']; ?></td>
                <td><?php echo $row4['OCTUBRE']; ?></td>
                <td><?php echo $row4['NOVIEMBRE']; ?></td>
                <td><?php echo $row4['DICIEMBRE']; ?></td>
                <td><?php echo $row4['TOTAL']; ?></td>
            </tr>
            <?php $i = 0; do{ $i++;
                ?> 
                <tr class="small">
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
                    <td class="table-active"><strong><?php echo $row2['TOTAL']; ?></strong></td>
                </tr>
                <?php
            }while($row2 = $result2->fetch_array(MYSQLI_ASSOC));?>
            <tr class="bg-dark text-white font-weight-bold">
                <td>TOTAL MES</td>
                <td><?php echo $row5['ENERO']; ?></td>
                <td><?php echo $row5['FEBRERO']; ?></td>
                <td><?php echo $row5['MARZO']; ?></td>
                <td><?php echo $row5['ABRIL']; ?></td>
                <td><?php echo $row5['MAYO']; ?></td>
                <td><?php echo $row5['JUNIO']; ?></td>
                <td><?php echo $row5['JULIO']; ?></td>
                <td><?php echo $row5['AGOSTO']; ?></td>
                <td><?php echo $row5['SEPTIEMBRE']; ?></td>
                <td><?php echo $row5['OCTUBRE']; ?></td>
                <td><?php echo $row5['NOVIEMBRE']; ?></td>
                <td><?php echo $row5['DICIEMBRE']; ?></td>
                <td><?php echo $row5['TOTAL']; ?></td>
            </tr>
        </tbody>
    </table>
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
    <table class="table table-bordered table-sm table-hover text-center">
        <thead class="thead-dark">
            <tr>
                <th colspan="31">Gestión <?php echo $mes."/".$year; ?></th>
            </tr>
            <tr class="small">
                <th>Dia</th>
                <th>Multiplicacidad</th>
                <th>Directiva 008/2019</th>
                <th>Directiva 010/2019</th>
                <th>Directiva 011/2019</th>
                <th>Directiva 029/2019</th>
                <th>Rango 823</th>
                <th>Rectificacion Art. 18</th>
                <th>Reposicion de TIP</th>
                <th>Asignacion de Nuevo Registro</th>
                <th>Homonimia</th>
                <th>Modificacion Registros Consolidados P.I</th>
                <th>Modificacion Registros Consolidados P.II</th>
                <th>Error de Operador Art. 35</th>
                <th>Duplicidad</th>
                <th>Duplicidad Pasivo/Multiplicidad</th>
                <th>Duplicidad Pasivo/Fallecido</th>
                <th>No Visualizacion de Numero Complemento</th>
                <th>Unificacion de Registros</th>
                <th>Suplantacion</th>
                <th>Multiple Identidad</th>
                <th>Dactiloscopia</th>
                <th>Habilitacion de Registro</th>
                <th>Saneamiento Licencias</th>
                <th>Saneamiento Registros de Fallecidos</th>
                <th>Convalidacion de Resolucion Administrativa</th>
                <th>Biometrizacion</th>
                <th>Fotografia Excepcional</th>
                <th>Saneamiento Art. 17</th>
                <th>Error de Transcripcion</th>
                <th>TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; do{ $i++;
                ?> 
                <tr class="small">
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
                    <td class="table-active"><strong><?php echo $row1['TOTAL']; ?></strong></td>
                </tr>
                <?php
            }while($row1 = $result1->fetch_array(MYSQLI_ASSOC));?>
            <tr>
                <td>TOTAL</td>
                <td><?php echo $row2['T1']; ?></td>
                <td><?php echo $row2['T2']; ?></td>
                <td><?php echo $row2['T3']; ?></td>
                <td><?php echo $row2['T4']; ?></td>
                <td><?php echo $row2['T5']; ?></td>
                <td><?php echo $row2['T6']; ?></td>
                <td><?php echo $row2['T7']; ?></td>
                <td><?php echo $row2['T8']; ?></td>
                <td><?php echo $row2['T9']; ?></td>
                <td><?php echo $row2['T10']; ?></td>
                <td><?php echo $row2['T11']; ?></td>
                <td><?php echo $row2['T12']; ?></td>
                <td><?php echo $row2['T13']; ?></td>
                <td><?php echo $row2['T14']; ?></td>
                <td><?php echo $row2['T15']; ?></td>
                <td><?php echo $row2['T16']; ?></td>
                <td><?php echo $row2['T17']; ?></td>
                <td><?php echo $row2['T18']; ?></td>
                <td><?php echo $row2['T19']; ?></td>
                <td><?php echo $row2['T20']; ?></td>
                <td><?php echo $row2['T21']; ?></td>
                <td><?php echo $row2['T22']; ?></td>
                <td><?php echo $row2['T23']; ?></td>
                <td><?php echo $row2['T24']; ?></td>
                <td><?php echo $row2['T25']; ?></td>
                <td><?php echo $row2['T26']; ?></td>
                <td><?php echo $row2['T27']; ?></td>
                <td><?php echo $row2['T28']; ?></td>
                <td><?php echo $row2['T29']; ?></td>
                <td><?php echo $row2['TOTAL']; ?></td>
            </tr>
        </tbody>
    </table>
<?php
}
?>
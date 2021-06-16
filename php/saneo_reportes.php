<?php
session_start();
require_once("sis_conexion.php");
require("sis_funciones.php");
require("auth_saneo.php");

$year = $_POST['year'];
$mes = $_POST['mes'];
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
    <table class="table table-bordered table-sm table-hover">
        <thead class="thead-dark">
            <tr>
                <th rowspan="2" class="text-center align-middle">Descripción</th>
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
    $sql1 = "SELECT nom_tramite, REPORTES(id_tramite,$vusuario,$year,$mes,1,$vact) AS T1, REPORTES(id_tramite,$vusuario,$year,$mes,2,$vact) AS T2, REPORTES(id_tramite,$vusuario,$year,$mes,3,$vact) AS T3, REPORTES(id_tramite,$vusuario,$year,$mes,4,$vact) AS T4, REPORTES(id_tramite,$vusuario,$year,$mes,5,$vact) AS T5, REPORTES(id_tramite,$vusuario,$year,$mes,6,$vact) AS T6, REPORTES(id_tramite,$vusuario,$year,$mes,7,$vact) AS T7, REPORTES(id_tramite,$vusuario,$year,$mes,8,$vact) AS T8, REPORTES(id_tramite,$vusuario,$year,$mes,9,$vact) AS T9, REPORTES(id_tramite,$vusuario,$year,$mes,10,$vact) AS T10, REPORTES(id_tramite,$vusuario,$year,$mes,11,$vact) AS T11, REPORTES(id_tramite,$vusuario,$year,$mes,12,$vact) AS T12, REPORTES(id_tramite,$vusuario,$year,$mes,13,$vact) AS T13, REPORTES(id_tramite,$vusuario,$year,$mes,14,$vact) AS T14, REPORTES(id_tramite,$vusuario,$year,$mes,15,$vact) AS T15, REPORTES(id_tramite,$vusuario,$year,$mes,16,$vact) AS T16, REPORTES(id_tramite,$vusuario,$year,$mes,17,$vact) AS T17, REPORTES(id_tramite,$vusuario,$year,$mes,18,$vact) AS T18, REPORTES(id_tramite,$vusuario,$year,$mes,19,$vact) AS T19, REPORTES(id_tramite,$vusuario,$year,$mes,20,$vact) AS T20, REPORTES(id_tramite,$vusuario,$year,$mes,21,$vact) AS T21, REPORTES(id_tramite,$vusuario,$year,$mes,22,$vact) AS T22, REPORTES(id_tramite,$vusuario,$year,$mes,23,$vact) AS T23, REPORTES(id_tramite,$vusuario,$year,$mes,24,$vact) AS T24, REPORTES(id_tramite,$vusuario,$year,$mes,25,$vact) AS T25, REPORTES(id_tramite,$vusuario,$year,$mes,26,$vact) AS T26, REPORTES(id_tramite,$vusuario,$year,$mes,27,$vact) AS T27, REPORTES(id_tramite,$vusuario,$year,$mes,28,$vact) AS T28, REPORTES(id_tramite,$vusuario,$year,$mes,29,$vact) AS T29, REPORTES(id_tramite,$vusuario,$year,$mes,30,$vact) AS T30, REPORTES(id_tramite,$vusuario,$year,$mes,31,$vact) AS T31, REPORTES(id_tramite,$vusuario,$year,$mes,0,0) AS TOTAL FROM tramites";
    $sql2 = "SELECT REPORTES(0,$vusuario,$year,$mes,1,$vact) AS T1, REPORTES(0,$vusuario,$year,$mes,2,$vact) AS T2, REPORTES(0,$vusuario,$year,$mes,3,$vact) AS T3, REPORTES(0,$vusuario,$year,$mes,4,$vact) AS T4, REPORTES(0,$vusuario,$year,$mes,5,$vact) AS T5, REPORTES(0,$vusuario,$year,$mes,6,$vact) AS T6, REPORTES(0,$vusuario,$year,$mes,7,$vact) AS T7, REPORTES(0,$vusuario,$year,$mes,8,$vact) AS T8, REPORTES(0,$vusuario,$year,$mes,9,$vact) AS T9, REPORTES(0,$vusuario,$year,$mes,10,$vact) AS T10, REPORTES(0,$vusuario,$year,$mes,11,$vact) AS T11, REPORTES(0,$vusuario,$year,$mes,12,$vact) AS T12, REPORTES(0,$vusuario,$year,$mes,13,$vact) AS T13, REPORTES(0,$vusuario,$year,$mes,14,$vact) AS T14, REPORTES(0,$vusuario,$year,$mes,15,$vact) AS T15, REPORTES(0,$vusuario,$year,$mes,16,$vact) AS T16, REPORTES(0,$vusuario,$year,$mes,17,$vact) AS T17, REPORTES(0,$vusuario,$year,$mes,18,$vact) AS T18, REPORTES(0,$vusuario,$year,$mes,19,$vact) AS T19, REPORTES(0,$vusuario,$year,$mes,20,$vact) AS T20, REPORTES(0,$vusuario,$year,$mes,21,$vact) AS T21, REPORTES(0,$vusuario,$year,$mes,22,$vact) AS T22, REPORTES(0,$vusuario,$year,$mes,23,$vact) AS T23, REPORTES(0,$vusuario,$year,$mes,24,$vact) AS T24, REPORTES(0,$vusuario,$year,$mes,25,$vact) AS T25, REPORTES(0,$vusuario,$year,$mes,26,$vact) AS T26, REPORTES(0,$vusuario,$year,$mes,27,$vact) AS T27, REPORTES(0,$vusuario,$year,$mes,28,$vact) AS T28, REPORTES(0,$vusuario,$year,$mes,29,$vact) AS T29, REPORTES(0,$vusuario,$year,$mes,30,$vact) AS T30, REPORTES(0,$vusuario,$year,$mes,31,$vact) AS T31, REPORTES(0,$vusuario,$year,$mes,0,0) AS TOTAL";
    $result1 = $conexion->query($sql1);
    $row1 = $result1->fetch_array(MYSQLI_ASSOC);
    $result2 = $conexion->query($sql2);
    $row2 = $result2->fetch_array(MYSQLI_ASSOC);
    ?>
    <table class="table table-bordered table-sm table-hover small">
    <thead class="thead-dark">
            <tr>
                <th rowspan="2" class="text-center align-middle">Descripción</th>
                <th colspan="33" class="text-center">Gestión <?php echo $mes."/".$year; ?></th>
            </tr>
            <tr>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>
                <th>8</th>
                <th>9</th>
                <th>10</th>
                <th>11</th>
                <th>12</th>
                <th>13</th>
                <th>14</th>
                <th>15</th>
                <th>16</th>
                <th>17</th>
                <th>18</th>
                <th>19</th>
                <th>20</th>
                <th>21</th>
                <th>22</th>
                <th>23</th>
                <th>24</th>
                <th>25</th>
                <th>26</th>
                <th>27</th>
                <th>28</th>
                <th>29</th>
                <th>30</th>
                <th>31</th>
                <th>TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; do{ $i++;
                ?> 
                <tr>
                    <td><?php echo $row1['nom_tramite']; ?></td>
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
                    <td><?php echo $row1['T30']; ?></td>
                    <td><?php echo $row1['T31']; ?></td>
                    <td class="table-active"><strong><?php echo $row1['TOTAL']; ?></strong></td>
                </tr>
                <?php
            }while($row1 = $result1->fetch_array(MYSQLI_ASSOC));?>
            <tr class="bg-secondary text-white font-weight-bold">
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
                <td><?php echo $row2['T30']; ?></td>
                <td><?php echo $row2['T31']; ?></td>
                <td><?php echo $row2['TOTAL']; ?></td>
            </tr>
        </tbody>
    </table>
<?php
}
?>
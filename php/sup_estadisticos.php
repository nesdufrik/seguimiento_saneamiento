<?php
session_start();
require_once("sis_conexion.php");
require("sis_funciones.php");
require("auth_sup.php");

if((!isset($_POST['year'])) && (!isset($_POST['mes']))){
    $year = date('Y');
    $mes = date('m');
}else{
    $year = $_POST['year'];
    $mes = $_POST['mes'];
}

if($mes == 1){
    $tmes = "ENERO";
}elseif($mes == 2){
    $tmes = "FEBRERO";
}elseif($mes == 3){
    $tmes = "MARZO";
}elseif($mes == 4){
    $tmes = "ABRIL";
}elseif($mes == 5){
    $tmes = "MAYO";
}elseif($mes == 6){
    $tmes = "JUNIO";
}elseif($mes == 7){
    $tmes = "JULIO";
}elseif($mes == 8){
    $tmes = "AGOSTO";
}elseif($mes == 9){
    $tmes = "SEPTIEMBRE";
}elseif($mes == 10){
    $tmes = "OCTUBRE";
}elseif($mes == 11){
    $tmes = "NOVIEMBRE";
}elseif($mes == 12){
    $tmes = "DICIEMBRE";
}

//COMIENZA LA GRAFICA ANUAL
$sql_year = "SELECT CHARYEAR($year,1,1) AS ENERO, CHARYEAR($year,2,1) AS FEBRERO, CHARYEAR($year,3,1) AS MARZO, CHARYEAR($year,4,1) AS ABRIL, CHARYEAR($year,5,1) AS MAYO, CHARYEAR($year,6,1) AS JUNIO, CHARYEAR($year,7,1) AS JULIO, CHARYEAR($year,8,1) AS AGOSTO, CHARYEAR($year,9,1) AS SEPTIEMBRE, CHARYEAR($year,10,1) AS OCTUBRE, CHARYEAR($year,11,1) AS NOVIEMBRE, CHARYEAR($year,12,1) AS DICIEMBRE";
$result_year = $conexion->query($sql_year);
$gestion_year = $result_year->fetch_array(MYSQLI_ASSOC);
$sql2_year = "SELECT CHARYEAR($year,1,0) AS ENERO, CHARYEAR($year,2,0) AS FEBRERO, CHARYEAR($year,3,0) AS MARZO, CHARYEAR($year,4,0) AS ABRIL, CHARYEAR($year,5,0) AS MAYO, CHARYEAR($year,6,0) AS JUNIO, CHARYEAR($year,7,0) AS JULIO, CHARYEAR($year,8,0) AS AGOSTO, CHARYEAR($year,9,0) AS SEPTIEMBRE, CHARYEAR($year,10,0) AS OCTUBRE, CHARYEAR($year,11,0) AS NOVIEMBRE, CHARYEAR($year,12,0) AS DICIEMBRE";
$result2_year = $conexion->query($sql2_year);
$gestion2_year = $result2_year->fetch_array(MYSQLI_ASSOC);
$sql3_year = "SELECT CHARYEAR($year,1,2) AS ENERO, CHARYEAR($year,2,2) AS FEBRERO, CHARYEAR($year,3,2) AS MARZO, CHARYEAR($year,4,2) AS ABRIL, CHARYEAR($year,5,2) AS MAYO, CHARYEAR($year,6,2) AS JUNIO, CHARYEAR($year,7,2) AS JULIO, CHARYEAR($year,8,2) AS AGOSTO, CHARYEAR($year,9,2) AS SEPTIEMBRE, CHARYEAR($year,10,2) AS OCTUBRE, CHARYEAR($year,11,2) AS NOVIEMBRE, CHARYEAR($year,12,2) AS DICIEMBRE";
$result3_year = $conexion->query($sql3_year);
$gestion3_year = $result3_year->fetch_array(MYSQLI_ASSOC);

//COMIENZA LA GRAFICA MENSUAL
$sql_mes = "SELECT CHARMES($year,$mes,1,1) AS D1, CHARMES($year,$mes,2,1) AS D2, CHARMES($year,$mes,3,1) AS D3, CHARMES($year,$mes,4,1) AS D4, CHARMES($year,$mes,5,1) AS D5, CHARMES($year,$mes,6,1) AS D6, CHARMES($year,$mes,7,1) AS D7, CHARMES($year,$mes,8,1) AS D8, CHARMES($year,$mes,9,1) AS D9, CHARMES($year,$mes,10,1) AS D10, CHARMES($year,$mes,11,1) AS D11, CHARMES($year,$mes,12,1) AS D12, CHARMES($year,$mes,13,1) AS D13, CHARMES($year,$mes,14,1) AS D14, CHARMES($year,$mes,15,1) AS D15, CHARMES($year,$mes,16,1) AS D16, CHARMES($year,$mes,17,1) AS D17, CHARMES($year,$mes,18,1) AS D18, CHARMES($year,$mes,19,1) AS D19, CHARMES($year,$mes,20,1) AS D20, CHARMES($year,$mes,21,1) AS D21, CHARMES($year,$mes,22,1) AS D22, CHARMES($year,$mes,23,1) AS D23, CHARMES($year,$mes,24,1) AS D24, CHARMES($year,$mes,25,1) AS D25, CHARMES($year,$mes,26,1) AS D26, CHARMES($year,$mes,27,1) AS D27, CHARMES($year,$mes,28,1) AS D28, CHARMES($year,$mes,29,1) AS D29, CHARMES($year,$mes,30,1) AS D30, CHARMES($year,$mes,31,1) AS D31";
$result_mes = $conexion->query($sql_mes);
$gestion_mes = $result_mes->fetch_array(MYSQLI_ASSOC);
$sql2_mes = "SELECT CHARMES($year,$mes,1,0) AS D1, CHARMES($year,$mes,2,0) AS D2, CHARMES($year,$mes,3,0) AS D3, CHARMES($year,$mes,4,0) AS D4, CHARMES($year,$mes,5,0) AS D5, CHARMES($year,$mes,6,0) AS D6, CHARMES($year,$mes,7,0) AS D7, CHARMES($year,$mes,8,0) AS D8, CHARMES($year,$mes,9,0) AS D9, CHARMES($year,$mes,10,0) AS D10, CHARMES($year,$mes,11,0) AS D11, CHARMES($year,$mes,12,0) AS D12, CHARMES($year,$mes,13,0) AS D13, CHARMES($year,$mes,14,0) AS D14, CHARMES($year,$mes,15,0) AS D15, CHARMES($year,$mes,16,0) AS D16, CHARMES($year,$mes,17,0) AS D17, CHARMES($year,$mes,18,0) AS D18, CHARMES($year,$mes,19,0) AS D19, CHARMES($year,$mes,20,0) AS D20, CHARMES($year,$mes,21,0) AS D21, CHARMES($year,$mes,22,0) AS D22, CHARMES($year,$mes,23,0) AS D23, CHARMES($year,$mes,24,0) AS D24, CHARMES($year,$mes,25,0) AS D25, CHARMES($year,$mes,26,0) AS D26, CHARMES($year,$mes,27,0) AS D27, CHARMES($year,$mes,28,0) AS D28, CHARMES($year,$mes,29,0) AS D29, CHARMES($year,$mes,30,0) AS D30, CHARMES($year,$mes,31,0) AS D31";
$result2_mes = $conexion->query($sql2_mes);
$gestion2_mes = $result2_mes->fetch_array(MYSQLI_ASSOC);
$sql3_mes = "SELECT CHARMES($year,$mes,1,2) AS D1, CHARMES($year,$mes,2,2) AS D2, CHARMES($year,$mes,3,2) AS D3, CHARMES($year,$mes,4,2) AS D4, CHARMES($year,$mes,5,2) AS D5, CHARMES($year,$mes,6,2) AS D6, CHARMES($year,$mes,7,2) AS D7, CHARMES($year,$mes,8,2) AS D8, CHARMES($year,$mes,9,2) AS D9, CHARMES($year,$mes,10,2) AS D10, CHARMES($year,$mes,11,2) AS D11, CHARMES($year,$mes,12,2) AS D12, CHARMES($year,$mes,13,2) AS D13, CHARMES($year,$mes,14,2) AS D14, CHARMES($year,$mes,15,2) AS D15, CHARMES($year,$mes,16,2) AS D16, CHARMES($year,$mes,17,2) AS D17, CHARMES($year,$mes,18,2) AS D18, CHARMES($year,$mes,19,2) AS D19, CHARMES($year,$mes,20,2) AS D20, CHARMES($year,$mes,21,2) AS D21, CHARMES($year,$mes,22,2) AS D22, CHARMES($year,$mes,23,2) AS D23, CHARMES($year,$mes,24,2) AS D24, CHARMES($year,$mes,25,2) AS D25, CHARMES($year,$mes,26,2) AS D26, CHARMES($year,$mes,27,2) AS D27, CHARMES($year,$mes,28,2) AS D28, CHARMES($year,$mes,29,2) AS D29, CHARMES($year,$mes,30,2) AS D30, CHARMES($year,$mes,31,2) AS D31";
$result3_mes = $conexion->query($sql3_mes);
$gestion3_mes = $result3_mes->fetch_array(MYSQLI_ASSOC);
?>
<canvas id="canvasyear"></canvas>
<script>
    var config = {
        type: 'bar',
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            datasets: [{
                label: 'Tramites Finalizados',
                fill: false,
                backgroundColor: "rgb(40, 167, 69)",
                borderColor: "rgb(40, 167, 69)",
                data: [
                    <?php echo $gestion_year['ENERO']; ?>,
                    <?php echo $gestion_year['FEBRERO']; ?>,
                    <?php echo $gestion_year['MARZO']; ?>,
                    <?php echo $gestion_year['ABRIL']; ?>,
                    <?php echo $gestion_year['MAYO']; ?>,
                    <?php echo $gestion_year['JUNIO']; ?>,
                    <?php echo $gestion_year['JULIO']; ?>,
                    <?php echo $gestion_year['AGOSTO']; ?>,
                    <?php echo $gestion_year['SEPTIEMBRE']; ?>,
                    <?php echo $gestion_year['OCTUBRE']; ?>,
                    <?php echo $gestion_year['NOVIEMBRE']; ?>,
                    <?php echo $gestion_year['DICIEMBRE']; ?>
                ],
            }, {
                label: 'Tramites Pendientes',
                fill: false,
                backgroundColor: "rgb(220, 53, 69)",
                borderColor: "rgb(220, 53, 69)",
                data: [
                    <?php echo $gestion2_year['ENERO']; ?>,
                    <?php echo $gestion2_year['FEBRERO']; ?>,
                    <?php echo $gestion2_year['MARZO']; ?>,
                    <?php echo $gestion2_year['ABRIL']; ?>,
                    <?php echo $gestion2_year['MAYO']; ?>,
                    <?php echo $gestion2_year['JUNIO']; ?>,
                    <?php echo $gestion2_year['JULIO']; ?>,
                    <?php echo $gestion2_year['AGOSTO']; ?>,
                    <?php echo $gestion2_year['SEPTIEMBRE']; ?>,
                    <?php echo $gestion2_year['OCTUBRE']; ?>,
                    <?php echo $gestion2_year['NOVIEMBRE']; ?>,
                    <?php echo $gestion2_year['DICIEMBRE']; ?>
                ],
            }, {
                label: 'Tramites Ingresados',
                fill: false,
                backgroundColor: "rgb(0, 123, 255)",
                borderColor: "rgb(0, 123, 255)",
                data: [
                    <?php echo $gestion3_year['ENERO']; ?>,
                    <?php echo $gestion3_year['FEBRERO']; ?>,
                    <?php echo $gestion3_year['MARZO']; ?>,
                    <?php echo $gestion3_year['ABRIL']; ?>,
                    <?php echo $gestion3_year['MAYO']; ?>,
                    <?php echo $gestion3_year['JUNIO']; ?>,
                    <?php echo $gestion3_year['JULIO']; ?>,
                    <?php echo $gestion3_year['AGOSTO']; ?>,
                    <?php echo $gestion3_year['SEPTIEMBRE']; ?>,
                    <?php echo $gestion3_year['OCTUBRE']; ?>,
                    <?php echo $gestion3_year['NOVIEMBRE']; ?>,
                    <?php echo $gestion3_year['DICIEMBRE']; ?>
                ],
            }]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'TRAMITES DE SANEAMIENTO GESTION <?php echo $year; ?>'
            },
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Meses'
                    }
                }],
                yAxes: [{
                    display: true,
                    ticks:{
                        beginAtZero:true
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Tramites'
                    }
                }]
            }
        }
    };
    var ctx = document.getElementById('canvasyear').getContext('2d');
    window.myLine = new Chart(ctx, config);
</script>
<br>
<canvas id="canvasmes"></canvas>
<script>
    var config = {
        type: 'bar',
        data: {
            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'],
            datasets: [{
                label: 'Tramites Finalizados',
                fill: false,
                backgroundColor: "rgb(40, 167, 69)",
                borderColor: "rgb(40, 167, 69)",
                data: [
                    <?php echo $gestion_mes['D1']; ?>,
                    <?php echo $gestion_mes['D2']; ?>,
                    <?php echo $gestion_mes['D3']; ?>,
                    <?php echo $gestion_mes['D4']; ?>,
                    <?php echo $gestion_mes['D5']; ?>,
                    <?php echo $gestion_mes['D6']; ?>,
                    <?php echo $gestion_mes['D7']; ?>,
                    <?php echo $gestion_mes['D8']; ?>,
                    <?php echo $gestion_mes['D9']; ?>,
                    <?php echo $gestion_mes['D10']; ?>,
                    <?php echo $gestion_mes['D11']; ?>,
                    <?php echo $gestion_mes['D12']; ?>,
                    <?php echo $gestion_mes['D13']; ?>,
                    <?php echo $gestion_mes['D14']; ?>,
                    <?php echo $gestion_mes['D15']; ?>,
                    <?php echo $gestion_mes['D16']; ?>,
                    <?php echo $gestion_mes['D17']; ?>,
                    <?php echo $gestion_mes['D18']; ?>,
                    <?php echo $gestion_mes['D19']; ?>,
                    <?php echo $gestion_mes['D20']; ?>,
                    <?php echo $gestion_mes['D21']; ?>,
                    <?php echo $gestion_mes['D22']; ?>,
                    <?php echo $gestion_mes['D23']; ?>,
                    <?php echo $gestion_mes['D24']; ?>,
                    <?php echo $gestion_mes['D25']; ?>,
                    <?php echo $gestion_mes['D26']; ?>,
                    <?php echo $gestion_mes['D27']; ?>,
                    <?php echo $gestion_mes['D28']; ?>,
                    <?php echo $gestion_mes['D29']; ?>,
                    <?php echo $gestion_mes['D30']; ?>,
                    <?php echo $gestion_mes['D31']; ?>
                ],
            }, {
                label: 'Tramites Pendientes',
                fill: false,
                backgroundColor: "rgb(220, 53, 69)",
                borderColor: "rgb(220, 53, 69)",
                data: [
                    <?php echo $gestion2_mes['D1']; ?>,
                    <?php echo $gestion2_mes['D2']; ?>,
                    <?php echo $gestion2_mes['D3']; ?>,
                    <?php echo $gestion2_mes['D4']; ?>,
                    <?php echo $gestion2_mes['D5']; ?>,
                    <?php echo $gestion2_mes['D6']; ?>,
                    <?php echo $gestion2_mes['D7']; ?>,
                    <?php echo $gestion2_mes['D8']; ?>,
                    <?php echo $gestion2_mes['D9']; ?>,
                    <?php echo $gestion2_mes['D10']; ?>,
                    <?php echo $gestion2_mes['D11']; ?>,
                    <?php echo $gestion2_mes['D12']; ?>,
                    <?php echo $gestion2_mes['D13']; ?>,
                    <?php echo $gestion2_mes['D14']; ?>,
                    <?php echo $gestion2_mes['D15']; ?>,
                    <?php echo $gestion2_mes['D16']; ?>,
                    <?php echo $gestion2_mes['D17']; ?>,
                    <?php echo $gestion2_mes['D18']; ?>,
                    <?php echo $gestion2_mes['D19']; ?>,
                    <?php echo $gestion2_mes['D20']; ?>,
                    <?php echo $gestion2_mes['D21']; ?>,
                    <?php echo $gestion2_mes['D22']; ?>,
                    <?php echo $gestion2_mes['D23']; ?>,
                    <?php echo $gestion2_mes['D24']; ?>,
                    <?php echo $gestion2_mes['D25']; ?>,
                    <?php echo $gestion2_mes['D26']; ?>,
                    <?php echo $gestion2_mes['D27']; ?>,
                    <?php echo $gestion2_mes['D28']; ?>,
                    <?php echo $gestion2_mes['D29']; ?>,
                    <?php echo $gestion2_mes['D30']; ?>,
                    <?php echo $gestion2_mes['D31']; ?>
                ],
            }, {
                label: 'Tramites Ingresados',
                fill: false,
                backgroundColor: "rgb(0, 123, 255)",
                borderColor: "rgb(0, 123, 255)",
                data: [
                    <?php echo $gestion3_mes['D1']; ?>,
                    <?php echo $gestion3_mes['D2']; ?>,
                    <?php echo $gestion3_mes['D3']; ?>,
                    <?php echo $gestion3_mes['D4']; ?>,
                    <?php echo $gestion3_mes['D5']; ?>,
                    <?php echo $gestion3_mes['D6']; ?>,
                    <?php echo $gestion3_mes['D7']; ?>,
                    <?php echo $gestion3_mes['D8']; ?>,
                    <?php echo $gestion3_mes['D9']; ?>,
                    <?php echo $gestion3_mes['D10']; ?>,
                    <?php echo $gestion3_mes['D11']; ?>,
                    <?php echo $gestion3_mes['D12']; ?>,
                    <?php echo $gestion3_mes['D13']; ?>,
                    <?php echo $gestion3_mes['D14']; ?>,
                    <?php echo $gestion3_mes['D15']; ?>,
                    <?php echo $gestion3_mes['D16']; ?>,
                    <?php echo $gestion3_mes['D17']; ?>,
                    <?php echo $gestion3_mes['D18']; ?>,
                    <?php echo $gestion3_mes['D19']; ?>,
                    <?php echo $gestion3_mes['D20']; ?>,
                    <?php echo $gestion3_mes['D21']; ?>,
                    <?php echo $gestion3_mes['D22']; ?>,
                    <?php echo $gestion3_mes['D23']; ?>,
                    <?php echo $gestion3_mes['D24']; ?>,
                    <?php echo $gestion3_mes['D25']; ?>,
                    <?php echo $gestion3_mes['D26']; ?>,
                    <?php echo $gestion3_mes['D27']; ?>,
                    <?php echo $gestion3_mes['D28']; ?>,
                    <?php echo $gestion3_mes['D29']; ?>,
                    <?php echo $gestion3_mes['D30']; ?>,
                    <?php echo $gestion3_mes['D31']; ?>
                ],
            }]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'TRAMITES DE SANEAMIENTO MES DE <?php echo $tmes; ?>'
            },
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Dias'
                    }
                }],
                yAxes: [{
                    display: true,
                    ticks:{
                        beginAtZero:true
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Tramites'
                    }
                }]
            }
        }
    };
    var ctx = document.getElementById('canvasmes').getContext('2d');
    window.myLine = new Chart(ctx, config);
</script>
<br><br>
<p align="center"><small><i>TRAMITES POR USUARIOS</i></small></p>
<?php
//COMIENZA DATOS DE USUARIOS EN EL SISTEMA
$sql_user = "SELECT * FROM usuarios WHERE seg_saneamiento = '1'";
$result_user = $conexion->query($sql_user);
$row_user = $result_user->fetch_array(MYSQLI_ASSOC);

$i = 0; ?>
<div class="row row-cols-1 row-cols-md-2">
<?php
do { 
    $i++;
    $tAtendidos = totalAtendidosUser($year,$mes,$row_user['id_usuario'],$row_user['nivel_usuario']);
    $tExternos = totalExternosUser($year,$mes,$row_user['id_usuario']);
    $tPendientes = totalPendientesUser($year,$mes,$row_user['id_usuario']);
    $tTotal = totalTramitesUser($year,$mes,$row_user['id_usuario']);

    if($tTotal == 0){
        $porcentAtendidos = 100;
        $porcentExternos = 0;
        $porcentPendientes = 0;
    }else{
        $porcentAtendidos = round((100*$tAtendidos)/$tTotal);
        $porcentExternos = round((100*$tExternos)/$tTotal);
        $porcentPendientes = round((100*$tPendientes)/$tTotal);
    }
    ?>
    <div class="media border p-2">
        <img src="<?php echo $row_user['img_usuario']; ?>" alt="<?php echo $row_user['nom_usuario']; ?>" class="mr-2 mt-2 rounded-circle" style="width: 50px;">
        <div class="media-body">
            <h5><?php echo $row_user['nom_usuario']; ?></h5>
            <div class="progress">
                <div class="progress-bar bg-info" style="width:<?php echo $porcentAtendidos; ?>%">
                    <?php echo $tAtendidos; ?>
                </div>
                <div class="progress-bar bg-warning" style="width:<?php echo $porcentExternos; ?>%">
                    <?php echo $tExternos; ?>
                </div>
                <div class="progress-bar bg-danger" style="width:<?php echo $porcentPendientes; ?>%">
                    <?php echo $tPendientes; ?>
                </div>
            </div>
        </div>
    </div>
<?php }while($row_user = $result_user->fetch_array(MYSQLI_ASSOC)); ?>
</div>
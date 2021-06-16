<?php
session_start();
require_once("sis_conexion.php");
require("sis_funciones.php");

$sql1 = "SELECT id_dia FROM reporte_dia";
$result1 = $conexion->query($sql1);
$row1 = $result1->fetch_array(MYSQLI_ASSOC);

?>
<p>
    <?php $i=62; $y=0; do{ $y++; ?>
    ?php echo $gestion_mes['D']; ?>,
    <?php 
    $i++; }while($i<93);?>
</p>


<script>
function cargar(){
    $.ajax({
        success:function(){
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
                            <?php echo $gestion_year['FEBREO']; ?>,
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
                            <?php echo $gestion2_year['FEBREO']; ?>,
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
                            <?php echo $gestion3_year['FEBREO']; ?>,
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
                        text: 'Datos de tramites de Saneamiento Gestion 2020'
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
        }
    });
    $.ajax({
        success:function(){
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
                        text: 'Datos de tramites de Saneamiento Gestion 2020'
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
            var ctx = document.getElementById('canvasmes').getContext('2d');
            window.myLine = new Chart(ctx, config);
        }
    });
}
</script>

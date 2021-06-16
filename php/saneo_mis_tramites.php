<?php
session_start();
require_once("sis_conexion.php");
require("sis_funciones.php");
require("auth_saneo.php");

$fecha_de = $_POST['fecha_de'];
$fecha_a = $_POST['fecha_a'];
$usuario_sesion = $_SESSION['id_usuario'];
//$sql = "SELECT * FROM control WHERE id_usuario='$usuario_sesion' AND date_control BETWEEN '$fecha_de' AND '$fecha_a' ORDER BY date_control DESC";
$sql = "SELECT * FROM saneamiento s, control c WHERE s.`cod_saneamiento`=c.`cod_saneamiento` AND c.`id_usuario`='$usuario_sesion' AND c.`date_control` BETWEEN '$fecha_de' AND '$fecha_a' ORDER BY c.`id_control` DESC";
$result = $conexion->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);
?>
<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th>C.I.</th>
            <th>Nombre Completo</th>
            <th>Tipo de Tramite</th>
            <th>Estado</th>
            <th>Fecha - Hora</th>
        </tr>
    </thead>
    <tbody>
        <?php do{
            ?> 
            <tr>
                <td><?php echo $row['ci_saneamiento']." ".$row['cic_saneamiento']; ?></td>
                <td><?php echo $row['nom_saneamiento']; ?></td>
                <td><?php tramite($row['id_tramite']); ?></td>
                <td>
                    <?php
                        if($row['estado_control']=='2'){
                            ?><h6><span class="badge badge-warning">Externa</span></h6><?php
                        }elseif($row['estado_control']=='1'){
                            ?><h6><span class="badge badge-success">Finalizado</span></h6><?php
                        }elseif($row['estado_control']=='0'){
                            ?><h6><span class="badge badge-danger">Pendiente</span></h6><?php
                        }elseif($row['estado_control']=='3'){
                            ?><h6><span class="badge badge-primary">Atendido</span></h6><?php
                        }
                    ?>
                </td>
                <td><?php echo $row['date_control']." ".$row['time_control']; ?></td>
            </tr>
            <?php
        }while($row = $result->fetch_array(MYSQLI_ASSOC));?>
    </tbody>
</table>
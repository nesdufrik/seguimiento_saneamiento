<?php
session_start();
require_once("sis_conexion.php");
require("sis_funciones.php");
require("auth_saneo.php");

$cod_saneamiento = $_POST['cod_saneamiento'];
if($_POST['id_usuario_para'] == "EXTERNO"){
    $id_usuario_para = $_SESSION['id_usuario'];
    $estado_de = 2;
    $estado_para = 2;
    if($_POST['id_sub_estado'] != ""){
        $id_sub_estado = $_POST['id_sub_estado'];
        $destino = externo($id_sub_estado);
    }else{
        ?>
            <div class="alert alert-warning">Seleccione un destinatario Externo</strong></i></div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        <?php
        exit;
    }
}else{
    $id_usuario_para = $_POST['id_usuario_para'];   
    $estado_de = 3;
    $estado_para = 0;
    $id_sub_estado = 0;
    $destino = usuario($id_usuario_para);
}
$id_usuario_de = $_SESSION['id_usuario'];
$obs_control = $_POST['obs_control'];
$id_tramite = $_POST['id_tramite'];
$date = date("Y-m-d");
$time = date("H:i:s");

$buscar = "SELECT * FROM control WHERE cod_saneamiento='$cod_saneamiento' AND id_usuario='$id_usuario_para'";
$q_seguimiento = "INSERT INTO seguimiento (cod_saneamiento, id_usuario_de, id_usuario_para, estado_seguimiento, sub_estado_seguimiento, obs_seguimiento, date_seguimiento, time_seguimiento) VALUES ('$cod_saneamiento','$id_usuario_de','$id_usuario_para','$estado_para','$id_sub_estado','$obs_control','$date','$time')";
$q_ins_para = "INSERT INTO control (cod_saneamiento, id_tramite, id_usuario, estado_control, sub_estado_control, obs_control, date_control, time_control) VALUES ('$cod_saneamiento','$id_tramite','$id_usuario_para','$estado_para','$id_sub_estado','$obs_control','$date','$time')";
$q_upd_para = "UPDATE control SET estado_control='$estado_para', sub_estado_control='$id_sub_estado', obs_control='$obs_control', date_control='$date', time_control='$time' WHERE cod_saneamiento='$cod_saneamiento' AND id_usuario='$id_usuario_para'";
$q_upd_de = "UPDATE control SET estado_control='$estado_de', sub_estado_control='$id_sub_estado', obs_control='$obs_control', date_control='$date', time_control='$time' WHERE cod_saneamiento='$cod_saneamiento' AND id_usuario='$id_usuario_de'";

$r_buscar = $conexion->query($buscar);
$count = mysqli_num_rows($r_buscar);

if($count == 1){
	if($id_usuario_para != '' && $conexion->query($q_seguimiento) === TRUE){
        ?>
            <div class="alert alert-success"><strong>Exito!</strong> tramite derivado correctamente a: <i><strong><?php echo $destino; ?></strong></i></div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="location.reload();">Cerrar</button>
            </div>
        <?php
        $result1 = $conexion->query($q_upd_para);
        $result2 = $conexion->query($q_upd_de);
    } else {
        ?>
            <div class="alert alert-warning">Seleccione un destinatario</strong></i></div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        <?php
        $conexion->error;
    }
} else {
    if($id_usuario_para != '' && $conexion->query($q_seguimiento) === TRUE){
        ?>
            <div class="alert alert-success"><strong>Exito!</strong> tramite derivado correctamente a: <i><strong><?php echo usuario($id_usuario_para); ?></strong></i></div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="location.reload();">Cerrar</button>
            </div>
        <?php
        $result1 = $conexion->query($q_ins_para);
        $result2 = $conexion->query($q_upd_de);
    } else {
        ?>
            <div class="alert alert-warning">Seleccione un destinatario</strong></i></div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        <?php
        $conexion->error;
    }
}
mysqli_close($conexion);
?>
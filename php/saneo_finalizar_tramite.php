<?php
session_start();
require_once("sis_conexion.php");
require("sis_funciones.php");
require("auth_saneo.php");

$cod_saneamiento = $_POST['cod_saneamiento'];
$id_usuario_de = $_SESSION['id_usuario'];
$obs_control = "TRAMITE FINALIZADO";
$date = date("Y-m-d");
$time = date("H:i:s");

$buscar = "SELECT * FROM usuarios WHERE id_usuario='$id_usuario_de' AND nivel_usuario='3'";
$r_buscar = $conexion->query($buscar);
$count = mysqli_num_rows($r_buscar);

$q_seguimiento = "INSERT INTO seguimiento (cod_saneamiento, id_usuario_de, estado_seguimiento, obs_seguimiento, date_seguimiento, time_seguimiento) VALUES ('$cod_saneamiento','$id_usuario_de','1','$obs_control','$date','$time')";
$q_upd_de = "UPDATE control SET estado_control='1', obs_control='$obs_control', date_control='$date', time_control='$time' WHERE cod_saneamiento='$cod_saneamiento' AND id_usuario='$id_usuario_de'";

if($count == 1){
	if($conexion->query($q_seguimiento) === TRUE){
        ?>
            <div class="alert alert-success"><strong>Correcto!</strong> Se finalizo el tramite</div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="location.reload();">Cerrar</button>
            </div>
        <?php
        $result = $conexion->query($q_upd_de);
    } else {
        echo "Error al registrar el tramite.<br>".$conexion->error;
    }
} else {
    ?>
        <div class="alert alert-danger">El usuario <strong>no tiene los privilegios</strong> para finalizar este tramite</div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
    <?php
}




mysqli_close($conexion);
?>
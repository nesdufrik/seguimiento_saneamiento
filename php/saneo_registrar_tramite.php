<?php
session_start();
require_once("sis_conexion.php");
require("sis_funciones.php");
require("auth_saneo.php");

$usuario_sesion = $_SESSION['id_usuario'];

$cod_saneamiento = generate_string($permitted_chars, 20);
$id_tramite = $_POST['id_tramite'];
$ci_saneamiento = $_POST['ci_saneamiento'];
if(strlen($_POST['cic_saneamiento']) == '1'){
    ?>
        <div class="alert alert-warning"><strong>Error!</strong> Complemento de CI incorrecto</div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
    <?php
    exit;
}else{
    $cic_saneamiento = $_POST['cic_saneamiento'];
}
$nom_saneamiento = $_POST['nom_saneamiento'];
$ref_saneamiento = $_POST['ref_saneamiento'];
$date = date("Y-m-d");
$time = date("H:i:s");

$buscarCodigo = "SELECT * FROM saneamiento WHERE cod_saneamiento = '$cod_saneamiento'";
$result = $conexion->query($buscarCodigo);
$count = mysqli_num_rows($result);

$sql_duplicado = "SELECT * FROM saneamiento WHERE ci_saneamiento = '$ci_saneamiento' AND cic_saneamiento = '$cic_saneamiento' AND id_tramite = '$id_tramite'";
$result_duplicado = $conexion->query($sql_duplicado);
$count_duplicado = mysqli_num_rows($result_duplicado);

if($id_tramite!='' && $ci_saneamiento!='' && $nom_saneamiento!=''){
    if($count == 1){
        ?>
            <div class="alert alert-warning"><strong>Error!</strong> intente nuevamente</div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        <?php
    } elseif($count_duplicado == 0){
        $query = "INSERT INTO saneamiento (cod_saneamiento, id_tramite, ci_saneamiento, cic_saneamiento, nom_saneamiento, ref_saneamiento, date_saneamiento, time_saneamiento) VALUES ('$cod_saneamiento','$id_tramite','$ci_saneamiento','$cic_saneamiento','$nom_saneamiento','$ref_saneamiento','$date','$time')";
        $query2 = "INSERT INTO seguimiento (cod_saneamiento, id_usuario_de, estado_seguimiento, obs_seguimiento, date_seguimiento, time_seguimiento) VALUES ('$cod_saneamiento','$usuario_sesion','0','TRAMITE INICIADO','$date','$time')";
        $query3 = "INSERT INTO control (cod_saneamiento, id_tramite, id_usuario, estado_control, obs_control, date_control, time_control) VALUES ('$cod_saneamiento','$id_tramite','$usuario_sesion','0','TRAMITE INICIADO','$date','$time')";
        if($conexion->query($query) === TRUE){
            ?>
                <div class="alert alert-success"><strong>Registro Correcto!</strong> revise sus tramites pendientes para continuar</div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="location.reload();">Cerrar</button>
                </div>
            <?php
            $result2 = $conexion->query($query2);
            $result3 = $conexion->query($query3);
        } else {
            echo "Error al registrar el tramite.<br>".$conexion->error;
        }    
    } else {
        ?>
            <div class="alert alert-danger"><strong>Error! Tramite duplicado,</strong> revise el tipo de tramite y el CI que esta registrando.</div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        <?php
    }
} else {
    ?>
        <div class="alert alert-danger"><strong>Error!</strong> revise todos los campos requeridos</div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
    <?php
}
mysqli_close($conexion);
?>
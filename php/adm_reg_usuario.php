<?php 
session_start();
require_once("sis_conexion.php");
require("sis_funciones.php");
require("auth_admin.php");

$nom_usuario = $_POST['nom_usuario'];
$cargo_usuario = $_POST['cargo_usuario'];
$nivel_usuario = $_POST['nivel_usuario'];
$ad_usuario = $_POST['ad_usuario'];
$form_pass = $_POST['pass_usuario'];
$pass_usuario = password_hash($form_pass, PASSWORD_BCRYPT);

if($_POST['sexo_usuario'] == "M"){
    $img_usuario = "img/male.png";
}elseif($_POST['sexo_usuario'] == "F"){
    $img_usuario = "img/female.png";
}

$buscarUsuario = "SELECT * FROM usuarios WHERE ad_usuario = '$ad_usuario'";
$result = $conexion->query($buscarUsuario);
$count = mysqli_num_rows($result);

if($count == 1){
	?>
        <div class="modal-body">Ya existe un nombre de usuario igual.</div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
    <?php
} else {
	$query = "INSERT INTO usuarios (nom_usuario, cargo_usuario, nivel_usuario, ad_usuario, pass_usuario, estado_usuario, img_usuario) VALUES ('$nom_usuario','$cargo_usuario','$nivel_usuario','$ad_usuario','$pass_usuario','1','$img_usuario')";
	if($conexion->query($query) === TRUE){
        ?>
            <div class="modal-body">Se creo la cuenta exitosamente.</div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="location.reload();">Cerrar</button>
            </div>
        <?php
	} else {
		echo "Error al crear el usuario.<br>".$conexion->error;
	}
}
mysqli_close($conexion);
?>
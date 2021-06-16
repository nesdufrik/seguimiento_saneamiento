<?php
session_start();
require_once("sis_conexion.php");

$ad_usuario = $_POST['ad_usuario'];
$pass_usuario = $_POST['pass_usuario'];

$sql = "SELECT * FROM usuarios WHERE ad_usuario = '$ad_usuario' AND estado_usuario = '1'";

$result = $conexion->query($sql);

if($result->num_rows > 0){
	$row = $result->fetch_array(MYSQLI_ASSOC);
	if(password_verify($pass_usuario, $row['pass_usuario'])){
		//Datos de sesión del medico
		$_SESSION['loggedin'] = true;
		$_SESSION['id_usuario'] = $row['id_usuario'];
		$_SESSION['nivel_usuario'] = $row['nivel_usuario'];
		//Datos del tiempo de tiempo de sesión
		$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start']+(60*60);
		//Reenvia a dirección
		?>
			<div class="alert alert-success">
				<strong>Exito!</strong> Los datos ingresador son los correctos.
				<script type="text/javascript">
					function redireccionar(){
						window.location.href="gen_home.html";
					} 
					setTimeout ("redireccionar()", 500); //tiempo expresado en milisegundos
				</script>
			</div>
		<?php
	} else {
		?>
			<div class="alert alert-warning">
				<strong>Error!</strong> Contraseña Incorrecta.
			</div>
		<?php	
	}
} else {
	?>
		<div class="alert alert-danger">
			<strong>Error!</strong> Usuario Incorrecto o Desactivado.
		</div>
	<?php
}
mysqli_close($conexion);
?>
<?php
session_start();
require_once("sis_conexion.php");
require("sis_funciones.php");
require("auth_saneo.php");

$year = $_POST['year'];
$mes = $_POST['mes'];
$dia = $_POST['dia'];
$cantidad = $_POST['cantidad'];
$id_tramite = $_POST['id_tramite'];
$usuario_sesion = $_SESSION['id_usuario'];

inputRegularizar($id_tramite,$year,$mes,$dia,$cantidad,$usuario_sesion);

echo "SE GENERO $cantidad TRAMITES DE MANERA CORRECTA";

?>
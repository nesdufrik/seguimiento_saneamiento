<?php

$niveles_autorizados = "5";

if (!((isset($_SESSION['id_usuario'])) && (autorizacion("",$niveles_autorizados, $_SESSION['id_usuario'], $_SESSION['nivel_usuario'])))){
    ?>
	<script>
        alert("Esta seccion es solamente para usuarios registrados y autorizados");
        window.location.href="index.html";
    </script>
    <?php
	exit;
}

$now = time();
if($now > $_SESSION['expire']){
    session_destroy();
    ?>
	<script>
        alert("Su sesion a terminado, necesita iniciar sesion nuevamente...");
        window.location.href="index.html";
    </script> 
    <?php
    exit;
}
?>
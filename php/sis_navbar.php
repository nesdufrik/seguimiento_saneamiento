<?php
session_start();
require_once("sis_conexion.php");
require("sis_funciones.php");

if(!isset($_SESSION['id_usuario']) && !isset($_SESSION['nivel_usuario'])){
    ?>
	<script>
        alert("Usted no inicio Sesion, por favor incie sesion para continuar");
        window.location.href="index.html";
    </script> 
    <?php
    exit;
} else {
    $id_usuario = $_SESSION['id_usuario'];
    $nivel_usuario = $_SESSION['nivel_usuario'];
}

?>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="gen_home.html">INICIO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav mr-auto">
                <?php
                //BOTONES PARA SANEAMIENTO
                if($nivel_usuario == '2' or $nivel_usuario == '3'){ ?>
                <li class="nav-item">
                    <button type="button" class="btn btn-outline-secondary" onclick="window.location.href='saneo_registrar_tramite.html'">
                    Iniciar Saneamiento
                    </button>&nbsp;
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-outline-info" onclick="window.location.href='saneo_regularizar.html'">
                    Regularizar
                    </button>&nbsp;
                </li>
                <?php }
                //BOTONES PARA SANEAMIENTO Y RESPONSABLES
                if($nivel_usuario == '2' or $nivel_usuario == '3' or $nivel_usuario == '4'){ ?>
                <li class="nav-item">
                    <button type="button" class="btn btn-outline-secondary" onclick="window.location.href='saneo_pendientes.html'">
                        Mis pendientes <span class="badge badge-light"><?php totalPendientes($_SESSION['id_usuario']);?></span>
                    </button>&nbsp;
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-outline-secondary" onclick="window.location.href='saneo_mis_tramites.html'">
                        Mis tramites
                    </button>&nbsp;
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-outline-secondary" onclick="window.location.href='saneo_reportes.html'">
                        Reportes
                    </button>&nbsp;
                </li>
                <?php }
                //BOTONES PARA RESPONSABLES
                if($nivel_usuario == '4'){ ?>
                <li class="nav-item">
                    <button type="button" class="btn btn-outline-secondary" onclick="window.location.href='sup_estadisticos.html'">
                        Estadisticos
                    </button>&nbsp;
                </li>
                <?php }
                //BOTONES PARA TIC
                if($nivel_usuario == '5'){ ?>
                <li class="nav-item">
                    <button type="button" class="btn btn-outline-secondary" onclick="window.location.href='adm_usuarios.html'">
                        Funcionarios
                    </button>&nbsp;
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-outline-secondary" onclick="window.location.href='adm_tramites.html'">
                        Tipos de Tramite
                    </button>&nbsp;
                </li>
                <?php }
                // FINAL DE BOTONES ?>
                <li class="nav-item">
                    <button type="button" class="btn btn-outline-secondary" onclick="window.location.href='gen_config.html'">
                        Configuración
                    </button>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" disabled value="<?php echo usuario($id_usuario); ?>">
                <input type="hidden" value="logout" id="desconectar">
                <button class="btn btn-danger" type="button" onclick="logout();">Desconectar</button>
            </form>
        </div>
    </nav>
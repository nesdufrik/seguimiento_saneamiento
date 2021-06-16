<?php
session_start();
require_once("sis_conexion.php");
require("sis_funciones.php");
require("auth_saneo.php");

$year = $_POST['year'];
$mes = $_POST['mes'];
$dia = $_POST['dia'];

$sql_tramites = "SELECT * FROM tramites WHERE estado_tramite = '1'";
$result_tramites = $conexion->query($sql_tramites);
$row_tramites = $result_tramites->fetch_array(MYSQLI_ASSOC);

$i = 0;
do{
    $i++;
?>
    <div class="media border p-2">
        <div class="media-body">
            <h5><?php echo $row_tramites['nom_tramite']; ?></h5>
            <div class="input-group mb-3">
                <?php
                if(loadRegularizar($year,$mes,$dia,$row_tramites['id_tramite']) != 0){
                    ?>
                    <input type="text" value="<?php echo loadRegularizar($year,$mes,$dia,$row_tramites['id_tramite']); ?>" class="form-control" placeholder="Cantidad de tramites" disabled>
                    <div class="input-group-append">
                        <button class="btn btn-success" type="button" id="generar" disabled>Generar</button>
                    </div>
                    <?php
                }else{
                    ?>
                    <input type="text" id="cantidad<?php echo $i; ?>" class="form-control" placeholder="Cantidad de tramites">
                    <input type="hidden" id="id_tramite<?php echo $i; ?>" value="<?php echo $row_tramites['id_tramite']; ?>">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="button" id="botongenerar<?php echo $i; ?>" onclick="inputRegularizar('cantidad<?php echo $i; ?>','id_tramite<?php echo $i; ?>','botongenerar<?php echo $i; ?>');">Generar</button>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php
}while($row_tramites = $result_tramites->fetch_array(MYSQLI_ASSOC));
?>
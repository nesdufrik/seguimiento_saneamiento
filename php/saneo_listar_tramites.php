<?php
session_start();
require_once("sis_conexion.php");
require("sis_funciones.php");
require("auth_saneo.php");

$sql = "SELECT * FROM tramites WHERE estado_tramite = '1'";
$result = $conexion->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);
?>
<label for="id_tramite">Seleccione el tipo de tramite a realizar</label>
    <select class="custom-select" required id="id_tramite" name="id_tramite">
        <option value="">Seleccione un tramite</option>
<?php do { ?>
        <option value="<?php echo $row['id_tramite']; ?>"><?php echo $row['nom_tramite']; ?></option>
<?php }while($row = $result->fetch_array(MYSQLI_ASSOC)); ?>
    </select>
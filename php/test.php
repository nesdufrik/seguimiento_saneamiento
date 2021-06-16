<?php
session_start();
require_once("sis_conexion.php");
require("sis_funciones.php");

$sql1 = "SELECT id_dia FROM reporte_dia";
$result1 = $conexion->query($sql1);
$row1 = $result1->fetch_array(MYSQLI_ASSOC);

?>

<table>
    <thead>
        <tr>
            <th>Descripcion</th>
            <?php $i = 0; do{ $i++;
            ?>
            <th><?php echo $row1['id_dia']; ?></th>
            <?php
            }while($row1 = $result1->fetch_array(MYSQLI_ASSOC));?>
            <th>TOTAL</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>hola2</td>
        </tr>
    </tbody>
</table>
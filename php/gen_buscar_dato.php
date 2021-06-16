<?php
session_start();
require_once("sis_conexion.php");
require("sis_funciones.php");
require("auth_gen.php");

if((isset($_POST['buscar_dato'])) && ($_POST['buscar_dato'] != "")){
    $buscar = $_POST['buscar_dato'];
    $sql = "SELECT * FROM saneamiento s, seguimiento e WHERE e.`cod_saneamiento`=s.`cod_saneamiento` AND s.`ci_saneamiento` = '$buscar' ORDER BY e.`id_seguimiento` DESC";
    $result = $conexion->query($sql);
    if($result->num_rows > 0){
        $row = $result->fetch_array(MYSQLI_ASSOC);
        ?>
        <div id="accordion">
                <?php $i=0; do{ $i++; ?>
                    <div class="card">
                        <div class="card-header">
                            <table width=100%>
                                <tr>
                                    <td><a class="card-link" data-toggle="collapse" href="#collapse<?php echo $i; ?>">
                                        <?php echo $row['ci_saneamiento']." ".$row['cic_saneamiento']; ?> - <?php echo $row['nom_saneamiento']; ?>
                                        </a>
                                        <?php
                                        if($row['estado_seguimiento']=='2'){
                                            if($row['sub_estado_seguimiento'] == 0 or $row['sub_estado_seguimiento'] == NULL){
                                                ?><h6><span class="badge badge-warning">Externa</span></h6><?php
                                            }else{
                                                ?><h6><span class="badge badge-warning">Externa</span><span class="badge badge-info"><?php echo externo($row['sub_estado_seguimiento']); ?></span></h6><?php
                                            }
                                        }elseif($row['estado_seguimiento']=='1'){
                                            ?><h6><span class="badge badge-success">Finalizado</span></h6><?php
                                        }                                        
                                        ?>
                                    </td>
                                    <td><?php echo $row['date_seguimiento']." ".$row['time_seguimiento']; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div id="collapse<?php echo $i; ?>" class="collapse">
                            <div class="card-body">
                                <table width=100%>
                                    <tr>
                                        <td colspan="2"><strong>Tipo de Saneamiento:</strong> <?php tramite($row['id_tramite']); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>De:</strong> <?php echo usuario($row['id_usuario_de']); ?></td>
                                        <td><strong>Para:</strong> <?php echo usuario($row['id_usuario_para']); ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>Observaciones:</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><i><?php echo $row['obs_seguimiento']; ?></i></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php }while($row = $result->fetch_array(MYSQLI_ASSOC));?>
        </div>
        <?php
    } else {
        ?>
			<div class="alert alert-warning">
				<strong>No se encontro</strong> tramite de Saneamiento con esos datos.
			</div>
        <?php
    }
} else {
    echo "ERROR DE VARIABLE";
}
mysqli_close($conexion);
?>
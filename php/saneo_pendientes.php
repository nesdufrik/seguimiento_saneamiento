<?php
session_start();
require_once("sis_conexion.php");
require("sis_funciones.php");
require("auth_saneo.php");

$usuario_sesion = $_SESSION['id_usuario'];

$sql = "SELECT * FROM saneamiento s, control c WHERE s.`cod_saneamiento`=c.`cod_saneamiento` AND c.`id_usuario`='$usuario_sesion' AND c.`estado_control`<>'1' AND c.`estado_control`<>'3' ORDER BY c.`id_control` DESC";
$result = $conexion->query($sql);
if($result->num_rows > 0){
    $row = $result->fetch_array(MYSQLI_ASSOC);
    ?>
    <div id="accordion">
            <?php $i=0; do{ $i++; ?>
                <div class="card">
                    <div class="card-header">
                        <table width=100% style="text-align:left">
                            <caption><?php echo $row['date_control']." ".$row['time_control']; ?></caption>
                            <tr>
                                <th><a class="card-link" data-toggle="collapse" href="#collapse<?php echo $i; ?>">
                                    <?php echo $row['ci_saneamiento']." ".$row['cic_saneamiento']; ?> - <?php echo $row['nom_saneamiento']; ?>
                                    </a>
                                    <?php
                                        if($row['estado_control']=='2'){
                                            if($row['sub_estado_control'] == 0 or $row['sub_estado_control'] == NULL){
                                                ?><span class="badge badge-warning">Externa</span><?php
                                            }else{
                                                ?><span class="badge badge-warning">Externa</span><span class="badge badge-info"><?php echo externo($row['sub_estado_control']); ?></span><?php
                                            }
                                        }                                       
                                    ?>
                                </th>
                            </tr>
                        </table>
                    </div>
                    <div id="collapse<?php echo $i; ?>" class="collapse">
                        <div class="card-body">
                            <table width=100%>
                                <tr>
                                    <td><strong>Tipo de Saneamiento:</strong> <?php tramite($row['id_tramite']); ?></td>
                                </tr>
                                <tr>
                                    <td>
                                    <form class="was-validated" method="POST" id="form">
                                        <div class="form-group">
                                            <?php
                                            $sqlu = "SELECT * FROM usuarios WHERE estado_usuario='1' AND nivel_usuario<>'1' AND nivel_usuario<>'5' AND id_usuario<>'$usuario_sesion'";
                                            $resultu = $conexion->query($sqlu);
                                            $rowu = $resultu->fetch_array(MYSQLI_ASSOC);
                                            $sql_sub = "SELECT * FROM estados_tramites WHERE nivel_estado='2'";
                                            $result_sub = $conexion->query($sql_sub);
                                            $row_sub = $result_sub->fetch_array(MYSQLI_ASSOC);
                                            ?>
                                            <label for="id_usuario">Seleccione a quien derivar</label>
                                            <div class="input-group mb-3">
                                            <select class="custom-select" required id="id_usuario<?php echo $i; ?>" name="id_usuario<?php echo $i; ?>" onchange="habilitarExterno('id_usuario<?php echo $i; ?>','id_sub_estado<?php echo $i; ?>');">
                                                <option value="">Seleccione un Usuario</option>
                                                <option value="EXTERNO">EXTERNO</option>
                                                <?php do { ?>
                                                <option value="<?php echo $rowu['id_usuario']; ?>"><?php echo $rowu['nom_usuario']; ?></option>
                                                <?php }while($rowu= $resultu->fetch_array(MYSQLI_ASSOC)); ?>
                                            </select>
                                            <select disabled class="custom-select" id="id_sub_estado<?php echo $i; ?>" name="id_sub_estado<?php echo $i; ?>">
                                                <option value="">Seleccione Destinatario Externo</option>
                                                <?php do { ?>
                                                <option value="<?php echo $row_sub['id_estado']; ?>"><?php echo $row_sub['nombre_estado']; ?></option>
                                                <?php }while($row_sub= $result_sub->fetch_array(MYSQLI_ASSOC)); ?>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="comment">Descripcion/Observaciones:</label>
                                            <textarea class="form-control" rows="3" id="obs_control<?php echo $i; ?>"><?php echo $row['obs_control']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" id="cod_saneamiento<?php echo $i; ?>" name="cod_saneamiento" value="<?php echo $row['cod_saneamiento']; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" id="id_tramite<?php echo $i; ?>" name="id_tramite" value="<?php echo $row['id_tramite']; ?>" />
                                        </div>
                                        <button
                                        type="button"
                                        class="btn btn-primary"
                                        data-toggle="modal"
                                        data-target="#myModal"
                                        onclick="derivarTramite('id_usuario<?php echo $i; ?>','obs_control<?php echo $i; ?>','cod_saneamiento<?php echo $i; ?>','id_tramite<?php echo $i; ?>','id_sub_estado<?php echo $i; ?>');"
                                        >
                                        Derivar
                                        </button>
                                        <button
                                        type="button"
                                        class="btn btn-success"
                                        data-toggle="modal"
                                        data-target="#myModal"
                                        onclick="finalizarTramite('cod_saneamiento<?php echo $i; ?>');"
                                        >
                                        Finalizar
                                        </button>
                                    </form>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            <?php }while($row = $result->fetch_array(MYSQLI_ASSOC));?>
    </div>
    <?php
}
mysqli_close($conexion);
?>
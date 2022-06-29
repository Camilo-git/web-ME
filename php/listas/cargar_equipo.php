<?php
    include_once("../../clases/cls_conectarB.php");
    $conexion = conectarBD();

    $sSQL = "SELECT * FROM tbl_grupo";

    $datos = $conexion->query($sSQL);

    foreach( $datos as $fila)
    {
        echo '<option value ="'.$fila['gru_id'].'">'.$fila['gru_nombre'].'</option>';

    }





?>
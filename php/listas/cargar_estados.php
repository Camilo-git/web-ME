<?php
    include_once("clases/cls_conectarB.php");
    $conexion = conectarBD();

    $sSQL = "SELECT * FROM tbl_estados";

    $datos = $conexion->query($sSQL);

    foreach( $datos as $fila)
    {
        echo '<option value ="'.$fila['id'].'">'.$fila['estado'].'</option>';

    }





?>
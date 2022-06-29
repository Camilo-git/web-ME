<?php
    include_once("clases/cls_conectarB.php");
    $conexion = conectarBD();

    $sSQL = "SELECT * FROM tbl_inventario";

    $datos = $conexion->query($sSQL);

    foreach( $datos as $fila)
    {
        echo '<option value ="'.$fila['codigo'].'">'.$fila['codigo'].' '. $fila['cat_equipo'].'</option>';

    }





?>
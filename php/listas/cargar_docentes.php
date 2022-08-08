<?php
    include_once("clases/cls_conectarB.php");
    $conexion = conectarBD();

    $sSQL = "SELECT * FROM tbl_docentes";

    $datos = $conexion->query($sSQL);

    foreach( $datos as $fila)
    {
        echo '<option value ="'.$fila['nombre'].'">   '. $fila['cedula'].'--'.$fila['nombre'].'   </option>';

    }





?>
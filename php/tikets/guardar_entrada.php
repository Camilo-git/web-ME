<?php
// incluimos la clase cls_entrada para crear la clase
include_once '../../clases/cls_entrada.php';
// creamos un objeto de la clase cls_entrada
$obj_entrada = new Entrada();
// creamos las variables vacias
$accion = "ADICIONAR";

//  traemos de la tabla salida el id_salida mas alto
$conexion = conectarBD();
$sSQL = "SELECT MAX(id) AS id FROM tbl_salida";
$dato = $conexion->query($sSQL);                            
// imprimimos el resultado
foreach( $dato as $fila)
{
    $fila = $fila['id'];
    echo $fila;
    echo " <input type='hidden' name='num_id' value='$fila'br />";
}

$id_entrada = $fila ;
$nom_auxiliar_in ;
$nom_docente_in  ;
$fecha_in ;
// llamamos al objeto de la clase cls_entrada para ejeccutar la accion
$obj_entrada->cargarDatos($id_entrada, $nom_auxiliar_in, $nom_docente_in, $fecha_in);
// si la accion es ADICIONAR
if ($accion == "ADICIONAR") {
    // si la opcion es insertar
    if ($obj_entrada->insertar()) {
        echo'
        // <script> 
       
        // alert("El registro SE guardo CORRECTAMENTE");
        
        // </script>
        // ';
     }
} elseif ($accion == "EDITAR") {
    // si la opcion es modificar
    if ($obj_entrada->modificar()) {
        echo'
        <script> 
       
        alert("El registro SE modifico CORRECTAMENTE");
        
        </script>
        ';
     }
} else {
    // si la opcion es eliminar
    if ($obj_entrada->eliminar()) {
        echo'
        <script> 
       
        alert("El registro SE elimino CORRECTAMENTE");
        
        </script>
        ';
     }
}
echo'
    <script>
    location.href="../../principal.php?opcion=entrada_tiket";
    </script> 
    ';
?>
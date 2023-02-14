<?php
// cremos un script para visualizar los datos que llegan por post   

// echo "<pre>";
// print_r($_POST);
// print_r($_GET);
// print_r($_REQUEST);
// echo "</pre>";

// incluimos la clase cls_aulas para crear la clase
include_once("../../clases/cls_tikets.php");
// creamos un objeto de la clase cls_tikets
$obj_tikets = new Tikets();

// //  traemos de la tabla salida el id_salida mas alto
// $conexion = conectarBD();
// $sSQL = "SELECT MAX(id) AS id FROM tbl_salida";
// $dato = $conexion->query($sSQL);
// // imprimimos el resultado
// foreach ($dato as $fila) {
//     $fila = $fila['id'];
//     echo $fila;
//     echo " <input type='hidden' name='num_id' value='$fila'br />";
// }


// creamos las variables con los datos que recibimos por el metodo POST

$id = isset($_GET['id']) ? $_GET['id'] : $_POST['id'];
echo  $id;
$nombre_aula = isset($_POST['txt_aula']) ? $_POST['txt_aula'] : null;
echo $nombre_aula;
$id_estado = isset($_POST['txt_estado']) ? $_POST['txt_estado'] : null;
$comentario = isset($_POST['txt_comentario']) ? $_POST['txt_comentario'] : null;
$accion = isset($_GET['accion']) ? $_GET['accion'] : $_POST['accion'];
$id_salida = $id;
$id_entrada = $id;
// creamos la variable $contacto para ejecutar la funcion cargar datos de la clase cls_tikets
$obj_tikets->cargarDatos($id, $comentario, $nombre_aula, $id_salida, $id_entrada, $id_estado);

if ($accion == "ADICIONAR") {

    if ($obj_tikets->insertar()) {

        echo '
        <script>
        location.href="../../principal.php?opcion=nuevo_detalle&id-tiket=' . $id . ' ";
        </script>
        ';
    }
} elseif ($accion == "editar-tiket") {
    if ($obj_tikets->modificar()) {
        echo '
            <script> 
            location.href="../../principal.php?opcion=all_tikets";
            // alert("El registro SE modifico CORRECTAMENTE");
            
            </script>
            ';
    }
} elseif ($accion == "ELIMINAR") {
    if ($obj_tikets->eliminar()) {
        echo '
            <script> 
           
            alert("El registro SE elimino CORRECTAMENTE");
            
            </script>
            ';
    }
}

<?php

// vemos todo lo que nos envian por el metodo post
// echo    "<pre>";
// print_r($_POST);
// print_r($_GET);
// echo "</pre>";

// incluimos la clase cls_entrada para crear la clase
include_once '../../clases/cls_entrada.php';
date_default_timezone_set('America/Bogota');
// creamos un objeto de la clase cls_entrada
$obj_entrada = new Entrada();
// creamos las variables vacias
$accion = isset($_GET['accion']) ? $_GET['accion'] : $_POST['btn_guardar'];
echo $accion;

$id = isset($_GET['id']) ? $_GET['id'] : $_POST['num_id'];
echo $id;

$nom_auxiliar_in = $_POST['txt_auxiliar'];
$nom_docente_in = $_POST['txt_docente'];
$fecha_in =  date('Y-m-d H:i:s ', time());
// llamamos al objeto de la clase cls_entrada para ejeccutar la accion
$obj_entrada->cargarDatos($id, $nom_auxiliar_in, $nom_docente_in, $fecha_in);
// si la accion es ADICIONAR
if ($accion == "ADICIONAR") {
    // si la opcion es insertar
    if ($obj_entrada->insertar()) {
        echo '
        <script>
        // alert("El registro se guardo CORRECTAMENTE");
        location.href="guardar_tiket.php?accion=ADICIONAR&id=' . $id . ' ";
        </script> 
        ';
    }
} elseif ($accion == "Entrada") {
    // si la opcion es modificar
    if ($obj_entrada->modificar()) {
        echo '        
        <script>        
        alert("El registro SE modifico CORRECTAMENTE");
        location.href="../../principal.php?opcion=all_tikets";        
        </script>
        ';
    }
} else {
    // si la opcion es eliminar
    if ($obj_entrada->eliminar()) {
        echo '
        <script> 
       
        alert("El registro SE elimino CORRECTAMENTE");
        
        
        </script>
        ';
    }
}

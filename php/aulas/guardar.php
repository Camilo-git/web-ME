<?php
// cremos un script para visualizar los datos que llegan por post   

echo "<pre>";
print_r($_REQUEST);
echo "</pre>";

// incluimos la clase cls_aulas para crear la clase
include_once('../../clases/cls_aulas.php');
// creamos un objeto de la clase cls_aulas
$obj_aulas = new Aulas();
// creamos las variables con los datos que recibimos por el metodo POST
$accion = isset($_POST['accion']) ? $_POST['accion'] : $_GET['nombre'];;
$id     = isset($_POST['id']) ? $_POST['id'] : "";;
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : $_GET['nombre'];
$edificio = isset($_POST['edificio']) ? $_POST['edificio'] : "";
$capacidad = isset($_POST['capacidad']) ? $_POST['capacidad'] : "";
$comentario = isset($_POST['comentario']) ? $_POST['comentario'] : "";
// creamos la variable $contacto para ejecutar la funcion cargar datos de la clase cls_aulas
$obj_aulas->cargarDatos($id, $nombre, $edificio, $capacidad, $comentario);
    echo    $accion, $id, $nombre, $accion;
if ($accion == "ADICIONAR") {

    if ($obj_aulas->insertar()) {
        echo '
        <script> 
       
        alert("El registro SE modifico CORRECTAMENTE");
        location.href="../../principal.php?opcion=aulas";
        
        </script>
        ';
    }
} elseif ($accion == "EDITAR") {
    if ($obj_aulas->modificar()) {
        echo '
        <script> 
       
        alert("El registro SE modifico CORRECTAMENTE");
        location.href="../../principal.php?opcion=aulas";
        </script>
        ';
    }
} elseif ($accion == "ELIMINAR") {
    if ($obj_aulas->eliminar()) {
        echo    $accion, $id, $nombre;
        echo '
        <script> 
       
        alert("El registro SE elimino CORRECTAMENTE");
<<<<<<< HEAD
        location.href="../../principal.php?opcion=aulas";

=======
>>>>>>> c76c39ea7bea4fb3769fd7ab8f1b802b19d29e91
        
        </script>
        ';
    }
}
echo '
// <script>
// location.href="../../principal.php?opcion=aulas";
// </script> 
';

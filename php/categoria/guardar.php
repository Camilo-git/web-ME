<?php
// cremos un script para visualizar los datos que llegan por post   

// echo "<pre>";
// print_r($_REQUEST);
// echo "</pre>";

// incluimos la clase cls_equipos para crear la clase
include_once("../../clases/cls_categoria.php");
// creamos un objeto de la clase cls_equipos
$obj_equipos = new Equipos();
// creamos las variables con los datos que recibimos por el metodo POST
$accion = isset($_POST['accion']) ? $_POST['accion'] : $_GET['accion'];
$cod     = isset($_POST['codigo']) ? $_POST['codigo'] : "";
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : $_GET['nombre'];
$estado = isset($_POST['estado']) ? $_POST['estado'] : "";
$cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : "";


// creamos la variable $contacto para ejecutar la funcion cargar datos de la clase cls_equipos
$obj_equipos->cargarDatos($cod, $nombre, $estado, $cantidad);

if ($accion == "ADICIONAR") {

    if ($obj_equipos->insertar()) {
        echo '
        <script> 
       
        alert("El registro SE guardo CORRECTAMENTE");
        
        </script>
        ';
    }
} elseif ($accion == "EDITAR") {
    if ($obj_equipos->modificar()) {
        echo '
        <script> 
        location.href="../../principal.php?opcion=categorias";
        alert("El registro SE modifico CORRECTAMENTE");
        
        </script>
        ';
    }
} elseif ($accion == "ELIMINAR") {
    if ($obj_equipos->eliminar()) {
        echo '
        <script> 

         alert("El registro SE elimino CORRECTAMENTE");
         location.href="../../principal.php?opcion=categorias";

        </script>
         ';
    }
}


echo '
<script>
location.href="../../principal.php?opcion=categorias";
</script> 
';

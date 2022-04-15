<?php
// cremos un script para visualizar los datos que llegan por post   
 
 echo "<pre>";
   print_r($_REQUEST);
   echo "</pre>";

// incluimos la clase cls_equipos para crear la clase
include_once("../../clases/cls_equipos.php");
// creamos un objeto de la clase cls_equipos
$obj_equipos = new Equipos();
// creamos las variables con los datos que recibimos por el metodo POST
$accion = $_POST['accion'];
$cod    = $_POST['codigo'];
$nombre = $_POST['nombre'];
$estado = $_POST['estado'];
$cantidad = $_POST['cantidad'];

// creamos la variable $contacto para ejecutar la funcion cargar datos de la clase cls_equipos
$obj_equipos->cargarDatos($cod, $nombre, $estado, $cantidad);

if ($accion == "ADICIONAR"){

    if ($obj_equipos->insertar()){
        echo'
        <script> 
       
        alert("El registro SE guardo CORRECTAMENTE");
        
        </script>
        ';
    }
}elseif ($accion == "EDITAR"){
    if ($obj_equipos->modificar()){
        echo'
        <script> 
       
        alert("El registro SE modifico CORRECTAMENTE");
        
        </script>
        ';
    }
}else{
    if ($obj_equipos->eliminar()){
        echo'
        <script> 
       
        alert("El registro SE elimino CORRECTAMENTE");
        
        </script>
        ';
    }
}


echo'
// <script>
// location.href="../../principal.php?opcion=aulas";
// </script> 
// ';

?>
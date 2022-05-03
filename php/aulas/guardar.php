<?php
// cremos un script para visualizar los datos que llegan por post   
 
 echo "<pre>";
   print_r($_REQUEST);
   echo "</pre>";

// incluimos la clase cls_aulas para crear la clase
include_once("../../clases/cls_aulas.php");
// creamos un objeto de la clase cls_aulas
$obj_aulas = new Aulas();
// creamos las variables con los datos que recibimos por el metodo POST
$accion = $_POST['accion'];
$id     = $_POST['id'];
$nombre = $_POST['nombre'];
$edificio = $_POST['edificio'];
$capacidad = $_POST['capacidad'];
$comentario = $_POST['comentario'];
// creamos la variable $contacto para ejecutar la funcion cargar datos de la clase cls_aulas
$obj_aulas->cargarDatos($id, $nombre, $edificio, $capacidad, $comentario);

if ($accion == "ADICIONAR"){

    if ($obj_aulas->insertar()){
        echo'
        <script> 
       
        alert("El registro SE guardo CORRECTAMENTE");
        
        </script>
        ';
    }
}
elseif ($accion == "EDITAR"){
    if ($obj_aulas->modificar()){
        echo'
        <script> 
       
        alert("El registro SE modifico CORRECTAMENTE");
        
        </script>
        ';
    }
}
else{
    if ($contacto->eliminar()){
        echo'
        <script> 
       
        alert("El registro SE elimino CORRECTAMENTE");
        
        </script>
        ';
    }
}
echo'
<script>
location.href="../../principal.php?opcion=aulas";
</script> 
';

?>
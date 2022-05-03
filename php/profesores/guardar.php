<?php
// creamos un script para visualizar los datos que llegan por el metodo post
echo "<pre>";
print_r($_POST);
echo "</pre>";


// incluimos la clase cls_equipos para crear la clase
include_once '../../clases/cls_docentes.php';
// creamos un objeto de la clase cls_equipos
$obj_equipos = new Docente();
// creamos las variables con los datos que llegan por el metodo post
$accion = $_POST['accion'];
$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$cel = $_POST['cel'];
$programa = $_POST['programa'];
$dependencia = $_POST['dependencia'];
// llamamos al objeto de la clase cls_equipos para ejecutar la accion
$obj_equipos->cargarDatos($cedula, $nombre, $correo, $cel, $programa, $dependencia);

// si la accion es ADICIONAR
if ($accion == "ADICIONAR") {

    // si la opcion es insertar
    if ($obj_equipos->insertar()) {
        echo'
        <script> 
       
        alert("El registro SE guardo CORRECTAMENTE");
        
        </script>
        ';
     }
}elseif ($accion == "EDITAR") {
    // si la opcion es modificar
    if ($obj_equipos->modificar()) {
        echo'
        <script> 
       
        alert("El registro SE modifico CORRECTAMENTE");
        
        </script>
        ';
     }
}else{
    // si la opcion es eliminar
    if ($obj_equipos->eliminar()) {
        echo'
        <script> 
       
        alert("El registro SE elimino CORRECTAMENTE");
        
        </script>
        ';
     }
}
echo'
<script>
location.href="../../principal.php?opcion=profesores";
</script> 
';


?>
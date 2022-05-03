<?php
// creamos un script para visualizar los datos que llegan por el metodo post
echo "<pre>";
print_r($_POST);
echo "</pre>";


// incluiimos la clase cls_auxiliar para crear la clase
include_once '../../clases/cls_auxiliares.php';
// creamos un objeto de la clase cls_auxiliar
$obj_auxiliar = new Auxiliar();
// creamos las variables con los datos que llegan por el metodo post
$accion = $_POST['accion'];
$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
// llamamos al objeto de la clase cls_auxiliar para ejeccutar la accion
$obj_auxiliar->cargarDatos($cedula, $nombre, $celular, $correo, $direccion);

// si la accion es ADICIONAR
if ($accion == "ADICIONAR") {

    // si la opcion es insertar
    if ($obj_auxiliar->insertar()) {
        echo'
        <script> 
       
        alert("El registro SE guardo CORRECTAMENTE");
        
        </script>
        ';
     }
}elseif ($accion == "EDITAR") {
    // si la opcion es modificar
    if ($obj_auxiliar->modificar()) {
        echo'
        <script> 
       
        alert("El registro SE modifico CORRECTAMENTE");
        
        </script>
        ';
     }
}else{
    // si la opcion es eliminar
    if ($obj_auxiliar->eliminar()) {
        echo'
        <script> 
       
        alert("El registro SE elimino CORRECTAMENTE");
        
        </script>
        ';
     }
}
echo'
<script>
location.href="../../principal.php?opcion=auxiliares";
</script> 
';


?>
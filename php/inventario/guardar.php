<?php
// creamos un script para visualizar los datos que lleguen por post

echo "<pre>";
print_r($_REQUEST);
echo "</pre>";

// incluimos la clase cls_invetario.php para poder crear la clase
include_once("../../clases/cls_inventario.php");
// creamos un objeto de la clase cls_inventario
$inventario = new Inventario();
// creamos las vatiables con los datos que recibimos por post
$accion = isset($_POST['accion']) ? $_POST['accion'] : $_GET['accion'];
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : $_GET['codigo'];
$marca     = isset($_POST['marca']) ? $_POST['marca'] : "";
$modelo     = isset($_POST['modelo']) ? $_POST['modelo'] : "";
$comentario     = isset($_POST['comentario']) ? $_POST['comentario'] : "";
$estado     = isset($_POST['id_estado']) ? $_POST['id_estado'] : "";
$cat_equipo     = isset($_POST['cat_equipo']) ? $_POST['cat_equipo'] : "";

echo $codigo ;
// creamos la variable $inventario para poder acceder a los metodos de la clase cls_inventario
$inventario->cargarDatos($codigo, $marca, $modelo, $comentario, $estado, $cat_equipo);

if ($accion == "ADICIONAR"){

    if ($inventario->insertar()){
        echo "<script>alert('Registro adicionado correctamente');</script>";
    }
}elseif ($accion == "EDITAR"){
    if ($inventario->modificar()){
         echo "<script>alert('Registro actualizado correctamente');</script>";
    }
}elseif ($accion == "ELIMINAR") {
    if ($inventario->eliminar()){
        echo "<script>alert('Registro eliminado correctamente');</script>";
    }
}
echo'
<script>
location.href="../../principal.php?opcion=inventario";
</script> 
';


?>
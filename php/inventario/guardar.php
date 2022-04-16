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
$accion = $_POST['accion'];
$codigo = $_POST['codigo'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$comentario = $_POST['comentario'];
$estado = $_POST['estado'];
$cat_equipo = $_POST['cat_equipo'];

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
}else {
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
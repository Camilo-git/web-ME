<?php
// incluimos la clase conectar para poder conectarnos a la base de datos
include_once("clases/cls_conectarB.php");
// creamos dos variables para la accion y el codigo
$accion = $_REQUEST['accion'];
$codigo = $_REQUEST['codigo'];
// si la accion es adicionar
if ($accion == "ADICIONAR"){
    // Creamos las variables para los datos del articulo
    $codigo = "";


    $marca = "";
    $modelo = "";
    $comentario = "";
    $estado = "";
    $cat_equipo = "";
    
}else{
    // creamos una variable para la conexion
    $conexion = conectarBD();
    // creamos una variable para la consulta
    $sSQL = "SELECT * FROM tbl_inventario WHERE codigo = '$codigo'";
    // creamos una variable para poder recorrer los datos
    foreach ($datos as $filas){
        $codigo = $filas['codigo'];
        $marca = $filas['marca'];
        $modelo = $filas['modelo'];
        $comentario = $filas['comentario'];
        $estado = $filas['estado'];
        $cat_equipo = $filas['cat_equipo'];
    }
}
// creamos el formulario
echo $accion;
echo $codigo;
?>

<!-- creamos un div con la clase container para poder centrar el formulario -->
<div class="container">
    <!-- creamos un div con clase card para poder darle estilo a la tarjeta -->
    <div class="card">
        <!-- creamos un div con clase card-header para poder darle estilo al encabezado de la tarjeta -->
        <div class="card-header">
            <!-- creamos un titulo para poder darle estilo al titulo de la tarjeta -->
            <h3>Articulos</h3>
        </div>
        <!-- creamos un div con clase card-body para poder darle estilo al cuerpo de la tarjeta -->
        <div class="card-body">
            <!-- creamos el formulario con clase form-group para poder enviarle los datos a guardar.php darle estilo -->
            <form class="form-group" action="php/inventario/guardar.php" method="POST">

                
                <!-- creamos un input para poder recibir la accion -->
                <input type="hidden" name="accion" value="<?php echo $accion; ?>">
                
                <!-- creamos un input para poder recibir el codigo del articulo -->
                <input type="hidden" name="codigo" value="<?php echo $codigo; ?>">

                <label for="codigo">Codigo</label>
                <input type="text" name="codigo" class="form-control" value="<?php echo $codigo; ?>">

                <!-- creamos un input para poder recibir la marca del articulo -->
                <label for="marca">Marca</label>
                <input type="text" name="marca" class="form-control" value="<?php echo $marca; ?>">
                <!-- creamos un input para poder recibir el modelo del articulo -->
                <label for="modelo">Modelo</label>
                <input type="text" name="modelo" class="form-control" value="<?php echo $modelo; ?>">
                <!-- creamos un input para poder recibir el comentario del articulo -->
                <label for="comentario">Comentario</label>
                <input type="text" name="comentario" class="form-control" value="<?php echo $comentario; ?>">
                <!-- creamos un input para poder recibir el estado del articulo -->
                <label for="estado">Estado</label>
                <input type="text" name="estado" class="form-control" value="<?php echo $estado; ?>">
                <!-- creamos un input para poder recibir la categoria del articulo -->
                <label for="cat_equipo">Categoria</label>
                <input type="text" name="cat_equipo" class="form-control" value="<?php echo $cat_equipo; ?>"><br>
                <!-- creamos un boton centrado para poder enviar los datos -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
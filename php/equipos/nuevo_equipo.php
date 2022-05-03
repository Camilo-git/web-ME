<?php  
// incluimos la clase conectar para poder conectarnos a la base de datos
include_once("clases/cls_conectarB.php");
// creamos dos variables para la accion y el codigo
$accion = $_GET['accion'];
$codigo = $_GET['codigo'];
// si la accion es adicionar
if ($accion == "ADICIONAR"){
    // creamos las variables para los datos
    $codigo = "";

    $nombre = "";
    $estado = "";
    $cantidad = "";

}else{
    // creamos una variable conexion para poder conectarnos a la base de datos
    $conexion   = conectarBD();
    // creamos una variable sSQL para poder ejecutar la consulta
    $sSQL       = 'SELECT * FROM tbl_equipos WHERE codigo='.$codigo;
    // creamos una variable datos para poder ejecutar la consulta
    $datos      = $conexion->query($sSQL);
    // creamos una variable fila para poder recorrer los datos
    foreach ($datos as $fila) {
        # code...
        $codigo       =  $fila['codigo'];
        $nombre       =  $fila['nombre'];
        $estado       =  $fila['estado'];
        $cantidad     =  $fila['cantidad'];
    }
}
// creamos el formulario
echo $accion;
echo $codigo;
?>
<!-- creamos un div con clase container para poder centrar el formulario -->
<div class="container">
    <!-- creamos un div con clase card para poder darle estilo a la tarjeta -->
    <div class="card">
        <!-- creamos un div con clase card-header para poder darle estilo al encabezado de la tarjeta -->
        <div class="card-header">
            <!-- creamos un titulo para poder darle estilo al titulo de la tarjeta -->
            <h3>Equipo</h3>
        </div>
        <!-- creamos un div con clase card-body para poder darle estilo al cuerpo de la tarjeta -->
        <div class="card-body">
            <!-- creamos un formulario con clase form-group para poder enviarle los datos a guardar.php darle estilo al formulario -->
            <form class="form-group" action="php/equipos/guardar.php" method="POST">
                <input type="hidden" name="accion" value="<?php echo $accion; ?>">
                <!-- creamos un input con clase form-control para poder darle estilo al input -->
                <input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
                <!-- creamos un input con clase form-control para poder darle estilo al input -->
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>">
                <!-- creamos un input con clase form-control para poder darle estilo al input -->
                <label>Estado</label>
                <input type="text" name="estado" class="form-control" value="<?php echo $estado; ?>">
                <!-- creamos un input con clase form-control para poder darle estilo al input -->
                <label>Cantidad</label>
                <input type="text" name="cantidad" class="form-control" value="<?php echo $cantidad; ?>">
                <!-- creamos un input con clase form-control para poder darle estilo al input -->
                <input type="submit" class="btn btn-primary" value="Guardar">
            </form>
        </div>
    </div>
</div>


<?php

 print_r($_POST);
?>

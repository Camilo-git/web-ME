<?php
echo "<pre>";
print_r($_REQUEST);
echo "</pre>";

// incluimos la clase conectar para poder conectarnos a la base de datos
include_once("clases/cls_conectarB.php");
// creamos dos variables para la accion y el id
$accion = $_GET['accion'];
$nombre     = $_GET['nombre'];
// si la accion es adicionar
if ($accion == "ADICIONAR") {

    $id          = 00;


    $edificio    = "";
    $capacidad   = "";
    $comentario  = "";
} elseif ($accion == "EDITAR") {
    // creamos una variable conexion para poder conectarnos a la base de datos
    $conexion   = conectarBD();
    // creamos una variable sSQL para poder ejecutar la consulta
    $sSQL       = "SELECT *  FROM tbl_aulas WHERE nombre LIKE  '$nombre;'";
    // creamos una variable datos para poder ejecutar la consulta
    $datos      = $conexion->query($sSQL);
    // creamos una variable fila para poder recorrer los datos
    foreach ($datos as $fila) {
        # code...
        $id               =  $fila['id'];
        $nombre           =  $fila['nombre'];
        $edificio         =  $fila['edificio'];
        $capacidad        =  $fila['capacidad'];
        $comentario       =  $fila['comentario'];
    }
}
// creamos el formulario
echo $opcion;
echo $accion . "</br>";
echo $nombre;
?>

<!-- creamos un div con clase container para poder centrar el formulario -->
<div class"container">
    <!-- creamos un div con clase card para poder darle estilo a la tarjeta -->
    <div class="card">
        <!-- creamos un div con clase card-header para poder darle estilo al encabezado de la tarjeta -->
        <div class="card-header">
            <!-- creamos un titulo para poder darle estilo al titulo de la tarjeta -->
            <h3>Aula</h3>
        </div>
        <!-- creamos un div con clase card-body para poder darle estilo al cuerpo de la tarjeta -->
        <div class="card-body">
            <!-- creamos un formulario con clase form-group para poder enviarle los datos a guardar.php darle estilo al formulario -->
            <form class="form-group" action="php/aulas/guardar.php" method="POST">
                <input type="hidden" name="accion" value="<?php echo $accion; ?>">
                <!-- creamos un input con clase form-control para poder darle estilo al input -->
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <!-- creamos un input con clase form-control para poder darle estilo al input -->
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>">
                <!-- creamos un input con clase form-control para poder darle estilo al input -->
                <label>Edificio</label>
                <input type="text" name="edificio" class="form-control" value="<?php echo $edificio; ?>">
                <!-- creamos un input con clase form-control para poder darle estilo al input -->
                <label>Capacidad</label>
                <input type="text" name="capacidad" class="form-control" value="<?php echo $capacidad; ?>">
                <!-- creamos un input con clase form-control para poder darle estilo al input -->
                <label>Comentario</label>
                <input type="text" name="comentario" class="form-control" value="<?php echo $comentario; ?>">
                <!-- creamos un input y poder darle estilo centrado al input -->
                <center>
                    <!-- creamos un boton con clase btn btn-primary para poder darle estilo al boton -->
                    <br><button class="btn btn-primary">Guardar</button>
                </center>


            </form>
        </div>
    </div>
</div>
<?php

print_r($_POST);
?>
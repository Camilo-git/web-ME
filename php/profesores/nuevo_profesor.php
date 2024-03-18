<?php
// echo "<pre>";
// print_r($_REQUEST);
// echo "</pre>";
// incluimos la clase conectar para poder conectarnos a la base de datos
include_once("clases/cls_conectarB.php");
// creamos dos variables para la accion y la cedula del profesor

$accion = $_GET['accion'];
$cedula = $_GET['cedula'];
// si la accion es ADICIONAR
if ($accion == "ADICIONAR") {
    // Creamos las variables para los datos del profesor
    $cedula = "";

    $nombre = "";
    $correo = "";
    $cel = "";
    $programa = "";
    $dependencia = "";
} else {
    // creamos una variable para la conexion para poder conectarnos a la base de datos
    $conexion = conectarBD();
    // creamos una variable para la consulta
    $sSQL = "SELECT * FROM tbl_docentes WHERE cedula = '$cedula'";
    // creamos una variable para ejecutar la consulta
    $datos = $conexion->query($sSQL);
    // creamos una variable para recorrer los datos
    foreach ($datos as $fila) {
        // creamos las variables para los datos del profesor
        $cedula = $fila['cedula'];
        $nombre = $fila['nombre'];
        $correo = $fila['correo'];
        $cel = $fila['cel'];
        $programa = $fila['programa'];
        $dependencia = $fila['dependencia'];
    }
}
// creamos el formulario

?>

<!-- creamos un div con la clase container para poder centrar el formulario -->
<div class="container">
    <!-- creamos un div con la clase card para poder darle estilo a la tarjeta -->
    <div class="card">
        <!-- creamos un div con la clase card-header para poder darle estilo al encabezado de la tarjeta -->
        <div class="card-header">
            <!-- creamos un titulo para el encabezado de la tarjeta -->
            <h3>Formulario de Docentes</h3>
        </div>
        <!-- creamos un div con la clase card-body para poder darle estilo al cuerpo de la tarjeta -->
        <div class="card-body">
            <!-- creamos un formulario con la clase form-group para poder darle estilo al formulario -->
            <form class="form-group" action="php/profesores/guardar.php" method="POST">
                <input type="hidden" name="accion" value="<?php echo $accion; ?>">

                <!-- creamos un input con la clase form-control para poder darle estilo al input -->
                <label for="cedula">Cedula</label>
                <input type="text" name="cedula" class="form-control" value="<?php echo $cedula; ?>">
                <!-- creamos un input con la clase form-control para poder darle estilo al input -->
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>">
                <!-- creamos un input con la clase form-control para poder darle estilo al input -->
                <label for="correo">Correo</label>
                <input type="text" name="correo" class="form-control" value="<?php echo $correo; ?>">
                <!-- creamos un input con la clase form-control para poder darle estilo al input -->
                <label for="cel">Celular</label>
                <input type="text" name="cel" class="form-control" value="<?php echo $cel; ?>">
                <!-- creamos un input con la clase form-control para poder darle estilo al input -->
                <label for="programa">Programa</label>
                <input type="text" name="programa" class="form-control" value="<?php echo $programa; ?>">
                <!-- creamos un input con la clase form-control para poder darle estilo al input -->
                <label for="dependencia">Dependencia</label>
                <input type="text" name="dependencia" class="form-control" value="<?php echo $dependencia; ?>">
                <!-- creamos un input con la clase form-control para poder darle estilo al input -->
                <input type="submit" class="btn btn-primary" value="Guardar">
            </form>
        </div>
    </div>
</div>
<?php

print_r($_POST);
?>
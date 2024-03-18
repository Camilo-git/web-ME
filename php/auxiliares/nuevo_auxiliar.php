<?php
// incluimos la clase conectarB oara poder conectarnos a la base de datos
include_once("clases/cls_conectarB.php");
// creamos dos variables para la accion y la cedula del auxiliar

$accion = $_GET['accion'];
$cedula = $_GET['cedula'];
// si la accion es ADICIONAR 
if ($accion == "ADICIONAR") {
    // Creamos las variables para los datos del auxiliar
    $cedula = "";

    $nombre = "";
    $celular = "";
    $correo = "";
    $direccion = "";
} else {
    // creamos una variable para conectarnos a la base de datos
    $conexion = conectarBD();
    // creamos una variable $sSQL para la consulta 
    $sSQL = "SELECT * FROM tbl_auxiliares WHERE cedula = $cedula";
    // creamos una variable $datos para guardar el resultado de la consulta
    $datos = $conexion->query($sSQL);
    // creamos una variable $fila para recorrer los datos de la consulta
    foreach ($datos as $filas) {
        // creamos las variables para los datos del auxiliar
        $cedula = $filas['cedula'];
        $nombre = $filas['nombre'];
        $celular = $filas['celular'];
        $correo = $filas['correo'];
        $direccion = $filas['direccion'];
    }
}
// creamos el formulario para el auxiliar

?>

<!-- creamos el formulario para el auxiliar -->
<!-- creamos un div con la clase container para poder centrar el formulario -->
<div class="container">
    <!-- creamos un div con la clse card para poder darla estilo a la tarjeta -->
    <div class="card">
        <!-- creamos un div con la clase card-header para poder darle estilo a la cabecera de la tarjeta -->
        <div class="card-header">
            <!-- creamos un titulo para el formulario -->
            <h2>Formulario de Registro de Auxiliares</h2>
        </div>
        <!-- creamos un div con la clase card-body para poder darle estilo al cuerpo de la tarjeta -->
        <div class="card-body">
            <!-- creamos un formulario con la clase form-group para poder darle estilo al formulario -->
            <form class="form-group" action="php/auxiliares/guardar.php" method="POST">
                <!-- creamos un input con la clase form-control para poder darle estilo al input -->
                <input type="hidden" name="accion" value="<?php echo $accion; ?>">


                <!-- creamos unlabel para la cedula -->
                <label for="cedula">Cedula</label>
                <!-- creamos un input con la clase form-control para poder darle estilo al input -->
                <input type="text" name="cedula" value="<?php echo $cedula; ?>" class="form-control">
                <!-- creamos un label para el nombre -->
                <label for="nombre">Nombre</label>
                <!-- creamos un input con la clase form-control para poder darle estilo al input -->
                <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>">
                <!-- creamos un label para el celular -->
                <label for="celular">Celular</label>
                <!-- creamos un input con la clase form-control para poder darle estilo al input -->
                <input type="text" class="form-control" name="celular" value="<?php echo $celular; ?>">
                <!-- creamos un label para el correo -->
                <label for="correo">Correo</label>
                <!-- creamos un input con la clase form-control para poder darle estilo al input -->
                <input type="text" class="form-control" name="correo" value="<?php echo $correo; ?>">
                <!-- creamos un label para la direccion -->
                <label for="direccion">Direccion</label>
                <!-- creamos un input con la clase form-control para poder darle estilo al input -->
                <input type="text" class="form-control" name="direccion" value="<?php echo $direccion; ?>">
                <!-- creamos un boton con la clase btn btn-primary para poder darle estilo al boton -->
                <button class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>
<?php

//  print_r($_POST);
?>
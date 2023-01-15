<?php
// incluimos la clase conectar para poder conectarnos a la base de datos
include_once("clases/cls_conectarB.php");
// creamos dos variables para la accion y el codigo
$accion = $_GET['accion'];
$codigo = $_GET['cod'];
// si la accion es adicionar
if ($accion == "ADICIONAR") {
    // creamos las variables para los datos
    $codigo = "";

    $nombre = "";
    $estado = "";
    $cantidad = "";
} elseif ($accion == "EDITAR") {
    // creamos una variable conexion para poder conectarnos a la base de datos
    $conexion   = conectarBD();
    // creamos una variable sSQL para poder ejecutar la consulta
    $sSQL       = "SELECT * FROM tbl_equipos WHERE cod= '$codigo';";
    // creamos una variable datos para poder ejecutar la consulta
    $datos      = $conexion->query($sSQL);
    // creamos una variable fila para poder recorrer los datos
    foreach ($datos as $fila) {
        # code...
        $codigo       =  $fila['cod'];
        $nombre       =  $fila['nombre'];
        $estado       =  $fila['id_estado'];
        $cantidad     =  $fila['cantidad'];
    }
}
// creamos el formulario
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
            <form class="form-group" action="php/categoria/guardar.php" method="POST">
                <input type="hidden" name="accion" value="<?php echo $accion; ?>">
                <!-- creamos un input con clase form-control para poder darle estilo al input -->
                <input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
                <!-- creamos un input con clase form-control para poder darle estilo al input -->
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>">
                <!-- creamos un input con clase form-control para poder darle estilo al input -->
                <label>Estado</label>
               
                 <!-- creamos un div centrado -->
                 <div class="col-md-12">
                    <!-- creamos una lista desplegable -->
                    <select class="form-control" id="num_id_equipo" name="estado">
                    <option value="<?php echo $estado ?>"><?php echo $estado ?></option>
                    <?php
                    include_once("php/listas/cargar_estados.php");
                    ?>
                    </select>
                    </div>
                <!-- creamos un input con clase form-control para poder darle estilo al input -->
                <label>Cantidad</label>
                <input type="text" name="cantidad" class="form-control" value="<?php echo $cantidad; ?>">
                <!-- creamos un input con clase form-control para poder darle estilo al input -->
                <br>
                <input type="submit" class="btn btn-primary" value="Guardar">
            </form>
        </div>
    </div>
</div>

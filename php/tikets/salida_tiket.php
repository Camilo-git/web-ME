<!-- creamos un contenedor centrado -->

<div class="container">
    <!-- creamos el fomrulario -->
    <!-- creamos una sentencia ternaria para imprimir la url para guardar la salida y otra para editar la entrada-->
    <?php
    // imprimimos lo que recibimos por el metodo get y post
    // echo "<pre>";
    // print_r($_GET);
    // print_r($_POST);
    // echo "</pre>";

    $opcion =  $_GET['opcion'];
    // verificamos lo que recibimos para asi mostrar la ruta a seguir
    switch ($opcion) {
        case "Salida":
            echo '<form action="php/tikets/guardar_salida.php" method="post">';
            break;
        case "Entrada":
            echo '<form action="php/tikets/guardar_entrada.php" method="post">';
            break;
        default:
            echo "Opción no válida";
    }
    // fin ciclo switch




    ?>

    <!-- creamos el titulo  -->
    <div class="row">
        <div class="col-md-12">
            <h1>

                <span>
                    <?php
                    include_once("clases/cls_conectarB.php");

                    // recibimos las variables de id y la accion entregar 

                    echo  $opcion . " N°- ";

                    $conexion = conectarBD();
                    $sSQL = "SELECT MAX(id) AS id FROM tbl_salida";
                    $dato = $conexion->query($sSQL);
                    // imprimimos el resultado
                    foreach ($dato as $fila) {
                        $fila = $fila['id'] + 1;

                        $id = isset($_GET['id']) ? $_GET['id'] : $fila;

                        echo  $id . "<br><hr>";
                        // 
                        echo " <input type='hidden' name='num_id' value='$id'br />";
                    }

                    if ($opcion == "Salida") {
                        echo "Medios Educativos.";
                        $nom_docente_in         =  "";
                    } elseif ($opcion == "Entrada") {
                        echo "Entrega de elementos";

                        // creamos una variable conexion para poder conectarnos a la base de datos
                        $conexion   = conectarBD();
                        // creamos una variable sSQL para poder ejecutar la consulta
                        $sSQL       = "SELECT *  FROM tbl_salida WHERE id = '$id';";
                        // creamos una variable datos para poder ejecutar la consulta
                        $datos      = $conexion->query($sSQL);
                        // creamos una variable fila para poder recorrer los datos
                        foreach ($datos as $fila) {
                            # code...
                            // $id               =  $fila['id'];
                            $nom_auxiliar           =  $fila['nom_auxiliar_out'];
                            $nom_docente_in         =  $fila['nom_docente_out'];
                            // $fecha_in        =  $fila['fecha_in'];
                        }
                    }
                    ?>
                </span>


                <div class="col-12 text-right">
                    <span>
                        <h2>hora de salida </h2>
                        <i class="fa fa-user-circle"></i>

                        <!-- creamos un codigo php con la zona para obtener la hora y la fecha que transcurre en el sistema -->
                        <?php
                        date_default_timezone_set('America/Bogota');
                        $DateAndTime = date('Y-m-d * h:i A', time());
                        echo "Hora actual = $DateAndTime.";

                        ?>

                    </span>
                </div>

            </h1>
        </div>
    </div><br>
    <!-- creamos una lista desplegable -->
    <div class="row form-group">
        <!-- creamos un label con h2 y con estilo centrado -->
        <div class="col-md-6">
            <label class="h2">
                Administrador:
            </label>
        </div>
        <!-- creamos un div centrado -->
        <div class="col-md-6">
            <!-- creamos una lista desplegable -->
            <select class="form-control" id="txt_auxiliar" name="txt_auxiliar" autofocus>
                <script>
                    // Obtener el elemento select por ID
                    var selectElement1 = document.getElementById("txt_auxiliar");

                    // Agregar un evento de escucha para la tecla "Enter"
                    selectElement1.addEventListener("keydown", function(event) {
                        if (event.keyCode === 13) { // 13 es el código de tecla para "Enter"
                            event.preventDefault(); // Detener la acción predeterminada (submit del formulario)
                            var nextElement = selectElement1.parentElement.parentElement.nextElementSibling; // Obtener el siguiente elemento de la página
                            if (nextElement) { // Si hay un siguiente elemento
                                nextElement.querySelector("input").focus(); // Enfocar en el siguiente elemento select
                            }
                        }
                    });
                </script>

                <option value="#">Auxiliar responsable</option>
                <?php
                include_once("php/listas/cargar_auxiliares.php");
                ?>
            </select>
        </div>
    </div>
    <!-- creamos un div centrado -->
    <div class="row form-group">
        <!-- creamos un label con h2 y con estilo centrado -->
        <div class="col-md-6">
            <label class="h2">
                Solicitante :
            </label>
        </div>
        <!-- creamos un div centrado -->
        <div class="col-md-6">
            <!-- creamos una lista desplegable -->
            <input class="form-control" list="txt_docente_options" id="txt_docente" name="txt_docente" autocomplete="on" value="<?php echo $nom_docente_in; ?>">
            <datalist id="txt_docente_options">
                <?php
                include_once("php/listas/cargar_docentes.php");
                ?>
            </datalist>
            <script>
                // Obtener el elemento input por ID
                var inputElement = document.getElementById("txt_docente");

                // Agregar un evento de escucha para la tecla "Enter"
                inputElement.addEventListener("keydown", function(event) {
                    if (event.keyCode === 13) { // 13 es el código de tecla para "Enter"
                        event.preventDefault(); // Detener la acción predeterminada (submit del formulario)
                        document.querySelector("form").submit(); // Enviar el formulario
                    }
                });
            </script>
        </div>
    </div>
    <!-- creamos un boton -->
    <div class="row form-group">
        <div class="col-md-6">
            <button class="btn btn-primary btn-block" id="btn_guardar" name="btn_guardar" value="<?php echo $opcion = $_GET['opcion']; ?>">
                Guardar
            </button>
            <input type="hidden" name="btn_guardar" value="<?php echo $opcion = $_GET['opcion']; ?>">
        </div>
    </div>
    </form> <!-- fin del formulario -->
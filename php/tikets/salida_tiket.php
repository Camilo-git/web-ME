<!-- creamos un contenedor centrado -->

<div class="container">
    <!-- creamos el fomrulario -->
    <!-- creamos una sentencia ternaria para imprimir la url para guardar la salida y otra para editar la entrada-->
    <?php

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
    <form action="php/tikets/guardar_salida.php" method="post">

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
                        } elseif ($opcion == "Entrada") {
                            echo "Entrega de elementos";

                            // creamos una variable conexion para poder conectarnos a la base de datos
                            $conexion   = conectarBD();
                            // creamos una variable sSQL para poder ejecutar la consulta
                            $sSQL       = "SELECT *  FROM tbl_entrada WHERE id = '$id';";
                            // creamos una variable datos para poder ejecutar la consulta
                            $datos      = $conexion->query($sSQL);
                            // creamos una variable fila para poder recorrer los datos
                            foreach ($datos as $fila) {
                                # code...
                                $id               =  $fila['id'];
                                $nom_auxiliar           =  $fila['nom_auxiliar_in'];
                                $nom_docente_in         =  $fila['nom_docente_in'];
                                $fecha_in        =  $fila['fecha_in'];
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
                <select class="form-control" id="txt_auxiliar" name="txt_auxiliar">
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
                <select class="form-control" id="txt_docente" name="txt_docente">
                    <option value="#">introdusca un carnet</option>
                    <?php
                    include_once("php/listas/cargar_docentes.php");
                    ?>
                </select>
            </div>
        </div>
        <!-- creamos un boton -->
        <div class="row form-group">
            <div class="col-md-6">
                <button class="btn btn-primary btn-block" id="btn_guardar" name="btn_guardar" value="<?php echo $opcion = $_GET['opcion']; ?>">
                    Guardar
                </button>
            </div>
        </div>
    </form> <!-- fin del formulario -->

</div>
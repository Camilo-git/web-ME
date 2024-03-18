<?php
include_once("clases/cls_conectarB.php");

// echo "<pre>";
// print_r($_POST);
// print_r($_GET);
// print_r($_REQUEST);
// echo "</pre>";

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-info text-right">
                <?php
                $opcion = $_GET['opcion'];
                $id_tiket = $_GET['id-tiket'];
                // echo $opcion;
                echo " <input type='hidden' name='id-tiket' value='$id_tiket'br />";
                ?>

            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-center">
                        <div>
                            Salida :
                        </div>
                    </h3>
                </div>
                <div class="col-md-6">
                    <h3 class="text-primary">
                        <span>
                            <?php

                            echo $id_tiket;
                            ?>
                        </span>
                    </h3>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h3 class="text-center">
                        Entrega :
                    </h3>
                </div>
                <div class="col-md-6">

                    <button type="button" class="btn btn-block btn-primary">

                        <?php

                        $conexion = conectarBD();

                        $sSQL = "SELECT * FROM tbl_salida WHERE id = (SELECT MAX(id) FROM tbl_salida)";
                        $dato = $conexion->query($sSQL);
                        // imprimimos el resultado
                        foreach ($dato as $fila) {
                            $fila = $fila['nom_auxiliar_out'];
                            echo $fila;
                            echo " <input type='hidden' name='nom_auxiliar_out' value='$fila'br />";
                        }

                        $datos = $conexion->query($sSQL);
                        ?>

                    </button>

                </div>

            </div>

            <div class="row">
                <div class="col-md-4">
                    <h3 class="text-center">
                        Recibe :
                    </h3>
                </div>
                <div class="col-md-6">

                    <button type="button" class="btn btn-block btn-primary active">

                        <?php

                        $conexion = conectarBD();

                        $sSQL = "SELECT * FROM tbl_salida WHERE id = (SELECT MAX(id) FROM tbl_salida)";
                        $dato = $conexion->query($sSQL);
                        // imprimimos el resultado
                        foreach ($dato as $fila) {
                            $fila = $fila['nom_docente_out'];
                            echo $fila;
                            echo " <input type='hidden' name='nom_docente_out' value='$fila'br />";
                        }

                        $datos = $conexion->query($sSQL);
                        ?>

                    </button>
                </div>
            </div>
        </div>

    </div> <!-- row -->
    <br>
    <hr>


    <!-- creamos el formulario para tiket -->
    <form action="php/tikets/guardar_tiket.php" method="POST">
        <span>
            <?php


            echo " <input type='hidden' name='id' value=$id_tiket br />";
            
            ?>
        </span>

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">

                        <!-- creamos un div centrado -->
                        <div class="row form-group">
                            <!-- creamos un label con h2 y con estilo centrado -->
                            <div class="col-md-6">
                                <label class="h2">
                                    Aula :
                                </label>
                            </div>
                            <!-- creamos un div centrado -->
                            <div class="col-md-6">
                                <!-- creamos una lista desplegable -->
                                <select autofocus class="form-control" id="txt_aula" name="txt_aula">
                                    <option value="0">Seleccione el AULA</option>
                                    <?php
                                    include_once("php/listas/cargar_aulas.php");
                                    ?>
                                </select>
                            </div>
                            <!-- creamos un script el cual al presional la tecla enter envia el formulario -->
                            <script>
                                document.getElementById('txt_aula').addEventListener('keydown', function(event) {
                                    if (event.keyCode === 13) {
                                        event.preventDefault();
                                        document.querySelector("form").submit(); // Enviar el formulario

                                    }
                                });
                            </script>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="dropdown">

                            <!-- creamos un div centrado -->
                            <div class="row form-group">
                                <!-- creamos un label con h2 y con estilo centrado -->
                                <div class="col-md-6">
                                    <label class="h2">
                                        Estado :
                                    </label>
                                </div>
                                <!-- creamos un div centrado -->
                                <div class="col-md-6">
                                    <!-- creamos una lista desplegable -->
                                    <select class="form-control" id="txt_estado" name="txt_estado">
                                        <option value="1">Prestamo</option>
                                        <?php
                                        include_once("php/listas/cargar_estados.php");
                                        ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="text-right">
                            Comentario :
                        </h3>
                    </div>
                    <div class="col-md-8">
                        <input value="Sin Comentario" type="text" class="form-control" placeholder="Ingrese el comentario" name="txt_comentario" value="" id="txt">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">



                        <button class="btn btn-block active btn-lg btn-outline-danger" name="accion" value="<?php echo $opcion; ?>">
                            Guardar
                        </button>
                        <input type="hidden" name="accion" value="<?php echo $opcion; ?>">
                    </div>
                </div>
            </div>
        </div>
        <!-- este codigo nos permite que el evento enter cambie al siguiente elemento  -->
        <script>
            // Selecciona todos los elementos de entrada (input) y lista desplegable (select) dentro del contenedor con la clase "row"
            const inputElements = document.querySelectorAll('.row input, .row select');

            // Recorre cada elemento y agrega un controlador de eventos de teclado
            inputElements.forEach(function(element, index) {
                element.addEventListener('keydown', function(event) {
                    // Verifica si la tecla presionada es Enter
                    if (event.keyCode === 13) {
                        // Evita que se envíe el formulario por defecto al presionar Enter
                        event.preventDefault();
                        // Encuentra el siguiente elemento en el arreglo y enfoca en él
                        inputElements[index + 1].focus();
                    }
                });
            });
        </script>



    </form>
</div>
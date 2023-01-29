<?php
include_once("clases/cls_conectarB.php");
?>

<div class="container-fluid">
    <!-- agregamos el formulario -->
    <form action="php/tikets/guardar_detalle.php" method="POST">

        <span>
            <?php

            echo    "<pre>";
            print_r($_POST);
            print_r($_GET);
            echo "</pre>";


            $id_tiket = isset($_GET['id-tiket']) ? $_GET['id-tiket'] : $_POST['id_tiket'];

            echo " <input type='hidden' name='id-tiket' value='$id_tiket'br />";


            ?>
        </span>


        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-center">
                                    Codigo Equipo
                                </h5>
                            </div>
                            <div class="col-md-6">

                                <!-- creamos un div centrado -->
                                <div class="row form-group">

                                    <!-- creamos un div centrado -->
                                    <div class="col-md-12">
                                        <!-- creamos una lista desplegable -->
                                        <select class="form-control" id="num_id_equipo" name="cod_inventario">
                                            <option value="1">Equipo N°</option>
                                            <?php
                                            include_once("php/listas/cargar_equipo.php");
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-center">
                                    Comentario
                                </h5>
                            </div>
                            <div class="col-md-6">


                                <div class="row">

                                    <div class="col-md-12">
                                        <input type="text" class="form-control" placeholder="Ingrese el comentario" name="txt_comentario" value="Sin Comentario" id="txt">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-center">
                                    Estado
                                </h5>
                            </div>
                            <div class="col-md-6">

                                <!-- creamos un div centrado -->
                                <div class="row form-group">

                                    <!-- creamos un div centrado -->
                                    <div class="col-md-12">
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
                </div>
            </div>
            <br>
            <br>

            <button class="btn btn-primary btn-block" id="btn_guardar" name="btn_guardar" value="ADICIONAR">
                Guardar
            </button>
        </div>
    </form>
    <div class="row my-3">

        <div class="col-12">

            <table id="miTabla" class="table table-striped table-bordered table-hover">
                <thead>

                    <tr>
                        <th>cod equipo</th>
                        <th>Estado</th>
                        <th>Comentario</th>
                        <!-- th como titulos deben aver en td espacios -->

                    </tr>
                </thead>

                <tbody>
                    <?php

                    include_once("clases/cls_conectarB.php");

                    $conexion = conectarBD();

                    // damos a la busqueda

                    $sSQL = "SELECT MAX(id) AS id FROM tbl_salida";
                    $dato = $conexion->query($sSQL);
                    // imprimimos el resultado
                    foreach ($dato as $fila) :
                        $fila = $fila['id'];

                        echo " <input type='hidden' name='num_id' value='$fila'br />";
                    endforeach;

                    $sql = "SELECT
                    CONCAT(
                        tbl_inventario.codigo,
                        ' -- ',
                        tbl_inventario.cat_equipo
                    ) AS categoria,
                    tbl_detalle.comentario,
                    CONCAT(
                        tbl_detalle.id_estado,
                        ' -- ',
                        tbl_estados.estado
                    ) AS estado
                FROM
                    tbl_detalle
                INNER JOIN tbl_inventario ON tbl_detalle.cod_equipo = tbl_inventario.codigo
                INNER JOIN tbl_estados ON tbl_detalle.id_estado = tbl_estados.id
                WHERE
                    tbl_detalle.id_tiket = $fila ";



                    $datos = $conexion->query($sql);



                    foreach ($datos as $fila) :


                    ?>

                        <tr>
                            <td><?php echo $fila['categoria'];         ?></td>
                            <td><?php echo $fila['estado'];  ?></td>
                            <td><?php echo $fila['comentario'];     ?></td>
                        </tr>

                    <?php

                    endforeach;



                    desconectarBD($conexion);
                    ?>


                </tbody>




            </table>
            <hr>



        </div>
    </div>
    <form action="principal.php">
        <?php
        echo " <input type='hidden' name='id-tiket' value='$id_tiket' br />";
        ?>
        <button class="btn btn-primary btn-block" id="btn-editar" name="opcion" value="editar-tiket">
            Continuar
        </button>

    </form>
</div>
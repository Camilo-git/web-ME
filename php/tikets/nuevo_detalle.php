<?php
include_once("clases/cls_conectarB.php");
?>

<div class="container-fluid">
    <!-- agregamos el formulario -->
    <form action="php/tikets/guardar_detalle.php" method="POST"
    
    <!-- traemos el ultimo id de la salida pra grabar varios detalles con ese id -->
        <span>
            <?php
            $conexion = conectarBD();
            $sSQL = "SELECT MAX(id) AS id FROM tbl_salida";
            $dato = $conexion->query($sSQL);
            // imprimimos el resultado
            foreach ($dato as $fila) {
                $fila = $fila['id'];
                echo $fila;
                echo " <input type='hidden' name='num_id' value='$fila'br />";
            }
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
                                            <option value="0">Equipo N°</option>
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
                                        <input type="text" class="form-control" placeholder="Ingrese el comentario" name="txt_comentario" value="" id="txt">
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
</div>
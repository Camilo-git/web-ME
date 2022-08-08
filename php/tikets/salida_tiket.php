<?php
include_once("clases/cls_conectarB.php");
?>
<!-- creamos un contenedor centrado -->

<div class="container">
    <!-- creamos el fomrulario -->
    <form action="php/tikets/guardar_salida.php" method="post">
        <!-- creamos el titulo  -->
        <div class="row">
            <div class="col-md-12">
                <h1>
                    Salida N°
                    <span>
                        <?php 
                            $conexion = conectarBD();
                            $sSQL = "SELECT MAX(id) AS id FROM tbl_salida";
                            $dato = $conexion->query($sSQL);                            
                            // imprimimos el resultado
                            foreach( $dato as $fila)
                            {
                                $fila = $fila['id']+1;
                                echo $fila;
                                echo " <input type='hidden' name='num_id' value='$fila'br />";
                            }
                        ?>

                        <div class="col-12 text-right"> 
                            <span>
                                <h2>hora de salida </h2>
                                <i class="fa fa-user-circle"></i>

                                <!-- creamos un javascript para obtener la hora y la fecha que transcurre en el sistema -->
                                    <script>
                                        var f = new Date();
                                        document.write(f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());
                                        var g = new Date();
                                        document.write("--" + (g.getHours()) + ":" + g.getMinutes());
                                    </script>
                        
                            </span>
                        </div>
                    </span>
                </h1>
            </div>
        </div><br>
        <!-- creamos una lista desplegable -->
        <div class="row form-group">
            <!-- creamos un label con h2 y con estilo centrado -->
            <div class="col-md-6">
                <label class="h2">
                    Entrega :
                </label>
            </div>
            <!-- creamos un div centrado -->
            <div class="col-md-6">
                <!-- creamos una lista desplegable -->
                <select class="form-control" id="txt_auxiliar" name="txt_auxiliar">
                    <option value="0">Auxiliar responsable</option>
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
                    Solicitante
                </label>
            </div>
            <!-- creamos un div centrado -->
            <div class="col-md-6">
                <!-- creamos una lista desplegable -->
                <select class="form-control" id="txt_docente" name="txt_docente">
                    <option value="0">introdusca un carnet</option>
                    <?php
                    include_once("php/listas/cargar_docentes.php");
                    ?>
                </select>
            </div>
        </div>
        <!-- creamos un boton -->
        <div class="row form-group">
            <div class="col-md-6">
                <button class="btn btn-primary btn-block" id="btn_guardar" name="btn_guardar" value="ADICIONAR">
                    Guardar
                </button>
            </div>
        </div>
    </form>   <!-- fin del formulario -->
       
</div>
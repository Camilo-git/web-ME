<?php
include_once("clases/cls_conectarB.php");
?>
<!-- creamos un contenedor centrado -->

<div class="container">
    <!-- creamos el titulo  -->
    <div class="row">
        <div class="col-md-12">
            <h1>
                codigo <span> id codigo</span>
            </h1>
        </div>
    </div>
    <!-- creamos una lista desplegable -->
    <div class="row form-group">
        <label for="txt_estado" class="col-md-2 control-label">Estado</label>
        <div class="col-8">
            <select name="sel_Grupos" id="sel_Grupos">
                <?php   
                    include_once("php/listas/cargar_estados.php");
                ?>
            </select>
        </div>
</div>

</div>

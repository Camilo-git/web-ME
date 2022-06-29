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
    </div><br>
    <!-- creamos una lista desplegable -->
    <div class="row form-group">
        <!-- creamos un label con h2 y con estilo centrado -->
        <div class="col-md-6">
            <label class="h2">
                Estado
            </label>
        </div>
        <!-- creamos un div centrado -->
        <div class="col-md-6">
            <!-- creamos una lista desplegable -->
            <select class="form-control" id="txt_estado" name="txt_estado">
                <option value="0">Seleccione un estado</option>
                <?php
                 include_once("php/listas/cargar_estados.php");
                ?>
            </select>
        </div>
    </div>
    <!-- creamos un div centrado -->
    <div class="row form-group">
        <!-- creamos un label con h2 y con estilo centrado -->
        <div class="col-md-6">
            <label class="h2">
                Equipo
            </label>
        </div>
        <!-- creamos un div centrado -->
        <div class="col-md-6">
            <!-- creamos una lista desplegable -->
            <select class="form-control" id="txt_municipio" name="txt_municipio">
                <option value="0">Seleccione un Equipo</option>
                <?php
                 include_once("php/listas/cargar_equipo.php");
                ?>
            </select>
        </div>
    </div>
    <!-- creamos un boton  de 6 unidades y lo centramos -->
    <div class="row form-group">
        <div class="col-md-6">
            <button class="btn btn-primary btn-block" id="btn_guardar" name="btn_guardar">
                Guardar
            </button>
        </div>
    </div>

    
</div>

</div>

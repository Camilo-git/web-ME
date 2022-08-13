<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-info text-right">
                Tiket ->
            </h3>
        </div>
        <div class="col-md-6">
            <h3 class="text-primary">
                N° sql--
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-right">
                        <div>
                            Salida :
                        </div>
                    </h3>
                </div>
                <div class="col-md-6">
                    <h3 class="text-primary">
                        N° sql--
                    </h3>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-right">
                        Entrega :
                    </h3>
                </div>
                <div class="col-md-6">

                    <button type="button" class="btn btn-block btn-primary">
                        id_auxiliar
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-right">
                        Recibe :
                    </h3>
                </div>
                <div class="col-md-6">

                    <button type="button" class="btn btn-block btn-primary active">
                        id_docente
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-right">
                        Entrada :
                    </h3>
                </div>
                <div class="col-md-6">
                    <h3 class="text-primary">
                        N° sql--
                    </h3>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-right">
                        Recibe :
                    </h3>
                </div>
                <div class="col-md-6">

                    <button type="button" class="btn btn-success disabled btn-block">
                        id_auxiliar
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-right">
                        Entrega :
                    </h3>
                </div>
                <div class="col-md-6">

                    <button type="button" class="btn btn-success btn-block disabled">
                        id_docente
                    </button>
                </div>
            </div>
        </div>
    </div> <!-- row -->
    <br>
    <hr>
    <!-- creamos el formulario para tiket -->
    <form action="php/tikets/guardar_tiket.php">
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
                                <select class="form-control" id="txt_aula" name="txt_aula">
                                    <option value="0">Seleccione el AULA</option>
                                    <?php
                                    include_once("php/listas/cargar_aulas.php");
                                    ?>
                                </select>
                            </div>
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
                        <input type="text" class="form-control" placeholder="Ingrese el comentario" value="" id="txt">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">

                        <button type="button" class="btn btn-block active btn-lg btn-outline-danger">
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
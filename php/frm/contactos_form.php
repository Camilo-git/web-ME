<?php
include_once("clases/cls_conectarBD.php");
$accion = $_GET['accion'];
$id     = $_GET['id'];

if ($accion == "ADICIONAR") {    
    # code...
    $id          = 0;
   
    $nombre      = "";
    $direccion   = "";
    $telefono    = "";
    $correo      = "";
    $grupo       = "";  
    $fecha       = "";
}
else{
    $conexion   = conectarBD();
    $sSQL       = 'SELECT * FROM tbl_contactos WERE con_id='.$id;
    $datos      = $conexion->query($sSQL);
    echo"Error en el  foreach $sSQL";
    foreach ($datos as $fila) {
        # code...
        $id               =  $fila['con_id'];
        $nombre           =  $fila['con_nombre'];
        $direccion        =  $fila['con_direccion'];
        $telefono         =  $fila['con_telefono'];
        $correo           =  $fila['con_correo'];
        $grupo            =  $fila['con_grupo'];
        $fecha            =  $fila['con_fechanac'];

        
        
        
        
        

    }

}

echo "Formulario de contactos";
echo $accion;
echo $id;
?>

<div class="row justify-content-center">

    <div class="col-7">

        <h4>
            <i class="fas fa-user"></i>
            Datos del Contacto
        </h4>
        <hr class="bg-info">

        <form action="php/frm/guardar.php " method="POST">
            <input type="text" name="txt_Accion" value="<?php echo $accion ?>">

            <!-- Control para el campo ID -->
            <div class="row form-group">

                <label for="txt_Id" class="col-form-label col-4">Id</label>

                <div class="col-8">
                    <input type="text" name="txt_Id" value="<?php echo $id ?>" id="txt_Id" class="form-control form-control-sm">
                </div>
            </div>

            <!-- Control para el campo DOCUMENTO -->
            <div class="row form-group">

                <label for="txt_Documento" class="col-form-label col-4">Documento</label>

                <div class="col-8">
                    <input type="text" name="txt_Documento" value="<?php echo $id ?>" id="txt_Documento" class="form-control form-control-sm">
                </div>
            </div>

            <!-- Control para el campo Nombre -->
            <div class="row form-group">

                <label for="txt_Nombre" class="col-form-label col-4">Nombre</label>

                <div class="col-8">
                    <input type="text" name="txt_Nombre" value="<?php echo $nombre ?>" id="txt_Nombre" class="form-control form-control-sm">
                </div>
            </div>

            <!-- Control para el campo Direccion -->
            <div class="row form-group">

                <label for="txt_Direccion" class="col-form-label col-4">Direccion</label>

                <div class="col-8">
                    <input type="text" name="txt_Direccion" value="<?php echo $direccion ?>" id="txt_Direccion" class="form-control form-control-sm">
                </div>
            </div>

            <!-- Control para el campo Telefono -->
            <div class="row form-group">

                <label for="txt_Correo" class="col-form-label col-4">Telefono</label>

                <div class="col-8">
                    <input type="text" name="txt_Telefono" value="<?php echo $telefono ?>" id="txt_Tlefono" class="form-control form-control-sm">
                </div>
            </div>

            <!-- Control para el campo Correo -->
            <div class="row form-group">

                <label for="txt_Correo" class="col-form-label col-4">Correo</label>

                <div class="col-8">
                    <input type="email" name="txt_Correo" value="<?php echo $correo ?>" id="txt_Correo" class="form-control form-control-sm">
                </div>
            </div>

            <!-- Control para el campo Grupo -->
            <div class="row form-group">

                <label for="txt_Grupo" class="col-form-label col-4">Grupo</label>
                <div class="col-8">
                    <select name="sel_Grupos" id="sel_Grupos" class="form-control form-control-sm">
                        <a href="">
                          <?php 
                            include_once('php/cr/cr_grupos');
                          ?>                         
                        </a>
                        <option value="1">1</option>
                    </select>                    
                </div>
            </div>



            <!-- Control para el campo Fecha -->
            <div class="row form-group">

                <label for="txt_Fecha" class="col-form-label col-4">Fechade Nacimiento</label>

                <div class="col-8">
                    <input type="date" name="txt_Fecha" value="<?php echo $fecha ?>" id="txt_Fecha" class="form-control form-control-sm">
                </div>
            </div>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-check-circle"></i>
                <span>Guardar</span>
            </button>

            <a href="Principal.php?opcion=contactos" class="btn btn-warning" id="btn_Regresar">
                <i class="fas fa-undo-alt    "></i>
                Retornar
            </a>


        </form>




    </div>








</div>
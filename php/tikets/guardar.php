<?php

    include_once("../../clases/cls_contacto.php");
   
    $contacto = new Contacto();

    $accion      = $_POST['txt_Accion'];
    $id          = $_POST['txt_Id'];
    $documento   = $_POST['txt_Documento'];
    $nombre      = $_POST['txt_Nombre'];
    $direccion   = $_POST['txt_Direccion'];
    $telefono    = $_POST['txt_Telefono'];
    $correo      = $_POST['txt_Correo'];
    $grupo       = $_POST['sel_Grupos'];
    $fecha       = $_POST['txt_Fecha'];

    $contacto->cargarDatos($id,$documento,$nombre,$direccion,$telefono,$correo,$grupo,$fecha);

    if ($accion == "ADICIONAR") {
        # code...
        if ($contacto->insertar()) {
            # code...
            echo'
            <script> 
           
            alert("El registro SE guardo CORRECTAMENTE");
            
            </script>
            ';
        }
    }
    elseif($accion == "EDITAR"){

        if ($contacto->modificar()) {
            # code...
            echo'
            <script> 
           
            alert("El registro no se pudo actualizar");
            
            </script>
            ';
        }

    }
    else{
        if ($contacto->eliminar()) {
            # code...
            echo'
            <script> 
           
            alert("El registro no se pudo eliminar");
            
            </script>
            ';
        }
    }
    echo'
        <script>
            location.href="../../principal.php?opcion=contactos";
    
    
   
        </script>
     ';
        //  print_r($_POST);
    



?>
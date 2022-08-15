<?php
// cremos un script para visualizar los datos que llegan por post   
 
 echo "<pre>";
   print_r($_REQUEST);
   echo "</pre>";

    // incluimos la clase cls_aulas para crear la clase
    include_once("../../clases/cls_tikets.php");
    // creamos un objeto de la clase cls_tikets
    $obj_tikets = new Tikets();
    // creamos las variables con los datos que recibimos por el metodo POST
    
    $id     = $_POST['id'];
    $nombre_aula   = $_POST['txt_aula'];
    $id_estado = $_POST['txt_estado'];
    $comentario = $_POST['txt_comentario'];
    $accion = $_POST ['btn_guardar'];
    $id_salida = $id;
    $id_entrada = $id;
    // creamos la variable $contacto para ejecutar la funcion cargar datos de la clase cls_tikets
    $obj_tikets->cargarDatos($id, $comentario, $nombre_aula, $id_salida, $id_entrada, $id_estado);

    if ($accion == "ADICIONAR"){
    
        if ($obj_tikets->insertar()){
            echo'
            <script> 
           
            alert("El registro SE guardo CORRECTAMENTE");
            
            </script>
            ';
        }
    }
    elseif ($accion == "EDITAR"){
        if ($obj_tikets->modificar()){
            echo'
            <script> 
           
            alert("El registro SE modifico CORRECTAMENTE");
            
            </script>
            ';
        }
    }
    elseif ($accion == "ELIMINAR"){
        if ($obj_tikets->eliminar()){
            echo'
            <script> 
           
            alert("El registro SE elimino CORRECTAMENTE");
            
            </script>
            ';
        }
    }
  
    // echo'
    // <script>
    // location.href="../../principal.php?opcion=";
    // </script>
    // ';

?>
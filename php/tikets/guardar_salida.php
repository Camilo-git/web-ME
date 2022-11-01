<?php
    // vemos todo lo que nos envian por el metodo post
    echo    "<pre>";
    print_r($_POST);
    echo "</pre>";

    // incluiimos la clase cls_salida para crear la clase
    include_once '../../clases/cls_salida.php';
    // creamos un objeto de la clase cls_salida
    $obj_salida = new Salida();
    // creamos las variables con los datos que llegan por el metodo post
    $accion = $_POST['btn_guardar'];
    $id_salida = $_POST['num_id'];
    $nom_auxiliar = $_POST['txt_auxiliar'];
    $nom_docente = $_POST['txt_docente'];
    $fecha_out = date('Y-m-d h:i:s a', time());
    echo $fecha_out;
    
    // llamamos al objeto de la clase cls_salida para ejeccutar la accion
    $obj_salida->cargarDatos($id_salida, $nom_auxiliar, $nom_docente, $fecha_out);

    // si la accion es ADICIONAR
    if ($accion == "ADICIONAR") {

        // si la opcion es insertar
        if ($obj_salida->insertar()) {
            echo'
            // <script> 
           
            // alert("El registro SE guardo CORRECTAMENTE");
            
            // </script>
            // ';
         }
    }elseif ($accion == "EDITAR") {
        // si la opcion es modificar
        if ($obj_salida->modificar()) {
            echo'
            <script> 
           
            alert("El registro SE modifico CORRECTAMENTE");
            
            </script>
            ';
         }
    }else{
        // si la opcion es eliminar
        if ($obj_salida->eliminar()) {
            echo'
            <> 
           
            alert("El registro SE elimino CORRECTAMENTE");
            
            </script>
            ';
         }
    }
    echo'
    <script>
    location.href="guardar_entrada.php";
    </script> 
    ';

?>
<!-- guardar el detalle -->
<?php
    // vemos todo lo que nos envian por el metodo post
    echo    "<pre>";
    print_r($_POST);
    echo "</pre>";


    // incluiimos la clase cls_salida para crear la clase
    include_once '../../clases/cls_detalle.php';
    // creamos un objeto de la clase cls_detalle
    $obj_detalle = new Detalle();
    // creamos las variables con los datos que llegan por el metodo post
    $id = 0;
    $accion = $_POST['btn_guardar'];
    $id_tiket = $_POST['num_id'];
    $cod_inventario = $_POST['cod_inventario'];
    $estado = $_POST['txt_estado'];
    $comentario = $_POST['txt_comentario'];

    // llamamos al objeto de la clase cls_detalle para ejeccutar la accion
    $obj_detalle->cargarDatos($id, $id_tiket,  $estado, $cod_inventario, $comentario);

    // si la accion es ADICIONAR
    if ($accion == "ADICIONAR") {

        // si la opcion es insertar
        if ($obj_detalle->insertar()) {
            echo'
            // <script> 
            
            // alert("El registro SE guardo CORRECTAMENTE");
            
            // </script>
            // ';
         }
    }elseif ($accion == "EDITAR") {
        // si la opcion es modificar
        if ($obj_detalle->modificar()) {
            echo'
            <script> 
            
            alert("El registro SE modifico CORRECTAMENTE");
            
            </script>
            ';
         }
    }else{
        // si la opcion es eliminar
        if ($obj_detalle->eliminar()) {
            echo'
            <script> 
            
            alert("El registro SE elimino CORRECTAMENTE");
            
            </script>
            ';
         }
    }

    echo'
    <script>
    location.href="../../principal.php?opcion=nuevo_detalle";
    </script>
    ';



?>
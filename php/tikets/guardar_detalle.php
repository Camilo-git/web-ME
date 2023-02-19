<!-- guardar el detalle -->
<?php
// vemos todo lo que nos envian por el metodo post
// echo    "<pre>";
// print_r($_POST);
// print_r($_GET);
// echo "</pre>";


// incluiimos la clase cls_salida para crear la clase
include_once '../../clases/cls_detalle.php';
// creamos un objeto de la clase cls_detalle
$obj_detalle = new Detalle();
// creamos las variables con los datos que llegan por el metodo post
$accion = isset($_GET['accion']) ? $_GET['accion'] : $_POST['btn_guardar'];
echo $accion;

$id = isset($_GET['id']) ? $_GET['id'] : 0;
echo $id;
// if (isset($_POST['id-tiket'])) {
//     $id_tiket = $_POST['id-tiket'];
// } elseif (isset($_GET['id_tiket'])) {
//     $id_tiket = $_GET['id_tiket'];
// } else {
//     // Manejar el caso en que ninguno de los campos está presente en la solicitud
//     echo 'el dato no llega';
// }
$id_tiket = isset($_POST['id-tiket']) ? $_POST['id-tiket'] : $_GET['id-tiket'];
echo $id_tiket;
$cod_inventario = isset($_POST['cod_inventario']) ? $_POST['cod_inventario'] : null;
$estado = isset($_POST['txt_estado']) ? $_POST['txt_estado'] : null;
$comentario = isset($_POST['txt_comentario']) ? $_POST['txt_comentario'] : 0;

// llamamos al objeto de la clase cls_detalle para ejeccutar la accion
$obj_detalle->cargarDatos($id, $id_tiket,  $estado, $cod_inventario, $comentario);

// si la accion es ADICIONAR
if ($accion == "ADICIONAR") {

    // si la opcion es insertar
    if ($obj_detalle->insertar()) {
        echo '
        <script>
          location.href="../../principal.php?opcion=nuevo_detalle&id-tiket= ' . $id_tiket . ' ";
        </script>
        ';
    }
} elseif ($accion == "ENTREGA-DETALLE") {

    include_once("../../clases/cls_conectarB.php");
    $conexion = conectarBD();

    $ejecutable = " UPDATE
                     tbl_detalle
                    SET
                     id_estado = '2'
                    WHERE
                     tbl_detalle.id ='$id';";

    $conexion->query($ejecutable);





    echo '
            <script> 
              location.href="../../principal.php?opcion=nuevo_detalle&id-tiket=' . $id_tiket . ' ";
 
            
            </script>
            ';
} else {
    // si la opcion es eliminar
    if ($obj_detalle->eliminar()) {
        echo '
            <script> 
            
            alert("El registro SE elimino CORRECTAMENTE");
            
            </script>
            ';
    }
}





?>
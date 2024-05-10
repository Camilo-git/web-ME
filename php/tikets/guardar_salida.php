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
//creamos la validacion sql si el usuario existe en la base de datos y traemos el nombre
// "SELECT `nombre` FROM `tbl_docentes` WHERE `cedula` LIKE '1032479967'"
//
include_once '../../clases/cls_conectarB.php';
//creamos la conexion a la base de datos
$conexion = conectarBD();


// validamos que el campo $nom_docente es numerico  
if (is_numeric($nom_docente)) {

    //consultamos la base de datos si el docente existe
    $sSQL = "SELECT COUNT(*) AS existe FROM tbl_docentes WHERE cedula LIKE '$nom_docente'";
    $datos = $conexion->query($sSQL);
    // recorremos los datos
    foreach ($datos as $fila) {
        $exist = $fila['existe'];
    }
    echo $exist . "<br>-------";

    //validamos que la consulta no este vacia
    if ($exist == 1) {
        
        $sSQL = "SELECT `nombre` FROM `tbl_docentes` WHERE `cedula` LIKE '$nom_docente'";
        $datos = $conexion->query($sSQL);
        foreach ($datos as $fila) {
            $nom_docente = $fila['nombre'];
        }
    echo $nom_docente . "<br>-----------";

    } else {
        echo '
        <script>
        alert("El docente no existe, por favor cree el docente");
        location.href="../../principal.php?opcion=docente-nuevo&accion=ADICIONAR&cedula=' . $nom_docente . '";
        </script> 
        ';
    }
  
} else {
    
    $sSQL = "SELECT COUNT(*) AS existe FROM tbl_docentes WHERE nombre LIKE '$nom_docente'";
    $datos = $conexion->query($sSQL);
    foreach ($datos as $fila) {
        $exist = $fila['existe'];
    }
    echo $exist . "<br>-------";
    if ($exist == 0 ) {

            echo '
            <script>
            alert("El docente no existe, por favor cree el docente");
            location.href="../../principal.php?opcion=docente-nuevo&accion=ADICIONAR&cedula=' . $nom_docente . '";
            </script> 
            ';

        }

}


// validamos que el la variable $nom_docente no este vacia si esta vacia redireccionamos a la pagina de Crear docente
if ($nom_docente == "") {
    // echo '
    //     <script>
    //     alert("El docente no existe, por favor cree el docente");
    //     location.href="../../principal.php?opcion=docente-nuevo&accion=ADICIONAR&cedula=0";
    //     </script> 
    //     ';
} 




    
    






//
date_default_timezone_set('America/Bogota');
$fecha_out = date('Y-m-d H:i:A ', time());
echo $fecha_out . "<br>";
echo $nom_docente . "<br>";

// llamamos al objeto de la clase cls_salida para ejeccutar la accion
$obj_salida->cargarDatos($id_salida, $nom_auxiliar, $nom_docente, $fecha_out);
// si la accion es Salida
if ($accion == "Salida") {

    // si la funcion es insertar
    if ($obj_salida->insertar()) {

        echo '
            <script>
              location.href="guardar_entrada.php?accion=ADICIONAR&id=' . $id_salida . ' ";
            </script> 
            ';
    }
} elseif ($accion == "EDITAR") {
    // si la opcion es modificar
    if ($obj_salida->modificar()) {
        echo '
            <script> 
           
            alert("El registro SE modifico CORRECTAMENTE");
            
            </script>
            ';
    }
}
echo '
    <script>
    // location.href="guardar_entrada.php";
    </script> 
    ';

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
echo $nom_docente . "<br>";
//creamos la validacion sql si el usuario existe en la base de datos y traemos el nombre
// "SELECT `nombre` FROM `tbl_docentes` WHERE `cedula` LIKE '1032479967'"
//
include_once '../../clases/cls_conectarB.php';
$conexion = conectarBD();
$sSQL = "SELECT `nombre` FROM `tbl_docentes` WHERE `cedula` LIKE '$nom_docente'";
$datos = $conexion->query($sSQL);

if ($datos->rowCount() == 0) {
     echo "No se encontraron resultados". "<br>";

     //validamos si la variable $nom_docente es numero si es numero redireccionamos a la pagina de Crear docente
     if (is_numeric($nom_docente)) {
        echo "Es un numero". "<br>";
        echo '
        <script>
          location.href="../../principal.php?opcion=docente-nuevo&accion=ADICIONAR&cedula=0";
        </script> 
        ';
        
            }
   

       

    } else {

    echo "Se encontraron resultados". "<br>";
            
            
}

// imprimimos el resultado
foreach ($datos as $fila) {
    $nom_docente = $fila['nombre'];
echo $nom_docente . " foreach<br>";

}
echo $nom_docente . "<br>";
//validamos que el la variable $nom_docente no este vacia si esta vacia redireccionamos a la pagina de Crear docente


//
date_default_timezone_set('America/Bogota');
$fecha_out = date('Y-m-d H:i:A ', time());
echo $fecha_out;

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

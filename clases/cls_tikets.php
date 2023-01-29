<?php
include_once("cls_conectarB.php");
class Tikets
{
    //SE DEFINEN LAS VARIABLES PARA MANEJAR TODOS LOS CAMPOS DE LA CLASE
    private $id;
    private $comentario;
    private $nombre_aula;
    private $id_salida;
    private $id_entrada;
    private $id_estado;

    //METODO PARA CARGAR TODOS LOS DATOS
    function cargarDatos($id, $comentario, $nombre_aula, $id_salida, $id_entrada, $id_estado)
    {
        $this->id = $id;
        $this->comentario = $comentario;
        $this->nombre_aula = $nombre_aula;
        $this->id_salida = $id_salida;
        $this->id_entrada = $id_entrada;
        $this->id_estado = $id_estado;
    }

    //SE DEFINEN LOS METODOS SET Y GET
    function setId($id)
    {
        $this->id = $id;
    }

    function setComentario($comentario)
    {
        $this->comentario = $comentario;
    }

    function setNombre_aula($nombre_aula)
    {
        $this->nombre_aula = $nombre_aula;
    }

    function setId_salida($id_salida)
    {
        $this->id_salida = $id_salida;
    }

    function setId_entrada($id_entrada)
    {
        $this->id_entrada = $id_entrada;
    }

    function setId_estado($id_estado)
    {
        $this->id_estado = $id_estado;
    }

    function getId()
    {
        return $this->id;
    }

    function getComentario()
    {
        return $this->comentario;
    }

    function getNombre_aula()
    {
        return $this->nombre_aula;
    }

    function getId_salida()
    {
        return $this->id_salida;
    }

    function getId_entrada()
    {
        return $this->id_entrada;
    }

    function getId_estado()
    {
        return $this->id_estado;
    }





    //METODOS CRU CREATE,READ,UPDATE,DELETE
    /*--------------------------------------------------------------------------
     Function insertar()
     Objetivo: Permite el ingreso de registros nuevos a la tabla de Contactos
     Retorno: valor booleano 
     1: true -> La operaciòn se ejecutò con èxito
     2: false -> La operaciòn no se pudo ejecutar
     --------------------------------------------------------------------------*/
    //METODO PARA INSERTAR UN NUEVO REGISTRO
    function insertar()
    {
        //variables de trabajo
        $resultado = false;
        $filas = 0;
        //creamos la conexion
        $conexion = conectarBD();
        // creamos la variable con el QUERY -> orden para la base de datos
        $sSQL = "INSERT INTO tbl_tiket VALUES (?,?,?,?,?,?)";
        //PrepareStatement es el que transporta los datos a la base de datos y los trae de vuelta
        try {
            $pst = $conexion->prepare($sSQL);
            $pst->bindParam(1, $this->id);
            $pst->bindParam(2, $this->comentario);
            $pst->bindParam(3, $this->nombre_aula);
            $pst->bindParam(4, $this->id_salida);
            $pst->bindParam(5, $this->id_entrada);
            $pst->bindParam(6, $this->id_estado);
            $filas = $pst->execute();
            $resultado = ($filas > 0) ? true : false;
        } catch (Exception $e) {
            echo "No se pudo realizar la conexión a la Base de Datos";
            echo "<br>";
            echo "Error:" . $e->getMessage();
            $resultado = false;
        }
        return $resultado;
    } //cierra el método insertar
    /*--------------------------------------------------------------------------
     Function eliminar()
     Objetivo: Permite eliminar registros de la tabla de Contactos
     Retorno: valor booleano 
     1: true -> La operaciòn se ejecutò con èxito
     2: false -> La operaciòn no se pudo ejecutar
     --------------------------------------------------------------------------*/
    function eliminar()
    {
        //variables de trabajo
        $resultado = false;
        $filas = 0;
        //creamos la conexion
        $conexion = conectarBD();
        // creamos la variable con el QUERY -> orden para la base de datos
        $sSQL = "DELETE FROM tbl_contactos WHERE con_id = ?";
        //PrepareStatement es el que transporta los datos a la base de datos y los trae de vuelta
        try {
            $pst = $conexion->prepare($sSQL);
            $pst->bindParam(1, $this->id);
            //se envia a ejecutar la conexion
            $filas = $pst->execute();
            $resultado = ($filas > 0) ? true : false;
        } catch (Exception $e) {
            echo "No se pudo realizar la conexión a la Base de Datos";
            echo "<br>";
            echo "Error:" . $e->getMessage();
            $resultado = false;
        }
        return $resultado;
    } //cierra el método eliminar
    /*--------------------------------------------------------------------------
     Function modificar()
     Objetivo: Permite editar los registros de un contacto
     Retorno: valor booleano 
     1: true -> La operaciòn se ejecutò con èxito
     2: false -> La operaciòn no se pudo ejecutar
     --------------------------------------------------------------------------*/
    function modificar()
    {
        //variables de trabajo
        $resultado = false;
        $filas = 0;
        //creamos la conexion
        $conexion = conectarBD();
        // creamos la variable con el QUERY -> orden para la base de datos
        $sSQL = "UPDATE tbl_tiket SET
           comentario = ?,
           nombre_aula  = ?,
        --    id_salida    = ?,
        --    id_entrada    = ?,
           id_estado    = ?
           WHERE  id = ?";
        //PrepareStatement es el que transporta los datos a la base de datos y los trae de vuelta
        try {
            $pst = $conexion->prepare($sSQL);
            // $pst->bindParam(1, $this->id);
            $pst->bindParam(1, $this->comentario);
            $pst->bindParam(2, $this->nombre_aula);
            // $pst->bindParam(4, $this->id_salida);
            // $pst->bindParam(5, $this->id_entrada);
            $pst->bindParam(3, $this->id_estado);
            $pst->bindParam(4, $this->id);
            $filas = $pst->execute();
            $resultado = ($filas > 0) ? true : false;
        } catch (Exception $e) {
            echo "No se pudo realizar la conexión a la Base de Datos";
            echo "<br>";
            echo "Error:" . $e->getMessage();
            $resultado = false;
        }
        return $resultado;
    } //cierra el método modificar
}//cierra la clase

//para probar el método insertar
/*$contacto = new Contacto();
$contacto->cargarDatos(0,"Sofia Angulo","Barrio El Dorado","322777123","sofiaang@gmail.es",2,"1974-05-20");
//ahora se grabaran los datos
if ($contacto->insertar())
{
    echo 'El contacto se insertó correctamente';
} else 
{
    echo 'El contacto no se pudo insertar correctamente';
}*/

//para probar el método eliminar
// $contacto = new Contacto();
// $contacto->cargarDatos(7,"","","","","","");
// //ahora se grabaran los datos
// if ($contacto->eliminar())
// {
// 	echo 'El contacto se eliminó correctamente';
// } else 
// {
// 	echo 'El contacto no se pudo eliminar correctamente';
// }

//para probar el método modificar
/*$contacto = new Contacto();
$contacto->cargarDatos(6,"Andrea Munoz","Barrio Capusigra","3121456105","andreamur@hotmail.es",2,"1975-01-06");
//ahora se grabaran los datos
if ($contacto->modificar())
{
    echo 'El contacto se editó correctamente';
} else 
{
    echo 'El contacto no se pudo editar correctamente';
}*/

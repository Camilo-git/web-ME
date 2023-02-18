<?php
// incluimos la clase cls_conectarB.php
include_once("cls_conectarB.php");
// creamos la clase Detalle
class Detalle
{
    // se definen las variables para manejar los campos de la clase
    private $id;
    private $id_tiket;
    private $id_estado;
    private $cod_equipo;
    private $comentario;

    // metodo constructor de la clase
    public function cargarDatos($id, $id_tiket, $id_estado, $cod_equipo, $comentario)
    {
        // se definen las variables para manejar los campos de la clase

        $this->id = $id;
        $this->id_tiket = $id_tiket;
        $this->id_estado = $id_estado;
        $this->cod_equipo = $cod_equipo;
        $this->comentario = $comentario;
    }



    // metodos get y set de la clase
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId_tiket()
    {
        return $this->id_tiket;
    }
    public function setId_tiket($id_tiket)
    {
        $this->id_tiket = $id_tiket;
    }
    public function getId_estado()
    {
        return $this->id_estado;
    }
    public function setId_estado($id_estado)
    {
        $this->id_estado = $id_estado;
    }
    public function getCod_equipo()
    {
        return $this->cod_equipo;
    }
    public function setCod_equipo($cod_equipo)
    {
        $this->cod_equipo = $cod_equipo;
    }
    public function getComentario()
    {
        return $this->comentario;
    }
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    }

    //METODOS CRU CREATE,READ,UPDATE,DELETE
    /*--------------------------------------------------------------------------
	 Function insertar()
	 Objetivo: Permite el ingreso de registros nuevos a la tabla de Contactos
	 Retorno: valor booleano 
	 1: true -> La operaciòn se ejecutò con èxito
	 2: false -> La operaciòn no se pudo ejecutar
	 --------------------------------------------------------------------------*/
    public function insertar()
    {
        // variables de trabajo
        $resultado = false;
        $filas = 0;
        // creamos la coneccion a la base de datos
        $conexion = conectarBD();
        // creamos la variable con el QUERY -> orden para la base de datos
        $sSQL = "INSERT INTO tbl_detalle VALUES (?,?,?,?,?)";
        // PrepareStatement para evitar sql injection
        try {
            $pst = $conexion->prepare($sSQL);
            $pst->bindParam(1, $this->id);
            $pst->bindParam(2, $this->id_tiket);
            $pst->bindParam(3, $this->id_estado);
            $pst->bindParam(4, $this->cod_equipo);
            $pst->bindParam(5, $this->comentario);
            // ejecutamos el query
            $filas = $pst->execute();
            $resultado = ($filas > 0) ? true : false;
        } catch (Exception $e) {
            echo "No se pudo realizar la conexión a la Base de Datos";
            echo "<br>";
            echo "Error:" . $e->getMessage();
            $resultado = false;
        }
        return $resultado;
    } // cierra el método insertar

    /*--------------------------------------------------------------------------
	 Function eliminar()
	 Objetivo: Permite eliminar registros de la tabla de Contactos
	 Retorno: valor booleano 
	 1: true -> La operaciòn se ejecutò con èxito
	 2: false -> La operaciòn no se pudo ejecutar
	 --------------------------------------------------------------------------*/
    public function eliminar()
    {
        //variables de trabajo
        $resultado = false;
        $filas = 0;
        //creamos la conexion
        $conexion = conectarBD();
        // creamos la variable con el QUERY -> orden para la base de datos
        $sSQL = "DELETE FROM tbl_detalle WHERE id = ?;";
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
    public function modificar()
    {
        //variables de trabajo
        $resultado = false;
        $filas = 0;
        //creamos la conexion
        $conexion = conectarBD();
        // creamos la variable con el QUERY -> orden para la base de datos
        $sSQL = "UPDATE tbl_detalle SET
             id    = ?,
             id_tiket = ?,
             id_estado  = ?,
             cod_equipo    = ?,
             comentario    = ?
             WHERE id = ?";
        //PrepareStatement es el que transporta los datos a la base de datos y los trae de vuelta
        try {
            $pst = $conexion->prepare($sSQL);
            $pst->bindParam(1, $this->id);
            $pst->bindParam(2, $this->id_tiket);
            $pst->bindParam(3, $this->id_estado);
            $pst->bindParam(4, $this->cod_equipo);
            $pst->bindParam(5, $this->comentario);


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
    } //cierra el método modificar
}//cierra la clase

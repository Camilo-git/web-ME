<?php
// incluimos la clase de conexion
include_once("cls_conectarB.php");
// creamos la clase
class Inventario{
    // se definen los atributos para manejar todos los campos de la tabla
    private $codigo;
    private $marca;
    private $modelo;
    private $comentario;
    private $estado;
    private $cat_equipo;

    // metodo para cargar los datos
    public function cargarDatos($codigo, $marca, $modelo, $comentario, $estado, $cat_equipo){
        $this->codigo = $codigo;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->comentario = $comentario;
        $this->estado = $estado;
        $this->cat_equipo = $cat_equipo;
    }

    // se definen los metodos para cargar los atributos de la clase
    function setCodigo($codigo){
        $this->codigo = $codigo;
    }
    function getCodigo(){
        return $this->codigo;
    }
    function setMarca($marca){
        $this->marca = $marca;
    }
    function getMarca(){
        return $this->marca;
    }
    function setModelo($modelo){
        $this->modelo = $modelo;
    }
    function getModelo(){
        return $this->modelo;
    }
    function setComentario($comentario){
        $this->comentario = $comentario;
    }
    function getComentario(){
        return $this->comentario;
    }
    function setEstado($estado){
        $this->estado = $estado;
    }
    function getEstado(){
        return $this->estado;
    }
    function setCat_equipo($cat_equipo){
        $this->cat_equipo = $cat_equipo;
    }
    function getCat_equipo(){
        return $this->cat_equipo;
    }

    //METODOS CRU CREATE,READ,UPDATE,DELETE
	/*--------------------------------------------------------------------------
	 Function insertar()
	 Objetivo: Permite el ingreso de registros nuevos a la tabla de Contactos
	 Retorno: valor booleano 
	 1: true -> La operaciòn se ejecutò con èxito
	 2: false -> La operaciòn no se pudo ejecutar
	 --------------------------------------------------------------------------*/
    public function insertar(){
        // variables de trabajo
        $resultado = false;
        $filas = 0;
        // conexion a la base de datos
        $conexion = conectarBD();
        // creamos la variable con e QUERY orden para la base de datos 
        $sSQL = "INSERT INTO tbl_inventario VALUES(?,?,?,?,?,?)";
        //PrepareStatement es el que transporta los datos a la base de datos y los trae de vuelta
        try{
            $pst=$conexion->prepare($sSQL);
            $pst->bindParam(1,$this->codigo);
            $pst->bindParam(2,$this->marca);
            $pst->bindParam(3,$this->modelo);
            $pst->bindParam(4,$this->comentario);
            $pst->bindParam(5,$this->estado);
            $pst->bindParam(6,$this->cat_equipo);
            // se encia a ejecutar la conexion
            $resultado = $pst->execute();
        }
        catch(Exception $e){
            echo "No se pudo realizar la conexión a la Base de Datos";
        	echo "<br>";
	        echo "Error:".$e->getMessage();
	        $resultado=false;
        }
        return $resultado;
    }//cierre de la funcion insertar


}
// cierre de la clase


?>
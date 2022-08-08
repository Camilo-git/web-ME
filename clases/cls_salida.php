<?php
// incluiimos la clase cls_conectarB
include_once ("cls_conectarB.php");
class Salida{
    // se definen las variables para manejar los campos de la clase
    private $id;
    private $nom_auxiliar_out;
    private $nom_docente_out;
    private $fecha_out;

    // metodo constructor de la clase
    public function __construct(){
        // se definen las variables para manejar los campos de la clase
        $this->id = "";
        $this->nom_auxiliar_out = "";
        $this->nom_docente_out = "";
        $this->fecha_out = "";
    }
    // metodo para cargar los datos de la clase
    public function cargarDatos($id, $nom_auxiliar_out, $nom_docente_out, $fecha_out){
        $this->id = $id;
        $this->nom_auxiliar_out = $nom_auxiliar_out;
        $this->nom_docente_out = $nom_docente_out;
        $this->fecha_out = $fecha_out;
    }

    // se definen los metodos set y get para cada campo de la clase
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getNom_auxiliar_out(){
        return $this->nom_auxiliar_out;
    }
    public function setNom_auxiliar_out($nom_auxiliar_out){
        $this->nom_auxiliar_out = $nom_auxiliar_out;
    }
    public function getNom_docente_out(){
        return $this->nom_docente_out;
    }
    public function setNom_docente_out($nom_docente_out){
        $this->nom_docente_out = $nom_docente_out;
    }
    public function getFecha_out(){
        return $this->fecha_out;
    }
    public function setFecha_out($fecha_out){
        $this->fecha_out = $fecha_out;
    }
    // metodo para insertar un registro
    public function insertar()
    {
        // variables de trabajo 
        $resulrado = false;
        $filas = 0;
        // creamos la conexion a la base de datos
        $conexion = conectarBD();
        // creamos la sentencia sql para insertar un registro
        $sSQL = "INSERT INTO tbl_salida VALUES (?,?,?,?)";

        try{
            $pst = $conexion->prepare($sSQL);
            $pst->bindParam(1, $this->id);
            $pst->bindParam(2, $this->nom_auxiliar_out);
            $pst->bindParam(3, $this->nom_docente_out);
            $pst->bindParam(4, $this->fecha_out);
            // ejecutamos la sentencia sql
            $filas = $pst->execute();
            $resulrado = ($filas > 0) ? true : false;
        } catch (Exception $e){
            echo "Error: " . $e->getMessage();
        }
        return $resulrado;
    }   // fin del metodo insertar

} // fin de la clase Salida

?>
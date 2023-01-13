<?php
// incluiimos la clase cls_conectarB
include_once ("cls_conectarB.php");
class Entrada{
    // se definen las variables para manejar los campos de la clase
    private $id;
    private $nom_auxiliar_in;
    private $nom_docente_in;
    private $fecha_in;
    
    // metodo constructor de la clase
    public function __construct(){
        // se definen las variables para manejar los campos de la clase
        $this->id = "";
        $this->nom_auxiliar_in = "";
        $this->nom_docente_in = "";
        $this->fecha_in = "";
    }
    // metodo para cargar los datos de la clase
    public function cargarDatos($id, $nom_auxiliar_in, $nom_docente_in, $fecha_in){
        $this->id = $id;
        $this->nom_auxiliar_in = $nom_auxiliar_in;
        $this->nom_docente_in = $nom_docente_in;
        $this->fecha_in = $fecha_in;
    }

    // se definen los metodos set y get para cada campo de la clase
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getNom_auxiliar_in(){
        return $this->nom_auxiliar_in;
    }
    public function setNom_auxiliar_in($nom_auxiliar_in){
        $this->nom_auxiliar_in = $nom_auxiliar_in;
    }
    public function getNom_docente_in(){
        return $this->nom_docente_in;
    }
    public function setNom_docente_in($nom_docente_in){
        $this->nom_docente_in = $nom_docente_in;
    }
    public function getFecha_in(){
        return $this->fecha_in;
    }
    public function setFecha_in($fecha_in){
        $this->fecha_in = $fecha_in;
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
        $sSQL = "INSERT INTO tbl_entrada VALUES (?,?,?,?)";
        
        try {
            $pst = $conexion->prepare($sSQL);
            $pst->bindParam(1, $this->id);
            $pst->bindParam(2, $this->nom_auxiliar_in);
            $pst->bindParam(3, $this->nom_docente_in);
            $pst->bindParam(4, $this->fecha_in);
            // ejecutamos la sentencia sql
            $filas = $pst->execute();
            $resulrado = ($filas > 0) ? true : false;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        // retornamos el resultado
        return $resulrado;
    }   // fin del metodo insertar

    public function modificar()
   {
      //variables de trabajo
      $resultado = false;
      $filas = 0;
      //creamos la conexion
      $conexion = conectarBD();
      // creamos la variable con el QUERY -> orden para la base de datos
      $sSQL = "UPDATE tbl_entrada SET
           id    = ?,
           nom_auxiliar_in= ?,
           nom_docente_in  = ?,
           fecha_in    = ?           
           WHERE id = ?";
      //PrepareStatement es el que transporta los datos a la base de datos y los trae de vuelta
      try {
         $pst = $conexion->prepare($sSQL);
         $pst->bindParam(1, $this->id);
         $pst->bindParam(2, $this->nom_auxiliar_in);
         $pst->bindParam(3, $this->nom_docente_in);
         $pst->bindParam(4, $this->fecha_in);
         $pst->bindParam(5, $this->id);


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
// fin de la clase Salida
?>
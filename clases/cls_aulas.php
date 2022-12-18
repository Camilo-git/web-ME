<?php
include_once("cls_conectarB.php");
class Aulas
{
   //SE DEFINEN LAS VARIABLES PARA MANEJAR TODOS LOS CAMPOS DE LA CLASE
   private $id;
   private $nombre;
   private $edificio;
   private $capacidad;
   private $comentario;

   //METODO PARA CARGAR TODOS LOS DATOS
   function cargarDatos($id, $nombre, $edificio, $capacidad, $comentario)
   {
      $this->id = $id;
      $this->nombre = $nombre;
      $this->edificio = $edificio;
      $this->capacidad = $capacidad;
      $this->comentario = $comentario;
   }

   //SE DEFINEN LOS METODOS SET Y GET

   function setId($id)
   {
      $this->id = $id;
   }

   function setNombre($nombre)
   {
      $this->nombre = $nombre;
   }

   function setedificio($edificio)
   {
      $this->edificio = $edificio;
   }

   function setcapacidad($capacidad)
   {
      $this->capacidad = $capacidad;
   }

   function setcomentario($comentario)
   {
      $this->comentario = $comentario;
   }


   function getId()
   {
      return $this->id;
   }

   function getNombre()
   {
      return $this->nombre;
   }

   function getedificio()
   {
      return $this->edificio;
   }

   function getcapacidad()
   {
      return $this->capacidad;
   }

   function getcomentario()
   {
      return $this->comentario;
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
      //variables de trabajo
      $resultado = false;
      $filas = 0;
      //creamos la conexion
      $conexion = conectarBD();
      // creamos la variable con el QUERY -> orden para la base de datos
      $sSQL = "INSERT INTO tbl_aulas VALUES (?,?,?,?,?)";
      //PrepareStatement es el que transporta los datos a la base de datos y los trae de vuelta
      try {
         $pst = $conexion->prepare($sSQL);
         $pst->bindParam(1, $this->id);
         $pst->bindParam(2, $this->nombre);
         $pst->bindParam(3, $this->edificio);
         $pst->bindParam(4, $this->capacidad);
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
   } //cierra el método insertar
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
      $sSQL = "DELETE FROM tbl_aulas WHERE nombre = '?';";
      //PrepareStatement es el que transporta los datos a la base de datos y los trae de vuelta
      try {
         $pst = $conexion->prepare($sSQL);
         $pst->bindParam(1, $this->nombre);
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
      $sSQL = "UPDATE tbl_aulas SET
           id    = ?,
           nombre = ?,
           edificio  = ?,
           capacidad    = ?,
           comentario    = ?
           WHERE nombre = ?";
      //PrepareStatement es el que transporta los datos a la base de datos y los trae de vuelta
      try {
         $pst = $conexion->prepare($sSQL);
         $pst->bindParam(1, $this->id);
         $pst->bindParam(2, $this->nombre);
         $pst->bindParam(3, $this->edificio);
         $pst->bindParam(4, $this->capacidad);
         $pst->bindParam(5, $this->comentario);
         $pst->bindParam(6, $this->nombre);


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
// $contacto = new Aulas();
// $contacto->cargarDatos(6,"Andrea Munoz","55","aaaandreamur@hotmail.es",2,"1975-01-06");
// //ahora se grabaran los datos
// if ($contacto->modificar())
// {
// 	echo 'El contacto se editó correctamente';
// } else 
// {
// 	echo 'El contacto no se pudo editar correctamente';
// }

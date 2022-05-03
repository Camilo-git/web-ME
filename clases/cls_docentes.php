<?php 
include_once("cls_conectarB.php");
class Docente{
    //SE DEFINEN LAS VARIABLES PARA MANEJAR TODOS LOS CAMPOS DE LA CLASE
	private $cedula;
	private $nombre;
	private $correo;
	private $cel;
	private $programa;
	private $dependencia;

   //METODO PARA CARGAR TODOS LOS DATOS
   function cargarDatos($cedula,$nombre,$correo,$cel,$programa,$dependencia)
   {
     $this->cedula=$cedula;
     $this->nombre=$nombre;
     $this->correo=$correo;
     $this->cel=$cel;
     $this->programa=$programa;
     $this->dependencia=$dependencia;
   }

   //SE DEFINEN LOS METODOS SET Y GET
   function setcedula($cedula)
	{
		$this->cedula = $cedula;
	}

   function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}

   function setcorreo($correo)
	{
		$this->correo = $correo;
	}

   function setcel($cel)
	{
		$this->cel = $cel;
	}

   function setprograma($programa)
	{
		$this->programa = $programa;
	}

   function setdependencia($dependencia)
	{
		$this->dependencia = $dependencia;
	}


   function getcedula()
	{
		return $this->cedula;
	}

   function getNombre()
	{
		return $this->nombre;
	}

   function getcorreo()
	{
		return $this->correo;
	}

   function getcel()
	{
		return $this->cel;
	}

   function getprograma()
	{
		return $this->programa;
	}

   function getdependencia()
	{
		return $this->dependencia;
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
	$filas =0;
	//creamos la conexion
    $conexion = conectarBD();
    // creamos la variable con el QUERY -> orden para la base de datos
    $sSQL="INSERT INTO tbl_docentes VALUES (?,?,?,?,?,?)";
    //PrepareStatement es el que transporta los datos a la base de datos y los trae de vuelta
    try
    {
     $pst=$conexion->prepare($sSQL);
     $pst->bindParam(1,$this->cedula);
     $pst->bindParam(2,$this->nombre);
     $pst->bindParam(3,$this->correo);
     $pst->bindParam(4,$this->cel);
     $pst->bindParam(5,$this->programa);
     $pst->bindParam(6,$this->dependencia);
    //se envia a ejecutar la conexion
    $filas=$pst->execute();
    $resultado=($filas>0) ? true : false;
   }
   catch (Exception $e)
   {
	echo "No se pudo realizar la conexión a la Base de Datos";
	echo "<br>";
	echo "Error:".$e->getMessage();
	$resultado=false;
   }
   return $resultado; 
  }//cierra el método insertar
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
	$filas =0;
	//creamos la conexion
    $conexion = conectarBD();
    // creamos la variable con el QUERY -> orden para la base de datos
    $sSQL="DELETE FROM tbl_docentes WHERE con_cedula = ?";
    //PrepareStatement es el que transporta los datos a la base de datos y los trae de vuelta
    try
    {
     $pst=$conexion->prepare($sSQL);
     $pst->bindParam(1,$this->cedula);
     //se envia a ejecutar la conexion
     $filas=$pst->execute();
     $resultado=($filas>0) ? true : false;
   }
   catch (Exception $e)
   {
	echo "No se pudo realizar la conexión a la Base de Datos";
	echo "<br>";
	echo "Error:".$e->getMessage();
	$resultado=false;
   }
   return $resultado; 
  }//cierra el método eliminar
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
	$filas =0;
	//creamos la conexion
    $conexion = conectarBD();
    // creamos la variable con el QUERY -> orden para la base de datos
    $sSQL="UPDATE tbl_contactos SET
           con_nombre    = ?,
           con_correo = ?,
           con_cel  = ?,
           con_programa    = ?,
           con_dependencia     = ?,
           con_fechanac  = ?
           WHERE  con_cedula = ?";
    //PrepareStatement es el que transporta los datos a la base de datos y los trae de vuelta
    try
    {
     $pst=$conexion->prepare($sSQL);
     $pst->bindParam(1,$this->nombre);
     $pst->bindParam(2,$this->correo);
     $pst->bindParam(3,$this->cel);
     $pst->bindParam(4,$this->programa);
     $pst->bindParam(5,$this->dependencia);
     $pst->bindParam(7,$this->cedula);
     //se envia a ejecutar la conexion
     $filas=$pst->execute();
     $resultado=($filas>0) ? true : false;
   }
   catch (Exception $e)
   {
	echo "No se pudo realizar la conexión a la Base de Datos";
	echo "<br>";
	echo "Error:".$e->getMessage();
	$resultado=false;
   }
   return $resultado; 
  }//cierra el método modificar
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


 ?>
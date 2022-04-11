<?php 
include_once("cls_conectarBD.php");
class Usuario{
//SE DEFINEN LAS VARIABLES PARA MANEJAR TODOS LOS CAMPOS DE LA CLASE
	private $id;
	private $nombre;
	private $usuario;
	private $clave;

//METODO PARA CARGAR TODOS LOS DATOS
   function cargarDatos($id,$nombre,$usuario,$clave)
   {
     $this->id=$id;
     $this->nombre=$nombre;
     $this->usuario=$usuario;
     $this->clave=$clave;     
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

	function setUsuario($usuario)
	{
		$this->usuario = $usuario;
	}

	function setClave($clave)
	{
		$this->clave = $clave;
	}

	
	function getId()
	{
		return $this->id;
	}

	function getNombre()
	{
		return $this->nombre;
	}

	function getUsuario()
	{
		return $this->usuario;
	}

	function getClave()
	{
		return $this->clave;
	}

//METODOS CRU CREATE,READ,UPDATE,DELETE
	/*--------------------------------------------------------------------------
	 Function insertar()
	 Objetivo: Permite el ingreso de registros nuevos a la tabla de Usuarios
	 Retorno: valor booleano 
	 1: true -> La operación se ejecutó con éxito
	 2: false -> La operación no se pudo ejecutar
	 --------------------------------------------------------------------------*/
   public function insertar()
   {
	//variables de trabajo
	$resultado = false;
	$filas =0;
	//creamos la conexion
    $conexion = conectarBD();
    // creamos la variable con el QUERY -> orden para la base de datos
    $sSQL="INSERT INTO tbl_usuario VALUES (?,?,?,?)";
    //PrepareStatement es el que transporta los datos a la base de datos y los trae de vuelta
    try
    {
     $pst=$conexion->prepare($sSQL);
     $pst->bindParam(1,$this->id);
     $pst->bindParam(2,$this->nombre);
     $pst->bindParam(3,$this->usuario);
     $pst->bindParam(4,$this->clave);     
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
	 Objetivo: Permite eliminar registros de la tabla de Usuarios
	 Retorno: valor booleano 
	 1: true -> La operación se ejecutó con éxito
	 2: false -> La operación no se pudo ejecutar
	 --------------------------------------------------------------------------*/
  public function eliminar()
   {
	//variables de trabajo
	$resultado = false;
	$filas =0;
	//creamos la conexion
    $conexion = conectarBD();
    // creamos la variable con el QUERY -> orden para la base de datos
    $sSQL="DELETE FROM tbl_usuario WHERE usu_id = ?";
    //PrepareStatement es el que transporta los datos a la base de datos y los trae de vuelta
    try
    {
     $pst=$conexion->prepare($sSQL);
     $pst->bindParam(1,$this->id);
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
	 Objetivo: Permite editar los registros de un usuario
	 Retorno: valor booleano 
	 1: true -> La operación se ejecutó con éxito
	 2: false -> La operación no se pudo ejecutar
	 --------------------------------------------------------------------------*/
  public function modificar()
   {
	//variables de trabajo
	$resultado = false;
	$filas =0;
	//creamos la conexion
    $conexion = conectarBD();
    // creamos la variable con el QUERY -> orden para la base de datos
    $sSQL="UPDATE tbl_usuario SET
           usu_nombre    = ?,
           usu_usuario   = ?,
           usu_clave     = ?          
           WHERE  usu_id = ?";
    //PrepareStatement es el que transporta los datos a la base de datos y los trae de vuelta
    try
    {
     $pst=$conexion->prepare($sSQL);
     $pst->bindParam(1,$this->nombre);
     $pst->bindParam(2,$this->usuario);
     $pst->bindParam(3,$this->clave);     
     $pst->bindParam(4,$this->id);
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
}//CIERRA LA CLASE

//para probar el método insertar
/*$usuario = new Usuario();
$usuario->cargarDatos(0,"Ivan Dario Martinez","idamarcal98","vivaelfutbol2018");
//ahora se grabaran los datos
if ($usuario->insertar())
{
	echo 'El usuario se insertó correctamente';
} else 
{
	echo 'El usuario no se pudo insertar correctamente';
}*/

//para probar el método eliminar
/*$usuario = new Usuario();
$usuario->cargarDatos(3,"","","");
//ahora se grabaran los datos
if ($usuario->eliminar())
{
	echo 'El usuario se eliminó correctamente';
} else 
{
	echo 'El usuario no se pudo eliminar correctamente';
}*/

//para probar el método modificar
/*$usuario = new usuario();
$usuario->cargarDatos(4,"Doris Calvachi","dorispatryc","7890");
//ahora se grabaran los datos
if ($usuario->modificar())
{
	echo 'El usuario se editó correctamente';
} else 
{
	echo 'El usuario no se pudo editar correctamente';
}*/


 ?>
<?php 
include_once("cls_conectarBD.php");
class Grupo{
//SE DEFINEN LAS VARIABLES PARA MANEJAR TODOS LOS CAMPOS DE LA CLASE
	private $id;
	private $nombre;

//METODO PARA CARGAR TODOS LOS DATOS
   function cargarDatos($id,$nombre)
   {
     $this->id=$id;
     $this->nombre=$nombre;    
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

	

	function getId()
	{
		return $this->id;
	}

	function getNombre()
	{
		return $this->nombre;
	}
//METODOS CRU CREATE,READ,UPDATE,DELETE
	/*--------------------------------------------------------------------------
	 Function insertar()
	 Objetivo: Permite el ingreso de registros nuevos a la tabla de Grupo
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
    $sSQL="INSERT INTO tbl_grupo VALUES (?,?)";
    //PrepareStatement es el que transporta los datos a la base de datos y los trae de vuelta
    try
    {
     $pst=$conexion->prepare($sSQL);
     $pst->bindParam(1,$this->id);
     $pst->bindParam(2,$this->nombre);
    
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
	 Objetivo: Permite eliminar registros de la tabla de Grupo
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
    $sSQL="DELETE FROM tbl_grupo WHERE gru_id = ?";
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
	 Objetivo: Permite editar los registros de un grupo
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
    $sSQL="UPDATE tbl_grupo SET
           gru_nombre    = ?           
           WHERE  gru_id = ?";
    //PrepareStatement es el que transporta los datos a la base de datos y los trae de vuelta
    try
    {
     $pst=$conexion->prepare($sSQL);
     $pst->bindParam(1,$this->nombre);     
     $pst->bindParam(2,$this->id);
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
/*$grupo = new Grupo();
$grupo->cargarDatos(0,"Asistencia Administrativa");
//ahora se grabaran los datos
if ($grupo->insertar())
{
	echo 'El grupo se insertó correctamente';
} else 
{
	echo 'El grupo no se pudo insertar correctamente';
}*/

//para probar el método eliminar
/*$grupo = new Grupo();
$grupo->cargarDatos(3,"");
//ahora se grabaran los datos
if ($grupo->eliminar())
{
	echo 'El grupo se eliminó correctamente';
} else 
{
	echo 'El grupo no se pudo eliminar correctamente';
}*/

//para probar el método modificar
$grupo = new Grupo();
$grupo->cargarDatos(1,"Gestión Contable y Financiera Diurna");
//ahora se grabaran los datos
if ($grupo->modificar())
{
	echo 'El grupo se editó correctamente';
} else 
{
	echo 'El grupo no se pudo editar correctamente';
}

 ?>
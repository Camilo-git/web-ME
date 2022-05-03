<?php 
include_once("cls_conectarB.php");
class Contacto{
    //SE DEFINEN LAS VARIABLES PARA MANEJAR TODOS LOS CAMPOS DE LA CLASE
    private $id;
    private $comentario;
    private $h_salida;
    private $h_entrada;
    private $ced_aux;
   private $ced_docentes;
   private $cod_equipos;
   private $id_aula;

   //METODO PARA CARGAR TODOS LOS DATOS
   function cargarDatos($id,$comentario,$celular,$h_entrada,$direch_salida)
   {
     $this->id=$id;
     $this->comentario=$comentario;
     $this->celh_salida;
     $this->h_entrada=$h_entrada;
     $this->ced_aux=$ced_aux;
     $this->ced_docentes=$ced_docentes;
     $this->cod_equipos=$cod_equipos;
     $this->id_aula=$id_aula;
   }

   //SE DEFINEN LOS METODOS SET Y GET
   function setid($id)
    {
        $this->id = $id;
    }

   function setcomentario($comenth_salida)
   {
        $this->comentario = $comenth_salida;
   

   function setcelular($celular)
    {
        $this->celular = $celular;
    }

   function seth_entrada($h_entrada)
    {
        $this->h_entrada = $h_entrada;
    }

   function setced_aux($ced_aux)
    {
        $this->ced_aux = $ced_aux;
    }
   function setced_docentes($ced_docentes)
   {
       $this->ced_docentes = $ced_docentes;
    }
   function setcod_equipos($cod_equipos)
   {
       $this->cod_equipos = $cod_equipos;
    }
   function setid_aula($id_aula)
   {
       $this->id_aula = $id_aula;
    }



   function getid()
    {
        return $this->id;
    }

   function getcomentah_salida()
   {
        return $this->comenth_salida;
   }

   function getcelular()
    {
        return $this->celular;
    }

   function geth_entrada()
    {
        return $this->h_entrada;
    }

   function getced_aux()
    {
        return $this->ced_aux;
    }

   function getced_docentes()
   {
       return $this->ced_docentes;
    }
   function getcod_equipos()
   {
       return $this->cod_equipos;
    }
   function getid_aula()
   {
       return $this->id_aula;
    }
    

   

   //METODOS CRU CREATE,READ,UPDATE,DELETE
    /*--------------------------------------------------------------------------
     Function insertar()
     Objetivo: Permite el ingreso de registros nuevos a la tabla de Contactos
     Retorno: valor booleano 
     1: true -> La operaciòn se ejecutò con èxito
     2: false -> La operaciòn no se pudo ejecutar
     --------------------------------------------------------------------------*/

   function insertar()
 {
    //variables de trabajo
    $resultado = false;
    $filas =0;
    //creamos la conexion
    $conexion = conectarBD();
    // creamos la variable con el QUERY -> orden para la base de datos
    $sSQL="INSERT INTO tbl_contactos VALUES (?,?,?,?,?)";
    //PrepareStatement es el que transporta los datos a la base de datos y los trae de vuelta
    try
    {
     $pst=$conexion->prepare($sSQL);
     $pst->bindParam(1,$this->id);
     $pst->bindParam(2,$this->comentario);
     $pst->bindParam(3,$this->ch_salida);
     $pst->bindParam(4,$this->h_entrada);
     $pst->bindParam(5,$this->ced_aux);
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
  function eliminar()
   {
    //variables de trabajo
    $resultado = false;
    $filas =0;
    //creamos la conexion
    $conexion = conectarBD();
    // creamos la variable con el QUERY -> orden para la base de datos
    $sSQL="DELETE FROM tbl_contactos WHERE con_id = ?";
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
     Objetivo: Permite editar los registros de un contacto
     Retorno: valor booleano 
     1: true -> La operaciòn se ejecutò con èxito
     2: false -> La operaciòn no se pudo ejecutar
     --------------------------------------------------------------------------*/
 function modificar()
   {
    //variables de trabajo
    $resultado = false;
    $filas =0;
    //creamos la conexion
    $conexion = conectarBD();
    // creamos la variable con el QUERY -> orden para la base de datos
    $sSQL="UPDATE tbl_contactos SET
           con_comentario    = ?,
           con_celh_salida?,
           con_h_entrada  = ?,
           con_ced_aux    = ?
           WHERE  con_id = ?";
    //PrepareStatement es el que transporta los datos a la base de datos y los trae de vuelta
    try
    {
     $pst=$conexion->prepare($sSQL);
     $pst->bindParam(1,$this->comentario);
     $pst->bindParam(2,$this->ch_salida);
     $pst->bindParam(3,$this->h_entrada);
     $pst->bindParam(4,$this->ced_aux);
     $pst->bindParam(7,$this->id);
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
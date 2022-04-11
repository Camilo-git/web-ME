<?php 
//----------condicion-------------------si verdadero---si falso------
  $opcion = (!isset($_GET['opcion']) ) ? 'inicio' : $_GET['opcion'];
/* operarodes alternarios
  if( !isset($GET['opcion']) ){
    $opcion ='inicio';
  }else{
   $opcion = $_GET['opcion'];
  }*/
  

 ?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/datatable/css/bootstrap.css">
    <link rel="stylesheet" href="lib/datatable/css/dataTables.bootstrap4.min.css">
    


    <title>Agenda Ver 1.0</title>

  </head>
  <body>
    
    <div class="container my-4">
        
        <?php include_once("inc/encabezado.inc");?>
        <?php include_once("inc/Menu_Principal.inc");?>
        



        <!--el cuerpo principal de la pagina`^-->
        <section class="cuerpo">

          <?php 
          switch ($opcion) {
            case 'inicio':
              include_once("php/inicio.php");
              break;
/*-------------------MANTENIMIENTO------------------*/

            case 'contactos':
              include_once("php/mantenimiento/mante_contactos.php");
              break;
            case 'grupos':
              include_once("php/mantenimiento/mante_grupos.php");
              break;

/*-----------------Formulario Contactos------------- */

            case 'contactos_form':
              include_once("php/frm/contactos_form.php");
              break;


/*-------------------CONSULTAS------------------*/

            case 'consu_contactos':
              include_once("php/consultas/consu_contactos.php");
              break;
            case 'consu_grupos':
              include_once("php/consultas/consu_grupos.php");
              break;
/*-----------------------grupos--------------*/
            case 'repo_contactos':
              include_once("php/reportes/repo_contactos.php");
              break;
            case 'repo_grupos':
              include_once("php/reportes/repo_grupos.php");
              break;
/*-----------------------procesar--------------*/
            case 'proce_usuarios':
              include_once("php/procesos/proce_usuarios.php");
              break;
            case 'optener_copia':
              include_once("php/procesos/optener_copia.php");
              break;
            case 'descargar_copia':
              include_once("php/procesos/descargar_copia.php");
              break;

            
            default:
            echo "error de opcion";
              break;
          }



           ?>
          
        </section>

        <!--el pie de pagina-->
        <footer>
          
        </footer>




     </div><!-- CIERRA CONTAINER -->
    
    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="lib/bootstrap/js/jquery-3.3.1.slim.min.js"></script>
    <script src="lib/bootstrap/js/popper.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/datatable/js/jquery.dataTables.min.js"></script>
    <script src="lib/datatable/js/dataTables.bootstrap4.min.js"></script>
    <script src="lib/fontawesome/js/all.js"></script>
  </body>
</html>


<script>

      $('#miTabla').DataTable( {
          language: {
              processing:     "Procesando...",
              search:         "Buscar:",
              lengthMenu:     "Mostrar _MENU_ elementos",
              info:           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              infoEmpty:      "Ningún dato disponible en esta tabla",
              infoFiltered:   "(filtrado de un total de _MAX_ registros)",
              infoPostFix:    "",
              loadingRecords: "Cargando...",
              zeroRecords:    "No se encontraron resultados",
              emptyTable:     "Ningún dato disponible en esta tabla",
              paginate: {
                  first:      "Primero",
                  previous:   "Anterior",
                  next:       "Siguiente",
                  last:       "Ultimo"
              },
              aria: {
                  sortAscending:  ": Activar para ordenar la columna de manera ascendente",
                  sortDescending: ": Activar para ordenar la columna de manera descendente"
              }
          }
      } );

</script>

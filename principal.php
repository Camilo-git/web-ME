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
        <!-- incluimos el encabezado y el menu principal  -->
        <?php include_once("inc/encabezado.inc");?>
        <?php include_once("inc/Menu_Principal.inc");?>
        



        <!--el cuerpo principal de la pagina`^-->
        <section class="cuerpo">

          <?php 
          switch ($opcion) {
            case 'inicio':
              include_once("php/inicio.php");
              break;
/*-------------------AULAS------------------*/

            case 'aulas':
              include_once("php/aulas/todas_aulas.php");
              break;
            
// ------------AULA NUEVA-----------------
            case 'aulas-nueva':
              include_once("php/aulas/nueva_aula.php");
              break;

// ------------ EDITAR AULA--------------------
              case 'editar-aula';
                include_once("php/aulas/nueva_aula.php");

/*----------------- equipos------------- */

            case 'equipos':
              include_once("php/equipos/equipos.php");
              break;

// ------------equipos-nuevo-----------------
            case 'equipos-nuevo':
              include_once("php/equipos/nuevo_equipo.php");
              break;
// inventario
            case 'inventario':
              include_once("php/inventario/inventario.php");
              break;
// nuevo articulo
            case 'inventario-nuevo':
              include_once("php/inventario/nuevo_articulo.php");
              break;

/*-------------------PROFESORES------------------*/

            case 'profesores':
              include_once("php/profesores/profesores.php");
              break;

// ------------profesores-nuevo-----------------
            case 'docente-nuevo':
              include_once("php/profesores/nuevo_profesor.php");
              break;
/*-----------------------auxiliares--------------*/
            case 'auxiliares':
              include_once("php/auxiliares/auxiliares.php");
              break;

// ------------auxiliares-nuevo-----------------
            case 'auxiliar-nuevo':
              include_once("php/auxiliares/nuevo_auxiliar.php");
              break;

/*-----------------------tikets--------------*/
// salida y entrada de tikets
            case 'salida_tiket':
              include_once("php/tikets/salida_tiket.php");
              break;
// todos los tikets
            case 'all_tikets':
              include_once("php/tikets/all_tikets.php");
              break;
// formulario para ingresar el tiket
            case 'entrada_tiket':
              include_once("php/tikets/entrada_tiket.php");
              break;
// formulario para ingresar el detalle
            case 'nuevo_detalle':
              include_once("php/tikets/nuevo_detalle.php");
              break;

            default:
              include_once("php/inicio.php");
              break;
            
          } // fin del switch



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

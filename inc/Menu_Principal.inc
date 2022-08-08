<!-- menu principal de una aplicacion-->

        <nav class="navbar navbar-expand-lg nadvar-light bg-ligth">
          
            <!--brand -->
            <a href="" class="navbar-brand">Agenda ver 1.0</a>
             <!-- menu principal -->
            <ul class="navbar-nav">
              
             <!--  primera opcion del menu inicio -->
             <!-- <li class="nav-item">
                <a href="principal.php?opcion=inicio" class="nav-link">Inicio</a>
             </li> -->

             <!-- opcion de aulas -->

             <li class="nav-item dropdown">
                <a href="principal.php?opcion=aulas" class="nav-link"> Aulas </a>           
             </li>

             <!-- opcion de equipos -->

             <li class="nav-item dropdown">
                <a href="principal.php?opcion=equipos" class="nav-link dropdown-toggle" data-toggle="dropdown"> Equipos </a>
                <div class="dropdown-menu">                      
                  <a href="principal.php?opcion=equipos" class="dropdown-item"><i class="fa fa-user-circle"></i> Categorias </a>
                  <a href="principal.php?opcion=inventario" class="dropdown-item"><i class="fas fa-users"></i> Inventario </a>
                </div> 
            </li>
              <!-- opcion de profesores -->

              <li class="nav-item dropdown">
                  <a href="principal.php?opcion=profesores" class="nav-link"> Profesores </a>
              </li>

              <!-- opcion de auxiliares -->

              <li class="nav-item dropdown">
                  <a href="principal.php?opcion=auxiliares" class="nav-link"> Auxiliares </a>
              </li>

              <!-- opcion de tikets -->

              <li class="nav-item dropdown">
                  <a href="principal.php?opcion=tikets" class="nav-link dropdown-toggle" data-toggle="dropdown"> Tikets </a>
                  <div class="dropdown-menu">                      
                    <a href="principal.php?opcion=salida_tiket" class="dropdown-item"><i class="fa fa-user-circle"></i> Nuevo </a>
                    <a href="principal.php?opcion=all_tikets" class="dropdown-item"><i class="fas fa-users"></i> todos los tikets </a>
                  </div> 
              </li>


            </ul>




        </nav>
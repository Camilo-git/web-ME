<!-- menu principal de una aplicacion-->

        <nav class="navbar navbar-expand-lg nadvar-light bg-ligth">
          
            <!--brand -->
            <a href="" class="navbar-brand">Agenda ver 1.0</a>
             <!-- menu principal -->
            <ul class="navbar-nav">
              
             <!--  primera opcion del menu -->
             <li class="nav-item">
                <a href="principal.php?opcion=inicio" class="nav-link">Inicio</a>
             </li>
             <!-- opcion de mantenimiento -->

             <li class="nav-item dropdown">
                <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Mantenimiento</a>

                    <div class="dropdown-menu">
                      
                      <a href="principal.php?opcion=contactos" class="dropdown-item"><i class="fa fa-user-circle"></i> Contactos</a>
                      <a href="principal.php?opcion=grupos" class="dropdown-item"><i class="fas fa-users"></i> Grupos</a>
                    </div>           
             </li>

             <!-- opcion de consultas -->

             <li class="nav-item dropdown">
                <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Consultas</a>
                       
                     <div class="dropdown-menu">
                         
                         <a href="principal.php?opcion=consu_contactos" class="dropdown-item"><i class="fa fa-user-circle"></i> Contactos</a>
                         <a href="principal.php?opcion=consu_grupos" class="dropdown-item"><i class="fas fa-users"></i> Grupos</a>
                     </div>
             </li>

             <!-- opcion de reportes -->

             <li class="nav-item dropdown">
               <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Reportes</a>

               <div class="dropdown-menu">
                 
                 <a href="principal.php?opcion=repo_contactos" class="dropdown-item"> <i class="fa fa-user-circle"></i> Contactos</a>
                 <a href="principal.php?opcion=repo_grupos" class="dropdown-item"><i class="fas fa-users"></i> Grupos</a>
               </div>
             </li>
              
              <!-- opcion de procesos -->
             <li class="nav-item dropdown">
               <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Procesos</a>
               <div class="dropdown-menu">

                  <a href="principal.php?opcion=proce_usuarios" class="dropdown-item"><i class="fa fa-user-circle"></i> Usuarios</a>
                  <a href="principal.php?opcion=optener_copia" class="dropdown-item"><i class="fas fa-copy"></i> optener copia de seguridad</a>
                  <a href="principal.php?opcion=descargar_copia" class="dropdown-item"><i class="far fa-copy"></i> restaurar copia de seguridad</a>

               </div>
             </li>


            </ul>




        </nav>
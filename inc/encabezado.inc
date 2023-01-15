<!-- ENCABEZADO DE LA PAGINA -->
<header>
    <!-- LOGO DEL PROGRAMA -->
    <div class="row">
        <div class="col-4">
            <img src="img/Escudo.png" alt="Logo de la Aplicación" class="img-fluid"
                onclick="window.location.href='principal.php?opcion=all_tikets'">
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-right">
            <span>
                <i class="fa fa-user-circle"></i>

                <!-- creamos un javascript para obtener la hora y la fecha que transcurre en el sistema -->
                <script>
                    var f = new Date();
                    document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());

                    var g = new Date();
                    document.write(" " + (g.getHours()) + ":" + g.getMinutes() + ":" + g.getSeconds());

                </script>

            </span>
            <span>
                <i class="fas fa-external-link-alt"></i>
                <a href="" class="">Cerrar sesion</a>
            </span>
        </div>
    </div>

</header>
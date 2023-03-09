<div class="row my-3">

    <div class="col-10">
        <h3><i class="fa fa-user-circle"></i> Inventario </h3>
    </div>
    <div class="col-2">
        <a href="./principal.php?opcion=inventario-nuevo&accion=ADICIONAR&codigo=0" class="btn btn-primary" title="Crear un nuevo Contacto">
            <i class="fas fa-plus-circle"></i>
            Adicionar
        </a>
    </div>

</div>


<div class="row my-3">

    <div class="col-12">





        <?php
        include_once("clases/cls_conectarB.php");

        $conexion = conectarBD();

        $sSQL = "SELECT codigo, cat_equipo FROM tbl_inventario
        ";

        $datos = $conexion->query($sSQL);
        $contador = 0;

        // Agregamos la clase CSS al contenedor principal
        echo '<div class="container-fluid codigo-contenedor" >';

        foreach ($datos as $fila) :
            if ($contador == 0 || $contador % 4 == 0) {
                echo '<div class="row">';
                echo '<div class="col-md-12" >';
                echo '<div class="row">';
            }

            echo '<div class="col-md-3"  style= "padding: 15px;
            border: 1px solid black " >';
            echo '<div style="text-align: center;">';
            echo '<img alt="Barcode Generator TEC-IT" src="https://barcode.tec-it.com/barcode.ashx?data=' . $fila['codigo'] . '&code=Code128&translate-esc=true&imagetype=Jpg" />';
            echo '</div>';
            echo $fila['cat_equipo'];
            echo '</div>';

            $contador++;

            if ($contador % 4 == 0) {
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }

        endforeach;

        if ($contador % 4 != 0) {
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

        desconectarBD($conexion);
        ?>




    </div>
</div>
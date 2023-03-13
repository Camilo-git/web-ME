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

		<table id="miTabla" class="table table-striped table-bordered table-hover">
			<thead>

				<tr>
					<th>Editar</th>
					<th>Borrar</th>
					<th>Estado</th>
					<th>Comentario</th>
					<th>Modelo</th>
					<th>Marca</th>
					<th>Categoria <br> Equipo </th>
					<th>Codigo</th>
					<!-- th como titulos deben aver en td espacios -->

				</tr>
			</thead>

			<tbody>
				<?php

				include_once("clases/cls_conectarB.php");

				$conexion = conectarBD();

				$sSQL = "SELECT * ,
					tbl_estados.estado
				FROM
					tbl_inventario
				INNER JOIN tbl_estados ON tbl_inventario.id_estado = tbl_estados.id";

				$datos = $conexion->query($sSQL);

				foreach ($datos as $fila) :

				?>

					<tr>
						<?php
						echo '<td><a href="./principal.php?opcion=editar-articulo&accion=EDITAR&codigo=' . $fila['codigo'] . '" title="Editar el Articulo"><i class="fas fa-pen"></i></a></td>
						
						<td><a href="./php/inventario/guardar.php?&accion=ELIMINAR&codigo=' . $fila['codigo'] . '" title="Borrar el Contacto"><i class="fas fa-trash-alt"></i></a></td>';
						?>
						<td><?php echo $fila['estado'];   ?></td>
						<td><?php echo $fila['comentario'];   ?></td>
						<td><?php echo $fila['modelo'];  ?></td>
						<td><?php echo $fila['marca'];     ?></td>
						<td><?php echo $fila['cat_equipo'];   ?></td>
						<td>
							<!-- utilizamos un generador de codigo online
								 pasandole como parametro al enlace el codigo que manejamos							
							 	 https://barcode.tec-it.com/-->
							<div style='text-align: center;'>
								<!-- insert your custom barcode setting your data in the GET parameter "data" -->
								<img alt='Barcode Generator TEC-IT' src='https://barcode.tec-it.com/barcode.ashx?data=<?php echo $fila['codigo']; ?>&code=Code128&translate-esc=true&imagetype=Jpg' />
							</div>
							<!-- cierre generador de codigo de barras  -->

							<?php echo $fila['codigo'];         ?>
						</td>
					</tr>

				<?php

				endforeach;

				desconectarBD($conexion);
				?>


			</tbody>




		</table>
	</div>
</div>
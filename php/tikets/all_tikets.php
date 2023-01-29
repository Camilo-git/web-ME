<div class="row my-3">

	<div class="col-10">
		<h3><i class="fa fa-user-circle"></i> Prestamos Realizados </h3>
	</div>
	<div class="col-2">
		<a href="principal.php?opcion=Salida" class="btn btn-primary" title="Crear un nuevo Contacto">
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
					<th>Id </th>					
					<th>Salida</th>
					<th>Entrada</th>
					<th>Elementos</th>						
					<th>Estado - - Aula - - Comentario</th>
					<!-- th como titulos deben aver en td espacios -->

				</tr>
			</thead>

			<tbody>
				<?php

				include_once("clases/cls_conectarB.php");

				$conexion = conectarBD();

				$sSQL = "SELECT
					tbl_tiket.id,
					tbl_tiket.comentario,
					CONCAT(
						tbl_salida.fecha_out,
						' <hr> ',
						tbl_salida.nom_docente_out,
						' <hr> ',
						tbl_salida.nom_auxiliar_out
						
					) AS salida,
					CONCAT(
						tbl_entrada.fecha_in,
						' <hr> ',
						tbl_entrada.nom_docente_in,
						' <hr> ',
						tbl_entrada.nom_auxiliar_in
					) AS entrada,
					tbl_estados.estado,
					tbl_tiket.nombre_aula
					FROM
						tbl_tiket
					INNER JOIN tbl_salida ON tbl_tiket.id_salida = tbl_salida.id
					INNER JOIN tbl_entrada ON tbl_tiket.id_entrada = tbl_entrada.id
					INNER JOIN tbl_estados ON tbl_tiket.id_estado = tbl_estados.id;";

				$datos = $conexion->query($sSQL);

				foreach ($datos as $fila) :
					// imprimimos las respuestas del arreglo


				?>
					<tr>
						<td>
							<?php echo $fila['id'] . 
								"<br><hr> "  ; 
								echo '<a href="./principal.php?opcion=Entrada&accion=ENTREGA&id=' . $fila['id'] . '" title="Entregar el Tiket"><i class="fas fa-pen"></i></a>';
							?>
						</td>
						
						<td><?php echo $fila['salida'];  ?></td>
						<td><?php echo $fila['entrada'];   ?></td>
						<td><?php

							$sSQL = "SELECT
									CONCAT(
										tbl_inventario.codigo,
										' - - ',
										tbl_inventario.cat_equipo,
										'<br><hr>'
									) AS categoria
									FROM
										tbl_detalle
									INNER JOIN tbl_inventario ON tbl_detalle.cod_equipo = tbl_inventario.codigo
									WHERE
										tbl_detalle.id_tiket = $fila[id];";

									$datos = $conexion->query($sSQL);


							foreach ($datos as $filas) :
								echo $filas['categoria'];
							endforeach;

							?>
						</td>
								<!-- <?php
									
								?> -->
								<td>
							<?php echo  $fila['estado'] .
								" - -> ". $fila['nombre_aula'] . 
								"<br><hr> ". $fila['comentario'] ; 
							?>
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
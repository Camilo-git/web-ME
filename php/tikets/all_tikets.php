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

		<table data-order='[[ 0, "desc" ]]' data-page-length='25' id="miTabla" class="table table-striped table-bordered table-hover">
			<thead>

				<tr>
					<th autofocus>Id </th>
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
								"<br><hr> ";
							if ($fila['estado'] != "Entregado") {
								# code...
								echo '<a href="./principal.php?opcion=Entrada&accion=ENTREGA&id=' . $fila['id'] . '&id-tiket=' . $fila['id'] . '" title="Entregar el Tiket"><i class="fas fa-pen"></i></a>';
							}



							?>
						</td>

						<td><?php

							$sSQL = "SELECT
									*
								FROM
									`tbl_salida`
								WHERE
									`id` = $fila[id]";
							$datos = $conexion->query($sSQL);

							foreach ($datos as $fila2) :


								$sSQL = "SELECT
											*
									FROM
										tbl_docentes
									WHERE
										nombre = '$fila2[nom_docente_out]'";


								$datos = $conexion->query($sSQL);

								foreach ($datos as $filas3) {
									echo "C.c. " . $filas3['cedula'];
									echo "<br>";
								}

								echo $fila2['nom_docente_out'];
								echo "<br><hr>";

								$sSQL = "SELECT
											*
									FROM
										tbl_auxiliares
									WHERE
										nombre = '$fila2[nom_auxiliar_out]'";


								$datos = $conexion->query($sSQL);

								foreach ($datos as $filas4) {
									echo "C.c. " . $filas4['cedula'];
									echo "<br>";
								}

								echo $fila2['nom_auxiliar_out'];
								echo "<br><hr>";
								echo $fila2['fecha_out'];
								echo "<br><hr>";
							endforeach;

							?></td>
						<td>
							<?php

							$sSQL = "SELECT
									*
								FROM
									`tbl_entrada`
								WHERE
									`id` = $fila[id]";
							$datos = $conexion->query($sSQL);

							foreach ($datos as $fila2) :


								$sSQL = "SELECT
										*
								FROM
									tbl_docentes
								WHERE
									nombre = '$fila2[nom_docente_in]'";


								$datos = $conexion->query($sSQL);

								foreach ($datos as $filas3) {
									echo "C.c. " . $filas3['cedula'];
									echo "<br>";
								}

								echo $fila2['nom_docente_in'];
								echo "<br><hr>";

								$sSQL = "SELECT
										*
								FROM
									tbl_auxiliares
								WHERE
									nombre = '$fila2[nom_auxiliar_in]'";


								$datos = $conexion->query($sSQL);

								foreach ($datos as $filas4) {
									echo "C.c. " . $filas4['cedula'];
									echo "<br>";
								}

								echo $fila2['nom_auxiliar_in'];
								echo "<br><hr>";
								echo $fila2['fecha_in'];
								echo "<br><hr>";
							endforeach;

							?>
						</td>
						<td><?php

							$sSQL = "SELECT
									
									CONCAT(
										tbl_estados.estado,
										'<br>',
										tbl_inventario.codigo,
										' - ',
										tbl_inventario.cat_equipo,
										'<br><hr>'
									) AS categoria
									FROM
										tbl_detalle
									INNER JOIN
										tbl_estados
										ON
										tbl_detalle.id_estado = tbl_estados.id
									INNER JOIN
										tbl_inventario
										ON
										tbl_detalle.cod_equipo = tbl_inventario.codigo
									WHERE
										tbl_detalle.id_tiket = $fila[id];";

							$datos = $conexion->query($sSQL);


							foreach ($datos as $fila5) :
								echo $fila5['categoria'];
							endforeach;

							?>
						</td>

						<td>
							<?php
							if ($fila['estado'] != "Entregado") {
								# code...

								echo "<a href='principal.php?opcion=nuevo_detalle&id-tiket= $fila[id]'>";

								echo  $fila['estado'];
							} else {
								# code...
								echo $fila['estado'];
							}
							// fin funcion if


							echo " </a> - -> " . $fila['nombre_aula'] .
								"<br><hr> " . $fila['comentario'];
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
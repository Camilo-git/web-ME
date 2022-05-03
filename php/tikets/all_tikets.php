<div class="row my-3">
	
	<div class="col-10">
		<h3><i class="fa fa-user-circle"></i> Prestamos Realizados </h3>
	</div>
	<div class="col-2">
		<a href="./principal.php?opcion=contactos_form&accion=ADICIONAR&id=0" class="btn btn-primary" title="Crear un nuevo Contacto">
			<i class="fas fa-plus-circle"></i>
			Adicionar
		</a>
	</div>

</div>

<div class="row my-3">

	<div class="col-12">

			<table id="miTabla"  class="table table-striped table-bordered table-hover">
			<thead>
			
					<tr>
						<th>id</th>
						<th>Comentario</th>
						<th>h_salida</th>
						<th>h_entrada</th>
						<th>ced_aux</th>
						<th>ced_docente</th>
						<th>cod_equipos</th>
						<th>id_aula</th>
						<th>Editar</th>
						<th>Borrar</th>
						<!-- th como titulos deben aver en td espacios -->
						
					</tr>
			</thead>

			<tbody>
						<?php 
							
							include_once("clases/cls_conectarB.php");

							$conexion = conectarBD();

							$sSQL = "SELECT * FROM tbl_tiket";

							$datos = $conexion->query($sSQL);
						 
							foreach ($datos as $fila):

									?>

										<tr>
											<td><?php echo $fila['id'];         ?></td>											
											<td><?php echo $fila['comentario'];     ?></td>
											<td><?php echo $fila['h_salida'];  ?></td>
											<td><?php echo $fila['h_entrada'];   ?></td>
											<td><?php echo $fila['nom_aux'];     ?></td>
											<td><?php echo $fila['nom_docente'];     ?></td>
											<td><?php echo $fila['cod_equipo'];     ?></td>
											<td><?php echo $fila['nombre_aula'];     ?></td>
											<?php 
												echo'<td><a href="./principal.php?opcion=contactos_form&accion=EDITAR&id='.$fila	['id'].'" title="Editar el Contacto"><i class="fas fa-pen"></i></a></td>
												<td><a href="./principal.php?opcion=contactos_form&accion=ELIMINAR&id='.$fila	['id'].'" title="Borrar el Contacto"><i class="fas fa-trash-alt"></i></a></td>';
											?>
										</tr>

									<?php  
								
							endforeach;
								
							desconectarBD($conexion);						
						?>
				

			</tbody>




		</table>
	</div>
</div>




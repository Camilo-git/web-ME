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

			<table id="miTabla"  class="table table-striped table-bordered table-hover">
			<thead>
			
					<tr>
						<th>Cod</th>
						<th>Marca</th>
						<th>Modelo</th>
						<th>Comentario</th>
						<th>Estado</th>
						<th>cat_equipo</th>
						<th>edita</th>
						<th>borra</th>
						<!-- th como titulos deben aver en td espacios -->
						
					</tr>
			</thead>

			<tbody>
						<?php 
							
							include_once("clases/cls_conectarB.php");

							$conexion = conectarBD();

							$sSQL = "SELECT * FROM tbl_inventario";

							$datos = $conexion->query($sSQL);
						 
							foreach ($datos as $fila):

									?>

										<tr>
											<td><?php echo $fila['codigo'];         ?></td>											
											<td><?php echo $fila['marca'];     ?></td>
											<td><?php echo $fila['modelo'];  ?></td>
											<td><?php echo $fila['comentario'];   ?></td>
											<td><?php echo $fila['estado'];   ?></td>
											<td><?php echo $fila['cat_equipo'];   ?></td>
											<?php 
												echo'<td><a href="./principal.php?opcion=contactos_form&accion=EDITAR&id='.$fila	['codigo'].'" title="Editar el Contacto"><i class="fas fa-pen"></i></a></td>
												<td><a href="./principal.php?opcion=contactos_form&accion=ELIMINAR&id='.$fila	['codigo'].'" title="Borrar el Contacto"><i class="fas fa-trash-alt"></i></a></td>';
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
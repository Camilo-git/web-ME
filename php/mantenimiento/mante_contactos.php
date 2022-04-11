<div class="row my-3">
	
	<div class="col-10">
		<h3><i class="fa fa-user-circle"></i> Contactos</h3>
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
						<th>Id</th>
						<th>Nombre</th>
						<th>Direcion</th>
						<th>Telefono</th>
						<th>Correo</th>
						<th>Grupo</th>
						<th>Fecha Nac</th>
						<th>edita</th>
						<th>borra</th>
						<!-- th como titulos deben aver en td espacios -->
						
					</tr>
			</thead>

			<tbody>
						<?php 
							
							include_once("clases/cls_conectarBD.php");

							$conexion = conectarBD();

							$sSQL = "SELECT * FROM tbl_contactos";

							$datos = $conexion->query($sSQL);
						 
							foreach ($datos as $fila):

									?>

										<tr>
											<td><?php echo $fila['con_id'];         ?></td>											
											<td><?php echo $fila['con_nombre'];     ?></td>
											<td><?php echo $fila['con_direccion'];  ?></td>
											<td><?php echo $fila['con_telefono'];   ?></td>
											<td><?php echo $fila['con_correo'];     ?></td>
											<td><?php echo $fila['con_grupo'];      ?></td>
											<td><?php echo $fila['con_fechanac'];   ?></td>
											<?php 
												echo'<td><a href="./principal.php?opcion=contactos_form&accion=EDITAR&id='.$fila	['con_id'].'" title="Editar el Contacto"><i class="fas fa-pen"></i></a></td>
												<td><a href="./principal.php?opcion=contactos_form&accion=ELIMINAR&id='.$fila	['con_id'].'" title="Borrar el Contacto"><i class="fas fa-trash-alt"></i></a></td>';
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




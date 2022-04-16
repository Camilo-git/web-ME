<div class="row my-3">
	
	<div class="col-10">
		<h3><i class="fa fa-user-circle"></i> Personal Medios Educativos</h3>
	</div>
	<div class="col-2">
		<a href="./principal.php?opcion=auxiliar-nuevo&accion=ADICIONAR&cedula=0" class="btn btn-primary" title="Crear un nuevo Contacto">
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
						<th>Cedula</th>
						<th>Nombre</th>
						<th>Celular</th>
						<th>Correo</th>
						<th>Direccion</th>
						<th>edita</th>
						<th>borra</th>
						<!-- th como titulos deben aver en td espacios -->
						
					</tr>
			</thead>

			<tbody>
						<?php 
							
							include_once("clases/cls_conectarB.php");

							$conexion = conectarBD();

							$sSQL = "SELECT * FROM tbl_auxiliares";

							$datos = $conexion->query($sSQL);
						 
							foreach ($datos as $fila):

									?>

										<tr>
											<td><?php echo $fila['cedula'];         ?></td>											
											<td><?php echo $fila['nombre'];     ?></td>
											<td><?php echo $fila['celular'];  ?></td>
											<td><?php echo $fila['correo'];   ?></td>
											<td><?php echo $fila['direcion'];     ?></td>
											<?php 
												echo'<td><a href="./principal.php?opcion=contactos_form&accion=EDITAR&id='.$fila	['cedula'].'" title="Editar el Contacto"><i class="fas fa-pen"></i></a></td>
												<td><a href="./principal.php?opcion=contactos_form&accion=ELIMINAR&id='.$fila	['cedula'].'" title="Borrar el Contacto"><i class="fas fa-trash-alt"></i></a></td>';
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




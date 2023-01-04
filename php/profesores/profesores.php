<div class="row my-3">
	
	<div class="col-10">
		<h3><i class="fa fa-user-circle"></i> Docentes IU.Cesmag</h3>
	</div>
	<div class="col-2">
		<a href="./principal.php?opcion=docente-nuevo&accion=ADICIONAR&cedula=0" class="btn btn-primary" title="Crear un nuevo Contacto">
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
						<th>Correoo</th>
						<th>Cel</th>
						<th>Programa</th>
						<th>Dependencia</th>
						<th>borra</th>
						<th>editar</th>
						<!-- th como titulos deben aver en td espacios -->
						
					</tr>
			</thead>

			<tbody>
						<?php 
							
							include_once("clases/cls_conectarB.php");

							$conexion = conectarBD();

							$sSQL = "SELECT * FROM tbl_docentes";

							$datos = $conexion->query($sSQL);
						 
							foreach ($datos as $fila):

									?>

										<tr>
											<td><?php echo $fila['cedula'];         ?></td>											
											<td><?php echo $fila['nombre'];     ?></td>
											<td><?php echo $fila['correo'];  ?></td>
											<td><?php echo $fila['cel'];   ?></td>
											<td><?php echo $fila['programa'];     ?></td>
											<td><?php echo $fila['dependencia'];     ?></td>
											<?php 
												echo'<td><a href="./principal.php?opcion=editar-profesor&accion=EDITAR&cedula='.$fila	['cedula'].'" title="Editar el Contacto"><i class="fas fa-pen"></i></a></td>
												
												<td><a href="./php/profesores/guardar.php?accion=ELIMINAR&cedula='.$fila	['cedula'].'" title="Borrar el Contacto"><i class="fas fa-trash-alt"></i></a></td>';
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




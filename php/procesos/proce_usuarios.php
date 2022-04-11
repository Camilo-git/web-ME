<div class="row my-3">
	
	<div class="col-10">
		<h3><i class="fa fa-user-circle"></i> Usuarios</h3>
	</div>
	<div class="col-2">
		<a href="" class="btn btn-dark" title="Crear un nuevo Usuario">
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
						<th>Usuario</th>
						<th>Clave</th>
						
						<th></th>
						<th></th>
						<!-- th como titulos deben aver en td espacios -->
						
					</tr>
			</thead>

			<tbody>
						<?php 
							
							include_once("clases/cls_conectarBD.php");

							$conexion = conectarBD();

							$sSQL = "SELECT * FROM tbl_usuario";

							$datos = $conexion->query($sSQL);
						 
							foreach ($datos as $fila):

									?>

										<tr>
											<td><?php echo $fila['usu_id'];         ?></td>
											<td><?php echo $fila['usu_nombre'];  ?></td>
											<td><?php echo $fila['usu_usuario'];     ?></td>
											<td><?php echo $fila['usu_clave'];  ?></td>
								usu
											<td><a href="" title="Editar el Contacto"><i class="fas fa-pen"></i></a></td>
											<td><a href="" title="Borrar el Contacto"><i class="fas fa-trash-alt"></i></a></td>
										</tr>

									<?php  
								
							endforeach;
								
							desconectarBD($conexion);						
						?>
				

			</tbody>




		</table>
	</div>
	
</div>
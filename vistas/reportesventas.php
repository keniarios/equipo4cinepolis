<?php
  $title = "Listado de Personal";
  include("header/encabezado2.php");
?>
<script>
	
</script>
	<div id="cargando">
		
	</div>
		<div id="alertaEliminar">
			
		</div>
			<div class="col-md-12">
				<form id="formEditarUsuarios" action="editarUsuario.php" method="post" accept-charset="utf-8">
					<table class="table" style="font-size: 9pt;">
						  <thead>
						    <tr>
						    	<!--id_venta, id_horario, id_tarjeta, id_usuario, asientos_seleccionados, cantidadboletos3raedad, cantidadboletosadultos, cantidadboletosninos, precioboletos3raedad, precioboletosadultos, precioboletosninos, horacompra, fechacompra, pagototal-->
						      <th scope="col">ID</th>
						      <th scope="col">Horario</th>
						      <th scope="col">Usuario</th>
						      <th scope="col">Asientos</th>
						      <th scope="col">C/3era Edad</th>
						      <th scope="col">C/Adultos</th>
						      <th scope="col">C/Niños</th>
						      <th scope="col">Hora</th>
						      <th scope="col">Fecha</th>
						      <th scope="col">Pagó</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
								try{
							  		require_once ('../bd/conexion.php'); $conexion = conectarBD();
									
									$query = "SELECT * FROM registropersonal";

									$result = pg_query($query); 

									//$comando->pg_fetch_object($id_registropersonal_T,$numeroempleado_T, $nombre_T, $appaterno_T, $apmaternoo_T, $correo_T, $telefono_T, $puesto_T);

									$Contador=1;
									while ($obj = pg_fetch_object($result))
									{
										//$NombreCompleto = $nombre_T . " " . $appaterno_T. " " . $apmaternoo_T;
										echo "
										  		<tr class='lista'>
										  			<th scope='row'>$Contador</th>
										  			<td>$obj->numeroempleado</td>
										      		<td>$obj->nombre</td>
										      		<td>$obj->correo</td>
										      		<td>$obj->telefono</td>	
										      		<td>$obj->puesto</td>
										      		<td><input type='text' name='IDUsuario' value='$obj->id_registropersonal' hidden></td>
										      		<td width='95' height='79'>
										      		<input type='submit' id='$obj->id_registropersonal' class='btn btn-info btn-sm' value='Editar' style='display:none'></td>
										      		<td width='95' height='79'><input type='button' id='$obj->id_registropersonal'  class='btn btn-danger btn-sm' onclick='alertaEliminar(id)' value='Eliminar' style='display:none'></td>
										    	</tr>
											";
										$Contador++;
									}
								}
								catch(Exception $e){
									echo json_encode("Error de conexion a la base de datos.");
								}
							?>
						  </tbody>
					</table>
				</form>		
			</div>
<?php
  include "footer/footer.php";
?>
<?php
  $title = "Listado de Personal";
  //include("header/encabezado2.php");
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
						      <th scope="col">#</th>
						      <th scope="col">Imagen</th>
						      <th scope="col">Titulo</th>
						      <th scope="col">Clasificación</th>
						      <th scope="col">Duración</th>
						      <th scope="col">Genero</th>
						      <th scope="col">Actores</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
								try{
							  		require_once ('../bd/conexion.php'); $conexion = conectarBD();
									
									$query = "SELECT * FROM peliculas";

									$result = pg_query($query); 

									//$comando->pg_fetch_object($id_registropersonal_T,$numeroempleado_T, $nombre_T, $appaterno_T, $apmaternoo_T, $correo_T, $telefono_T, $puesto_T);

									$Contador=1;
									while ($obj = pg_fetch_object($result))
									{
										//$NombreCompleto = $nombre_T . " " . $appaterno_T. " " . $apmaternoo_T;
										$imgPeliculas = $obj->imagen;

										echo "
										  		<tr class='lista'>
										  			<th scope='row'>$Contador</th>
										  			<td><img src='../$imgPeliculas'  width='139' height='203'></td>
										      		<td>$obj->titulo</td>
										      		<td>$obj->clasificacion</td>
										      		<td>$obj->duracion</td>	
										      		<td>$obj->genero</td>
										      		<td>$obj->actores</td>
										      		<td><input type='text' name='IDPelicula' value='$obj->id_pelicula' hidden></td>
										      		<td width='95' height='79'>
										      		<input type='submit' id='$obj->id_pelicula' class='btn btn-info btn-sm' value='Editar' style='display:none'></td>
										      		<td width='95' height='79'><input type='button' id='$obj->id_pelicula'  class='btn btn-danger btn-sm' onclick='alertaEliminar(id)' value='Eliminar' style='display:none'></td>
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
  //include "footer/footer.php";
?>
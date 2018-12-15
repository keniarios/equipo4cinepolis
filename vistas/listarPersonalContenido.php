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
				<!--<form id="formEditarPeliculas" action="editarPelicula.php" method="post" accept-charset="utf-8">-->
					<table class="table" style="font-size: 9pt; text-align: center;">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Imagen</th>
						      <th scope="col">Titulo</th>
						      <th scope="col">Clasificación</th>
						      <th scope="col">Duración</th>
						      <th scope="col">Genero</th>
						      <th scope="col">Actores</th>
						      <th scope="col">Estatus</th>
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

										if ($obj->estatus == 1) {
											$estatusPelicula = "Estreno";
										}
										elseif ($obj->estatus == 2) {
											$estatusPelicula = "Preventa";
										}
										else{
											$estatusPelicula = "Próximo estreno";
										}

										echo "
										  		<tr class='lista'>
										  			<th scope='row'>$Contador</th>
										  			<td><img src='../$imgPeliculas'  width='139' height='203'></td>
										      		<td>$obj->titulo</td>
										      		<td>$obj->clasificacion</td>
										      		<td>$obj->duracion min</td>	
										      		<td>$obj->genero</td>
										      		<td>$obj->actores</td>
										      		<td>$estatusPelicula</td>
										      		<td><input type='text' name='IDPelicula' value='$obj->id_pelicula' hidden></td>
										      		<td width='95' height='79'>";

										      		if ($obj->estatus == 1) {
										      			echo "
											      			<a href='../controladores/editarPelicula.php?id_pelicula=$obj->id_pelicula&id_estatus=2' id='$obj->id_pelicula' class='btn btn-info btn-sm' style='display: block;'>Preventa</a><br/><br/>

											      			<a href='../controladores/editarPelicula.php?id_pelicula=$obj->id_pelicula&id_estatus=3' id='$obj->id_pelicula' class='btn btn-primary btn-sm' style='display: block;'>Próximo estreno</a>
										      	
										      			";
										      		}
										      		elseif ($obj->estatus == 2) {
										      			echo "
										      				<a href='../controladores/editarPelicula.php?id_pelicula=$obj->id_pelicula&id_estatus=1' id='$obj->id_pelicula' class='btn btn-success btn-sm' style='display: block;'>Estreno</a><br/><br/>

										      				<a href='../controladores/editarPelicula.php?id_pelicula=$obj->id_pelicula&id_estatus=3' id='$obj->id_pelicula' class='btn btn-primary btn-sm' style='display: block;'>Próximo estreno</a>
										      				";
										      		}
										      		else{
										      			echo "
											      			<a href='../controladores/editarPelicula.php?id_pelicula=$obj->id_pelicula&id_estatus=1' id='$obj->id_pelicula' class='btn btn-success btn-sm' style='display: block;'>Estreno</a><br/><br/>

											      			<a href='../controladores/editarPelicula.php?id_pelicula=$obj->id_pelicula&id_estatus=2' id='$obj->id_pelicula' class='btn btn-info btn-sm' style='display: block;'>Preventa</a>
										      				";
										      		}
										      		echo "</td>";
										      		echo "<td width='95' height='79'>
										      				<a href='../controladores/eliminarPelicula.php?id_pelicula=$obj->id_pelicula' id='$obj->id_pelicula' class='btn btn-danger btn-sm' style='display: block;'>Eliminar</a>
										      			</td>";
										    	echo "</tr>";
										    	$Contador++;
									}
								}
								catch(Exception $e){
									echo json_encode("Error de conexion a la base de datos.");
								}
							?>
						  </tbody>
					</table>
				<!--</form>-->
			</div>
<?php
  //include "footer/footer.php";
?>
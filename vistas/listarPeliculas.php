<?php

session_start();
if(!isset($_SESSION['id_registropersonal'])) 
{
  header('Location: frm_admin_login.php');
}

$idusuariosesion = $_SESSION['id_registropersonal'];
$correo = $_SESSION['correo'];
$nombre = $_SESSION['nombre'];
$appaterno = $_SESSION['appaterno'];
$puesto = $_SESSION['puesto'];

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php include("header/encabezado2.php"); ?>
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
<?php include "footer/footer.php" ;?>
</html>
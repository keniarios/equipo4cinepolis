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

<div id="cargando">
		
	</div>
		<div id="alertaEliminar">
			
		</div>
			<div class="col-md-12">
				<form id="formEditarUsuarios" action="editarUsuario.php" method="post" accept-charset="utf-8">
					<table class="table" style="font-size: 9pt; text-align: center;">
						  <thead>
						    <tr>
						      <th scope="col">ID</th>
						      <th scope="col">Horario</th>
						      <th scope="col">Nombre Pelicula</th>
						      <th scope="col">Idioma</th>
						      <th scope="col">Nombre Sala</th>
						      <th scope="col">Sucursal</th>
						      <th scope="col">Ciudad</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
								try{
							  		require_once ('../bd/conexion.php'); $conexion = conectarBD();
									
									$query = "SELECT id_horario, fecha, hora, titulo, idioma, S.nombre, ALS.id_sucursal, H.ciudad FROM horarios H INNER JOIN peliculas PC ON H.id_pelicula=PC.id_pelicula INNER JOIN salas S ON H.sala=S.id_sala INNER JOIN altasucursal ALS ON H.id_sucursal=ALS.id_sucursal ORDER BY 1";
									$result = pg_query($query);

									while ($obj = pg_fetch_object($result))
									{
										
										$NombreSala = $obj->nombre;

										$query2 = "SELECT nombre FROM altasucursal WHERE id_sucursal='$obj->id_sucursal'";
										$result2 = pg_query($query2);
										$dato_result2 = pg_fetch_array($result2);
										$V_nombreSucursal = $dato_result2['nombre'];

										echo "
										  		<tr class='lista'>
										  			<th>$obj->id_horario</th>
										  			<td>$obj->titulo</td>
										  			<td>$obj->idioma</td>
										  			<td>$obj->fecha  |  $obj->hora</td>
										  			<td>$obj->nombre</td>
										      		<td>$V_nombreSucursal</td>
										      		<td>$obj->ciudad</td>
										    	</tr>
											";
										$EstatusSala="";
										$NombreSala="";
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
</body>
<?php include "footer/footer.php" ;?>
</html>
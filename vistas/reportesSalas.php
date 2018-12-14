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
						      <th scope="col">Nombre Sala</th>
						      <th scope="col">Nombre Sucursal</th>
						      <th scope="col">Ciudad</th>
						      <th scope="col">Estatus</th>
						      <th scope="col">Tipo Sala</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
								try{
							  		require_once ('../bd/conexion.php'); $conexion = conectarBD();
									
									$query = "SELECT id_sala, S.nombre, ALS.nombre, S.ciudad, S.estatus, tiposala FROM salas S INNER JOIN altasucursal ALS ON S.id_sucursal=ALS.id_sucursal ORDER BY 1";
									$result = pg_query($query);

									while ($obj = pg_fetch_object($result))
									{

										if ($obj->id_sala == "1") {
											$EstatusSala = "Disponible";
										}
										elseif ($obj->id_sala == "2") {
											$EstatusSala = "Ocupada";
										}
										else{
											$EstatusSala = "Inhabilitada";
										}

										echo "
										  		<tr class='lista'>
										  			<th>$obj->id_sala</th>
										  			<td>$obj->S.nombre</td>
										      		<td>$obj->ALS.nombre</td>
										      		<td>$obj->S.ciudad</td>
										      		<td>$obj->S.estatus</td>	
										      		<td>$obj->tiposala</td>
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
</body>
<?php include "footer/footer.php" ;?>
</html>
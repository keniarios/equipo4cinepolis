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
						      <th scope="col">Nombre</th>
						      <th scope="col">Ciudad</th>
						      <th scope="col">Estatus</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
								try{
							  		require_once ('../bd/conexion.php'); $conexion = conectarBD();
									
									$query = "SELECT id_sucursal, nombre, ciudad, estatus FROM altasucursal ORDER BY 1";
									$result = pg_query($query);

									while ($obj = pg_fetch_object($result))
									{

										if ($obj->estatus == 1) {
											$Estatus = "Activa";
										}
										else{
											$Estatus = "Inactiva";
										}

										echo "
										  		<tr class='lista'>
										  			<th>$obj->id_sucursal</th>
										  			<td>$obj->nombre</td>
										  			<td>$obj->ciudad</td>
										  			<td>$Estatus</td>
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
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
						      <th scope="col">Nombre Sucursal</th>
						      <th scope="col">Tipo Sala</th>
						      <th scope="col">Precio 3era Edad (11:00am - 15:00pm)</th>
						      <th scope="col">Precio Adultos (11:00am - 15:00pm)</th>
						      <th scope="col">Precio Niños (11:00am - 15:00pm)</th>
						      <th scope="col">Precio 3era Edad (Despues de las 15:00pm)</th>
						      <th scope="col">Precio Adultos (Despues de las 15:00pm)</th>
						      <th scope="col">Precio Niños (Despues de las 15:00pm)</th>
						      <th scope="col">Ciudad</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
								try{
							  		require_once ('../bd/conexion.php'); $conexion = conectarBD();
									
									$query = "SELECT id_precio, nombre, tiposala, terceraedadprimerrango, adultoprimerrango, ninosprimerrango,terceraedadsegundorango, adultosegundorango, ninossegundorango, nombreciudad FROM precioboletos PB INNER JOIN altasucursal ALS ON PB.id_sucursal = ALS.id_sucursal ORDER BY 1";
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
										  			<th>$obj->id_precio</th>
										  			<td>$obj->nombre</td>
										  			<td>$obj->tiposala</td>
										  			<td>$obj->terceraedadprimerrango</td>
										  			<td>$obj->adultoprimerrango</td>
										  			<td>$obj->ninosprimerrango</td>
										  			<td>$obj->terceraedadsegundorango</td>
										  			<td>$obj->adultosegundorango</td>
										  			<td>$obj->ninossegundorango</td>
										  			<td>$obj->nombreciudad</td>
										    	</tr>
											";
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
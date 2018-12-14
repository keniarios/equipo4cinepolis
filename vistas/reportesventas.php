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
					<table class="table" style="font-size: 9pt;">
						  <thead>
						    <tr>
						      <!--id_venta, id_horario, id_tarjeta, id_usuario, asientos_seleccionados, cantidadboletos3raedad, cantidadboletosadultos, cantidadboletosninos, precioboletos3raedad, precioboletosadultos, precioboletosninos, horacompra, fechacompra, pagototal-->
						      <th scope="col">ID</th>
						      <th scope="col">Horario</th>
						      <th scope="col">Pelicula</th>
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
									
									$query = "SELECT V.id_usuario, fecha, hora, titulo, asientos_seleccionados, cantidadboletos3raedad, cantidadboletosadultos, cantidadboletosninos, horacompra, fechacompra FROM ventas V INNER JOIN horarios H ON H.id_horario=V.id_horario INNER JOIN peliculas PC ON H.id_pelicula=PC.id_pelicula ORDER BY id_venta";
									$result = pg_query($query);

									while ($obj = pg_fetch_object($result))
									{

										if ($obj->id_usuario == "-1") {
											$NombreCompletoCliente = "No Registrado";
										}
										else{
											$query2 = "SELECT nombre, apellidopaterno, apellidomaterno FROM registrocinepolisid WHERE id_cinepolisid='$obj->id_usuario'";
											$result2 = pg_query($query2);
											$dato_result2 = pg_fetch_array($result2);

											$V_nombre = $dato_result2('nombre');
											$V_apellidopaterno = $dato_result2('apellidopaterno');
											$V_apellidomaterno = $dato_result2('apellidomaterno');
											$NombreCompletoCliente = $V_nombre.' '.$V_apellidopaterno.' '.$V_apellidomaterno;
										}

										echo "
										  		<tr class='lista'>
										  			<th>$obj->id_venta</th>
										  			<td>$obj->fecha | $obj->hora</td>
										      		<td>$obj->titulo</td>
										      		<td>$NombreCompletoCliente</td>
										      		<td>$obj->asientos_seleccionados</td>	
										      		<td>$obj->cantidadboletos3raedad</td>
										      		<td>$obj->cantidadboletosadultos</td>
										      		<td>$obj->cantidadboletosninos</td>
										      		<td>$obj->horacompra</td>
										      		<td>$obj->fechacompra</td>
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
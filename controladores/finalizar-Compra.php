<?php
	include ("../bd/conexion.php"); $conexion = conectarBD();
	date_default_timezone_set("America/Mazatlan");

	session_start();
	if(!isset($_SESSION['id_horario'])) 
	{
	  header('Location: ../index.php');
	}

	if(!isset($_SESSION['id_cinepolisid'])) 
	{
		$id_cinepolisid = -1;
	}
	else{
		$id_cinepolisid = $_SESSION['id_cinepolisid'];
	}

    $id_horario = $_SESSION['id_horario'];
	$Cedad3era = $_SESSION['edad3era'];
	$Cadulto = $_SESSION['adulto'];
	$Cninos = $_SESSION['ninos'];
	$precioTotal3raEdad = $_SESSION['precioTotal3raEdad'];
	$precioTotalAdulto = $_SESSION['precioTotalAdulto'];
	$precioTotalNino = $_SESSION['precioTotalNino'];
	$id_tarjeta = $_SESSION['id_tarjeta'];
	$PrecioTotal = $_SESSION['total'];
	$fechaActual = date("Y-m-d");
 	$horaActual = date("H:i");

	$asientos_seleccionados = "b01,b02,b03,b04,b05";



	$query = "INSERT INTO ventas (id_horario, id_tarjeta , id_usuario, asientos_seleccionados, cantidadboletos3raedad, cantidadboletosadultos, cantidadboletosninos, precioboletos3raedad, precioboletosadultos, precioboletosninos, horacompra, fechacompra, pagototal) 
	VALUES ('$id_horario', '$id_tarjeta', '$id_cinepolisid', '$asientos_seleccionados', '$Cedad3era', '$Cadulto', '$Cninos', '$precioTotal3raEdad', '$precioTotalAdulto', '$precioTotalNino', '$horaActual', '$fechaActual', '$PrecioTotal')";
	pg_query($query);

	$_SESSION['id_horario'] = 0;
	$_SESSION['edad3era'] = 0;
	$_SESSION['adulto'] = 0;
	$_SESSION['ninos'] = 0;
	$_SESSION['precioTotal3raEdad'] = 0;
	$_SESSION['precioTotalAdulto'] = 0;
	$_SESSION['precioTotalNino'] = 0;
	$_SESSION['id_tarjeta'] = 0;
	$_SESSION['total'] = 0;
	$_SESSION['nombre'] = "";
	$_SESSION['ciudad'] = "";

	$id_horario = 0;
	$Cedad3era = 0;
	$Cadulto = 0;
	$Cninos = 0;
	$precioTotal3raEdad = 0;
	$precioTotalAdulto = 0;
	$precioTotalNino = 0;
	$id_tarjeta = 0;
	$PrecioTotal = 0;
	$nombreciudadHeader = "";
	$nombresucursalHeader = "";


	echo "
		<script languaje='javascript'>
			alert('Venta registrada con Exito.');
			location.href = '../index.php';
		</script>
		";
?>
<?php
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


	$query = "INSERT INTO ventas (id_horario, id_tarjeta, id_usuario, asientos_seleccionados, cantidadboletos3raedad, cantidadboletosadultos, cantidadboletosninos, precioboletos3raedad, precioboletosadultos, precioboletosninos, pagototal) VALUES ('$id_horario', '$id_tarjeta', '$id_cinepolisid', 'ASIENTOSVACIO', '$Cedad3era', '$Cadulto', '$Cninos', '$precioTotal3raEdad', '$precioTotalAdulto', '$precioTotalNino', '$PrecioTotal')";
	pg_query($query);


	header("Location: ../Index.php");
?>
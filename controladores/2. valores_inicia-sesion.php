<?php
	session_start();
	if(!isset($_SESSION['id_horario'])) 
	{
	  header('Location: ../index.php');
	}
	
	$asientosseleccionados3raedad = $_POST["asientos3raedad"];
	$asientosseleccionadosadultos = $_POST["asientosAdultos"];
	$asientosseleccionadosniños = $_POST["asientosNinos"];
	$asientosseleccionados3raedad = substr($asientosseleccionados3raedad, 0, -1);
	$asientosseleccionadosadultos = substr($asientosseleccionadosadultos, 0, -1);
	$asientosseleccionadosniños = substr($asientosseleccionadosniños, 0, -1);
	$_SESSION['asientos3raedad'] = $asientosseleccionados3raedad;
	$_SESSION['asientosAdultos'] = $asientosseleccionadosadultos;
	$_SESSION['asientosNinos'] = $asientosseleccionadosniños;


	if(!isset($_SESSION['id_cinepolisid'])) 
	{
		header("Location: ../inicia-sesion.php");
	}
	else{
		header("Location: ../haztupago.php");
	}
?>
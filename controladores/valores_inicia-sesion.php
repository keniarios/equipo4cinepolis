<?php
	session_start();
	if(!isset($_SESSION['id_horario'])) 
	{
	  header('Location: ../index.php');
	}
	//Almacenamos el nombre de usuario en una variable de sesión usuario
	$_SESSION['asientos'] = $_POST["asientos"];
	$_SESSION['asientosAdultos'] = $_POST["asientosAdultos"];
	$_SESSION['asientosNinos'] = $_POST["asientosNinos"];
    $_SESSION['asientos3raedad'] = $_POST["asientos3raedad"];

	header("Location: ../inicia-sesion.php");
?>
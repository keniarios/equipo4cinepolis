<?php
	session_start();
	if(!isset($_SESSION['id_horario'])) 
	{
	  header('Location: ../index.php');
	}
	//Almacenamos el nombre de usuario en una variable de sesión usuario
    //$_SESSION['id_horario'] = $_GET["id_horario"];

    $_SESSION['id_tarjeta'] = $_GET["id_tarjeta"];
    $_SESSION['total'] = $_GET["total"];

	header("Location: ../Confirmar-Compra.php");
?>
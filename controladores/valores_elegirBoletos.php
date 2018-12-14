<?php
	session_start();
	if(!isset($_SESSION['id_horario'])) 
	{
	  header('Location: ../index.php');
	}
	//Almacenamos el nombre de usuario en una variable de sesión usuario
    $_SESSION['id_horario'] = $_GET["id_horario"];

	header("Location: ../elegirBoletos.php");
?>
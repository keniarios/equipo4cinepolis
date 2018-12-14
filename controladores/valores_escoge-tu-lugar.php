<?php
	session_start();
	if(!isset($_SESSION['id_horario'])) 
	{
	  header('Location: ../index.php');
	}

	//Almacenamos el nombre de usuario en una variable de sesión usuario
    $_SESSION['edad3era'] = $_POST["edad3era"];
    $_SESSION['adulto'] = $_POST["adulto"];
    $_SESSION['ninos'] = $_POST["ninos"];
    $_SESSION['precioTotal3raEdad'] = $_POST["precioTotal3raEdad"];
    $_SESSION['precioTotalAdulto'] = $_POST["precioTotalAdulto"];
    $_SESSION['precioTotalNino'] = $_POST["precioTotalNino"];

	header("Location: ../escoge-tu-lugar.php");
?>
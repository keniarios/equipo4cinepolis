<?php
	session_start();
	if(!isset($_SESSION['id_horario'])) 
	{
	  header('Location: ../index.php');
	}

	if (isset($_POST["asientos3raedad"]) == "" && isset($_POST["asientosAdultos"]) == "" && isset($_POST["asientosNinos"]) == "") {
		echo "
		<script languaje='javascript'>
			alert('Error, debe seleccionar los Asientos.');
			location.href = '../escoge-tu-lugar.php';
		</script>
		";
		//header("Location: ../escoge-tu-lugar.php");
	}
	else{

		$asientosseleccionados3raedad = $_POST["asientos3raedad"];
		$asientosseleccionadosadultos = $_POST["asientosAdultos"];
		$asientosseleccionadosniños = $_POST["asientosNinos"];
		
		if (!$asientosseleccionados3raedad == "") {
			$asientosseleccionados3raedad = substr($asientosseleccionados3raedad, 0, -1);
			$_SESSION['asientos3raedad'] = $asientosseleccionados3raedad;
		}else{$_SESSION['asientos3raedad'] = "";}

		if (!$asientosseleccionadosadultos == "") {
			$asientosseleccionadosadultos = substr($asientosseleccionadosadultos, 0, -1);
			$_SESSION['asientosAdultos'] = $asientosseleccionadosadultos;
		}else{$_SESSION['asientosAdultos'] = "";}

		if (!$asientosseleccionadosniños == "") {
			$asientosseleccionadosniños = substr($asientosseleccionadosniños, 0, -1);
			$_SESSION['asientosNinos'] = $asientosseleccionadosniños;
		}else{$_SESSION['asientosNinos'] = "";}


		if(!isset($_SESSION['id_cinepolisid'])) 
		{
			header("Location: ../inicia-sesion.php");
		}
		else{
			header("Location: ../haztupago.php");
		}
	}
?>
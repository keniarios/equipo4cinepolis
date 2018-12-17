<?php

require_once ('../bd/conexion.php'); $conexion = conectarBD();

if (isset($_POST['tipotarjeta'])) {
	# code...
	$valortipotarjeta = $_POST['tipotarjeta'];

	if ($valortipotarjeta == "") {
?>
		<script languaje="javascript">
		    alert('Debe seleccionar un tipo de tarjeta');
		    location.href = "../vistas/altatarjeta.php";
		</script>
	<?php
	}
	else
	{
		$nombre = mb_convert_case($_POST['nombre'], MB_CASE_TITLE, "UTF-8");
		$numerotarjeta = $_POST['numerotarjeta'];
		$codigotarjeta = $_POST['codigotarjeta'];
		$dinerodisponible = $_POST['dinerodisponible'];
		$correo = strtoupper($_POST['correo']);

		
		$query = "INSERT INTO tarjetasbanco (nombre, numerotarjetafrente, numerotarjetareverso, nombrebanco, dinerodisponible, tipotarjeta) VALUES ('$nombre', '$numerotarjeta', '$codigotarjeta','Banamex','$dinerodisponible','$valortipotarjeta')";
		$result = pg_query($query);


		$query2 = "INSERT INTO paypal (numerotarjetafrente, correo) VALUES ('$numerotarjeta', '$correo')";
		$result2 = pg_query($query2); 
?>
		<script languaje="javascript">
		    alert('Tarjeta registradada correctamente');
		    location.href = "../vistas/frm_altatarjeta.php";
		</script>

	<?php
	}
}

?>
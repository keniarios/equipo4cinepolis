<?php  

include ('conexion.php'); $conexion = conectarBDselect();
$result =pg_query("SELECT ciudad FROM altasucursal WHERE estatus=1 GROUP BY 1 ORDER BY ciudad");

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<!--<link href="../../css/vistasCliente/master.css" rel='stylesheet' type='text/css' />
	<link href="../../css/vistasCliente/master2.css" rel='stylesheet' type='text/css' />
	<link href="../../css/vistasCliente/master3.css" rel='stylesheet' type='text/css' />
	<link href="../../css/vistasCliente/master4.css" rel='stylesheet' type='text/css' />-->

	<!--EMPEZAR-->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="author" content="IA Interactive">
	<meta name="copyright">
	<meta name="viewport" content="initial-scale=1.0, width=device-width, maximum-scale=1.0">
</head>
<body>

			<header class="cf">
					<h2 class="col9" style="margin-top: 2%;">
						<a href="#" id="ContentPlaceHolder1_lbl_encartelera" class="btn-h2-df-norte" clave="culiacan">CARTELERA EN Culiacán 
							<i class="icon-chevron-right" style="margin-top: .5%;"></i>
						</a>
					</h2>
					<div class="selectGris col3">
						<h3><a href="#">Cambia tu ubicación</a></h3>
						<div class="selector" id="uniform-cmbCiudadesCartelera" style="width: 294px; background: url(../img/icon-select-form-gris.png) no-repeat 100% 0; color: #868788;">
							<!--<span style="width: 282px; user-select: none;">Culiacán</span>-->
							<select id="CiudadesCartelera" onchange="location = this.value;">
								<option value="Selecciona una ciudad">Selecciona una ciudad</option>
								<?php 
									while ($datos=pg_fetch_array($result)) {
										$ciudad = $datos['ciudad'];

										echo "<option value='cartelera.php?ciudad=$ciudad' clave='$ciudad'>$ciudad</option>";
										//echo "<option value='$ciudad' clave='$ciudad'>$ciudad</option>";
									}
								?>
								
							</select>
						</div>
					</div>
				</header>
</body>
</html>
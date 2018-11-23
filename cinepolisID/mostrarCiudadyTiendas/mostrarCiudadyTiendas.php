<?php
	date_default_timezone_set("America/Mazatlan");
 	$fechaActual = date("Y-m-d");
 	$horaActual = date("H:i");

	include_once ('conexion.php'); $conexion = conectarBDCIDCS();

    $ParaMetrogetsucursal="";
	if (isset($_GET['id_sucursal'])) {
		$ParaMetrogetsucursal=$_GET['id_sucursal'];
		$resultSucursalNombre = pg_query("SELECT nombre FROM altasucursal WHERE estatus=1 and id_sucursal='$ParaMetrogetsucursal'");
		
		while ($datoSucursal=pg_fetch_array($resultSucursalNombre)) {
			$NombreSucursal= $datoSucursal['nombre'];
		}
	}
    $resultSucursales =  pg_query("SELECT DISTINCT ON (ciudad) ciudad, id_sucursal, nombre FROM altasucursal WHERE estatus=1  ORDER BY ciudad");
    pg_close($conexion);


    $ParaMetrogetciudad="";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>      

</head>
<body>
<div class="cont-busqueda-esc">
	<div class="col8 filtroBusqueda" id="busqueda" >
		<div class="col5">
			<label>Selecciona una ciudad</label>
			<div class="selectBlanco" style="background: #fff; border: solid 0px #e1e3e6; border-radius: 3px;">
				<div class="selectorr" id="selectorrciudad" style="width: 294px; background: url('../img/vistaCliente/icon-select-form-gris.png?embed') no-repeat 100% 0; -webkit-text-overflow: ellipsis;-moz-text-overflow: ellipsis;-ms-text-overflow: ellipsis; -o-text-overflow: ellipsis; text-overflow: ellipsis; display: block; overflow: hidden; white-space: nowrap; background-position: right 0; height: 35px; line-height: 35px; padding-right: 30px; cursor: pointer; width: 99.9% !important; display: block; color: #868788;">
					<span style="width: 282px;">
					<?PHP $x=0; ?>
						<?php 
						if (isset($_GET['ciudad'])) {
							$ParaMetrogetciudad=$_GET['ciudad'];
						echo "<select name='opcionCiudades' id='opcionCiudades'>
							<option value='$ParaMetrogetciudad'>$ParaMetrogetciudad</option>";

							while ($datos=pg_fetch_array($resultSucursales)) {
								$ciudad = $datos['ciudad'];

								if ($ciudad == "Culiacán") {
								}else{
									echo "<option value='$ciudad' clave='$ciudad'>$ciudad</option>";
								}
							}
						}
						else{
							echo "<select name='opcionCiudades' id='opcionCiudades'>
							<option value=''>Selecciona un ciudad</option>";

							while ($datos=pg_fetch_array($resultSucursales)) {
								$ciudad = $datos['ciudad'];

								if ($ciudad == "Culiacán") {
									echo "<option value='$ciudad' clave='$ciudad'>$ciudad</option>";
								}else{
									echo "<option value='$ciudad' clave='$ciudad'>$ciudad</option>";
								}
							}
						}
							
						?>
						}
					</select>
					</span>
				</div>
			</div>
		</div>
		<div class="col5">
			<label>Selecciona un cine</label>
			<div class="selectBlanco" style="background: #fff; border: solid 0px #e1e3e6; border-radius: 3px;">
				<div class="selectorr" id="selectorrsucursal" style="width: 322px; background: url('../img/vistaCliente/icon-select-form-gris.png?embed') no-repeat 100% 0; -webkit-text-overflow: ellipsis;-moz-text-overflow: ellipsis;-ms-text-overflow: ellipsis; -o-text-overflow: ellipsis; text-overflow: ellipsis; display: block; overflow: hidden; white-space: nowrap; background-position: right 0; height: 35px; line-height: 35px; padding-right: 30px; cursor: pointer; width: 99.9% !important; display: block; color: #868788;">
					<span style="width: 282px;">
						<?php $contadorT=0;?>
					<select name="Sucursales" id="Sucursales" onchange="location = this.value;">
						<option>Selecciona un cine</option>
						<?php//echo "<option value='cartelera.php?ciudad=$ciudadS3&id_sucursal3=$id_sucursal'>$nombreS3</option>";?>
						
					</select>
					</span>
				</div>
			</div>
			<a href="#" class="linkTuCine" style="display:block"><span>¿No encuentras tu cine?</span></a>
		</div>
		<?php 
		$Pciudad = 'Culiacán';
		echo "<div class='col2' style='text-decoration: none;'><a href='cartelera.php?ciudad=$Pciudad' class='btn btnEnviar btnVerCartelera' style='text-decoration: none;'>VER CARTELERA</a>"; ?>
		</div>
	</div>
</div>
</body>
</html>
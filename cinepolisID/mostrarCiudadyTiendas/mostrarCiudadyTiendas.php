<?php
	date_default_timezone_set("America/Mazatlan");
 	$fechaActual = date("Y-m-d");
 	$horaActual = date("H:i");

	include_once ('conexion.php'); $conexion = conectarBDCIDCS();

    $resultSucursales =  pg_query("SELECT DISTINCT ON (ciudad) ciudad, id_sucursal, nombre FROM altasucursal WHERE estatus=1  ORDER BY ciudad");
    $resultSucursales2 = pg_query("SELECT ciudad, id_sucursal, nombre FROM altasucursal WHERE estatus=1 and ciudad='Culiacán' ORDER BY ciudad");
	
    pg_close($conexion);
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
					<select name="opcionCiudades" id="opcionCiudades">
						<option value="Selecciona una ciudad">Selecciona una ciudad</option>
						<?php 
							$bandera=0;
							$banderaS = false;
							while ($datos=pg_fetch_array($resultSucursales)) {
								$ciudad = $datos['ciudad'];
								if ($ciudad == "Culiacán" && $bandera==0) {
									echo "<option selected='selected' value='$ciudad' clave='$ciudad'>$ciudad</option>";
									$banderaS=true;
								}else{
									echo "<option value='$ciudad' clave='$ciudad'>$ciudad</option>";
								}
							}
						?>
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
					<select name="Sucursales" id="Sucursales">
						<option>Selecciona un cine</option>
						<?php
						$x=0;
						if ($banderaS) {
							while ($datos2=pg_fetch_array($resultSucursales2)) {
								$id_sucursal = $datos2['id_sucursal'];
								$nombreS = $datos2['nombre'];
								$ciudadS = $datos2['ciudad'];

								if($x=0){
									echo "<option value='$id_sucursal' clave='$id_sucursal'>$nombreS</option>";
									$x++;
									$banderaS=false;
								}else{
									echo "<option value='$id_sucursal' clave='$id_sucursal'>$nombreS</option>";
								}
							}
						}
						?>
						
					</select>
					</span>
				</div>
			</div>
			<a href="#" class="linkTuCine" style="display:block"><span>¿No encuentras tu cine?</span></a>
		</div>
		<div class="col2" style="text-decoration: none;"><a href="cartelera.php" class="btn btnEnviar btnVerCartelera" style="text-decoration: none;">VER CARTELERA</a>
		</div>
	</div>
</div>
</body>
</html>
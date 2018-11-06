<?php

session_start();
if(!isset($_SESSION['id_registropersonal'])) 
{
  header('Location: frm_admin_login.php');
}

$idusuariosesion = $_SESSION['id_registropersonal'];
$correo = $_SESSION['correo'];
$nombre = $_SESSION['nombre'];
$appaterno = $_SESSION['appaterno'];
$puesto = $_SESSION['puesto'];

 ?>

<!DOCTYPE html>
<html>
<?php include('header/encabezado2.php'); ?>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<script type="text/javascript">
    function showContent() {
    	elementoetiqueta = document.getElementById("etiqueta3d");
        elementoidioma = document.getElementById("informacionidioma3d");
        elementosubtitulo = document.getElementById("informacionsubtitulo3d");
        check = document.getElementById("tresd");
        if (check.checked) {
        	 elementoetiqueta.style.display='block';
            elementoidioma.style.display='block';
            elementosubtitulo.style.display='block';

        }
        else {
        	elementoetiqueta.style.display='none';
            elementoidioma.style.display='none';
            elementosubtitulo.style.display='none';
        }
    }
</script> 

<script>
	function valida(e)
	{
	    tecla = (document.all) ? e.keyCode : e.which;
	    if (tecla==8){
	        return true;
	    }
	    patron =/[0-9]/;
	    tecla_final = String.fromCharCode(tecla);
	    return patron.test(tecla_final);
	}
</script>

</head>
<body style="background-color: #EBECEF;">

				<div class="panel panel-default" >
					  <div class="panel-heading" id="cab-panel" style="margin-top: 35px;">
					    <label class="panel-title" style="color:black;font-size:20px;">ALTAS DE PELÍCULAS</label>
					  </div>
					  <div class="panel-body" id="cuerpoform" style="margin-bottom: 35px;">
					    <form role="form" action="../controladores/admin_altapeliculas.php" method="post"  enctype="multipart/form-data">

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div><label>Fecha Registro:</label></div>
			    					<div class="form-control" style="width: 120px; margin-bottom: 10px;">

			                		<?php 
			                			date_default_timezone_set("America/Mazatlan");
				                		$fecha = date("Y-m-d");
			                		 	echo "$fecha"; ?>
			    					</div>
			    				</div>
			   
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><label>Titulo:</label>
			                		<input type="text" name="titulo" id="titulo" class="form-control input-sm" placeholder="nombre" style="text-transform: uppercase;" required>
			    					</div>
			    				</div>
			   					
			   					<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><label>Fecha Esteno:</label>
			    						<input type="date" name="fecha" id="fecha" class="form-control input-sm" required>
			    					</div>
			    				</div>

			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><label>Duración:</label>
			    						<input type="text" name="duracion" id="duracion" class="form-control input-sm" placeholder="En minutos" style="text-transform: uppercase;" onkeypress="return valida(event);" required>
			    					</div>
			    				</div>
			    				
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><label>Nombre original</label>
			                			<input type="text" name="nombreoriginal" id="nombreoriginal" class="form-control input-sm" placeholder="NOMBRES" style="text-transform: uppercase;" required>
			    					</div>
			    				</div>
			   					
			   					<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><label>País origen:</label>
			    						<input type="text" name="pais" id="pais" class="form-control input-sm" placeholder="Nombre" style="text-transform: uppercase;" required>
			    					</div>
			    				</div>

			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group">
			    						<label>Estatus:</label>
			    						<select name="opcionEstatus" style="height: 30px; width: 190px">
			    							<option value="">Seleccione</option>
					    					<option value="1">Estreno</option>
					    					<option value="2">Preventa</option>
					    					<option value="3">Próximo estreno</option>
				    					</select>
				    				</div>
				    			</div>
			    			</div>


			    			<div class="row">
			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group">
			    						<label>Clasificación:</label>
			    						<select name="opcionclasificacion" style="height: 30px; width: 190px">
			    							<option value="">Seleccione</option>
					    					<option value="AA">AA</option>
					    					<option value="A">A</option>
					    					<option value="B">B</option>
					    					<option value="B15">B15</option>
					    					<option value="C">C</option>
					    					<option value="D">D</option>
				    					</select>
				    				</div>
				    			</div>


				    			<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group">
			    						<label>Género:</label>
			    						<BR>
			    						<select name="opciongenero" style="height: 30px; width: 190px">
			    							<option value="">Seleccione</option>
					    					<option value="Acción">Acción</option>
					    					<option value="Animación">Animación</option>
					    					<option value="Aventura">Aventura</option>
					    					<option value="Ciencia Ficción">Ciencia Ficción</option>
					    					<option value="Crimen">Crimen</option>
					    					<option value="Comedia">Comedia</option>
					    					<option value="Comedia Romantica">Comedia Romantica</option>
					    					<option value="Drama">Drama</option>
					    					<option value="Documental">Documental</option>
					    					<option value="Infantil">Infantil</option>
					    					<option value="Musicales">Musicales</option>
					    					<option value="Terror">Terror</option>    					
					    					<option value="Guerra">Guerra</option>
					    					<option value="Suspenso">Suspenso</option>
				    					</select>
				    				</div>
				    			</div>

				    			<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><label>Ciudad a Publicar</label>
			                			<div class="selector" id="uniform-cmbCiudades" style="width: 294px;">
											<select name="opcionciudad" id="opcionciudad" style="width: 200px; height: 30px; font-family:'Roboto',Helvetica,Arial,sans-serif;height:33px;margin-top:2px;margin-bottom:15px;-webkit-transition:0.3s all;-moz-transition:0.3s all;-o-transition:0.3s all;-ms-transition:0.3s all;transition:0.3s all; margin-bottom:15px;">
												<option value="">Selecciona una ciudad</option>
												<option value="Acapulco" clave="acapulco">Acapulco</option>
												<option value="Acayucan" clave="acayucan">Acayucan</option>
												<option value="Aguascalientes" clave="aguascalientes">Aguascalientes</option>
												<option value="Apizaco" clave="apizaco">Apizaco</option>
												<option value="Autlán de Navarro" clave="autlan-de-navarro">Autlán de Navarro</option>
												<option value="Cadereyta" clave="cadereyta">Cadereyta</option>
												<option value="Campeche" clave="campeche">Campeche</option>
												<option value="Cancún" clave="cancun">Cancún</option>
												<option value="Cd. Acuña" clave="cd-acuna">Cd. Acuña</option>
												<option value="Cd. Cuauhtémoc" clave="cd-cuauhtemoc">Cd. Cuauhtémoc</option>
												<option value="Cd. del Carmen" clave="cd-del-carmen">Cd. del Carmen</option>
												<option value="Cd. Hidalgo" clave="cd-hidalgo">Cd. Hidalgo</option>
												<option value="Cd. Juárez" clave="cd-juarez">Cd. Juárez</option>
												<option value=">Cd. Nezahualcóyotl" clave="cd-nezahualcoyotl">Cd. Nezahualcóyotl</option>
												<option value="Cd. Obregón" clave="cd-obregon">Cd. Obregón</option>
												<option value="Cd. Victoria" clave="cd-victoria">Cd. Victoria</option>
												<option value="CDMX Centro" clave="cdmx-centro">CDMX Centro</option>
												<option value="CDMX Norte" clave="cdmx-norte">CDMX Norte</option>
												<option value="CDMX Oriente" clave="cdmx-oriente">CDMX Oriente</option>
												<option value="CDMX Poniente" clave="cdmx-poniente">CDMX Poniente</option>
												<option value="CDMX Sur" clave="cdmx-sur">CDMX Sur</option>
												<option value="Celaya" clave="celaya">Celaya</option>
												<option value="Chalco - Ixtapaluca" clave="chalco-ixtapaluca">Chalco - Ixtapaluca</option>
												<option value="Chetumal" clave="chetumal">Chetumal</option>
												<option value="Chihuahua" clave="chihuahua">Chihuahua</option>
												<option value="Chilpancingo" clave="chilpancingo">Chilpancingo</option>
												<option value="Chimalhuacán" clave="chimalhuacan">Chimalhuacán</option>
												<option value="Ciénega de Flores" clave="cienega-de-flores">Ciénega de Flores</option>
												<option value="Coacalco" clave="coacalco">Coacalco</option>
												<option value="Coatzacoalcos" clave="coatzacoalcos">Coatzacoalcos</option>
												<option value="Comitán" clave="colima">Colima</option>
												<option value="Comalcalco" clave="comalcalco">Comalcalco</option>
												<option value="Comitán" clave="comitan">Comitán</option>
												<option value="Córdoba" clave="cordoba">Córdoba</option>
												<option value="Cozumel" clave="cozumel">Cozumel</option>
												<option value="Cuautla" clave="cuautla">Cuautla</option>
												<option value="Cuernavaca" clave="cuernavaca">Cuernavaca</option>
												<option value="Culiacán" clave="culiacan">Culiacán</option>
												<option value="Cunduacán" clave="cunduacan">Cunduacán</option>
												<option value="Dolores Hidalgo" clave="dolores-hidalgo">Dolores Hidalgo</option>
												<option value="Durango" clave="durango">Durango</option>
												<option value="Ecatepec" clave="ecatepec">Ecatepec</option>
												<option value="Emiliano Zapata" clave="emiliano-zapata">Emiliano Zapata</option>
												<option value="Ensenada" clave="ensenada">Ensenada</option>
												<option value="García" clave="garcia">García</option>
												<option value="Guadalajara Centro" clave="guadalajara-centro">Guadalajara Centro</option>
												<option value="Guadalajara Norte" clave="guadalajara-norte">Guadalajara Norte</option>
										<option value="Guadalajara Norte - Poniente" clave="guadalajara-norte-poniente">Guadalajara Norte - Poniente</option>
												<option value="Guadalajara Oriente" clave="guadalajara-oriente">Guadalajara Oriente</option>
												<option value="Guadalajara Poniente" clave="guadalajara-poniente">Guadalajara Poniente</option>
												<option value="Guadalajara Sur" clave="guadalajara-sur">Guadalajara Sur</option>
												<option value="Hermosillo" clave="hermosillo">Hermosillo</option>
												<option value="Hidalgo del Parral" clave="hidalgo-del-parral">Hidalgo del Parral</option>
												<option value="Huatulco" clave="huatulco-">Huatulco </option>
												<option value="Iguala" clave="iguala">Iguala</option>
												<option value="Irapuato" clave="irapuato">Irapuato</option>
												<option value="Jiménez" clave="jimenez">Jiménez</option>
												<option value="Jiutepec" clave="jiutepec">Jiutepec</option>
												<option value="Jojutla" clave="jojutla">Jojutla</option>
												<option value="La Paz" clave="la-paz">La Paz</option>
												<option value="La Piedad" clave="la-piedad">La Piedad</option>
												<option value="Lázaro Cárdenas" clave="lazaro-cardenas">Lázaro Cárdenas</option>
												<option value="León" clave="leon">León</option>
												<option value="Linares" clave="linares">Linares</option>
												<option value="Los Cabos" clave="los-cabos">Los Cabos</option>
												<option value="Los Mochis" clave="los-mochis">Los Mochis</option>
												<option value="Macuspana" clave="macuspana">Macuspana</option>
												<option value="Manzanillo" clave="manzanillo">Manzanillo</option>
												<option value="Martínez de la Torre" clave="martinez-de-la-torre">Martínez de la Torre</option>
												<option value="Matamoros, Coahuila" clave="matamoros-coahuila">Matamoros, Coahuila</option>
												<option value="Matamoros, Tamaulipas" clave="matamoros-tamaulipas">Matamoros, Tamaulipas</option>
												<option value="Mazatlán" clave="mazatlan">Mazatlán</option>
												<option value="Mérida" clave="merida">Mérida</option>
												<option value="Mexicali" clave="mexicali">Mexicali</option>
												<option value="Minatitlán" clave="minatitlan">Minatitlán</option>
												<option value="Montemorelos" clave="montemorelos">Montemorelos</option>
												<option value="Monterrey (Cumbres)" clave="monterrey-cumbres">Monterrey (Cumbres)</option>
												<option value="Monterrey Centro" clave="monterrey-centro">Monterrey Centro</option>
												<option value="Monterrey Norte" clave="monterrey-norte">Monterrey Norte</option>
												<option value="Monterrey Oriente" clave="monterrey-oriente">Monterrey Oriente</option>
												<option value="Monterrey Sendero" clave="monterrey-sendero">Monterrey Sendero</option>
												<option value="Monterrey Sur" clave="monterrey-sur">Monterrey Sur</option>
												<option value="Morelia" clave="morelia">Morelia</option>
												<option value="Nogales" clave="nogales">Nogales</option>
												<option value="Nuevo  Laredo" clave="nuevo-laredo">Nuevo  Laredo</option>
												<option value="Nuevo Vallarta" clave="nuevo-vallarta">Nuevo Vallarta</option>
												<option value="Oaxaca" clave="oaxaca">Oaxaca</option>
												<option value="Orizaba" clave="orizaba">Orizaba</option>
												<option value="Pachucaclave="pachuca">Pachuca</option>
												<option value="Paraíso" clave="paraiso">Paraíso</option>
												<option value="Perinorte - Cuautitlán" clave="perinorte-cuautitlan">Perinorte - Cuautitlán</option>
												<option value="Playa del Carmen" clave="playa-del-carmen">Playa del Carmen</option>
												<option value="Puebla" clave="puebla">Puebla</option>
												<option value="Puerto Vallarta" clave="puerto-vallarta">Puerto Vallarta</option>
												<option value="Querétaro" clave="queretaro">Querétaro</option>
												<option value="Reynosa" clave="reynosa">Reynosa</option>
												<option value="Rosarito" clave="rosarito">Rosarito</option>
												<option value="Sahuayo" clave="sahuayo">Sahuayo</option>
												<option value="Salamanca" clave="salamanca">Salamanca</option>
												<option value="Saltillo" clave="saltillo">Saltillo</option>
											<option value="San Cristóbal de las Casas" clave="san-cristobal-de-las-casas">San Cristóbal de las Casas</option>
												<option value="San Francisco del Rincón" clave="san-francisco-del-rincon">San Francisco del Rincón</option>
												<option value="San Juan del Río" clave="san-juan-del-rio">San Juan del Río</option>
												<option value="San L Río Colorado" clave="san-l-rio-colorado">San L Río Colorado</option>
												<option value="San Luis Potosí" clave="san-luis-potosi">San Luis Potosí</option>
												<option value="San Pedro" clave="san-pedro">San Pedro</option>
						   <option value="Santiago Tianguistenco de Galean" clave="santiago-tianguistenco-de-galeana">Santiago Tianguistenco de Galeana</option>
												<option value="Silao" clave="silao">Silao</option>
												<option value="Tampico" clave="tampico">Tampico</option>
												<option value="Tapachula" clave="tapachula">Tapachula</option>
												<option value="Taxco" clave="taxco">Taxco</option>
												<option value="Tecámac" clave="tecamac">Tecámac</option>
												<option value="Tecate" clave="tecate">Tecate</option>
												<option value="Tehuacán" clave="tehuacan">Tehuacán</option>
												<option value="Temixco" clave="temixco">Temixco</option>
												<option value="Tepatitlán" clave="tepatitlan">Tepatitlán</option>
												<option value="Tepeji del Río" clave="tepeji-del-rio">Tepeji del Río</option>
												<option value="Tepic" clave="tepic">Tepic</option>
												<option value="Tijuana" clave="tijuana">Tijuana</option>
												<option value="Tlajomulco" clave="tlajomulco">Tlajomulco</option>
												<option value="Tlaxcala" clave="tlaxcala">Tlaxcala</option>
												<option value="Toluca" clave="toluca">Toluca</option>
												<option value="Tonalá" clave="tonala">Tonalá</option>
												<option value="Torreón" clave="torreon">Torreón</option>
												<option value="Tuxpan" clave="tuxpan">Tuxpan</option>
												<option value="Tuxtla Gutiérrez" clave="tuxtla-gutierrez">Tuxtla Gutiérrez</option>
												<option value="Uriangato" clave="uriangato">Uriangato</option>
												<option value="Uruapan" clave="uruapan">Uruapan</option>
												<option value="Veracruz" clave="veracruz">Veracruz</option>
												<option value="Villaflores" clave="villaflores">Villaflores</option>
												<option value="Villahermosa" clave="villahermosa">Villahermosa</option>
												<option value="Xalapa" clave="xalapa">Xalapa</option>
												<option value="Zacatecas" clave="zacatecas">Zacatecas</option>
												<option value="Zamora" clave="zamora">Zamora</option>
											</select>
										</div>
			    					</div>
			    				</div>
							</div>


							<div class="row">
			    				
			   					
			   					<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group"><label>Sinopsis:</label>
			    						<textarea name="sinopsis" id="sinopsis" class="form-control input-sm" placeholder="DESCRIPCIÓN" style="height: 130px;" required></textarea>
			    					</div>
			    				</div>

			    				<div class="col-xs-4 col-sm-4 col-md-4">
			    					<div class="form-group"><label>Actores:</label>
			    						<input type="text" name="actores" id="actores" class="form-control input-sm" placeholder="NOMBRES" style="text-transform: uppercase; width: 310px;" required>
			    					</div>

			    					<div class="form-group"><label>Directores:</label>
			    						<input type="text" name="directores" id="actores" class="form-control input-sm" placeholder="NOMBRES" style="text-transform: uppercase; width: 310px;" required>
			    					</div>
			    				</div>
			    			</div>

			    			<div class="row">
			   					<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<label style="text-align: center">Imagen:</label>
			    						<input type="file" name="imagen">
			    					</div>
			    				</div>
			    			</div>

			    			<div class="row">
			   					<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<label style="text-align: center">Video:</label>
			    						<input type="file" name="video">
			    					</div>
			    				</div>
			    			</div>


							<div class="row">
									<div class="col-xs-4 col-sm-4 col-md-4">
				    				<div class="form-group">
				    				<label>Idioma:</label><br>
				    					<div class="form-check form-check-inline">
										    <input type="checkbox" class="form-check-input" id="ingles" name="check1" value="1">
										    <label class="form-check-label" for="exampleCheck1">Inglés</label>
										</div>
										<div class="form-check form-check-inline">
										    <input type="checkbox" class="form-check-input" id="espanol" name="check2" value="2">
										    <label class="form-check-label" for="exampleCheck2">Español</label>
										</div>
									</div>
									</div>

			 
				    				<div class="col-xs-4 col-sm-4 col-md-4">
				    				<div class="form-group">
				    				<label>Subtitulo:</label><br>
				    					<div class="form-check form-check-inline">
										    <input type="checkbox" class="form-check-input" id="exampleCheck1" id="subingles" name="check3" value="3">
										    <label class="form-check-label" for="exampleCheck1">Inglés</label>
										</div>
										<div class="form-check form-check-inline">
										    <input type="checkbox" class="form-check-input" id="exampleCheck2" name="check4" value="4">
										    <label class="form-check-label" for="exampleCheck2">Español</label>
										</div>
									</div>
									</div>

									<div class="col-xs-4 col-sm-4 col-md-4">
				    				<div class="form-group">
				    				<label>Pelicula 3D:</label><br>
				    					<div class="form-check form-check-inline">
										    <input type="checkbox" class="form-check-input" id="tresd" name="tresdcheck" onchange="javascript:showContent()">
										   
										</div>
										
									</div>
									</div>

							</div>


							<div class="row" align="center" id="etiqueta3d" style="display: none;">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				    				<div class="form-group" style="background-color: #f5f5f5;">
										
							    		<div class="form-check form-check-inline"><h5>Información 3D</h5></div>
				    				
							    		</div>
							    	</div>
							</div>

							<div class="row">

									<div class="col-xs-4 col-sm-4 col-md-4" id="informacionidioma3d" style="display: none;">
				    				<div class="form-group">
				    				<label id="informacion3d">Idioma:</label><br>
				    					<div class="form-check form-check-inline" >
										    <input type="checkbox" class="form-check-input" id="tresdcheck1" name="tresdcheck1">
										    <label class="form-check-label" for="exampleCheck1">Inglés</label>
										</div>
										<div class="form-check form-check-inline">
										    <input type="checkbox" class="form-check-input" id="tresdcheck2" name="tresdcheck2">
										    <l<label class="form-check-label" for="exampleCheck2">Español</label>
										</div>
									</div>
									</div>
			 
				    				<div class="col-xs-4 col-sm-4 col-md-4" id="informacionsubtitulo3d" style="display: none;">
				    				<div class="form-group">
				    				<label>Subtitulo:</label><br>
				    					<div class="form-check form-check-inline">
										    <input type="checkbox" class="form-check-input" id="tresdcheck3" name="tresdcheck3">
										    <label class="form-check-label" for="exampleCheck1">Inglés</label>
										</div>
										<div class="form-check form-check-inline">
										    <input type="checkbox" class="form-check-input" id="tresdcheck4" name="tresdcheck4">
										    <label class="form-check-label" for="exampleCheck2">Español</label>
										</div>
									</div>
									</div>

									

							</div>

			    			<div class="row" style="padding-top: 20px;width: auto; padding-left:30%; padding-right:30%; padding-bottom:10px;">
			    					<input type="submit" value="Registrar" class="btn btn-info btn-block">
			    			</div>
			    			
			    			
			    		</form>
				  </div>
				</div>

        		
		
		
	


</body>
<?php include('footer/footer.php'); ?>
</html>
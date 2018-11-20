<?php
	date_default_timezone_set("America/Mazatlan");
 	$fechaActual = date("Y-m-d");
 	$horaActual = date("H:i");

 	setlocale(LC_TIME, "es_MX");
 	$Dia = strftime("%d");
 	$Mes = strftime("%B");
 	//$DiaMes = date("d %B");
 	//$fecha = date("Y-m-d H:i:s");

 	//$Pciudad = "Culiacán";
 	if (isset($_GET['ciudad'])) {
 		$Pciudad = $_GET['ciudad'];
 	}
 	else{
 		$Pciudad = "Culiacán";
 	}
 	$P_id_pelicula = $_GET['id_pelicula'];

	include ('conexion.php'); $conexion = conectarBDverSinosis();

	//CONSULTAR TODOAS LAS SUCURSALES
	$resultSucursales = "SELECT DISTINCT ON (H.id_sucursal) H.id_sucursal, nombre FROM altasucursal ALS INNER JOIN horarios H ON ALS.id_sucursal=H.id_sucursal WHERE H.ciudad='$Pciudad' and id_pelicula='$P_id_pelicula' ORDER BY H.id_sucursal";
	$resultSucursales2 = $resultSucursales;
	$resultSucursales = pg_query($resultSucursales);
	$resultSucursales2 = pg_query($resultSucursales2);
	
	//CONSULTAR LOS HORARIOS DE LA PELICULA
	$resultHorarios = pg_query("SELECT id_horario, hora, idioma, sala, H.id_sucursal, nombre FROM horarios H INNER JOIN altasucursal ALS ON H.id_sucursal=ALS.id_sucursal WHERE fecha='$fechaActual' and id_pelicula='$P_id_pelicula' and hora>='$horaActual' ORDER BY  hora, nombre");

	//DATOS DE LA PELICULA
	$result = pg_query("SELECT imagen, titulo, clasificacion, duracion, genero, actores, directores, idiomaespanol, idiomaingles, subtituloespanol, subtituloingles, pelicula3d, idiomaespanol3d, idiomaingles3d, subtituloespanol3d, subtituloingles3d, estatus, rutavideo, sinopsis, nombreoriginal, EXTRACT(year FROM CAST(anoestreno as DATE)) as anoestreno, paisorigen FROM peliculas WHERE id_pelicula='$P_id_pelicula' and ciudad='$Pciudad'");

	$row = pg_fetch_array($result);
	$imagen = $row['imagen'];
	$imagen = "../".$imagen;
	$titulo = $row['titulo'];
	$clasificacion = $row['clasificacion'];
	$duracion = $row['duracion'];
	$genero = $row['genero'];
	$actores = $row['actores'];
	$directores = $row['directores'];
	$idiomaespanol = $row['idiomaespanol'];
	$idiomaingles = $row['idiomaingles'];
	$subtituloespanol = $row['subtituloespanol'];
	$subtituloingles = $row['subtituloingles'];
	$pelicula3d = $row['pelicula3d'];
	$idiomaespanol3d = $row['idiomaespanol3d'];
	$idiomaingles3d = $row['idiomaingles3d'];
	$subtituloespanol3d = $row['subtituloespanol3d'];
	$subtituloingles3d = $row['subtituloingles3d'];
	$estatus = $row['estatus'];
	$sinopsis = $row['sinopsis'];
	$nombreoriginal = $row['nombreoriginal'];
	$anoestreno = $row['anoestreno'];
	$paisorigen = $row['paisorigen'];
	$rutavideo = $row['rutavideo'];
	$rutavideo = "../".$rutavideo;
?>

<!DOCTYPE html>
<html>
<head>
			<!-- SINOPSIS -->
			<section class="sinopsis ng-scope" id="Section1" ng-app="cinepolisApp">
				<!--<article class="g960 cf">-->
				<article class="g1024 cf">
					<div class="col10 cf encabezado">
						<h2 class="col9">
							<?php echo "<a href='cartelera.php?ciudad=$Pciudad' id='ContentPlaceHolder1_link_encartelera' class='btn-h2-df-norte' style='text-decoration: none;'><i class='icon-chevron-left'></i>CARTELERA EN $Pciudad</a>";?>
						</h2>
						<nav class="col3 sociales"><span>Compartir:</span>
							<ul>
								<li>
									<a href="#" class="comparteTW"><span class="icon-twitter"></span></a>
								</li>
								<li>
									<a href="#" class="comparteGl" onclick="window.open('https://plus.google.com/share?url='+window.location,'Cinépolis Online', 'width=600, height=460'); return false;"><span class="icon-google-plus-sign"></span></a>
								</li>
								<li>
									<a href="#" class="comparteFB" onclick="window.open('http://www.facebook.com/share.php?u=' + window.location, 'newwindow', 'width=600, height=400'); return false;"><span class="icon-facebook"></span></a>
								</li>
							</ul>
						</nav>
					</div>
					<div class="clear"></div>

					<!--SINOPSIS-->
					<?php
					echo "
					<div class='row sinopsisCont'>
						<div id='ContentPlaceHolder1_ctl_sinopsis_seccion_pelicula' class='col7 infoPelicula'>
							<div class='col3 imgPelicula'>
								<figure>
									<img src='$imagen' id='ContentPlaceHolder1_ctl_sinopsis_ctl_cartel' alt='$titulo'>
								</figure>
							</div>
							<div class='link-klic'></div>
							<h3>
								<span id='ContentPlaceHolder1_ctl_sinopsis_ctl_titulo'>$titulo</span>
								<small>
									<span id='ContentPlaceHolder1_ctl_sinopsis_ctl_titulooriginal'>$nombreoriginal ($paisorigen, $anoestreno)</span>
								</small>
							</h3>
							<div class='infoAdicional'>
								<span id='ContentPlaceHolder1_ctl_sinopsis_ctl_clasificacion' class='clasificacion' data-description='$sinopsis'>$clasificacion</span>
								<span id='ContentPlaceHolder1_ctl_sinopsis_ctl_duracion' class='duracion'>$duracion min</span>
								<span id='ContentPlaceHolder1_ctl_sinopsis_ctl_genero' class='genero'>$genero</span>
							</div>
							<div class='rating cf' style='display: none'>
								<p>Califica esta película:</p>
								<div class='ranking'>
									<span class='star-rating-control'>
										<div class='rating-cancel' style='display: block;'><a title='Cancel Rating'></a></div>
										<div role='text' aria-label=' class='star-rating rater-0 rankingSubmit star-rating-applied star-rating-live'>
											<a title='on'>on</a>
										</div>
										<div role='text' aria-label=' class='star-rating rater-0 rankingSubmit star-rating-applied star-rating-live'>
											<a title='on'>on</a>
										</div>
										<div role='text' aria-label=' class='star-rating rater-0 rankingSubmit star-rating-applied star-rating-live'>
											<a title='on'>on</a>
										</div>
										<div role='text' aria-label=' class='star-rating rater-0 rankingSubmit star-rating-applied star-rating-live'>
											<a title='on'>on</a>
										</div>
										<div role='text' aria-label=' class='star-rating rater-0 rankingSubmit star-rating-applied star-rating-live'>
											<a title='on'>on</a>
										</div>
									</span>
									<input name='star1' type='radio' class='rankingSubmit star-rating-applied' style='display: none;'>
									<input name='star1' type='radio' class='rankingSubmit star-rating-applied' style='display: none;'>
									<input name='star1' type='radio' class='rankingSubmit star-rating-applied' style='display: none;'>
									<input name='star1' type='radio' class='rankingSubmit star-rating-applied' style='display: none;'>
									<input name='star1' type='radio' class='rankingSubmit star-rating-applied' style='display: none;'>
								</div>
							</div>
							<span class='clear'></span>
							<div class='info'>
								<h4 id='ContentPlaceHolder1_ctl_sinopsis_ctl_titulo_trailer'>Trailer</h4>";

								echo "
								<div id='ContentPlaceHolder1_ctl_sinopsis_ctl_trailer' class='video-js player-cinepolis videoSinopsis vjs-paused vjs-controls-enabled vjs-user-active' style='width: 535px; height: 220px;'>
									<video poster='$imagen' src='$rutavideo' controls style='width: 100%; height: 100%;'></video>
								</div>
							</div>";

							echo "
							<div class='receptor-horarios-mov'></div>
							<div class='info'>
								<h4>Sinopsis</h4>
								<p id='ContentPlaceHolder1_ctl_sinopsis_ctl_sinopsis'>$sinopsis</p>
							</div>
							<div class='info'>
								<h4 id='ContentPlaceHolder1_ctl_sinopsis_ctl_titulo_propiedades'>Créditos y reparto</h4>
								<div id='ContentPlaceHolder1_ctl_sinopsis_div_propiedades'>
									<p class='bolder cf'>
										<span>Actores</span>
										<small>$actores</small>
									</p>
									<p class='bolder cf'>
										<span>Directores</span>
										<small>$directores</small>
									</p>
								</div>
							</div>
						</div>
						";
						?>

						<!--CONSULTA DE HORARIOS-->
						<div id='ContentPlaceHolder1_ctl_sinopsis_seccion_horarios' class='horariosPelicula col3' data-gtm-vis-recent-on-screen-275944_456='9223' data-gtm-vis-first-on-screen-275944_456='9223' data-gtm-vis-total-visible-time-275944_456='500' data-gtm-vis-has-fired-275944_456='1' style='display: block;'>
							<h2>Consulta más Horarios</h2>
							<div id='synopsis' class='infoHorarios ng-scope' data-pais='CinepolisMX' data-not-found=' data-error=' data-loading=' data-city='culiacan' data-movie='escalofrios-2-una-noche-embrujada' ng-controller='synopsisController'>
								<div class='selectHorario' ng-show='!loading' style='position: relative;'>
									<div class='select selectBlanco'>
										<div class='selector' id='uniform-cmbCiudadesHorario' style='width: 294px;'>
											<span style='width: 282px; user-select: none;'><?php echo $Pciudad; ?></span>
											<!--TODOAS LAS CIUDADES EN SELECT-->
										</div>
									</div>
									<div class='select selectBlanco' ng-show='complete'>
									<!--ROQUE-->
										<div class='chosen-container chosen-container-multi' style='width: 100%;' title=' id='cmbComplejo_chosen'>
											<ul class='chosen-choices'>
											<?php
												$contadorSucursal=0;
												while ($datosSucursales=pg_fetch_array($resultSucursales)) {
													$DS_id_sucursal = $datosSucursales['id_sucursal'];
													$DS_nombreSucursal = $datosSucursales['nombre'];
												echo "
											   <li class='search-choice'>
											   		<span>$DS_nombreSucursal</span>
											   		<a class='search-choice-close' data-option-array-index='$contadorSucursal'></a>
											   	</li>";
											   	$contadorSucursal++;
												}
											?>
												<li class='search-field'>
													<input type='text' value='Elige tus cines favoritos' class=' autocomplete='off' style='width: 25px;'>
												</li>
											</ul>
											<div class='chosen-drop'><ul class='chosen-results'></ul></div>
										</div>
									</div>
									<div class='select selectBlanco' ng-show='complete'>
										<div class='selector' id='uniform-cmbFechas' style='width: 218px;'>
											<span style='width: 206px; user-select: none;'>Hoy 
											<?php 
											if($Mes=="November"){
												$Mes = "Noviembre";
												echo $Dia.' '.$Mes;
												}else{
													$Mes = "Diciembre";
													echo $Dia.' '.$Mes;
													} ?>
												
											</span>
											<?php echo "<select id='cmbFechas' ng-model='filterDate' ng-init='$Dia $Mes' style='class='ng-pristine ng-untouched ng-valid'>"; ?>
											<?php
 												echo "
												<option ng-repeat='(key, value) in synopsis.Dates' value='$Dia $Mes' class='ng-binding ng-scope' style='text-transform: lowercase;'>Hoy ($Dia $Mes)</option>";
												$dias = array('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');
												$DiaLetra = $dias[date('N', strtotime($fechaActual))];

												$bandera=true;
											while ($bandera) {
												$contadorBandera++;
												$Dia = $Dia + 1;
 												$Dia = "0".$Dia;

 												if ($contadorBandera==1) {
 													echo "
 												<option ng-repeat='(key, value) in synopsis.Dates' value='$Dia $Mes' class='ng-binding ng-scope' style='text-transform: lowercase;'>Mañana ($Dia $Mes)</option>
 												";
 												}
 												else{
 													echo "
 												<option ng-repeat='(key, value) in synopsis.Dates' value='$Dia $Mes' class='ng-binding ng-scope' style='text-transform: lowercase;'>$DiaLetra ($Dia $Mes)</option>
 												";
 												}
 												if ($contadorBandera == 6) {$bandera = false;}
 												if ($DiaLetra == "Lunes") {
 													$DiaLetra = "Martes";
 												}
 												elseif ($DiaLetra=="Martes") {
 													$DiaLetra="Miercoles";
 												}
 												elseif ($DiaLetra=="Miercoles") {
 													$DiaLetra="Jueves";
 												}
 												elseif ($DiaLetra=="Jueves") {
 													$DiaLetra="Viernes";
 												}
 												elseif ($DiaLetra=="Viernes") {
 													$DiaLetra="Sabado";
 												}
 												elseif ($DiaLetra=="Sabado") {
 													$DiaLetra="Domingo";
 												}
 												elseif ($DiaLetra=="Domingo") {
 													$DiaLetra="Lunes";
 												}
 											}
											echo "</select>";?>
										</div>
									</div>
									<div class='resize-sensor' style='position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; z-index: -1; visibility: hidden;'>
										<div class='resize-sensor-expand' style='position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;'>
											<div style='position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 100000px; height: 100000px;'></div>
										</div>
										<div class='resize-sensor-shrink' style='position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;'>
											<div style='position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%'></div>
										</div>
									</div>
								</div>

								<!--HORARIOS PELICULA-->
								<div class='horariosDesc no_empty' style='height: 494.469px; min-height: 400px;'>
									<div class='ov-flow ps-container'>
										<div class='horariosDesc-complejo' style="border-bottom: 0px solid #e1e3e6;">
										<?php

										while ($datosSucursales2=pg_fetch_array($resultSucursales2)) {
											$DS_id_sucursal2 = $datosSucursales2['id_sucursal'];
											$DS_nombreSucursal2 = $datosSucursales2['nombre'];
										
											echo "
											<div class='location cinepolis-culiacan' ng-repeat='cinema in synopsis.Cinemas' ng-show='!loading' idcomplejohijo='279' key='$DS_nombreSucursal2' idcomplejo='13'><h3 class='ng-binding'>$DS_nombreSucursal2</h3>
												<div ng-repeat='date in cinema.Dates | filter : {ShowtimeDate : filterDate}' on-last-repeat=' class='ng-scope'>";

												$contadorEspañol = 0; $contadorIngles = 0; $contadorSubEspañol = 0; $contadorSubIngles = 0; $contadorEspañol3D = 0; $contadorIngles3D = 0; $contadorSubEspañol3D = 0; $contadorSubIngles3D = 0;
												
												while ($datoshorarios=pg_fetch_array($resultHorarios)) {
													$RHid_horario = $datoshorarios['id_horario'];
													$RHhora = $datoshorarios['hora'];
													$RHidioma = $datoshorarios['idioma'];
													$RHsala = $datoshorarios['sala'];
													$RHSucursalnombre = $datoshorarios['nombre'];
												
													if ($RHidioma == "Español") {
														if ($contadorEspañol==0) {
															$contadorEspañol++;
														echo "
														<div class='format ng-scope' ng-repeat='format in date.Formats | orderBy:'Name'>
															<label ng-bind-html='getExperiences(format.Name) | to_trusted' class='ng-binding'><p><span>ESP</span></p></label>
															<time class='btn ng-scope' ng-repeat='time in format.Showtimes'>
																<a href='controladores/valores_elegirBoletos.php?id_horario=$RHid_horario' class='ng-binding' style='text-decoration: none;';>$RHhora</a>
															</time>";
														}
														else
														{
															echo "
															<time class='btn ng-scope' ng-repeat='time in format.Showtimes'>
																<a href='controladores/valores_elegirBoletos.php?id_horario=$RHid_horario' class='ng-binding' style='text-decoration: none;';>$RHhora</a>
															</time>";
														}
														echo "
														</div>";
													}//FIN IF 1

													if ($RHidioma == "Ingles") {
														if ($contadorIngles==0) {
															$contadorIngles++;
														echo "
														<div class='format ng-scope' ng-repeat='format in date.Formats | orderBy:'Name'>
															<label ng-bind-html='getExperiences(format.Name) | to_trusted' class='ng-binding'><p><span>ING</span></p></label>
															<time class='btn ng-scope' ng-repeat='time in format.Showtimes'>
																<a href='controladores/valores_elegirBoletos.php?id_horario=$RHid_horario' class='ng-binding' style='text-decoration: none;';>$RHhora</a>
															</time>";
														}
														else
														{
															echo "
															<time class='btn ng-scope' ng-repeat='time in format.Showtimes'>
																<a href='controladores/valores_elegirBoletos.php?id_horario=$RHid_horario' class='ng-binding' style='text-decoration: none;';>$RHhora</a>
															</time>";
														}
														echo "
														</div>";
													}//FIN IF 2

													if ($RHidioma == "Sub. Español") {
														if ($contadorSubEspañol==0) {
															$contadorSubEspañol++;
														echo "
														<div class='format ng-scope' ng-repeat='format in date.Formats | orderBy:'Name'>
															<label ng-bind-html='getExperiences(format.Name) | to_trusted' class='ng-binding'><p><span>SUB ESP</span></p></label>
															<time class='btn ng-scope' ng-repeat='time in format.Showtimes'>
																<a href='controladores/valores_elegirBoletos.php?id_horario=$RHid_horario' class='ng-binding' style='text-decoration: none;';>$RHhora</a>
															</time>";
														}
														else
														{
															echo "
															<time class='btn ng-scope' ng-repeat='time in format.Showtimes'>
																<a href='controladores/valores_elegirBoletos.php?id_horario=$RHid_horario' class='ng-binding' style='text-decoration: none;';>$RHhora</a>
															</time>";
														}
														echo "
														</div>";
													}//FIN IF 3

													if ($RHidioma == "Sub. Ingles") {
														if ($contadorSubIngles==0) {
															$contadorSubIngles++;
														echo "
														<div class='format ng-scope' ng-repeat='format in date.Formats | orderBy:'Name'>
															<label ng-bind-html='getExperiences(format.Name) | to_trusted' class='ng-binding'><p><span>SUB ING</span></p></label>
															<time class='btn ng-scope' ng-repeat='time in format.Showtimes'>
																<a href='controladores/valores_elegirBoletos.php?id_horario=$RHid_horario' class='ng-binding' style='text-decoration: none;';>$RHhora</a>
															</time>";
														}
														else
														{
															echo "
															<time class='btn ng-scope' ng-repeat='time in format.Showtimes'>
																<a href='controladores/valores_elegirBoletos.php?id_horario=$RHid_horario' class='ng-binding' style='text-decoration: none;';>$RHhora</a>
															</time>";
														}
														echo "
														</div>";
													}//FIN IF 4

													if ($pelicula3d == 1) {
														if ($RHidioma == "Español 3D") {
															if ($contadorEspañol3D==0) {
																$contadorEspañol3D++;
															echo "
															<div class='format ng-scope' ng-repeat='format in date.Formats | orderBy:'Name'>
																<label ng-bind-html='getExperiences(format.Name) | to_trusted' class='ng-binding'><p><span>ESP 3D</span></p></label>
																<time class='btn ng-scope' ng-repeat='time in format.Showtimes'>
																	<a href='controladores/valores_elegirBoletos.php?id_horario=$RHid_horario' class='ng-binding' style='text-decoration: none;';>$RHhora</a>
																</time>";
															}
															else
															{
																echo "
																<time class='btn ng-scope' ng-repeat='time in format.Showtimes'>
																	<a href='controladores/valores_elegirBoletos.php?id_horario=$RHid_horario' class='ng-binding' style='text-decoration: none;';>$RHhora</a>
																</time>";
															}
															echo "
															</div>";
														}//FIN IF 5

														if ($RHidioma == "Ingles 3D") {
															if ($contadorIngles3D==0) {
																$contadorIngles3D++;
															echo "
															<div class='format ng-scope' ng-repeat='format in date.Formats | orderBy:'Name'>
																<label ng-bind-html='getExperiences(format.Name) | to_trusted' class='ng-binding'><p><span>ING 3D</span></p></label>
																<time class='btn ng-scope' ng-repeat='time in format.Showtimes'>
																	<a href='controladores/valores_elegirBoletos.php?id_horario=$RHid_horario' class='ng-binding' style='text-decoration: none;';>$RHhora</a>
																</time>";
															}
															else
															{
																echo "
																<time class='btn ng-scope' ng-repeat='time in format.Showtimes'>
																	<a href='controladores/valores_elegirBoletos.php?id_horario=$RHid_horario' class='ng-binding' style='text-decoration: none;';>$RHhora</a>
																</time>";
															}
															echo "
															</div>";
														}//FIN IF 6

														if ($RHidioma == "Sub. Español 3D") {
															if ($contadorSubEspañol3D==0) {
																$contadorSubEspañol3D++;
															echo "
															<div class='format ng-scope' ng-repeat='format in date.Formats | orderBy:'Name'>
																<label ng-bind-html='getExperiences(format.Name) | to_trusted' class='ng-binding'><p><span>SUB ESP 3D</span></p></label>
																<time class='btn ng-scope' ng-repeat='time in format.Showtimes'>
																	<a href='controladores/valores_elegirBoletos.php?id_horario=$RHid_horario' class='ng-binding' style='text-decoration: none;';>$RHhora</a>
																</time>";
															}
															else
															{
																echo "
																<time class='btn ng-scope' ng-repeat='time in format.Showtimes'>
																	<a href='controladores/valores_elegirBoletos.php?id_horario=$RHid_horario' class='ng-binding' style='text-decoration: none;';>$RHhora</a>
																</time>";
															}
															echo "
															</div>";
														}//FIN IF 7

														if ($RHidioma == "Sub. Ingles 3D") {
															if ($contadorSubIngles3D==0) {
																$contadorSubIngles3D++;
															echo "
															<div class='format ng-scope' ng-repeat='format in date.Formats | orderBy:'Name'>
																<label ng-bind-html='getExperiences(format.Name) | to_trusted' class='ng-binding'><p><span>SUB ING 3D</span></p></label>
																<time class='btn ng-scope' ng-repeat='time in format.Showtimes'>
																	<a href='controladores/valores_elegirBoletos.php?id_horario=$RHid_horario' class='ng-binding' style='text-decoration: none;';>$RHhora</a>
																</time>";
															}
															else
															{
																echo "
																<time class='btn ng-scope' ng-repeat='time in format.Showtimes'>
																	<a href='controladores/valores_elegirBoletos.php?id_horario=$RHid_horario' class='ng-binding' style='text-decoration: none;';>$RHhora</a>
																</time>";
															}
															echo "
															</div>";
														}//FIN IF 8
													}//FIN id_pelicula3d
												}//FIN_WHILE
												echo "
												</div>
											</div>";
											}
										?>
											<div class='errorBusqueda emptyLocations cf' style='display: none;'><span class='col3'>:(</span>
												<p class='col9'>Por favor selecciona un cine</p>
											</div>
										</div>
										<div class='ps-scrollbar-x-rail' style='left: 0px; bottom: 3px;'>
											<div class='ps-scrollbar-x' style='left: 0px; width: 0px;'></div>
										</div>
										<div class='ps-scrollbar-y-rail' style='top: 0px; right: 3px;'>
											<div class='ps-scrollbar-y' style='top: 0px; height: 0px;'></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</article><!-- el div de arriba es el fin_class='row sinopsisCont' y contenido sinopsis-->
			</section>
		
<script src="../js/llamadasAjax.js"></script>
</body>
</html>
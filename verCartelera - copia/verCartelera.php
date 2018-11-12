<?php
	date_default_timezone_set("America/Mazatlan");
 	$fechaActual = date("Y-m-d");
 	$horaActual = date("H:i");
 	//$fecha = date("Y-m-d H:i:s");
 	//$Pciudad = "Culiacán";

 	$Pciudad = $_GET['ciudad'];

 	include_once ('conexion.php'); $conexion = conectarBDver();

 	if (isset($_GET['id_sucursal']) == "") {
 		$resultSucursales = pg_query("SELECT DISTINCT ON (H.id_sucursal) ALS.id_sucursal, nombre FROM altasucursal ALS INNER JOIN horarios H ON ALS.id_sucursal=H.id_sucursal WHERE estatus='1' and ALS.ciudad='$Pciudad' and fecha='$fechaActual' and hora>='$horaActual' ORDER BY H.id_sucursal desc,hora");
 	}else{
 		$Pid_sucursal = $_GET['id_sucursal'];
 		$resultSucursales = pg_query("SELECT DISTINCT ON (H.id_sucursal) ALS.id_sucursal, nombre FROM altasucursal ALS INNER JOIN horarios H ON ALS.id_sucursal=H.id_sucursal WHERE estatus='1' and ALS.ciudad='$Pciudad' and H.id_sucursal='$Pid_sucursal' and fecha='$fechaActual' and hora>='$horaActual' ORDER BY H.id_sucursal desc,hora");
 	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
				while ($datosSucursales=pg_fetch_array($resultSucursales)) {
						$IDTienda = $datosSucursales['id_sucursal'];
						$nombre = $datosSucursales['nombre'];
					
					echo "
					<SECTION class='col7 listaCarteleraHorario'>
						<div class='$nombre divComplejo' data-oculto='0' ng-repeat='cinema in city.Cinemas' on-last-repeat=' ng-show='!loading' style='display: block;'>
							<div class='divFecha ng-scope' ng-repeat='date in cinema.Dates | filter : {ShowtimeDate : filterDate}'>
								<a href='#' ng-click='dataLayer.push({'event':'$nombre'});' class='btnInfoComplejo autofix_sb' idcomplejo='566' idcomplejohijo=' nombrecomplejo='$nombre' nombreciudad='$Pciudad'>
									<h2 ng-bind-html='getLocation(cinema.Name, cinema.Status) | to_trusted' class='ng-binding'><i class='icon-info-sign'></i>$nombre<span class='nueva-ap'><b style='vertical-align: sub; font-size: 12px;'>Nueva apertura</b></span></h2>
								</a>
								";
								$result = pg_query("SELECT DISTINCT ON (S.id_pelicula) H.id_sucursal, S.id_pelicula, imagen, titulo, clasificacion, duracion, genero, actores, directores, idiomaespanol, idiomaingles, subtituloespanol, subtituloingles, pelicula3d, idiomaespanol3d, idiomaingles3d, subtituloespanol3d, subtituloingles3d, estatus, rutavideo, sinopsis, H.ciudad FROM peliculas S INNER JOIN horarios H ON S.id_pelicula = H.id_pelicula WHERE estatus='1' and fecha='$fechaActual' and hora>='$horaActual' and H.ciudad='$Pciudad' and id_sucursal='$IDTienda' ORDER BY S.id_pelicula, hora");

								while ($datos=pg_fetch_array($result)) {
									$ID = $datos['id_pelicula'];
									$imagen = $datos['imagen'];
									$imagen = "../".$imagen;
									$titulo = $datos['titulo'];
									$clasificacion = $datos['clasificacion'];
									$genero = $datos['genero'];
									$duracion = $datos['duracion'];
									$idiomaespanol = $datos['idiomaespanol'];
									$idiomaingles = $datos['idiomaingles'];
									$subtituloespanol = $datos['subtituloespanol'];
									$subtituloingles = $datos['subtituloingles'];
									$pelicula3d = $datos['pelicula3d'];
									$idiomaespanol3d = $datos['idiomaespanol3d'];
									$idiomaingles3d = $datos['idiomaingles3d'];
									$subtituloespanol3d = $datos['subtituloespanol3d'];
									$subtituloingles3d = $datos['subtituloingles3d'];
									$estatus = $datos['estatus'];
									$directores = $datos['directores'];
									$sinopsis = $datos['sinopsis'];
									$actores = $datos['actores'];
									$rutavideo = $datos['rutavideo'];
									$rutavideo = "../".$rutavideo;


								echo "
									<article data-oculto='0' class='row tituloPelicula ng-scope' ng-repeat='movie in date.Movies' style='display: block; border-style: solid; border-width: 1px; border-color: #e1e3e6; width: 100%;'>
										<figure class='col4' style='margin-top: 30px; margin-left: 2%;'>
											<a href='sinopsisPelicula.php?id_pelicula=$ID'>
												<div class='corner 4dx'></div>
												<img ng-src='$imagen' width='139px' height='204px' alt='$titulo' src='$imagen'>
											</a>
										</figure>
										<div class='descripcion col8' id='$nombre-$IDTienda-$titulo'>
											<header class='cf'>
												<h3>
													<a href='sinopsisPelicula.php?id_pelicula=$ID' class='datalayer-movie ng-binding' ng-click='sendDataLayer(movie, 'Cartelera', cinema.Key)' id='$IDTienda-$nombre-$titulo' style='font-size: 21px; text-decoration: none;'>$titulo</a>
												</h3>
												<span class='data-layer' data-titulo='$titulo' data-distribuidora='Sony' data-fotmatopelicula='Sin datos' data-titulooriginal='$titulo' data-genero='$genero' data-clasificacion='$clasificacion' data-director='$directores' data-actor='$actores' data-list='IDTienda-$nombre' data-moviekey='$titulo' data-boletos='boletos'></span>
												<p class='float-right'>
													<span class='clasificacion ng-binding' data-description='$sinopsis' style='font-size: 13px;'>$clasificacion</span>
													<span class='duracion ng-binding' style='font-size: 13px;'>$duracion min</span>
													<a href='#' ng-show='showTrailer(movie.Trailer)' ng-click='DataLayerTrailer(movie.Title)' data-modal='modal-12' data-video='$rutavideo' class='btn btnTrailer btnShowTrailer' style='margin-right: 10px;'>
														<i class='icon-caret-right' style='padding-right: 5px;'></i><b style='font-size: 13px;text-decoration: none;'>Ver trailer</b>
													</a>
												</p>
											</header>
											";

											//COLOCAR VARIABLES DE IDIOMA Y HORA
											echo "
											<div class='horarioExp TRAD 2D ESP' ng-init='AddSegob(format.Name,format.SegobPermission,movie.Title)' data-ocultoporhorario='0' data-conteo='0' ng-show='!loading' ng-repeat='format in movie.Formats'>
												<div class='row' style='margin-bottom: 30px;'>";

												/*$resultHorario = pg_query("SELECT id_horario, hora, idioma, sala, id_sucursal, ciudad FROM horarios WHERE fecha='$fechaActual' and id_pelicula='$ID' and hora>='$horaActual' ORDER BY id_pelicula, hora");*/
												$resultHorario = pg_query("SELECT id_horario, hora, idioma, sala, id_sucursal, ciudad FROM horarios WHERE fecha='$fechaActual' and id_pelicula='$ID' and hora>='$horaActual' ORDER BY hora");

												$contadorEspañol = 0; $contadorIngles = 0; $contadorSubEspañol = 0; $contadorSubIngles = 0; $contadorEspañol3D = 0; $contadorIngles3D = 0; $contadorSubEspañol3D = 0; $contadorSubIngles3D = 0;

													while ($datoshorarios=pg_fetch_array($resultHorario)) {
														$id_horario = $datoshorarios['id_horario'];
														$hora = $datoshorarios['hora'];
														$idioma = $datoshorarios['idioma'];
														$sala = $datoshorarios['sala'];
														$id_sucursal = $datoshorarios['id_sucursal'];
														$ciudad = $datoshorarios['ciudad'];

														if ($idioma == "Español") {
															if ($contadorEspañol==0) {
																$contadorEspañol++;
																echo "
																<div class='col3 cf ng-binding' ng-bind-html='getExperiences(format.Name) | to_trusted'>
																	<p><span>ESP</span></p>
																</div>
																<div class='col9 cf'>
																	<time class='btn btnhorario ng-scope' data-oculto='0' value='$hora' ng-repeat='showtime in format.Showtimes'>
																		<a href='elegirBoletos.php?id_horario=$id_horario' class='ng-binding'>$hora</a>
																	</time>
																";
															}
															else{
																echo "
																	<time class='btn btnhorario ng-scope' data-oculto='0' value='$hora' ng-repeat='showtime in format.Showtimes'>
																		<a href='elegirBoletos.php?id_horario=$id_horario' class='ng-binding'>$hora</a>
																	</time>
																";
															}
															echo "</div>";
														}
														if ($idioma == "Ingles") {
															if ($contadorIngles==0) {
																$contadorIngles++;
																echo "
																<div class='col3 cf ng-binding' ng-bind-html='getExperiences(format.Name) | to_trusted'>
																	<p><span>ING</span></p>
																</div>
																<div class='col9 cf'>
																	<time class='btn btnhorario ng-scope' data-oculto='0' value='$hora' ng-repeat='showtime in format.Showtimes'>
																		<a href='elegirBoletos.php?id_horario=$id_horario' class='ng-binding'>$hora</a>
																	</time>
																";
															}
															else{
																echo "
																	<time class='btn btnhorario ng-scope' data-oculto='0' value='$hora' ng-repeat='showtime in format.Showtimes'>
																		<a href='elegirBoletos.php?id_horario=$id_horario' class='ng-binding'>$hora</a>
																	</time>
																";
															}
															echo "</div>";
														}
														if ($idioma == "Sub. Español") {
															if ($contadorSubEspañol==0) {
																$contadorSubEspañol++;
																echo "
																<div class='horarioExp TRAD 2D SUB' ng-init='AddSegob(format.Name,format.SegobPermission,movie.Title)' data-ocultoporhorario='0' data-conteo='0' ng-show='!loading' ng-repeat='format in movie.Formats'>
																<div class='row'>
																	<div class='col3 cf ng-binding' ng-bind-html='getExperiences(format.Name) | to_trusted'><p><span>SUB ESP</span></p>
																	</div>

																	<div class='col9 cf'>
																		<time class='btn btnhorario ng-scope' data-oculto='0' value='$hora' ng-repeat='showtime in format.Showtimes'>
																			<a href='elegirBoletos.php?id_horario=$id_horario' class='ng-binding'>$hora</a>
																		</time>
																";
															}
															else
															{
																echo "
																		<time class='btn btnhorario ng-scope' data-oculto='0' value='$hora' ng-repeat='showtime in format.Showtimes'>
																			<a href='elegirBoletos.php?id_horario=$id_horario' class='ng-binding'>$hora</a>
																		</time>
																";
															}
																echo "</div>";//fin_horarioExp TRAD 2D SUB
														}
														if ($idioma == "Sub. Ingles") {
															if ($contadorSubIngles==0) {
																$contadorSubIngles++;
																echo "
																<div class='horarioExp TRAD 2D SUB' ng-init='AddSegob(format.Name,format.SegobPermission,movie.Title)' data-ocultoporhorario='0' data-conteo='0' ng-show='!loading' ng-repeat='format in movie.Formats'>
																<div class='row'>
																	<div class='col3 cf ng-binding' ng-bind-html='getExperiences(format.Name) | to_trusted'><p><span>SUB ING</span></p>
																	</div>

																	<div class='col9 cf'>
																		<time class='btn btnhorario ng-scope' data-oculto='0' value='$hora' ng-repeat='showtime in format.Showtimes'><a href='elegirBoletos.php?id_horario=$id_horario' class='ng-binding'>$hora</a>
																		</time>
																";
															}
															else
															{
																echo "
																		<time class='btn btnhorario ng-scope' data-oculto='0' value='$hora' ng-repeat='showtime in format.Showtimes'><a href='elegirBoletos.php?id_horario=$id_horario' class='ng-binding'>$hora</a>
																		</time>
																";
															}
																echo "</div>";//fin_horarioExp TRAD 2D SUB
														}
														if ($pelicula3d == 1) {
															if ($idioma == "Español 3D") {
																if ($contadorEspañol3D==0) {
																	$contadorEspañol3D++;
																	echo "
																	<div class='horarioExp TRAD 2D SUB' ng-init='AddSegob(format.Name,format.SegobPermission,movie.Title)' data-ocultoporhorario='0' data-conteo='0' ng-show='!loading' ng-repeat='format in movie.Formats'>
																	<div class='row'>
																		<div class='col3 cf ng-binding' ng-bind-html='getExperiences(format.Name) | to_trusted'><p><span>ESP 3D</span></p>
																		</div>

																		<div class='col9 cf'>
																			<time class='btn btnhorario ng-scope' data-oculto='0' value='$hora' ng-repeat='showtime in format.Showtimes'><a href='elegirBoletos.php?id_horario=$id_horario' class='ng-binding'>$hora</a>
																			</time>
																	";
																}
																else
																{
																	echo "
																			<time class='btn btnhorario ng-scope' data-oculto='0' value='$hora' ng-repeat='showtime in format.Showtimes'><a href='elegirBoletos.php?id_horario=$id_horario' class='ng-binding'>$hora</a>
																			</time>
																	";
																}
																	echo "</div>";//fin_horarioExp TRAD 2D SUB
															}
															if ($idioma == "Ingles 3D") {
																if ($contadorIngles3D==0) {
																	$contadorIngles3D++;
																	echo "
																	<div class='horarioExp TRAD 2D SUB' ng-init='AddSegob(format.Name,format.SegobPermission,movie.Title)' data-ocultoporhorario='0' data-conteo='0' ng-show='!loading' ng-repeat='format in movie.Formats'>
																	<div class='row'>
																		<div class='col3 cf ng-binding' ng-bind-html='getExperiences(format.Name) | to_trusted'><p><span>ING 3D</span></p>
																		</div>

																		<div class='col9 cf'>
																			<time class='btn btnhorario ng-scope' data-oculto='0' value='$hora' ng-repeat='showtime in format.Showtimes'><a href='elegirBoletos.php?id_horario=$id_horario' class='ng-binding'>$hora</a>
																			</time>
																	";
																}
																else
																{
																	echo "
																			<time class='btn btnhorario ng-scope' data-oculto='0' value='$hora' ng-repeat='showtime in format.Showtimes'><a href='elegirBoletos.php?id_horario=$id_horario' class='ng-binding'>$hora</a>
																			</time>
																	";
																}
																	echo "</div>";//fin_horarioExp TRAD 2D SUB
															}
															if ($idioma == "Sub. Español 3D") {
																if ($contadorSubEspañol3D==0) {
																	$contadorSubEspañol3D++;
																	echo "
																	<div class='horarioExp TRAD 2D SUB' ng-init='AddSegob(format.Name,format.SegobPermission,movie.Title)' data-ocultoporhorario='0' data-conteo='0' ng-show='!loading' ng-repeat='format in movie.Formats'>
																	<div class='row'>
																		<div class='col3 cf ng-binding' ng-bind-html='getExperiences(format.Name) | to_trusted'><p><span>SUB ESP 3D</span></p>
																		</div>

																		<div class='col9 cf'>
																			<time class='btn btnhorario ng-scope' data-oculto='0' value='$hora' ng-repeat='showtime in format.Showtimes'><a href='elegirBoletos.php?id_horario=$id_horario' class='ng-binding'>$hora</a>
																			</time>
																	";
																}
																else
																{
																	echo "
																			<time class='btn btnhorario ng-scope' data-oculto='0' value='$hora' ng-repeat='showtime in format.Showtimes'><a href='elegirBoletos.php?id_horario=$id_horario' class='ng-binding'>$hora</a>
																			</time>
																	";
																}
																	echo "</div>";//fin_horarioExp TRAD 2D SUB
															}
															if ($idioma == "Sub. Ingles 3D") {
																if ($contadorSubIngles3D==0) {
																	$contadorSubIngles3D++;
																	echo "
																	<div class='horarioExp TRAD 2D SUB' ng-init='AddSegob(format.Name,format.SegobPermission,movie.Title)' data-ocultoporhorario='0' data-conteo='0' ng-show='!loading' ng-repeat='format in movie.Formats'>
																	<div class='row'>
																		<div class='col3 cf ng-binding' ng-bind-html='getExperiences(format.Name) | to_trusted'><p><span>SUB ESP 3D</span></p>
																		</div>

																		<div class='col9 cf'>
																			<time class='btn btnhorario ng-scope' data-oculto='0' value='$hora' ng-repeat='showtime in format.Showtimes'><a href='elegirBoletos.php?id_horario=$id_horario' class='ng-binding'>$hora</a>
																			</time>
																	";
																}
																else
																{
																	echo "
																			<time class='btn btnhorario ng-scope' data-oculto='0' value='$hora' ng-repeat='showtime in format.Showtimes'><a href='elegirBoletos.php?id_horario=$id_horario' class='ng-binding'>$hora</a>
																			</time>
																	";
																}
																	echo "</div>";//fin_horarioExp TRAD 2D SUB
															}
														}//fin condicion pelicula3d
													}//FIN WHILE $datoshorarios
													echo "
												</div>
											</div>
										</div>
									</article>
									";
								}//fin while $datos

						echo "
								<div class='btnTop'>
									<a href='javascript:window.scrollTo(0,0);' style='font-size: 14px;'><i class='icon-caret-up' style='padding-right: 5px;'></i>Regresar al inicio
									</a>
								</div>
							</div>
						</div>
					</SECTION>
					";
					}//FIN WHILE_SUCURSALES
					?>
</body>
</html>
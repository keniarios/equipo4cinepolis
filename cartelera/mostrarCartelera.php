<!--codigo-->
<?php
	include ('..bd/conexion.php'); $conexion = conectarBD();
	$result = pg_query("SELECT id_pelicula, imagen, titulo, pelicula3d, estatus, ciudad FROM peliculas ORDER BY estatus, anoestreno DESC");

	$totalRegistros = pg_numrows($result);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<!--DESGLOSE PELICULAS-->
				<div class='row'>
					<article class='col10'>
						<ul class='listCartelera tituloPelicula' style='position: relative; height: 500px;'>
							<?php
							$bandera=0;
							$banderamacroxe=true;$banderajunior=true;
							$banderamacroxe2=true;$banderajunior2=true;
							while ($datos=pg_fetch_array($result)) {
								$bandera++;
								$ID = $datos['id_pelicula'];
								$fotoPeliculas = $datos['imagen'];
								$fotoPeliculas = "../".$fotoPeliculas;
								$tituloPeliculas = $datos['titulo'];
								$iconotresDPeliculas = $datos['pelicula3d'];
								$estatus = $datos['estatus'];
								$ciudad = $datos['ciudad'];
							echo"
							<li id='ContentPlaceHolder1_rpCarteleaFront_li_carteles_$bandera' class='item' style='position: absolute; left: 0px; top: 0px;'>
								<figure class='overlay'>
									<img alt='$tituloPeliculas' src='$fotoPeliculas' width='139' height='203'>";
									if ($estatus == 1) {
										echo "<figcaption class='cintillo estreno'>Estreno</figcaption>";
									}
									elseif ($estatus == 2) {
										echo "<figcaption class='cintillo preventa'>Preventa</figcaption>";
									}
									elseif ($estatus == 3) {
										echo "<figcaption class='cintillo proximo-estreno'>Próximo estreno</figcaption>";
									}
									else{
										echo "<figcaption class='cintillo' style='background-color:transparent'></figcaption>";
									}
									echo "
									<div class='opcion-sellos sellos-2' style='padding-top: 0px; opacity: 0; display: none;'><h1>$tituloPeliculas</h1>
										<nav class='row'>";
											
											$resultTipoSala = pg_query("SELECT distinct on (tiposala) tiposala FROM HORARIOS H INNER JOIN salas S ON H.id_sucursal=S.id_sucursal WHERE id_pelicula='$ID'");
											while ($datosresultTipoSala=pg_fetch_array($resultTipoSala)) {
												$tiposala = $datosresultTipoSala['tiposala'];

												
												if ($tiposala == "MACRO XE") {
													$banderamacroxe = false;
													echo "
													<span class='col6'>
														<img src='../img/vistaCliente/tipoPelicula/201462601656828.png' alt='Sello $tituloPeliculas' title='Sello $tituloPeliculas'>
													</span>";
												}
												
												if ($tiposala == "Junior") {
													$banderajunior = false;
													echo "
													<span class='col6'>
														<img src='../img/vistaCliente/tipoPelicula/201462601721585.png alt='Sello $tituloPeliculas' title='Sello $tituloPeliculas'>
													</span>";
												}
											}
											if ($iconotresDPeliculas == 1) {
												
												echo "
												<span class='col6'>
													<img src='../img/vistaCliente/tipoPelicula/20146260176219.png' alt='Sello $tituloPeliculas' title='Sello $tituloPeliculas'>
												</span>
												";
												}
												echo "
										</nav>
										<nav class='btn-call'>
											<a href='cartelera.php?ciudad=$ciudad' onclick='LinkCartelera(this); return false;' class='lnkCartelera' style='display:block; text-decoration: none;'>Ver Cartelera</a>";
											echo "<a href='sinopsisPelicula.php?id_pelicula=$ID&ciudad=$ciudad' onclick='LinkSinopsis(this); return false;' style='text-decoration: none;'>Ver Sinopsis</a>";
											echo "
										</nav>
									</div>
								</figure>";
								
								echo "
								<div class='sellos'>
									<span>X</span><h1>$tituloPeliculas</h1>
									<nav>";

									$resultTipoSala = pg_query("SELECT distinct on (tiposala) tiposala FROM HORARIOS H INNER JOIN salas S ON H.id_sucursal=S.id_sucursal WHERE id_pelicula='$ID'");
											while ($datosresultTipoSala=pg_fetch_array($resultTipoSala)) {
												$tiposala = $datosresultTipoSala['tiposala'];

										if ($tiposala == "MACRO XE") {
													$banderamacroxe2 = false;
													echo "
													<span class='col6'>
														<img src='../img/vistaCliente/tipoPelicula/201462601656828.png' alt='Sello $tituloPeliculas' title='Sello $tituloPeliculas'>
													</span>";
												}
												
												if ($tiposala == "Junior") {
													$banderajunior2 = false;
													echo "
													<span class='col6'>
														<img src='../img/vistaCliente/tipoPelicula/201462601721585.png alt='Sello $tituloPeliculas' title='Sello $tituloPeliculas'>
													</span>";
												}
											}
											if ($iconotresDPeliculas == 1) {
												echo "
												<span class='col6'>
													<img src='../img/vistaCliente/tipoPelicula/20146260176219.png' alt='Sello $tituloPeliculas' title='Sello $tituloPeliculas'>
												</span>
												";
												}
									echo "</nav>

									<nav>
										<a href='verCartelera.php?ciudad=$ciudad' class='lnkCartelera' onclick='LinkCartelera(this); return false;' style='display:block'>Ver Cartelera</a>
										<a href='sinopsisPelicula.php?id_pelicula=$ID&ciudad=$ciudad' onclick='LinkSinopsis(this); return false;'>Ver Sinopsis</a>
									</nav>
								</div>
							</li>
							";

							if ($bandera==9) {
								$banderamacroxe=true;$banderajunior=true;
								$banderamacroxe2=true;$banderajunior2=true;
								while ($datos=pg_fetch_array($result)){
									$ID = $datos['id_pelicula'];
									$fotoPeliculas = $datos['imagen'];
									$fotoPeliculas = "../".$fotoPeliculas;
									$tituloPeliculas = $datos['titulo'];
									$iconotresDPeliculas = $datos['pelicula3d'];
									$estatus = $datos['estatus'];
								echo"
								<li id='ContentPlaceHolder1_rpCarteleaFront_li_carteles_10' class='cartel_oculto' style='display: none; position: absolute; left: 632px; top: 250px;'>
								<figure class='overlay'>
									<img alt='$tituloPeliculas' src='$fotoPeliculas' width='139' height='203'>";
									if ($estatus == 1) {
										echo "<figcaption class='cintillo estreno'>Estreno</figcaption>";
									}
									elseif ($estatus == 2) {
										echo "<figcaption class='cintillo preventa'>Preventa</figcaption>";
									}
									elseif ($estatus == 3) {
										echo "<figcaption class='cintillo proximo-estreno'>Próximo estreno</figcaption>";
									}
									else{
										echo "<figcaption class='cintillo' style='background-color:transparent'></figcaption>";
									}

									echo "
									<div class='opcion-sellos sellos-2' style='display: none; padding-top: 0px; opacity: 0;'><h1>$tituloPeliculas</h1>
										<nav class='row'>";
											
											$resultTipoSala = pg_query("SELECT distinct on (tiposala) tiposala FROM HORARIOS H INNER JOIN salas S ON H.id_sucursal=S.id_sucursal WHERE id_pelicula='$ID'");
											while ($datosresultTipoSala=pg_fetch_array($resultTipoSala)) {
												$tiposala = $datosresultTipoSala['tiposala'];

												
												if ($tiposala == "MACRO XE") {
													$banderamacroxe = false;
													echo "
													<span class='col6'>
														<img src='../img/vistaCliente/tipoPelicula/201462601656828.png' alt='Sello $tituloPeliculas' title='Sello $tituloPeliculas'>
													</span>";
												}
												
												if ($tiposala == "Junior") {
													$banderajunior = false;
													echo "
													<span class='col6'>
														<img src='../img/vistaCliente/tipoPelicula/201462601721585.png alt='Sello $tituloPeliculas' title='Sello $tituloPeliculas'>
													</span>";
												}
											}
											if ($iconotresDPeliculas == 1) {
												
												echo "
												<span class='col6'>
													<img src='../img/vistaCliente/tipoPelicula/20146260176219.png' alt='Sello $tituloPeliculas' title='Sello $tituloPeliculas'>
												</span>
												";
												}
												echo "
										</nav>
										<nav class='btn-call'>
											<a href='verCartelera.php?$ciudad=$ciudad' onclick='LinkCartelera(this); return false;' class='lnkCartelera' style='display:block'>Ver Cartelera</a>
											<a href='sinopsisPelicula.php?id_pelicula=$ID&ciudad=$ciudad' onclick='LinkSinopsis(this); return false;'>Ver Sinopsis</a>
										</nav>
									</div>
								</figure>";

								echo "
								<div class='sellos'><span>X</span><h1>$tituloPeliculas</h1>
									<nav>";

									$resultTipoSala = pg_query("SELECT distinct on (tiposala) tiposala FROM HORARIOS H INNER JOIN salas S ON H.id_sucursal=S.id_sucursal WHERE id_pelicula='$ID'");
											while ($datosresultTipoSala=pg_fetch_array($resultTipoSala)) {
												$tiposala = $datosresultTipoSala['tiposala'];

										if ($tiposala == "MACRO XE") {
													$banderamacroxe2 = false;
													echo "
													<span class='col6'>
														<img src='../img/vistaCliente/tipoPelicula/201462601656828.png' alt='Sello $tituloPeliculas' title='Sello $tituloPeliculas'>
													</span>";
												}
												
												if ($tiposala == "Junior") {
													$banderajunior2 = false;
													echo "
													<span class='col6'>
														<img src='../img/vistaCliente/tipoPelicula/201462601721585.png alt='Sello $tituloPeliculas' title='Sello $tituloPeliculas'>
													</span>";
												}
											}
											if ($iconotresDPeliculas == 1) {
												echo "
												<span class='col6'>
													<img src='../img/vistaCliente/tipoPelicula/20146260176219.png' alt='Sello $tituloPeliculas' title='Sello $tituloPeliculas'>
												</span>
												";
												}
									echo "</nav>

									<nav>
										<a href='verCartelera.php?ciudad=$ciudad' class='lnkCartelera' onclick='LinkCartelera(this); return false;' style='display:block'>Ver Cartelera</a>
										<a href='sinopsisPelicula.php?id_pelicula=$ID&ciudad=$ciudad' onclick='LinkSinopsis(this); return false;'>Ver Sinopsis</a>
									</nav>
								</div>
							</li>
							";
							}
							}//fin_fi
							}//fin_while
							echo "
							
							";
							?>

							<li style='position: absolute; left: 632px; top: 250px;'>
								<div class='btnConsultar'>
									<a href='#' style="text-decoration: none;"><span>CONSULTAR CARTELERA COMPLETA <i class='icon-chevron-right'></i></span></a>
								</div>
							</li>
						</ul>

						<!--RENTALAS O COMPRALAS EN KLIC-->
						<aside class='w-klic w-klic--front cf'>
							<!--RENTAS Y VENTAS KLIC-->
							<iframe src='https://www.cinepolis.com/widget-klic?section=estrenos-en-renta' id='ContentPlaceHolder1_iframeKlic' frameborder='0'></iframe>
						</aside>
					</article>
				</div> <!--FIN DESGLOSE PELICULAS-->
</body>
</html>
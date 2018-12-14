<!--codigo-->
<?php
	//include ('../bd/conexion.php'); $conexion = conectarBD();
	include ('conexion.php'); $conexion = conectarBDslide();
	$result = pg_query("SELECT id_slider, titulo, rutaimagenbanner, rutaimagenmovil, rutaimagenmini, posicion FROM slider ORDER BY posicion");
	$resultminislide = pg_query("SELECT titulo, rutaimagenmini, posicion FROM slider ORDER BY posicion");
	
	$totalRegistros = pg_numrows($result);
	pg_close($conexion);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link href="../css/vistasCliente/master.css" rel='stylesheet' type='text/css' />
	<link href="../css/vistasCliente/master2.css" rel='stylesheet' type='text/css' />
	<link href="../css/vistasCliente/master3.css" rel='stylesheet' type='text/css' />
	<link href="../css/vistasCliente/master4.css" rel='stylesheet' type='text/css' />

</head>
<body>
	<?php
	echo "
<div class='slideWrapper'>
	<section class='slider' data-0='top:122px;' data-200='top:0px;'>
		<div class='bx-wrapper' style='max-width: 100%;'>
			<div class='bx-viewport' style='width: 100%; overflow: hidden; position: relative; height: 370px;'>
				<ul id='ContentPlaceHolder1_sliderFront' class='slides' style='width: 1015%; position: relative; transition-duration: 0s; transform: translate3d(-8094px, 0px, 0px);'>";
					
					$bandera=0;
					while ($datos=pg_fetch_array($result)) {
					$bandera++;
					$ID = $datos['id_slider'];
					$titulo = $datos['titulo'];
					$rutaimagenbanner = $datos['rutaimagenbanner'];
					$rutaimagenbanner = "../".$rutaimagenbanner;
					$rutaimagenmovil = $datos['rutaimagenmovil'];
					$rutaimagenmovil = "../".$rutaimagenmovil;
					$posicion = $datos['posicion'];
					
					echo"
					<li style='float: left; list-style: none; position: relative; width: 1349px;'>
						<a href='#' target='_self' class='img'>
							<figure class='item responsive' data-media='$rutaimagenmovil' data-media440='$rutaimagenmovil' data-media600='$rutaimagenbanner' data-media700='$rutaimagenbanner' title='En cartelera: $titulo' data-position='$bandera' data-url='#' data-id='$ID-en-cartelera-$titulo' style='overflow: hidden; position: relative;'><img src='$rutaimagenbanner' alt='En cartelera: $titulo' class='active' style='position: absolute; width: auto; height: 370px; top: 0px; left: -287.5px;'></figure>
						</a>
					</li>
					";
					}
					?>
				<?php
				echo "
				</ul>
			</div>
			<div class='bx-controls bx-has-controls-direction'>
				<div class='bx-controls-direction' onclick='javascript:dataLayer.push({&quot;event&quot;: &quot;Thumb &quot;});>
					<a class='bx-prev icon-chevron-left' href onclick='javascript:dataLayer.push({&quot;event&quot;: &quot;Thumb &quot;});></a>
					<a class='bx-next icon-chevron-right' href></a>
				</div>
			</div>
		</div>";

		//<!--PUNTEROS-->
		echo "
		<div id='ContentPlaceHolder1_lnkThumbs' class='thumb-cinepolis'>";

		$bandera=0;
		$x=0;

		while ($datosslide=pg_fetch_array($resultminislide))
		{
			$bandera++;

			$tituloslider = $datosslide['titulo'];
			$posicionslider = $datosslide['posicion'];
			$rutaimagenmini = $datosslide['rutaimagenmini'];
			$rutaimagenmini = "../".$rutaimagenmini;
		
		echo "
		<a data-slide-index='$x' href='#' onclick='javascript:dataLayer.push({&quot;event&quot;: &quot;Thumb $bandera - $tituloslider&quot;}); clickArrowSlider = true; return true;'  class='active'>
				<img src='$rutaimagenmini' alt='$tituloslider' width='100' height='46'>
			</a>
		";
			$x++;
		}
		echo"
		</div>
	</section>
</div>
";
?>
</body>
</html>
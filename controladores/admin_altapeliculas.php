<?php

require_once ('../bd/conexion.php'); $conexion = conectarBD();

if (isset($_POST['opcionclasificacion'])) 
{
	$valorClasificacion = $_POST['opcionclasificacion'];

	if ($valorClasificacion == "") 
	{
	?>
		<script languaje="javascript">
		    alert('Debe seleccionar una Clasificación');
		    location.href = "../vistas/frm_altapeliculas.php";
		</script>
	<?php
	}
	else
	{
		if (isset($_POST['opciongenero'])) {
			$valorGenero = $_POST['opciongenero'];

			if ($valorGenero == "") {
			?>
				<script languaje="javascript">
				    alert('Debe seleccionar un Genero');
				    location.href = "../vistas/frm_altapeliculas.php";
				</script>
			<?php
			}
			else{

				if (isset($_POST['opcionEstatus'])) {
				$valorEstatus = $_POST['opcionEstatus'];

				if ($valorEstatus == "") {
				?>
					<script languaje="javascript">
					    alert('Debe seleccionar un Estatus.');
					    location.href = "../vistas/frm_altapeliculas.php";
					</script>
				<?php
				}
				else{
						if (isset($_POST['opcionEstatus'])) {
							$valoropcionciudad = $_POST['opcionciudad'];

							if ($valoropcionciudad == "") {
							?>
								<script languaje="javascript">
								    alert('Debe seleccionar una Ciudad.');
								    location.href = "../vistas/frm_altapeliculas.php";
								</script>
							<?php
							}
							else{
								if (isset($_POST['check2'])) {
									$idiomaEspanol = '1';
								}
								else{$idiomaEspanol = '0';}

								if (isset($_POST['check1'])) {
									$idiomaIngles = '1';
								}
								else{$idiomaIngles = '0';}

								if (isset($_POST['check4'])) {
									$subEspanol = '1';
								}
								else{$subEspanol = '0';}

								if (isset($_POST['check3'])) {
									$subIngles = '1';
								}
								else{$subIngles = '0';}

								//***********3D****************

								if (isset($_POST['tresdcheck'])) {
									$tresD = '1';

									if (isset($_POST['tresdcheck2'])) {
										$tresDidiomaEspanol = '1';
									}
									else{$tresDidiomaEspanol = '0';}

									if (isset($_POST['tresdcheck1'])) {
										$tresDidiomaIngles = '1';
									}
									else{$tresDidiomaIngles = '0';}

									if (isset($_POST['tresdcheck4'])) {
									$tresDsubEspanol = '1';
									}
									else{$tresDsubEspanol = '0';}

									if (isset($_POST['tresdcheck3'])) {
										$tresDsubIngles = '1';
									}
									else{$tresDsubIngles = '0';}
								}
								else{
									$tresD = '0';
									$tresDidiomaEspanol = '0';
									$tresDidiomaIngles = '0';
									$tresDsubEspanol = '0';
									$tresDsubIngles = '0';
								}
								//INSERTAR RUTA IMAGEN
								$ruta="img/cartelera";
								$archivo=$_FILES['imagen']['tmp_name'];
								$nombreArchivo=$_FILES['imagen']['name'];
								move_uploaded_file($archivo, '../'.$ruta."/".$nombreArchivo);
								$ruta=$ruta."/".$nombreArchivo;


								//INSERTAR RUTA VIDEO
								$rutaVideo="videotrailers";
								$archivoVideo=$_FILES['video']['tmp_name'];
								$nombreArchivoVideo=$_FILES['video']['name'];
								move_uploaded_file($archivoVideo, '../'.$rutaVideo."/".$nombreArchivoVideo);
								$rutaVideo=$rutaVideo."/".$nombreArchivoVideo;

								$titulo = mb_convert_case($_POST['titulo'], MB_CASE_TITLE, "UTF-8");
								$nombreoriginal = mb_convert_case($_POST['nombreoriginal'], MB_CASE_TITLE, "UTF-8");
								$pais = mb_convert_case($_POST['pais'], MB_CASE_TITLE, "UTF-8");
								$actores = mb_convert_case($_POST['actores'], MB_CASE_TITLE, "UTF-8");
								$directores = mb_convert_case($_POST['directores'], MB_CASE_TITLE, "UTF-8");

								$query = "INSERT INTO peliculas (imagen, titulo, paisorigen, anoestreno, clasificacion, duracion, genero, ciudad, sinopsis, actores, directores, idiomaespanol, idiomaingles, subtituloespanol, subtituloingles, pelicula3d, idiomaespanol3d, idiomaingles3d, subtituloespanol3d, subtituloingles3d, nombreoriginal, estatus, rutavideo) VALUES ('$ruta', '$titulo', '$pais', '$_POST[fecha]', '$valorClasificacion', '$_POST[duracion]', '$valorGenero', '$valoropcionciudad', '$_POST[sinopsis]', '$actores', '$directores', '$idiomaEspanol', '$idiomaIngles', '$subEspanol', '$subIngles', '$tresD', '$tresDidiomaEspanol', '$tresDidiomaIngles', '$tresDsubEspanol', '$tresDsubIngles', '$nombreoriginal', '$valorEstatus', '$rutaVideo')";
									pg_query($query);
									?>
										<script languaje="javascript">
										    alert('Pelicula registrada con Exito!');
										    location.href = "../vistas/frm_altapeliculas.php";
										</script>
									<?php
							}
						}
					}
				}
			}
		}
	}
}
?>
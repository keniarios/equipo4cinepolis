<?php
require_once ('../bd/conexion.php'); $conexion = conectarBD();

$Pciudad = $_GET['ciudad'];
$Pid_sucursal = $_GET['id_sucursal'];


if (isset($_POST['opcionpelicula'])) {
	$valoropcionpelicula = $_POST['opcionpelicula'];

	if ($valoropcionpelicula == "") 
	{
?>
		<script languaje="javascript">
		    alert('Debe seleccionar una Película');
		    <?php echo "location.href = '../vistas/frm_altahorarios.php?ciudad=$Pciudad&id_sucursal=$Pid_sucursal';"; ?>
		</script>
	<?php
	}
	else
	{
		if (isset($_POST['opcionidioma'])) {
			$valoropcionidioma = $_POST['opcionidioma'];
			if ($valoropcionidioma == "") {
				?>
				<script languaje="javascript">
			    alert('Debe seleccionar un Idioma');
			    <?php echo "location.href = '../vistas/frm_altahorarios.php?ciudad=$Pciudad&id_sucursal=$Pid_sucursal';"; ?>
				</script>
			<?php
			}
			else
			{
				if (isset($_POST['opcionsala'])) {
					$valoropcionsala = $_POST['opcionsala'];
					if ($valoropcionsala == "") {
						?>
						<script languaje="javascript">
					    alert('Debe seleccionar una Sala');
					    <?php echo "location.href = '../vistas/frm_altahorarios.php?ciudad=$Pciudad&id_sucursal=$Pid_sucursal';"; ?>
						</script>
					<?php
					}
					else
					{
						if (isset($_POST['opcionhora'])) {
							$valoropcionhora = $_POST['opcionhora'];
							if ($valoropcionhora == "") {
								?>
									<script languaje="javascript">
								    alert('Debe seleccionar una Hora');
								    <?php echo "location.href = '../vistas/frm_altahorarios.php?ciudad=$Pciudad&id_sucursal=$Pid_sucursal';"; ?>
									</script>
								<?php
							}
							else
							{
								if (isset($_POST['opcionminutos'])) {
									$valoropcionminutos = $_POST['opcionminutos'];
									if ($valoropcionminutos == "") {
										?>
											<script languaje="javascript">
										    alert('Debe seleccionar los Minutos');
										    <?php echo "location.href = '../vistas/frm_altahorarios.php?ciudad=$Pciudad&id_sucursal=$Pid_sucursal';"; ?>
											</script>
										<?php
									}
									else
									{
										date_default_timezone_set("America/Mazatlan");
			                		 	$fechaActual = date("Y-m-d");
			                		 	//FORMATO: Fecha y Hora:  $fecha = date("Y-m-d H:i:s");
			                		 	$fechaEstreno = $_POST['fechaEstreno'];

			                		 	$Horario = $valoropcionhora. ":" .$valoropcionminutos;

			                		 	if ($fechaEstreno >= $fechaActual) {

											$query = "INSERT INTO horarios (id_pelicula, hora, fecha, idioma, sala, id_sucursal, ciudad) VALUES ('$valoropcionpelicula','$Horario','$fechaEstreno', '$valoropcionidioma', '$valoropcionsala', '$Pid_sucursal', '$Pciudad')";

											$result = pg_query($query);

											?>
												<script languaje="javascript">
												    alert('Se registro el Horario Correctamente.');
												    <?php echo "location.href = '../vistas/frm_altahorarios.php?ciudad=$Pciudad&id_sucursal=$Pid_sucursal';"; ?>
												</script>
											<?php
			                		 	}
			                		 	else
			                		 	{
			                		 		?>
												<script languaje="javascript">
												    alert('Debe seleccionar una fecha Válida.');
												    <?php echo "location.href = '../vistas/frm_altahorarios.php?ciudad=$Pciudad&id_sucursal=$Pid_sucursal';"; ?>
												</script>
											<?php
			                		 	}//fin fecha
									}
								}//fin_ocion minutos
							}
						}//fin_ocion hora
					}
				}//fin_ocion sala
			}
		}//fin_opcion idioma
	}
}//fin_opcion peliculas

?>
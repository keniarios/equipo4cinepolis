<?php

require_once ('../bd/conexion.php'); $conexion = conectarBD();

if (isset($_POST['opcionCiudad'])) 
{
	$valorCiudad = $_POST['opcionCiudad'];

	if ($valorCiudad == "") 
	{
	?>
		<script languaje="javascript">
		    alert('Debe seleccionar una Ciudad');
		    location.href = "../vistas/frm_altaprecios.php";
		</script>
	<?php
	}
	else
	{
		if (isset($_POST['opcionCine'])) {
			$valorCine = $_POST['opcionCine'];

			if ($valorCine == "") {
			?>
				<script languaje="javascript">
				    alert('Debe seleccionar un Cine');
				    location.href = "../vistas/frm_altaprecios.php";
				</script>
			<?php
			}



			$ciudad = $_POST['opcionCiudad'];
			$id_cine = $_POST['opcionCine'];
			$tiposala = $_POST['tipoSala'];
			$adultoprimerrango = $_POST['adultoprimerrango'];
			$terceraedadprimerrango = $_POST['terceraedadprimerrango'];
			$ninosprimerrango = $_POST['ninosprimerrango'];
			$adultosegundorango = $_POST['adultosegundorango'];
			$terceraedadsegundorango = $_POST['terceraedadsegundorango'];
			$ninossegundorango = $_POST['ninossegundorango'];

			

			$linktrailer = "Vacio";

			$query = "INSERT INTO precioboletos (id_sucursal, tiposala, adultoprimerrango, terceraedadprimerrango, ninosprimerrango, adultosegundorango, terceraedadsegundorango, ninossegundorango, nombreciudad) VALUES ('$id_cine', '$tiposala', '$adultoprimerrango', '$terceraedadprimerrango', '$ninosprimerrango', '$adultosegundorango', '$terceraedadsegundorango', '$ninossegundorango','$ciudad')";
				pg_query($query);
				?>
					<script languaje="javascript">
					    alert('Precios registrados con Exito!');
					    location.href = "../vistas/frm_altaprecios.php";
					</script>
				<?php

		}
	}	
}


?>
<?php
require_once ('../bd/conexion.php'); $conexion = conectarBD();

	$Vposicion = $_POST['posicion'];
	$result = pg_query("SELECT posicion FROM slider WHERE posicion='$Vposicion'");

	if ($row = pg_fetch_array($result)) 
	{
?>
		<script languaje="javascript">
			<?php echo "alert('La posicion ya existe!.');";?>
			location.href = "../vistas/frm_admincarrusel.php";
		</script>

<?php
	}
	else
	{
		$rutaBig="img/vistaCliente/slider/banner";
		$archivoBig=$_FILES['imagenBanner']['tmp_name'];
		$nombreArchivoBig=$_FILES['imagenBanner']['name'];
		move_uploaded_file($archivoBig, '../'.$rutaBig."/".$nombreArchivoBig);
		$rutaBig=$rutaBig."/".$nombreArchivoBig;

		$rutaMovil="img/vistaCliente/slider/movil";
		$archivoMovil=$_FILES['imagenMovil']['tmp_name'];
		$nombreArchivoMovil=$_FILES['imagenMovil']['name'];
		move_uploaded_file($archivoMovil, '../'.$rutaMovil."/".$nombreArchivoMovil);
		$rutaMovil=$rutaMovil."/".$nombreArchivoMovil;

		$rutaMini="img/vistaCliente/slider/miniSlider";
		$archivoMini=$_FILES['imagenMini']['tmp_name'];
		$nombreArchivoMini=$_FILES['imagenMini']['name'];
		move_uploaded_file($archivoMini, '../'.$rutaMini."/".$nombreArchivoMini);
		$rutaMini=$rutaMini."/".$nombreArchivoMini;



		$query = "INSERT INTO slider (titulo, rutaimagenbanner, rutaimagenmovil, rutaimagenmini, posicion) VALUES ('$_POST[titulo]', '$rutaBig', '$rutaMovil', '$rutaMini', '$_POST[posicion]')";
		pg_query($query);
		
?>
			<script languaje="javascript">
			    alert('Imagen Subida con Exito!');
			    location.href = "../vistas/frm_admincarrusel.php";
			</script>
<?php
	}

pg_close($conexion);
?>
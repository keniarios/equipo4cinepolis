
<?php
/*
$f = $_FILES['imagen']['tmp_name'];

include ('bd/e.php'); $conexion = conectarBD();

$h = pg_escape_bytea($f);

$query= "INSERT INTO prueba (foto) VALUES ('$h')";

pg_query($query); 



?>
					<script languaje="javascript">
					    //alert('Foto registrada con Exito!');
					    location.href = "foto.html";
					</script>

				<?php

				*/


include ('../bd/e.php'); $conexion = conectarBD();
$ruta = "../img/cartelera";
$archivo=$_FILES['imagen']['tmp_name'];
$nombreArchivo=$_FILES['imagen']['name'];
move_uploaded_file($archivo,$ruta."/".$nombreArchivo);
$ruta=$ruta."/".$nombreArchivo;

$query= "INSERT INTO prueba (foto) VALUES ('$ruta')";
pg_query($query);

?>
					<script languaje="javascript">
					    alert('Foto registrada con Exito!');
					    location.href = "../vistas/mostrar.php";
					</script>

				<?php

?>
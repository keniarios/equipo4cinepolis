<?php
    include ('../../bd/conexion.php'); $conexion = conectarBD();

    $V_idPelicula = $_POST['idPelicula'];

    $result = pg_query("SELECT id_pelicula, idiomaespanol, idiomaingles, subtituloespanol, subtituloingles, pelicula3d, idiomaespanol3d, idiomaingles3d, subtituloespanol3d, subtituloingles3d FROM peliculas WHERE id_pelicula='$V_idPelicula' ORDER BY titulo");


    echo "<option value=''>Seleccione</option>";

	while ($datos=pg_fetch_array($result)) {
    	$ID = $datos['id_pelicula'];
    	$idiomaespanol = $datos['idiomaespanol'];
		$idiomaingles = $datos['idiomaingles'];
		$subtituloespanol = $datos['subtituloespanol'];
		$subtituloingles = $datos['subtituloingles'];
		$pelicula3d = $datos['pelicula3d'];
		$idiomaespanol3d = $datos['idiomaespanol3d'];
		$idiomaingles3d = $datos['idiomaingles3d'];
		$subtituloespanol3d = $datos['subtituloespanol3d'];
		$subtituloingles3d = $datos['subtituloingles3d'];
	}

	if ($idiomaespanol == 1) {
		$Español = "Español";
		echo "<option value='".$Español."'>".$Español."</option>";
	}
	if ($idiomaingles == 1) {
		$Ingles = "Ingles";
		echo "<option value='".$Ingles."'>".$Ingles."</option>";
	}

	if ($subtituloespanol == 1) {
		$SubEspañol = "Sub. Español";
		echo "<option value='".$SubEspañol."'>".$SubEspañol."</option>";
	}

	if ($subtituloingles == 1) {
		$SubIngles = "Sub. Ingles";
		echo "<option value='".$SubIngles."'>".$SubIngles."</option>";
	}

	if ($pelicula3d==1) {
		if ($idiomaespanol3d == 1) {
			$Español3D = "Español 3D";
		echo "<option value='".$Español3D."'>".$Español3D."</option>";
		}

		if ($idiomaingles3d == 1) {
			$Ingles3D = "Ingles 3D";
			echo "<option value='".$Ingles3D."'>".$Ingles3D."</option>";
		}

		if ($subtituloespanol3d == 1) {
			$SubEspañol3D = "Sub. Español 3D";
			echo "<option value='".$SubEspañol3D."'>".$SubEspañol3D."</option>";
		}

		if ($subtituloingles3d == 1) {
			$SubIngles3D = "Sub. Ingles 3D";
			echo "<option value='".$SubIngles3D."'>".$SubIngles3D."</option>";
		}
	}
?>
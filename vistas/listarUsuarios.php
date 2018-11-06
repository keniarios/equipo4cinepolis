<?php

session_start();
if(!isset($_SESSION['id_registropersonal'])) 
{
  header('Location: frm_admin_login.php');
}

$idusuariosesion = $_SESSION['id_registropersonal'];
$correo = $_SESSION['correo'];
$nombre = $_SESSION['nombre'];
$appaterno = $_SESSION['appaterno'];
$puesto = $_SESSION['puesto'];

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php include("header/encabezado2.php"); ?>

<div id="cargando">
		
	</div>
		<div id="alertaEliminar">
			
		</div>
			<div class="col-md-12">
				<form id="formEditarUsuarios" action="editarUsuario.php" method="post" accept-charset="utf-8">
					<table class="table" style="font-size: 9pt;">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Nombre Completo</th>
						      <th scope="col">Correo</th>
						      <th scope="col">FechaNacimiento</th>
						      <th scope="col">Télefono/Celular</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
								try{
							  		require_once ('../bd/conexion.php'); $conexion = conectarBD();
									
									$query = "SELECT * FROM registrocinepolisid";

									$result = pg_query($query); 

									//$comando->pg_fetch_object($id_registropersonal_T,$numeroempleado_T, $nombre_T, $appaterno_T, $apmaternoo_T, $correo_T, $telefono_T, $puesto_T);

									$Contador=1;
									while ($obj = pg_fetch_object($result))
									{
										$NombreCompleto = $obj->nombre . " " . $obj->apellidopaterno. " " . $obj->apellidomaterno;

											$FechaNacimiento = $obj->dianacimiento . "/" . $obj->mesnacimiento. "/" . $obj->anonacimiento;
										echo "
										  		<tr class='lista'>
										  			<th scope='row'>$Contador</th>
										  			<td>$NombreCompleto</td>
										      		<td>$obj->correo</td>
										      		<td>$FechaNacimiento</td>
										      		<td>$obj->telefono</td>	
										      		<td><input type='text' name='IDUsuario' value='$obj->id_cinepolisid' hidden></td>
										      		<td width='95' height='79'>
										      		<input type='submit' id='$obj->id_cinepolisid' class='btn btn-info btn-sm' value='Editar' style='display:none'></td>
										      		<td width='95' height='79'><input type='button' id='$obj->id_cinepolisid'  class='btn btn-danger btn-sm' onclick='alertaEliminar(id)' value='Eliminar' style='display:none'></td>
										    	</tr>
											";
										$Contador++;
									}
								}
								catch(Exception $e){
									echo json_encode("Error de conexion a la base de datos.");
								}
							?>
						  </tbody>
					</table>
				</form>		
			</div>
</body>
<?php include "footer/footer.php" ;?>
</html>
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

 <?php
    $Pciudad = $_GET['ciudad'];

    include ('../bd/conexion.php'); $conexion = conectarBD();
    $result =pg_query("SELECT id_sucursal, nombre FROM altasucursal WHERE estatus=1 AND ciudad='$Pciudad' ORDER BY nombre");
 ?>

<!DOCTYPE html>
<html>
<?php include('header/encabezado2.php'); ?>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body style="background-color: #EBECEF;">

<div class="panel panel-default" >
	  <div class="panel-heading" id="cab-panel" style="margin-top: 35px;">
	    <label class="panel-title" style="color:black;font-size:20px;">ALTAS DE HORARIOS</label>
	  </div>

	<div class="panel-body" id="cuerpoform" style="margin-bottom: 35px;">
		<div class="row">
				<div class="col-xs-9 col-sm-9 col-md-9">
				<div class="form-group"><br><label style="font-weight: bold;">Seleccione el Ciné</label>
					<table style="margin: auto; width: 200px;">
						<?php
						while ($datos=pg_fetch_array($result)) {
                                $id_sucursal = $datos['id_sucursal'];
								$nombre = $datos['nombre'];
								echo "
						<tr>
							<td>
								<div class='col2' style='text-decoration: none;  color: none; margin-top: 15px;color: black;border: solid 1px #e1e3e6;width: 200%; background: #fbcf4c;background-image: -webkit-linear-gradient(top, #fbcf4c 0%, #deb22f 100%)'>
									<a href='frm_altahorarios.php?ciudad=$Pciudad&id_sucursal=$id_sucursal' class='btn btnEnviar btnVerCartelera' style='font-weight: bold; color: black; font-size: 14px; width: 100%;'>$nombre</a>
								</div>
							</td>
						</tr>
							";
						}
						?>
					</table>
	    		</div>
		   	</div>
		</div><!--fin_row-->
    </div>
</div>

</body>
<?php include('footer/footer.php'); ?>
</html>
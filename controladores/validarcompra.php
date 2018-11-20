<?php
include ('../bd/conexion.php'); $conexion = conectarBD();

	//Creamos sesión
    session_start();
	if(!isset($_SESSION['id_horario'])) 
	{
	  header('Location: ../index.php');
	}
	$id_horario = $_SESSION['id_horario'];
	$Cedad3era = $_SESSION['edad3era'];
	$Cadulto = $_SESSION['adulto'];
	$Cninos = $_SESSION['ninos'];
	$precioTotal3raEdad = $_SESSION['precioTotal3raEdad'];
	$precioTotalAdulto = $_SESSION['precioTotalAdulto'];
	$precioTotalNino = $_SESSION['precioTotalNino'];

	/*$id_horario = $_GET['id_horario'];
	$Cedad3era = $_GET['edad3era'];
	$Cadulto = $_GET['adulto'];
	$Cninos = $_GET['ninos'];
	$precioTotal3raEdad = $_GET['precioTotal3raEdad'];
	$precioTotalAdulto = $_GET['precioTotalAdulto'];
	$precioTotalNino = $_GET['precioTotalNino'];*/

	$Total = $precioTotal3raEdad + $precioTotalAdulto + $precioTotalNino;


if (isset($_POST['cboSMS'])) {
	$valorcobroSMS = $_POST['cboSMS'];
	$telefono = $_POST['txtCustPhone'];

	if ($valorcobroSMS == "" || $telefono=="") {
		
	}
	else{
		$Total = $Total + 1.5;
	}
}//fin_validacion cboSMS


if (isset($_POST['chkTerms'])) {

	$nombretarjetahambiente = mb_convert_case($_POST['txtCardName'], MB_CASE_TITLE, "UTF-8");
	$numerotarjetafrente = $_POST['txtCardNumber'];
	$clavetarjeta = $_POST['txtCardCVCNumber'];
	$correo = strtoupper($_POST['txtEmail']);
	$telefono = $_POST['txtCustPhone'];
	$tarjetaCinepolisID = $_POST['txtLoyaltyCardNumber'];

	if (empty($numerotarjetafrente)) {

		//PASAR A CONFIRMAR COMPRA
		$result = pg_query("SELECT id_tarjeta, dinerodisponible FROM tarjetasbanco TB INNER JOIN paypal PP ON TB.numerotarjetafrente=PP.numerotarjetafrente WHERE correo='$correo'");

		$datos=pg_fetch_array($result);
		$id_tarjeta = $datos['id_tarjeta'];
		$dinerodisponible = $datos['dinerodisponible'];

		if (empty($id_tarjeta)) {

			echo "
				<script languaje='javascript'>
				    alert('El usuario no Existe!');
				    location.href = '../haztupago.php';
				    
				</script>
				";
		}
		else{
			if ($dinerodisponible >= $Total) {
				echo "
				<script languaje='javascript'>
				    location.href = 'valores_Confirmar-Compra.php?id_tarjeta=$id_tarjeta&total=$Total';
				</script>
				";
			}else{
				echo "
				<script languaje='javascript'>
				    alert('Saldo Insuficiente.');
				    location.href = '../haztupago.php';
				</script>
				";
			}
		}
	}
	else
	{
		//APARTADO TARJETA Y CORREO
		if (isset($_POST['dropCardExpiryMonth'])) 
		{
			$valorMes = $_POST['dropCardExpiryMonth'];

			if ($valorMes == "") 
			{
			?>
				<script languaje="javascript">
				    alert('Debe seleccionar un Mes');
				    <?php
				    	echo "location.href = '../haztupago.php';";
				    ?>
				</script>
			<?php
			}
			else
			{
				if (isset($_POST['dropCardExpiryYear'])) {
					$valorAño = $_POST['dropCardExpiryYear'];

					if ($valorAño == "") {
					?>
						<script languaje="javascript">
						    alert('Debe seleccionar un Año');
						    <?php
						    	echo "location.href = '../haztupago.php';";
						    ?>
						</script>
					<?php
					}
					else{

						if (isset($_POST['dropCardType'])) {
							$valorTipoTarjeta = $_POST['dropCardType'];

							if ($valorTipoTarjeta == "") {
							?>
								<script languaje="javascript">
								    alert('Debe seleccionar el Tipo de Tarjeta.');
								    <?php
								    	echo "location.href = '../haztupago.php';";
								    ?>
								</script>
							<?php
							}
							else{
								//resto contenido
								if (empty($nombretarjetahambiente) || empty($clavetarjeta)) {
									echo "
										<script languaje='javascript'>
										    alert('Es obligatorio llenar los campos: Nombre del tarjetahabiente y Código de seguridad de la tarjeta.');
										    location.href = '../haztupago.php';
										</script>
									";
								}
								else{

									/*$result = pg_query("SELECT id_tarjeta, dinerodisponible  FROM tarjetasbanco WHERE numerotarjetafrente='$numerotarjetafrente' AND ");*/
									$result = pg_query("SELECT id_tarjeta, dinerodisponible  FROM tarjetasbanco WHERE numerotarjetafrente='$numerotarjetafrente' AND numerotarjetareverso='$clavetarjeta' AND tipotarjeta='$valorTipoTarjeta' AND nombre='$nombretarjetahambiente'");

									$datos=pg_fetch_array($result);
									$id_tarjeta = $datos['id_tarjeta'];
									$dinerodisponible = $datos['dinerodisponible'];

									if (empty($id_tarjeta)) {
										echo "
										<script languaje='javascript'>
										    alert('Tarjeta Invalida!');
										    location.href = '../haztupago.php';
										</script>
										";
									}
									else{
										if ($dinerodisponible >= $Total) {
											echo "
											<script languaje='javascript'>
											    location.href = 'valores_Confirmar-Compra.php?id_tarjeta=$id_tarjeta&total=$Total';
											</script>
											";
										}
										else{
											echo "
											<script languaje='javascript'>
											    alert('Saldo Insuficiente!');
											    location.href = '../haztupago.php';
											</script>
											";
										}
									}//fin validacion if ($id_tarjeta > 0)
								}//fin validacion empty($nombretarjetahambiente) || empty($clavetarjeta)
							}
						}
					}
				}
			}
		}
		
	}
}//fin validacion_chkTerms
else{
	echo "
	<script languaje='javascript'>
	    alert('Debe de Aceptar Términos y Condiciones y Aviso de Privacidad.');
	    location.href = '../haztupago.php';
	</script>
	";
}

?>
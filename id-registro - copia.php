<!DOCTYPE html>
<html>
<head>
	<title>Cinépolis</title>

	<!--<link rel="icon" type="image/x-icon" href="https://static.cinepolis.com/favicon.ico">-->
<link rel="icon" type="image/x-icon" href="../img/vistaCliente/iconos/favicon.ico">

<!--<link rel="apple-touch-icon-precomposed" href="https://static.cinepolis.com/img/logo-icons/icon-57x57.png">-->
<link rel="apple-touch-icon-precomposed" href="../img/vistaCliente/icon-57x57.png">

<!--<link rel="apple-touch-icon-precomposed" sizes="72x72" href="https://static.cinepolis.com/img/logo-icons/icon-72x72.png">-->
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../img/vistaCliente/icon-72x72.png">
<!--<link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://static.cinepolis.com/img/logo-icons/icon-114x114.png">-->
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../img/vistaCliente/icon-114x114.png">

	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<link href="../css/vistasCliente/master5.css" rel='stylesheet' type='text/css' />
	<link href="../css/vistasCliente/master-id.css" rel='stylesheet' type='text/css' />
	<script type="text/javascript" src="../js/vistasCliente/alertify.min.js" ></script>
	<script type="text/javascript" src="../js/vistasCliente/registro.js" ></script>
	<script type="text/javascript" src="../js/vistasCliente/Validaciones.js" ></script>

	<style type="text/css">

	body {
	    background: url("../img/vistaCliente/fondo-id.jpg") no-repeat center center;
	    background-size: cover;
	    height: 100%;
	}
	body .header-cinepolis-id {
	  background: #0b5ba0;
	  margin-bottom: 1.8%;
	  padding: 1%;
	  text-align: center;
	}
	body .header-cinepolis-id a {
	  display: block;
	  margin: 0 auto;
	  max-width: 120px;
	  width: 100%;
	}
	body .header-cinepolis-id a img {
	  width: 100%;
	}
	</style>
</head>
<script>
	function valida(e)
	{
	    tecla = (document.all) ? e.keyCode : e.which;
	    if (tecla==8){
	        return true;
	    }
	    patron =/[0-9]/;
	    tecla_final = String.fromCharCode(tecla);
	    return patron.test(tecla_final);
	}
</script>
<body>
<form method="post" action="../controladores/cinepolisID/registroUsuario.php">
	<div id="cinepolis-id">
		<article class="panel" id="registro">
			<div class="header-cinepolis-id">
				<a href="#">
					<img src="../img/vistaCliente/cinepolis-id-logo.png" id="img_logomaster" alt="Cinépolis ID®">
				</a>
			</div>

			<section>
                    <h1>Registro</h1>
                    <h4>Estás a un paso de acceder a todos los beneficios que Cinépolis<sup>®</sup> ID tiene para ti.</h4>

                    <article class="form">
                        <!-- Nombre + Correo electrónico -->
                        <input type="submit" name="btnConnectFb" value="Registrarme con Facebook" id="btnConnectFb" class="registroFacebook registro">
                        <input type="submit" name="btnConnectTwitter" value="Registrarme con Twitter" id="btnConnectTwitter" class="registro">
                        <input type="submit" name="btnConnectGooglePlus" value="Registrarme con Google+" id="btnConnectGooglePlus" class="registro googleConect">

                        <div class="campo row">
                            <div class="campo id-col4">
                                <label for="">Nombre</label>
                                <input name="txtNombre" type="text" maxlength="50" id="txtNombre" class="nombre" required>
                                <span id="register_content_ucRegistro_rfvNombre" class="validacion" style="display:none;"></span>
                                <span id="register_content_ucRegistro_revNombre" class="validacion" style="display:none;"></span>
                            </div>
                            <div class="campo id-col4">
                                <label for="">Apellido Paterno</label>
                                <input name="txtApellidoPaterno" type="text" maxlength="50" id="txtApellidoPaterno" class="apellidos" required>
                                <span id="register_content_ucRegistro_rfvApellidoPat" class="validacion" style="display:none;"></span>
                                <span id="register_content_ucRegistro_revApellidoPat" class="validacion" style="display:none;"></span>
                            </div>
                            <div class="campo id-col4">
                                <label for="">Apellido Materno</label>
                                <input name="txtApellidoMaterno" type="text" maxlength="50" id="txtApellidoMaterno" class="apellidos" required>
                                <span id="register_content_ucRegistro_RegularExpressionValidator1" class="validacion" style="display:none;"></span>
                            </div>
                        </div>
                        <div class="campo row">
                            <label for="">Cinépolis<sup>®</sup> ID</label>
                            <input name="txtCinepolisID" type="text" id="txtCinepolisID" autocomplete="off" placeholder="Tu dirección de correo electrónico" class="placeholder" required>
                            <span id="register_content_ucRegistro_RequiredFieldValidator3" class="validacion" style="display:none;"></span>
                            <span id="register_content_ucRegistro_RegularExpressionValidator4" class="validacion" style="display:none;"></span>
                        </div>
                        <!-- Verificación -->
                        <div class="campo row">
                            <label for="">Verifica tu Cinépolis<sup>®</sup> ID</label>
                            <input name="txtCinepolisIDVerific" type="text" id="register_content_ucRegistro_txtCinepolisIDVerific" class="noPaste placeholder" autocomplete="off" placeholder="Tu dirección de correo electrónico" rel="Cinépolis® ID" required>
                            <span id="register_content_ucRegistro_RFVConfirmCinepolisID" style="display:none;"></span>
                            <span id="register_content_ucRegistro_REVConfirmCinepolisID" style="display:none;"></span>
                            <span id="register_content_ucRegistro_CVConfirmCinepolisID" style="display:none;"></span>
                        </div>
                        <!-- Contraseña -->
                        <div class="campo row">
                            <label for="">Contraseña</label>
                            <input name="txtPassword" type="password" id="register_content_ucRegistro_txtPassword" class="fortalezaContrasena" autocomplete="off" aria-autocomplete="list" required>
                            <span id="indicadorContrasena" class=""></span>
                            <span id="register_content_ucRegistro_rfvContrasena" class="validacion" style="display:none;"></span>
                        </div>
                        <div class="campo row">
                            <label for="">Repetir contraseña</label>
                            <input name="txtPasswordConfirm" type="password" id="register_content_ucRegistro_txtPasswordConfirm" class="noPaste" autocomplete="off" rel="contraseña" required>
                            <span id="register_content_ucRegistro_rfvConfirmar" class="validacion" style="display:none;"></span>
                            <span id="register_content_ucRegistro_cvConfirmar" class="validacion" style="display:none;"></span>
                        </div>
                        <div class="campo row">
                            <label for="">Tarjeta Club Cinépolis<sup>®</sup></label>
                            <input name="txtTCC" type="text" maxlength="16" id="register_content_ucRegistro_txtTCC" class="tarjeta">
                            <span id="register_content_ucRegistro_revTCC" class="validacion" style="display:none;"></span>
                        </div>
                        <!-- Pregunta seguridad -->
                        <div class="campo row">
                            <label for="">Pregunta de seguridad</label>
                            <div class="" id="uniform-register_content_ucRegistro_ddlPreguntaSecreta" style="width: 899px;"><!--class="selector"-->
                            	<select name="ddlPreguntaSecreta" id="register_content_ucRegistro_ddlPreguntaSecreta" display="None" style="height: 35px; font-family:'Roboto',Helvetica,Arial,sans-serif;background-color:#e1e3e6;border:1px solid rgba(0,0,0,0);margin-top:2px;margin-bottom:15px;-webkit-transition:0.3s all;-moz-transition:0.3s all;-o-transition:0.3s all;-ms-transition:0.3s all;transition:0.3s all; margin-bottom:15px;" required>
								<option value="¿Cómo se llamaba tu primer mascota?">¿Cómo se llamaba tu primer mascota?</option>
								<option value="¿Cuál fue el primer plato que aprendiste a cocinar?">¿Cuál fue el primer plato que aprendiste a cocinar?</option>
								<option value="¿De qué modelo era tu primer auto?">¿De qué modelo era tu primer auto?</option>
								<option value="¿Cómo se llama tu equipo favorito?">¿Cómo se llama tu equipo favorito?</option>
								<option value="¿En qué ciudad se conocieron tus padres?">¿En qué ciudad se conocieron tus padres?</option>
								<option value="¿Cómo se llamaba tu primer jefe?">¿Cómo se llamaba tu primer jefe?</option>
								<option value="¿Cómo se llama la calle donde creciste?">¿Cómo se llama la calle donde creciste?</option>
								<option value="¿Cómo se llama la primera playa a la que fuiste?">¿Cómo se llama la primera playa a la que fuiste?</option>
								<option value="¿Cómo se llamaba el primer álbum que compraste?">¿Cómo se llamaba el primer álbum que compraste?</option>
								<option value="¿Cuál sería tu trabajo ideal?">¿Cuál sería tu trabajo ideal?</option>
								<option value="¿Cuál es tu libro infantil favorito?">¿Cuál es tu libro infantil favorito?</option>
								<option value="¿Cómo se llama el mejor amigo de tu adolescencia?">¿Cómo se llama el mejor amigo de tu adolescencia?</option>
							<option value="¿Cuál fue la primer película que viste en Cinépolis?">¿Cuál fue la primer película que viste en Cinépolis?</option>
							<option value="¿A dónde fuiste la primera vez que viajaste en avión?">¿A dónde fuiste la primera vez que viajaste en avión?</option>
							</select></div>
                            <span id="register_content_ucRegistro_rfvPreguntaSecreta" class="validacion" style="display:none;"></span>
                        </div>
                        <br>
                        <div class="campo row">
                            <label for="">Respuesta</label>
                            <input name="txtRespuestaPregSecret" type="text" id="register_content_ucRegistro_txtRespuestaPregSecret" required>
                            <span id="register_content_ucRegistro_RequiredFieldValidator5" class="validacion" style="display:none;"></span>
                            <span id="register_content_ucRegistro_RegularExpressionValidator5" class="validacion" style="display:none;"></span>
                        </div>
                        <!-- Pregunta seguridad -->
                        <div class="campo row">
                            <label for="">Fecha de nacimiento</label>
                            <div class="row">
                                <div class="id-col4">
                                    <div class="" id="uniform-ddlDia" style="width: 315px;"><!--class="selector"-->
                                    	<select name="ddlDia" id="ddlDia" style="width: 270px; height: 30px; font-family:'Roboto',Helvetica,Arial,sans-serif;background-color:#e1e3e6;border:1px solid rgba(0,0,0,0);height:33px;margin-top:2px;margin-bottom:15px;-webkit-transition:0.3s all;-moz-transition:0.3s all;-o-transition:0.3s all;-ms-transition:0.3s all;transition:0.3s all; margin-bottom:15px;" required>
										<option value="">Día</option>
										<option value="01">01</option>
										<option value="02">02</option>
										<option value="03">03</option>
										<option value="04">04</option>
										<option value="05">05</option>
										<option value="06">06</option>
										<option value="07">07</option>
										<option value="08">08</option>
										<option value="09">09</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
										<option value="13">13</option>
										<option value="14">14</option>
										<option value="15">15</option>
										<option value="16">16</option>
										<option value="17">17</option>
										<option value="18">18</option>
										<option value="19">19</option>
										<option value="20">20</option>
										<option value="21">21</option>
										<option value="22">22</option>
										<option value="23">23</option>
										<option value="24">24</option>
										<option value="25">25</option>
										<option value="26">26</option>
										<option value="27">27</option>
										<option value="28">28</option>
										<option value="29">29</option>
										<option value="30">30</option>
										<option value="31">31</option>

									</select></div>
                                    <span id="register_content_ucRegistro_RequiredFieldValidator6" class="validacion" style="display:none;"></span>
                                </div>
                                <div class="id-col4">
                                    <div class="" id="uniform-ddlMes" style="width: 315px;">
                                    	<select name="ddlMes" id="ddlMes" style="width: 270px; height: 30px; font-family:'Roboto',Helvetica,Arial,sans-serif;background-color:#e1e3e6;border:1px solid rgba(0,0,0,0);height:33px;margin-top:2px;margin-bottom:15px;-webkit-transition:0.3s all;-moz-transition:0.3s all;-o-transition:0.3s all;-ms-transition:0.3s all;transition:0.3s all; margin-bottom:15px;" required><!--class="selector"-->
										<option value="0">Mes</option>
										<option value="1">Enero</option>
										<option value="2">Febrero</option>
										<option value="3">Marzo</option>
										<option value="4">Abril</option>
										<option value="5">Mayo</option>
										<option value="6">Junio</option>
										<option value="7">Julio</option>
										<option value="8">Agosto</option>
										<option value="9">Septiembre</option>
										<option value="10">Octubre</option>
										<option value="11">Noviembre</option>
										<option value="12">Diciembre</option>

									</select></div>
                                    <span id="register_content_ucRegistro_RequiredFieldValidator1" class="validacion" style="display:none;"></span>
                                </div>
                                <div class="id-col4">
                                    <div class="" id="uniform-ddlAnio" style="width: 315px;">
                                    	<select name="ddlAnio" id="ddlAnio" style="width: 270px; height: 30px; font-family:'Roboto',Helvetica,Arial,sans-serif;background-color:#e1e3e6;border:1px solid rgba(0,0,0,0);height:33px;margin-top:2px;margin-bottom:15px;-webkit-transition:0.3s all;-moz-transition:0.3s all;-o-transition:0.3s all;-ms-transition:0.3s all;transition:0.3s all; margin-bottom:15px;" required><!--class="selector"-->
										<option value="0">Año</option>
										<option value="2003">2003</option>
										<option value="2002">2002</option>
										<option value="2001">2001</option>
										<option value="2000">2000</option>
										<option value="1999">1999</option>
										<option value="1998">1998</option>
										<option value="1997">1997</option>
										<option value="1996">1996</option>
										<option value="1995">1995</option>
										<option value="1994">1994</option>
										<option value="1993">1993</option>
										<option value="1992">1992</option>
										<option value="1991">1991</option>
										<option value="1990">1990</option>
										<option value="1989">1989</option>
										<option value="1988">1988</option>
										<option value="1987">1987</option>
										<option value="1986">1986</option>
										<option value="1985">1985</option>
										<option value="1984">1984</option>
										<option value="1983">1983</option>
										<option value="1982">1982</option>
										<option value="1981">1981</option>
										<option value="1980">1980</option>
										<option value="1979">1979</option>
										<option value="1978">1978</option>
										<option value="1977">1977</option>
										<option value="1976">1976</option>
										<option value="1975">1975</option>
										<option value="1974">1974</option>
										<option value="1973">1973</option>
										<option value="1972">1972</option>
										<option value="1971">1971</option>
										<option value="1970">1970</option>
										<option value="1969">1969</option>
										<option value="1968">1968</option>
										<option value="1967">1967</option>
										<option value="1966">1966</option>
										<option value="1965">1965</option>
										<option value="1964">1964</option>
										<option value="1963">1963</option>
										<option value="1962">1962</option>
										<option value="1961">1961</option>
										<option value="1960">1960</option>
										<option value="1959">1959</option>
										<option value="1958">1958</option>
										<option value="1957">1957</option>
										<option value="1956">1956</option>
										<option value="1955">1955</option>
										<option value="1954">1954</option>
										<option value="1953">1953</option>
										<option value="1952">1952</option>
										<option value="1951">1951</option>
										<option value="1950">1950</option>
										<option value="1949">1949</option>
										<option value="1948">1948</option>
										<option value="1947">1947</option>
										<option value="1946">1946</option>
										<option value="1945">1945</option>
										<option value="1944">1944</option>
										<option value="1943">1943</option>
										<option value="1942">1942</option>
										<option value="1941">1941</option>
										<option value="1940">1940</option>
										<option value="1939">1939</option>
										<option value="1938">1938</option>
										<option value="1937">1937</option>
										<option value="1936">1936</option>
										<option value="1935">1935</option>
										<option value="1934">1934</option>
										<option value="1933">1933</option>
										<option value="1932">1932</option>
										<option value="1931">1931</option>
										<option value="1930">1930</option>
										<option value="1929">1929</option>
										<option value="1928">1928</option>
										<option value="1927">1927</option>
										<option value="1926">1926</option>
										<option value="1925">1925</option>
										<option value="1924">1924</option>
										<option value="1923">1923</option>
										<option value="1922">1922</option>
										<option value="1921">1921</option>
										<option value="1920">1920</option>
										<option value="1919">1919</option>
										<option value="1918">1918</option>

									</select></div>
                                    <span id="register_content_ucRegistro_RequiredFieldValidator2" class="validacion" style="display:none;"></span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="campo row">
                            <label for="">Teléfono <span>a 10 digitos (opcional)</span></label>
                            <div class="row">
                                <div class="id-col4">
                                    <input name="txtLada" type="text" id="register_content_ucRegistro_txtLada" class="telefono placeholder" placeholder="Lada"  maxlength="3" onkeypress="return valida(event);" required>
                                    <span id="register_content_ucRegistro_RegularExpressionValidator6" class="validacion" style="display:none;"></span>
                                </div>
                                <div class="id-col8">
                                    <input name="txtTelefono" type="text" maxlength="8" id="register_content_ucRegistro_txtTelefono" class="telefono placeholder" placeholder="Teléfono" onkeypress="return valida(event);" required>
                                    <span id="register_content_ucRegistro_RegularExpressionValidator7" class="validacion" style="display:none;"></span>
                                </div>
                            </div>
                        </div>
                        <!-- Captcha aviso -->
                       <section class="row">
                            <div class="id-col6 aviso-priv">
                                <span class=""><input id="cbRegTerminos" type="checkbox" name="politica"></span>
                                <p>
                                    He leído y acepto la <a target="_blank" href="#">Política de Privacidad</a> Cinépolis<sup>®</sup>.
                                </p>
                            </div>
                        </section>

                        <nav class="linea">
                            <div class="btn-input float-left reg-salir">
                                <a class="btn btn-info" href="index.php" style="border-width: 1px 0 0; color: #fff; height: 30px; font-size: 13px; width: 150px; border-radius: 4px; line-height: 18px;">
                                    <span aria-hidden="true"></span>
                                    Regresar
                                </a>
                            </div>

                            <div class="btn-input float-right">
                                <input type="submit" name="btnRegistrar" value="Registrarme" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$register_content$ucRegistro$btnRegistrar&quot;, &quot;&quot;, true, &quot;registro&quot;, &quot;&quot;, false, false))" id="register_content_ucRegistro_btnRegistrar" class="btn-id">
                                <div id="register_content_ucRegistro_ValidationSummary1" style="display:none;"></div>
                                <span></span>
                            </div>
                        </nav>
                    </article>
                </section>
		</article>
	</div>
</form>
</body>
</html>
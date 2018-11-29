


<!DOCTYPE html>
<html>
<head>
	<title>Cinecash | CinépolisID</title>
	<link href="../../css/vistasCliente/master-id.css" rel='stylesheet' type='text/css' />
	<link href="../../css/vistasCliente/master.css" rel='stylesheet' type='text/css' />
	<link href="../../css/vistasCliente/responsive-master.css" rel='stylesheet' type='text/css' />
	<style>
        #fuAvatar {
            opacity: 0;
            top: 0;
            left: 0;
            position: absolute;
            height: 30px;
            cursor: pointer;
        }
        #fuAvatar::-ms-browse{
            cursor: pointer;
        }   
        #fuAvatar::-webkit-file-upload-button{
            cursor: pointer;
        }   
        .desc-fotoPerfil{
            background-color:#fff;
            -webkit-box-shadow:0 0 5px;
            box-shadow:0 0 5px;
            display:none;
            left:50%;
            margin:0 0 0 -250px;
            max-width:520px;
            padding:4% 2%;
            position:fixed;
            top:28%;
            width:100%;
            z-index:100;
        }
        .desc-fotoPerfil .cerrar-desc{
            color:#13a9ce;
            position:absolute;
            right:6px;
            top:6px;
            z-index:99;
        }
        .desc-fotoPerfil .cerrar-desc:hover{
            color:#0b5ba1
        }
        .desc-fotoPerfil figure{
            padding:11px
        }
        .desc-fotoPerfil h1{
             border-bottom:1px solid #e7e7e7;
             padding-bottom:14px
        }
        .desc-fotoPerfil p{
            margin-bottom:6px
        }
        .desc-fotoPerfil nav p{
            font-weight:800
        }
        .desc-fotoPerfil nav a{
            color:#13a9ce;
            font-size:2em
        }

        #configuracion-perfil section label {
    margin-bottom: 6px;
}

#cinepolis-id label {
    display: block;
    float: none;
    font-weight: normal;
    padding: 0;
    text-align: left;
    width: auto;
}


    </style>
</head>
<body>	

		<!-- Aquí metemos las secciones -->
		<article id="configuracion-perfil" style="margin-top: 30px!important;">
        <!--Modal Ver ActualizarNivel-->
        <article class="desc-fotoPerfil clearfix" style="display: none;">
            <a href="#" class="cerrar-desc id-icon-cerrar"></a>
            <figure class="id-col12 first">
                <img id="imgPerfil" clientidmode="Static" alt="">
            </figure>
            <style type="text/css">
                .btn-id{
                    width: 100%;
                    padding: 6px 10px;
                    background-color: #13a9ce;
                    border-radius: 3px;
                    color: white;
                    border:1px solid #13a9ce;
                    margin-bottom: 5px;
                }

                .ddl-id{
                    width: 110px;
                    padding: 6px 10px;
                    border:1px solid #eaeaea;
                    border-radius: 3px;
                }
            </style>
            
            
        </article>
        <!-- Datos de usuario -->
        <section class="row" id="dato-info-personal">
            <input type="hidden" name="id" value="1">
            <div class="id-col3 img-perfil" style="width: 19%!important">
                <label for="">Avatar</label>
                <figure>
                    <img id="imgAvatar" src="https://static.cinepolis.com/marcas/id/mx/avatar/perfil-generico.jpg">
                </figure>
                <nav>
                    <div style="position: relative;">
                        <input class="btn-id" id="btn-upload" type="submit" value="Selecciona otra foto">
                    </div>
                    
                </nav>
                <nav class="row">
                    <input type="submit" name="ctl00$ctl00$ContentPlaceHolder1$sitio$btnActualizarAvatar" value="Guardar" id="btnActualizarAvatar" class="btn-id">
                </nav>
                
                <div class="loader-avatar" style="display:none;">
                    <div class="loading-wrapper">
                        <div id="loader" class="loading"></div>
                    </div>
                </div>
            </div>
            <div class="id-col8" style="width: 46%!important; margin-top: 25px;">
                <div>
                    <label for="">Nombre(s)</label>
                    <input name="txtNombre" type="text" value="<?php echo $nombre ?>" maxlength="50" id="ContentPlaceHolder1_sitio_txtNombre">
                    <span id="ContentPlaceHolder1_sitio_rfvNombre" class="validacion" style="display:none;"></span>
                    <span id="ContentPlaceHolder1_sitio_revNombre" class="validacion" style="display:none;"></span>
                </div>
                <div class="row">
                    <div class="id-col6">
                        <label for="">Apellido paterno</label>
                        <input name="txtApellidoPaterno" type="text" value="<?php echo $apellidopaterno ?>" maxlength="50" id="ContentPlaceHolder1_sitio_txtApellidoPaterno">
                        <span id="ContentPlaceHolder1_sitio_rfvApellidoPaterno" class="validacion" style="display:none;"></span>
                        <span id="ContentPlaceHolder1_sitio_revApellidoPaterno" class="validacion" style="display:none;"></span>
                    </div>
                    <div class="id-col6">
                        <label for="">Apellido materno</label>
                        <input name="txtApellidoMaterno" type="text" value="<?php echo $apellidomaterno ?>" maxlength="50" id="ContentPlaceHolder1_sitio_txtApellidoMaterno">
                        <span id="ContentPlaceHolder1_sitio_revApellidoMaterno" class="validacion" style="display:none;"></span>
                    </div>
                </div>
                <div>
                    <label for="">Correo electrónico</label>
                    <input name="txtCorreo" type="text" value="<?php echo $correo ?>" maxlength="62" id="ContentPlaceHolder1_sitio_txtCinpolisID" disabled="disabled" class="aspNetDisabled">
                    <span id="rfvCinepolisID" class="validacion" style="display:none;"></span>
                    <span id="ContentPlaceHolder1_sitio_revCinepolisID" class="validacion" style="display:none;"></span>
                </div>
                <div>
                    <label for=""></label>
                    <div class="row">
                        <div class="id-col6" style="margin-left: -30%; width: 40%!important">
                            <label for="">Teléfono</label>
                            <input name="txtCelular" type="text" value="<?php echo '('.$lada.')'.$telefono ?>" id="ContentPlaceHolder1_sitio_txtCelular" style="width: 120px;">
                            <span id="ContentPlaceHolder1_sitio_revCelular" class="validacion" style="display:none;"></span>
                        </div>
                    </div>
                </div>
                <div style="margin-bottom: 10px;">
                    <strong for="">Fecha de nacimiento</strong>
                    <div class="row">
                        <div class="id-col4">
                            <div class="" id="uniform-ddlDia" style="width: 87px;">
                            <select name="ddlDia" id="ddlDia" class="ddl-id">
	<option value="">Día</option>
	<option value="01">1</option>
	<option value="02">2</option>
	<option value="03">3</option>
	<option value="04">4</option>
	<option value="05">5</option>
	<option value="06">6</option>
	<option value="07">7</option>
	<option value="08">8</option>
	<option value="09">9</option>
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
                            <span id="ContentPlaceHolder1_sitio_rfvDia" class="validacion" style="display:none;"></span>
                        </div>
                        <div class="id-col4">
                            <div class="" id="uniform-ddlMes" style="width: 138px;">
                            <select name="ddlMes" id="ddlMes" class="ddl-id">
                        	<option value="">Mes</option>
                        	<option value="01">Enero</option>
                        	<option value="02">Febrero</option>
                        	<option value="03">Marzo</option>
                        	<option value="04">Abril</option>
                        	<option value="05">Mayo</option>
                        	<option value="06">Junio</option>
                        	<option value="07">Julio</option>
                        	<option value="08">Agosto</option>
                        	<option value="09">Septiembre</option>
                        	<option value="10">Octubre</option>
                        	<option value="11">Noviembre</option>
                        	<option value="12">Diciembre</option>

                        </select></div>
                            <span id="ContentPlaceHolder1_sitio_rfvMes" class="validacion" style="display:none;"></span>
                        </div>
                        <div class="id-col4">
                            <div  style="width: 97px;"><select name="ddlAnio" id="ddlAnio"  class="ddl-id" value="<?php echo $anionacimiento ?>">
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

</select>
</div>
                            <span id="ContentPlaceHolder1_sitio_rfvAnio" class="validacion" style="display:none;"></span>
                        </div>
                    </div>
                </div>
                <nav class="row">
                    <div class="btn-input float-right">
                        <input type="submit" value="Guardar" class="btn-id">
                        <div id="ContentPlaceHolder1_sitio_vsConfiguracion" style="display:none;">

</div>
                        <span class="id-icon-flecha-der"></span>
                    </div>
                </nav>
            </div>
        </section>

        <!-- Tarjeta Club Cinépolis -->
        <section class="row" id="dato-tcc" style="display: block;">
            <h3>Tarjeta Club Cinépolis<sup>®</sup></h3>
            <div class="row">
                <div class="id-col8">
                    <input name="ctl00$ctl00$ContentPlaceHolder1$sitio$txtTCC" value="<?php echo $tarjetaclub ?>" type="text" maxlength="16" id="ContentPlaceHolder1_sitio_txtTCC">
                    <span id="ContentPlaceHolder1_sitio_rfvTCC" class="validacion" style="display:none;"></span>
                    <span id="ContentPlaceHolder1_sitio_revTCC" class="validacion" style="display:none;"></span>
                    
                </div>
                <nav class="id-col4 clearfix">
                    <div class="btn-input float-right">
                        <input type="submit" name="ctl00$ctl00$ContentPlaceHolder1$sitio$btnGuardarTCC" value="Guardar" id="ContentPlaceHolder1_sitio_btnGuardarTCC" class="btn-id">
                        <div id="ContentPlaceHolder1_sitio_vsTCC" style="display:none;">

</div>
                        <span class="id-icon-flecha-der"></span>
                    </div>
                </nav>
                <nav class="id-col4 clearfix">
                    <div class="btn-input float-right">
                        <input type="submit" name="ctl00$ctl00$ContentPlaceHolder1$sitio$btnDesvincular" value="Desvincular" id="btnDesvincular" class="btn-id">
                        <span class="id-icon-flecha-der"></span>
                    </div>
                </nav>
            </div>
        </section>


    </article>
</body>
</html>
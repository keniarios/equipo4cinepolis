<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<?php
require_once ('../bd/conexion.php'); $conexion = conectarBD();

$Vcorreo = strtoupper($_POST["correo"]);
$Vcontrasena = $_POST["contrasena"];

$query = "SELECT * FROM registropersonal WHERE correo = '$Vcorreo'";
$result = pg_query($query);

if($row = pg_fetch_array($result))
 {
    //if($row["contrasena"] == $Vcontrasena)
  if(password_verify($Vcontrasena,$row["contrasena"]))
      {
        //Creamos sesión
        session_start();
        //Almacenamos el nombre de usuario en una variable de sesión usuario
        $_SESSION['id_registropersonal'] = $row["id_registropersonal"];
    		$_SESSION['numeroempleado'] = $row["numeroempleado"];
    		$_SESSION['nombre'] = $row["nombre"];
    		$_SESSION['appaterno'] = $row["appaterno"];
    		$_SESSION['apmaterno'] = $row["apmaterno"];
    		$_SESSION['correo'] = $row["correo"];
    		$_SESSION['contrasena'] = $row["contrasena"];
    		$_SESSION['telefono'] = $row["telefono"];
    		$_SESSION['puesto'] = $row["puesto"];

        header("Location: ../vistas/index.php");
      }
      else
      {
?>
        <script languaje="javascript">
          alert("Contraseña Incorrecta");
          location.href = "../vistas/frm_admin_login.php";
        </script>
      <?php
      }
  }
  else
  {
  ?>
      <script languaje="javascript">
        alert("El usuario no existe!");
        location.href = "../vistas/frm_admin_login.php";
      </script>
  <?php
}
//pg_free_result() se usa para liberar la memoria empleada al realizar una consulta
pg_free_result($result);

/*pg_close() se usa para cerrar la conexión a la Base de datos y es 
**necesario hacerlo para no sobrecargar al servidor*/
pg_close();
?>

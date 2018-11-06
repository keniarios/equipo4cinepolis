<?php
	@session_start();
	session_destroy();
	header("Location: ../vistas/frm_admin_login.php");
?>
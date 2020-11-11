<?php

	session_start();
	unset($_SESSION['logueado']);
	header("Location: iniciosesion.php");

?>
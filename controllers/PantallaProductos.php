<?php

// controllers/PantallaProducto.php

require '../framework/framework.php';
require '../models/Usuarios.php';
require '../views/Home.php';

	session_start();
	if(!isset($_SESSION['logueado'])){
		header("Location: login.php");
		exit;
	}

	

	$v->render();
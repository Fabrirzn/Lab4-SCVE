<?php


// controllers/Home.php

require '../framework/framework.php';
require '../models/Usuarios.php';
require '../views/Login.php';
require '../views/Home.php';

	if(!isset($_SESSION['logueado'])){
		$v = header("Location: iniciosesion.php");
		exit;
	}
	else {
		$v = new Home();
	}

$v->render();


?>
<?php


// controllers/Home.php

require '../framework/framework.php';
require '../models/Usuarios.php';
require '../models/Productos.php';
require '../views/Login.php';
require '../views/Home.php';

	if(!isset($_SESSION['logueado'])){
		$v = header("Location: iniciosesion.php");
		exit;
	}
	else {
		$v = new Home();
	}


$p = new Productos();
$todos = $p->getTodos();

$v = new Home();
$v->productos = $todos;
$v->render();


?>
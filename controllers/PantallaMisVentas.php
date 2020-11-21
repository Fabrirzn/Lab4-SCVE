<?php


// controllers/PantallaMisVentas.php

require '../framework/framework.php';
require '../models/Usuarios.php';
require '../models/Productos.php';
require '../views/Login.php';
require '../views/MisVentas.php';


	if(!isset($_SESSION['logueado'])){
		$v = header("Location: iniciosesion.php");
		exit;
	}
	else {
		$v = new MisVentas();
	}

	$p = new Productos();
	$usuario = $_SESSION['usuario'];
	$todosmios = $p->MiosTodos($usuario);




	if(isset($_POST['id'])){
		$auxp = new Productos();

		if($auxp-> existeProducto($_POST['id'])){
			if(!isset($_POST['nombre-producto'])) throw("error Pantalla Producto 1");
			if(!isset($_POST['descripcion'])) throw("error Pantalla Producto 2");
			if(!isset($_POST['precio'])) throw("error Pantalla Producto 3");
			$foto =  $_FILES['prd_foto1'];
			if(!isset($foto)) throw("error 4");

			$result = $auxp->ActualizacionProducto($_POST['id'], $_POST['nombre-producto'], $_POST['descripcion'], $_POST['precio'], $foto );
		}
	}





	$v = new MisVentas();
	$v->productos = $todosmios;

 $v->render();
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




	if(isset($_POST['idProd'])){
		if(($_POST['actualiza'] != 0))
		{
			$auxp = new Productos();

			if($auxp-> existeProducto($_POST['idProd'])){
				$p->id = $_POST['idProd'];
				$p->nombre = $_POST['nombre-producto'];
				$p->descripcion = $_POST['descripcion'];
				$p->precio = $_POST['precio'];
				$foto =  $_FILES['prd_foto1'];	
				$result = $auxp->ActualizacionProducto($p->id, $p->nombre, $p->descripcion , $p->precio, $foto );
			}
		}
		
	}

		if(isset($_POST['idProd'])){
		if(($_POST['Elimina'] != 0))
		{
			$auxp = new Productos();

			if($auxp-> existeProducto($_POST['idProd'])){
				$p->id = $_POST['idProd'];	
				$result = $auxp->EliminarProducto($p->id);
			}
		}
		
	}


	$v = new MisVentas();
	$v->productos = $todosmios;

 $v->render();
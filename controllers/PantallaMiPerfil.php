<?php


// controllers/PantallaMisVentas.php

require '../framework/framework.php';
require '../models/Usuarios.php';
require '../models/Productos.php';
require '../views/Login.php';
require '../views/MiPerfil.php';


	if(!isset($_SESSION['logueado'])){
		$v = header("Location: iniciosesion.php");
		exit;
	}
	else {
		$v = new MiPerfil();
	}

	$u = new Usuarios();
	$usuario = $_SESSION['usuario'];
	$Datos = $u->MisDatos($usuario);

		if(isset($_POST['idUsu'])){
		if(($_POST['actualizar'] != 0))
		{
				$u->id = $_POST['idUsu'];
				$u->nombre = $_POST['nombre-usuario'];
				$u->apellido = $_POST['apellido'];
				$u->dni = $_POST['dni'];	
				$u->telefono = $_POST['telefono'];	
				$u->direccion = $_POST['direccion'];	
				$result = $u->ActualizarPerfil($u->id, $u->nombre, $u->apellido , $u->dni, $u->telefono, $u->direccion );
		}
		
	}



	$v = new MiPerfil();
	$v->usuarios = $Datos;

	$v->render();
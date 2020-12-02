<?php

// controllers/altausuarios.php

require '../framework/framework.php';
require '../models/Usuarios.php';
require '../views/registrarse.php';
require '../views/AltaUsuarioOk.php';


	if(isset($_POST['Contrasenia']) and isset($_POST['Contrasenia2']) and $_POST['Usuario'])
	{
		if($_POST['Contrasenia'] != '' and $_POST['Contrasenia2'] != '' and $_POST['Usuario'] != ''){
			$us = new Usuarios;

		if(!isset($_POST['Nombre'])) throw("error altausuario 1");
		if(!isset($_POST['Apellido'])) throw ("error altausuario 2");
		if(!isset($_POST['DNI'])) throw ("error altausuario 3");
		if(!isset($_POST['Telefono'])) throw ("error altausuario 4");
		if(!isset($_POST['Direccion'])) throw ("error altausuario 5");

		$us->crearUsuario($_POST['Nombre'], $_POST['Apellido'], $_POST['Usuario'], $_POST['DNI'], $_POST['Telefono'], $_POST['Direccion'], $_POST['Contrasenia'], $_POST['Contrasenia2'] );
			
		$v = new AltaUsuarioOk();
		}
		

	}
	else{
		$v = new registrarse();
	}


$v->render();
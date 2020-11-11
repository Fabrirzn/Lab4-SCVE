<?php

// controllers/altausuarios.php

require '../framework/framework.php';
require '../models/Usuarios.php';
require '../views/registrarse.php';
require '../views/AltaUsuarioOk.php';

if (count($_POST)>0){
	$us = new Usuarios;

	if(!isset($_POST['Nombre'])) die("error altausuario 1");
	if(!isset($_POST['Apellido'])) die("error altausuario 2");
	if(!isset($_POST['Usuario'])) die("error altausuario 3");
	if(!isset($_POST['DNI'])) die("error altausuario 4");
	if(!isset($_POST['Telefono'])) die("error altausuario 5");
	if(!isset($_POST['Direccion'])) die("error altausuario 6");
	if(!isset($_POST['Contrasenia'])) die("error altausuario 7");
	if(!isset($_POST['Contrasenia2'])) die("error altausuario 8");

	$us->crearUsuario($_POST['Nombre'], $_POST['Apellido'], $_POST['Usuario'], $_POST['DNI'], $_POST['Telefono'], $_POST['Direccion'], $_POST['Contrasenia'], $_POST['Contrasenia2']  );

	$v = new AltaUsuarioOk();

}else{
	$v = new registrarse();
}

$v->render();
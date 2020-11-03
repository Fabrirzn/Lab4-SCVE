<?php

// models/Usuarios.php

class Usuarios extends Model{

	public function crearUsuario ($nombre, $apellido, $usuario, $dni, $telefono, $direccion, $contrasenia){

		if(strlen($_POST['Nombre']) < 1) die("error usuario 1"); //asumo un javascript del lado cliente que hace esto
		$_POST['Nombre'] = substr($_POST['Nombre'], 0, 50);
		//$_POST['Nombre'] = mysqli_escape_string($_POST['Nombre']);
		$nombre = $_POST['Nombre'];

		if(strlen($_POST['Apellido']) < 1) die("error usuario 2"); 
		$_POST['Apellido'] = substr($_POST['Apellido'], 0, 50);
	//	$_POST['Apellido'] = mysqli_escape_string($_POST['Apellido']);
		$apellido = $_POST['Apellido'];

		if(strlen($_POST['Usuario']) < 1) die("error usuario 3"); 
		$_POST['Usuario'] = substr($_POST['Usuario'], 0, 50);
		//$_POST['Usuario'] = mysqli_escape_string($_POST['Usuario']);
		$usuario = $_POST['Usuario'];

		if(!is_numeric($_POST['DNI'])) die("error usuario 4");
			if($_POST['DNI'] < 1) die("error usuario 5");
			$dni = $_POST['DNI'];

		if(!is_numeric($_POST['Telefono'])) die("error usuario 6");
			if($_POST['Telefono'] < 1) die("error usuario 7");
			$telefono = $_POST['Telefono'];

		if(strlen($_POST['Direccion']) < 1) die("error usuario 8"); 
		$_POST['Direccion'] = substr($_POST['Direccion'], 0, 50);
		//$_POST['Direccion'] = mysqli_escape_string($_POST['Direccion']);
		$direccion = $_POST['Direccion'];

		if(strlen($_POST['Contrasenia']) < 1) die("error usuario 9"); 
		$_POST['Contrasenia'] = substr($_POST['Contrasenia'], 0, 50);
		//$_POST['Contrasenia'] = mysqli_escape_string($_POST['Contrasenia']);
		$contrasenia = $_POST['Contrasenia'];





		$this->db->query("INSERT INTO usuario (nombre, apellido, usuario, dni, telefono, direccion, password) 
										VALUES ('$nombre', '$apellido', '$usuario', '$dni', '$telefono', '$direccion', '$contrasenia')");
	}

	public function IniciarSesion ($usuario, $contr){

		session_start();
		
		if(strlen($_POST['usuario']) < 1) die("error usuario sesion 1 "); 
		$_POST['usuario'] = substr($_POST['usuario'], 0, 50);
	//	$_POST['usuario'] = mysqli_escape_string($_POST['usuario']);
		$usuario = $_POST['usuario'];

		if(strlen($_POST['pass']) < 1) die("error usuario sesion 2"); 
		$_POST['pass'] = substr($_POST['pass'], 0, 50);
	//	$_POST['pass'] = mysqli_escape_string($_POST['pass']);
		$password = $_POST['pass'];

		$this->db->query("SELECT * FROM usuario WHERE usuario = '$usuario' and password = '$password' LIMIT 1");

			if(!$this->db->numRows() == 1 ){
			$_SESSION['logueado'] = true;
			$fila = $this->db->fetch();
			$_SESSION['usuario'] = $fila['usuario'];
			//header("Location: PantallaProductos.php");
			exit;
		}

	}
}
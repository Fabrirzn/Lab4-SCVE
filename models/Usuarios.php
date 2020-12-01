<?php

// models/Usuarios.php

class Usuarios extends Model{

	public $id;
	public $nombre;
	public $apellido;
	public $dni;
	public $telefono;
	public $direccion;

	public function crearUsuario ($nombre, $apellido, $usuario, $dni, $telefono, $direccion, $contrasenia, $Contrasenia2){

		$nombre = substr($nombre, 0, 50);
		$nombre = $this->db->escape($nombre);
		$nombre = str_replace("%", "\%", $nombre);
		$nombre = str_replace("_", "\_", $nombre);

		$apellido = substr($apellido, 0, 50);
		$apellido = $this->db->escape($apellido);
		$apellido = str_replace("%", "\%", $apellido);
		$apellido = str_replace("_", "\_", $apellido);

		$usuario = substr($usuario, 0, 50);
		$usuario = $this->db->escape($usuario);
		$usuario = str_replace("%", "\%", $usuario);
		$usuario = str_replace("_", "\_", $usuario);

		if(!ctype_digit($dni)){
			$error = 'El DNI debe ser un numero.';
			return $error;
		}

		if(strlen($dni) != 8){
			$error = 'El DNI debe tener 8 digitos';
			return $error;
		}

		if(!ctype_digit($telefono)){
			$error = 'El telefono debe ser un numero';
			return $error;
		}

		if(strlen($telefono) < 7 ){
			$error = 'El telefono tiene que tener mas de 7 digitos ';
			return $error;
		}

		if(strlen($telefono) > 13 ){
			$error = 'El telefono tiene que tener menos de 13 digitos';
			return $error;
		}

		$direccion = substr($direccion, 0, 50);
		$direccion = $this->db->escape($direccion);
		$direccion = str_replace("%", "\%", $direccion);
		$direccion = str_replace("_", "\_", $direccion);

		$contrasenia = substr($contrasenia, 0, 50);
		$contrasenia = $this->db->escape($contrasenia);
		$contrasenia = str_replace("%", "\%", $contrasenia);
		$contrasenia = str_replace("_", "\_", $contrasenia);

		$contra = md5($contrasenia);

		$Contrasenia2 = substr($Contrasenia2, 0, 50);
		$Contrasenia2 = $this->db->escape($Contrasenia2);
		$Contrasenia2 = str_replace("%", "\%", $Contrasenia2);
		$Contrasenia2 = str_replace("_", "\_", $Contrasenia2);

		$contra2 = md5($Contrasenia2);

		if($contra == $contra2){

			$this->db->query("INSERT INTO usuario (nombre, apellido, usuario, dni, telefono, direccion, password) 
											VALUES ('$nombre', '$apellido', '$usuario', '$dni', '$telefono', '$direccion', '$contra')");
		}else{
			echo "las contraseñas no coinciden ";
		}	
	}

	public function IniciarSesion ($usuario, $password){

		session_start();
		
		$usuario = substr($usuario, 0, 50);
		$usuario = $this->db->escape($usuario);
		$usuario = str_replace("%", "\%", $usuario);
		$usuario = str_replace("_", "\_", $usuario);

		$password = substr($password, 0, 50);
		$password = $this->db->escape($password);
		$password = str_replace("%", "\%", $password);
		$password = str_replace("_", "\_", $password);
		$pass = md5($password);

		$this->db->query("SELECT * FROM usuario WHERE usuario = '$usuario' and password = '$pass' LIMIT 1");

			if($this->db->numRows() == 1 ){
			$_SESSION['logueado'] = true;
			$fila = $this->db->fetch();
			$_SESSION['usuario'] = $fila['usuario'];
			//header("Location: PantallaProductos.php");
			//exit;
		}

	}

		public function existeUsuario($uid){
		/*if(!ctype_digit($uid)) return false;
		if($uid < 1) return false;*/

		$this->db->query("SELECT * FROM usuario WHERE usuario = '$uid'");

		if($this->db->numRows() != 1) return false;

		return true;
	}

	public function getIdUsuario($nombreUsuario){
		$this->db->query("SELECT id_usuario FROM usuario WHERE  usuario = '$nombreUsuario'");
		$aux = $this->db->fetch();
		return $aux['id_usuario'];
	}

		/* Muestra todos los datos del usuario */
	public function MisDatos($usuario){

		$usuarioaux = new Usuarios();

		if(!$usuarioaux->existeUsuario($usuario)) throw("error Productos 1"); 

		$this->db->query("SELECT * FROM usuario WHERE usuario = '$usuario'");

		return $this->db->fetchAll();

	}


	public function ActualizarPerfil($usuarioid, $nombre, $apellido, $dni, $telefono, $direccion){ 

		if(!ctype_digit($usuarioid)) return false;
		if($usuarioid < 0) return false;

		$nombre = substr($nombre, 0, 50);
		$nombre = $this->db->escape($nombre);
		$nombre = str_replace("%", "\%", $nombre);
		$nombre = str_replace("_", "\_", $nombre);
		$apellido = substr($apellido, 0, 50);
		$apellido = $this->db->escape($apellido);
		$apellido = str_replace("%", "\%", $apellido);
		$apellido = str_replace("_", "\_", $apellido);

		if(!ctype_digit($dni)){
			$error = 'El DNI debe ser un numero.';
			return $error;
		}

		if(strlen($dni) != 8){
			$error = 'El DNI debe tener 8 digitos';
			return $error;
		}

		if(!ctype_digit($telefono)){
			$error = 'El telefono debe ser un numero';
			return $error;
		}

		if(strlen($telefono) < 7 ){
			$error = 'El telefono tiene que tener mas de 7 digitos ';
			return $error;
		}

		if(strlen($telefono) > 13 ){
			$error = 'El telefono tiene que tener menos de 13 digitos';
			return $error;
		}

		$direccion = substr($direccion, 0, 50);
		$direccion = $this->db->escape($direccion);
		$direccion = str_replace("%", "\%", $direccion);
		$direccion = str_replace("_", "\_", $direccion);

		$this->db->query("UPDATE usuario set nombre = '$nombre', apellido = '$apellido', dni = '$dni', telefono = '$telefono', direccion = 'direccion' WHERE id_usuario = '$usuarioid' ");

	}
}
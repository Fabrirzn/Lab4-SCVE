<?php

// models/Productos.php

class Productos extends Model{

	public function crearVenta($usuarioid, $nombre, $descripcion, $precio, $foto){

		$usuarioaux = new Usuarios();
		echo $usuarioid;
		if(!$usuarioaux->existeUsuario($usuarioid)) die("error Productos 1"); 

		if(strlen($_POST['nombre-producto']) < 1) die("error Productos 2"); 
		$_POST['nombre-producto'] = substr($_POST['nombre-producto'], 0, 50);
		//$_POST['Nombre'] = mysqli_escape_string($_POST['Nombre']);
		$nombre = $_POST['nombre-producto'];


		if(strlen($_POST['descripcion']) < 1) die("error Productos 3"); 
		$_POST['descripcion'] = substr($_POST['descripcion'], 0, 50);
		//$_POST['Nombre'] = mysqli_escape_string($_POST['Nombre']);
		$descripcion = $_POST['descripcion'];
		echo $precio;
		if(!is_numeric($_POST['precio'])) die("error Productos 4");
			if($_POST['precio'] < 1) die("error Productos 5");
			$precio = $_POST['precio'];

		

		$tipo = $_FILE['prd_foto1']['type'];
		$tamanio = 	$_FILE['prd_foto1']['size'];
		 if (($_FILES["prd_foto1"]["type"] == "image/gif")
  				 || ($_FILES["prd_foto1"]["type"] == "image/jpeg")
 				 || ($_FILES["prd_foto1"]["type"] == "image/jpg")
  				 || ($_FILES["prd_foto1"]["type"] == "image/png") && ($tamanio < 2000000)) die ("error Productos 7");

		$this->db->query("INSERT INTO productos (nombre, descripcion, precio, fotos, fecha, usuario) VALUES ('$nombre', '$descripcion', '$precio', '$foto', NOW(), '$usuarioid' )  ");

	}

	public function getTodos(){
		$this->db->query("SELECT * FROM productos");
		return $this->db->fetchAll();
	}

}
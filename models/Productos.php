<?php

// models/Productos.php

class Productos extends Model{

	public function crearVenta($usuarioid, $nombre, $descripcion, $precio, $foto){

		$usuarioaux = new Usuarios();
		//echo $usuarioid;
		if(!$usuarioaux->existeUsuario($usuarioid)) die("error Productos 1"); 
		
		$idUsr = $usuarioaux->GetIdUsuario($usuarioid);

		if(strlen($_POST['nombre-producto']) < 1) die("error Productos 2"); 
		$_POST['nombre-producto'] = substr($_POST['nombre-producto'], 0, 50);
		//$_POST['Nombre'] = mysqli_escape_string($_POST['Nombre']);
		$nombre = $_POST['nombre-producto'];


		if(strlen($_POST['descripcion']) < 1) die("error Productos 3"); 
		$_POST['descripcion'] = substr($_POST['descripcion'], 0, 50);
		//$_POST['Nombre'] = mysqli_escape_string($_POST['Nombre']);
		$descripcion = $_POST['descripcion'];
		//echo $precio;
		if(!is_numeric($_POST['precio'])) die("error Productos 4");
			if($_POST['precio'] < 1) die("error Productos 5");
			$precio = $_POST['precio'];

		
		$revisar = getimagesize($foto["tmp_name"]);
    	if($revisar !== false){
			$imagen = $foto["tmp_name"];
			$imgContenido = addslashes(file_get_contents($imagen));

		$this->db->query("INSERT INTO productos (nombre, descripcion, precio, fotos, fecha, id_usuario) VALUES ('$nombre', '$descripcion', '$precio', '$imgContenido', NOW(), '$idUsr' )  ");
		}
	}

	public function getTodos(){
		$this->db->query("SELECT * FROM productos");
		return $this->db->fetchAll();
	}

	

}
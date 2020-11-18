<?php

// models/Productos.php

class Productos extends Model{

	public function crearVenta($usuarioid, $nombre, $descripcion, $precio, $foto){

		$usuarioaux = new Usuarios();
		echo $usuarioid;
		if(!$usuarioaux->existeUsuario($usuarioid)) die("error Productos 1"); 

		$nombre = substr($nombre, 0, 50);
		$nombre = $this->db->escape($nombre);
		$nombre = str_replace("%", "\%", $nombre);
		$nombre = str_replace("_", "\_", $nombre);


		$descripcion = substr($descripcion, 0, 50);
		$descripcion = $this->db->escape($descripcion);
		$descripcion = str_replace("%", "\%", $descripcion);
		$descripcion = str_replace("_", "\_", $descripcion);

		
		if(!ctype_digit($precio)){
			$error = 'El precio debe ser un numero.';
			return $error;
		}

		

		$revisar = getimagesize($foto["tmp_name"]);
    	if($revisar !== false){
			$imagen = $foto["tmp_name"];
			$imgContenido = addslashes(file_get_contents($imagen));

		$this->db->query("INSERT INTO productos (nombre, descripcion, precio, fotos, fecha, usuario) VALUES ('$nombre', '$descripcion', '$precio', '$imgContenido', NOW(), '$usuarioid' )  ");
		}
	}

	public function getTodos(){
		$this->db->query("SELECT * FROM productos");
		return $this->db->fetchAll();
	}

	public function getConFiltro($filtro){
		$this->db->query("SELECT * FROM productos where nombre LIKE '%$filtro%'");
		return $this->db->fetchAll();
	}

}
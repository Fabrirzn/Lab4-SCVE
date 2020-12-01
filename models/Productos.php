<?php

// models/Productos.php

class Productos extends Model{

	public $nombre;
	public $descripcion;
	public $id;
	public $precio;
	public $cantidad;

	public function crearVenta($usuarioid, $nombre, $descripcion, $precio, $foto){

		$usuarioaux = new Usuarios();		
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
	    $this->insertarRegistroVentas($usuarioid, $precio);
		}
	}

	public function insertarRegistroVentas($usuarioid, $precio)
	{
		$u = new Usuarios();
		//$idUsr = $u->getIdUsuario($usuarioid);
		$this->db->query("SELECT MAX(id_productos) FROM productos");
		$idprod = $this->db->fetch();
		$aux = implode($idprod);	
		$this->db->query("INSERT INTO movimentos (cantidad, fecha, id_producto, id_usuario, precio, tipo_mov) VALUES ('1', NOW(), '$aux', '$usuarioid', '$precio', 'VENTA') ");
	}

	public function comprar($usuarioid, $precio, $idProd, $cantidad){

		$this->db->query("INSERT INTO movimentos (cantidad, fecha, id_producto, id_usuario, precio, tipo_mov) VALUES ('$cantidad', NOW(), '$idProd', '$usuarioid', '$precio', 'COMPRA')  ");
		
	}

	public function getTodos($usr){
		$this->db->query("SELECT * FROM productos WHERE usuario != '$usr'");
		return $this->db->fetchAll();
	}

	public function getConFiltro($filtro,$usr){
		$this->db->query("SELECT * FROM productos p INNER JOIN movimentos m on p.id_productos = m.id_producto WHERE m.id_usuario <> '$usr' AND p.nombre LIKE '%$filtro%'");
		return $this->db->fetchAll();
	}

	//consulta para mis compras 
	//SELECT * FROM `productos` p INNER JOIN movimentos m on p.id_productos = m.id_producto WHERE p.usuario = 'julianorrillo' and m.tipo_mov = 'COMPRA'
	public function MisCompras($usuario){

		$usuarioaux = new Usuarios();
		//$id = $usuarioaux->getIdUsuario($usuario);
		if(!$usuarioaux->existeUsuario($usuario)) throw("error Productos 1"); 

		$this->db->query("SELECT * FROM productos p INNER JOIN movimentos m on p.id_productos = m.id_producto WHERE m.id_usuario = '$usuario' and m.tipo_mov = 'COMPRA'");

		return $this->db->fetchAll();

	}


	/* Muestra todos los productos del usuario */
	public function MiosTodos($usuario){

		$usuarioaux = new Usuarios();

		if(!$usuarioaux->existeUsuario($usuario)) throw("error Productos 1"); 

		$this->db->query("SELECT * FROM productos p INNER JOIN movimentos m on p.id_productos = m.id_producto WHERE m.id_usuario = '$usuario' and m.tipo_mov = 'VENTA'");

		return $this->db->fetchAll();

	}

	/* Verifica si existe el producto*/
	public function existeProducto($pid){
		/*if(!ctype_digit($uid)) return false;
		if($uid < 1) return false;*/

		$this->db->query("SELECT * FROM productos WHERE id_productos = '$pid'");
		$aux = $this->db->fetch();
		if($this->db->numRows() != 1) return false;

		return true;
	}

	public function ActualizacionProducto($productosid, $nombre, $descripcion, $precio, $foto){
 		if(!ctype_digit($productosid)) return false;
		if($productosid < 0) return false;

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

			$this->db->query("UPDATE productos set nombre = '$nombre', descripcion = '$descripcion', precio = '$precio', fotos = '$imgContenido' WHERE id_productos = '$productosid' ");

		}
	}

}
<!DOCTYPE html>
<html>
<head>
	<title>Vender</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
		<header>
			<nav class="navbar navbar-light bg-light">
				<a class="navbar-brand" href="#">
				 
				  SCVE
				</a>
				<button class="btn btn-info dropdown-toggle" type="botton" id="dropdownBoton" 
				data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
					Hola <?= $_SESSION['usuario'] ?>
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownBoton">
					<a href="PantallaVentas" class="dropdown-item">Vender</a>
					<a href="#" class="dropdown-item">Mis Compras</a>
					<a href="#" class="dropdown-item">Mis Ventas</a>
					<a href="#" class="dropdown-item">Mi Pefil</a>
					<div class="dropdown-divider"></div>
					<a href="CerrarSesion.php" class="dropdown-item">Cerrar Sesion</a>
				</div>		
			  </nav>						
		</header>
		
		<div id="buscador">
			<input type="text" class="form-control" id="" placeholder="Busque Algo">

		</div>
		
		<div class="container-fluid" align="center" >


			<form action="" method="post" enctype="multipart/form-data">
				<label>Nombre</label>
				<input type="text" name="nombre-producto">	<br /> <br />
				<label>Descripcion</label>
				<input type="text" name="descripcion"> <br /> <br />
				<label>Precio</label>
				<input type="text" name="precio"> <br /> <br />
				<label>Foto</label>
				<input type="file"  id="prd_foto1" name="prd_foto1"><br /> <br />

				<input type="submit" value="Vender" class="boton">



			</form>




		</div>


		

		<footer class="page-footer font-small blue fixed-bottom">
  			<div class="footer-copyright text-center m-3">© 2020 Copyright:
    			<a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
  			</div>
		</footer>
</body>








<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
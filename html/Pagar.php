<!DOCTYPE html>
<html>
<head>
	<title>Pagar</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
		<header>
			<nav class="navbar navbar-light bg-light">
				<a class="navbar-brand" href="home.php">				 
				  SCVE
				</a>
				<div class="dropdown dropleft">
					<button class="btn btn-info dropdown-toggle" type="botton" id="dropdownBoton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Hola <?= $_SESSION['usuario'] ?>
					</button>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="PantallaVentas.php" class="dropdown-item">Vender</a>
						<a href="#" class="dropdown-item">Mis Compras</a>
						<a href="PantallaMisVentas.php" class="dropdown-item">Mis Ventas</a>
						<a href="#" class="dropdown-item">Mi Pefil</a>
						<div class="dropdown-divider"></div>
						<a href="CerrarSesion.php" class="dropdown-item">Cerrar Sesion</a>
					</div>
				</div>		
			  </nav>						
		</header>
		
		<div class="container-fluid" align="center" >

            <form action="Pagar.php" method="post">
                    <?php foreach($this->producto as $p) { ?>
							<div class="col-sm-12 col-md-12 col-lg-4 text-center p-3">
                            <label><b>Nombre del Articulo</b></label>
                                <p><?= $p['nombre'] ?></p>

                                <label><b>Precio</b></label>
                                <p>$ <?= $p['precio'] ?></p>                                                                      
							</div>
				    <?php } ?>            
                <label>Metodo de Pago</label>
                <select type="text" name="metodoDePago">
                    <option>PayPal</option>
                    <option>MercadoPago</option>
                </select>
				<input type="hidden" name="pagoOk" id="pagoOk" value="1">
				<input type="hidden" name="limpio" id="limpio" value="1">
                <input type="submit" value="pagar" class="btn btn-success">
             </form>
		</div>

		<footer class="page-footer font-small blue fixed-bottom">
  			<div class="footer-copyright text-center m-3">© 2020 Copyright:
				<b> Julian Orrillo - Rozenmuter Fabricio</b>
  			</div>
		</footer>
</body>








<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
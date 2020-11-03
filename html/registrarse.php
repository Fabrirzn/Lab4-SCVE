<!DOCTYPE html>
<html>
<head>
	<title>Inicio Sesion </title>
	<link rel="stylesheet" href="../css/estilo.css">
		<script type="text/javascript">
		document.getElementById("formu").onsubmit = function () {
			var cont = document.getElementById("con1").value;
			var cont2 = document.getElementById("con2").value;
			var Nom = document.getElementById("Nom").value;
			var Ape = document.getElementById("Ape").value;
			var Usu = document.getElementById("Usu").value;
			var dni = document.getElementById("dni").value;
			var Tel = document.getElementById("Tel").value;
			var Dir = document.getElementById("Dir").value;

			if(Nom.length < 1 || Ape.length < 1 || Usu.length < 1 || dni.length < 1 || Tel.length < 1 || Dir.length < 1){
				var cartel = document.getElementById("error");
				cartel.innerHTML = "Ingrese los datos faltantes";
				cartel.style.display = "block";
			};

			if(cont.length < 1 || cont2.length < 1){
				var cartel = document.getElementById("error");
				cartel.innerHTML = "Ingrese la  contraseña";
				cartel.style.display = "block";
			};

			
			if (cont.length < 8) {
				var cartel = document.getElementById("error");
				cartel.innerHTML = "la contraseña debe tener 8 letras";
				cartel.style.display = "block";
				return false;
			}

			if(cont != cont2){

				var cartel = document.getElementById("error");
				cartel.innerHTML = "Las contraseñas no coinciden, intente nuevamente";
				cartel.style.display = "block";
				return false;
			};
		};
	</script>
</head>
<body>

	<h1>Registrarse  </h1>

	<div id="error"></div>

	<div id="form">
		<form action="" method="post">
			<label>Nombre</label>
			<input type="text" name="Nombre" class="texto" id="Nom"> <br /> <br />
			<label>Apellido</label>
			<input type="text" name="Apellido" class="texto" id="Ape">	<br /> <br />
			<label>Usuario</label>
			<input type="text" name="Usuario" class="texto" id="Usu">	<br /> <br />
			<label>DNI</label>
			<input type="text" name="DNI" class="texto" id="dni">	<br /> <br />
			<label>Telefono</label>
			<input type="text" name="Telefono" class="texto" id="Tel">	<br /> <br />
			<label>Dirección</label>
			<input type="text" name="Direccion" class="texto" id="Dir">	<br /> <br />
			<label>Contraseña</label>
			<input type="password" name="Contrasenia" class="texto" id="con1">	<br /> <br /> 
			<label>Repetir Contraseña</label>
			<input type="password" name="Contrasenia2" class="texto" id="con2">	<br /> <br />
			<input type="submit" value="Registrarse" class="boton">
		</form>
	</div>



</body>
</html>
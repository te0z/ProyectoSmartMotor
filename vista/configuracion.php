<?php 

session_start();

$usuario = $_SESSION['usuario'];

include('../controladores/conexion.php');
include('../modelo/cliente.php');

$cliente = new cliente();

$nombre = $cliente->mostrarNombre($conn,$usuario);
$apellido = $cliente->mostrarApellido($conn, $usuario);
$correoActual = $cliente->mostrarCorreo($conn,$usuario);

 ?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Configuracion</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

	<!-- FontAwesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="../src/css/estilos.css">

	<link rel="stylesheet" type="text/css" href="../src/css/scrollbar.css">
</head>

<body>

	<div class="container">
		
		<!-- Barra de Navegacion -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 10px;">
			<a class="navbar-brand" href="inicio.php">
				<button class="btn btn-amarillo">
					<i class="fas fa-home"></i>
					INICIO
				</button>
			</a>

		  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
		  	</button>

		  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    	<ul class="navbar-nav mr-auto">
		      		<li class="nav-item active">
		        		<a class="nav-link" href="#"><span class="sr-only">(current)</span></a>
		      		</li>
			      	<li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				         	<button class="btn btn-amarillo">
				         		<i class="fas fa-user"></i>
				         		<?php echo "Bienvenido, ". $usuario; ?>		
				         	</button>
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				        	<a class="dropdown-item" href="configuracion.php">
				        		<i class="fas fa-cogs"></i>
				        		Configuracion
				        	</a>

				        	<a class="dropdown-item" href="logout.php">
				          		<i class="fas fa-sign-out-alt"></i>
				          		Salir
				          	</a>
				        </div>
			      	</li>
			    </ul>
			</div>
		</nav>

	</div>

	
	<div class="container" id="form-nombre" style="width: 50%;">
		<fieldset disabled>
			<form>
				<div class="form-group">
					<label for="disabledTextInput">Nombre</label>
					<div class="input-group-text">
						<input type="text" class="form-control" id="disabledTextInput" name="nombre" placeholder="<?php echo $nombre; ?>">
					</div>
				</div>
			</form>
		</fieldset>
	</div>

	<div class="container" id="form-apellido" style="width: 50%;">
		<fieldset disabled>
			<form>
				<div class="form-group">
					<label for="disabledTextInput">Apellido</label>
					<div class="input-group-text">
						<input type="text" class="form-control" id="disabledTextInput" name="apellido" placeholder="<?php echo $apellido; ?>">
					</div>
				</div>
			</form>
		</fieldset>
	</div>

	<!-- Cambiar Correo -->
	<div class="container" id="form-correo" style="width: 50%;">
		<form>
			<div class="form-group">
				<label for="correoCliente">Correo</label>
				<div class="input-group-text">
					<input type="email" class="form-control" id="correoCliente" name="correo" placeholder="<?php echo $correoActual; ?>">
				</div>
			</div>
			<button class="btn btn-amarillo">Cambiar Correo</button>
		</form>
	</div>
	
	<!-- Cambiar Contraseña -->
	<div class="container" id="form-pass" style="width: 50%; margin-top: 10px;">
		<form action="../controladores/actualizarpass.php">
			<div class="form-group">
		    	<label for="passActual">Contraseña Actual</label>
		    	<div class="input-group-text">
			    	<input type="password" class="form-control" id="passActual" name="passActual" placeholder="Contraseña Actual">
			    	<span class="btn btn-info" id="showPass" onclick="mostrarContrasena('passActual');">
			    		<i class="fas fa-eye"></i>	
			    	</span>
		    	</div>
		  	</div>
		  	
		  	<div class="form-group">
		    	<label for="passNueva">Contraseña Nueva</label>
		    	<div class="input-group-text">
			    	<input type="password" class="form-control" id="passNueva" name="passNueva" placeholder="Contraseña Nueva">
			    	<span class="btn btn-info" id="showPass" onclick="mostrarContrasena('passNueva');">
			    		<i class="fas fa-eye"></i>	
			    	</span>
		    	</div>
		    	<!--<a id="showPass" onclick="mostrarContrasena();">
		    		<i class="fas fa-eye"></i>
		    	</a>-->
		  	</div>
		  	
		  	<button type="submit" class="btn btn-amarillo">Cambiar Contraseña</button>
		</form>
	</div>

</body>

<footer>
	<!-- Boostrap y Jquery -->
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script>
		function mostrarContrasena(type){
			var tipo = document.getElementById(type);
		    if(tipo.type == "password"){
		    	tipo.type = "text";
		    }else{
		        tipo.type = "password";
		    }
		}
	</script>
</footer>

</html>
<!DOCTYPE html>
<html lang="es">
<head>
	
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>EMAC</title>

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
		<center>
			<div class="card text-center" style="margin-top: 100px;">
				<div class="card-header bg-amarillo">
			    	Sistema Smart Motor
			  	</div>
			  	<div class="card-body">
			    	<center>
				    	<form method="POST" action="validar.php">
							<input type="text" class="form-control" name="nnombre" placeholder="Usuario" style="width: 20%;" />
							<br />

							<input type="password" class="form-control" name="npassword" placeholder="Contraseña" style="width: 20%;"/>
							<br />
						
							<button class="btn btn-amarillo" type="submit">Inicar Sesion</button>
						</form>
					</center>
			  	</div>
			  	<div class="card-footer bg-amarillo">
			    	<i class="far fa-copyright"></i>
			    	Control de variables en tiempo real
			  	</div>
			</div>
		</center>
	</div>

</body>

<footer>
	
	<!-- Boostrap y Jquery -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</footer>

</html>
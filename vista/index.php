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
			
			<div class="alert alert-success" id="alert" style="display: none;">&nbsp;</div>

			<div class="card text-center" style="margin-top: 100px;">
				<div class="card-header bg-amarillo">
			    	Sistema Smart Motor
			  	</div>
			  	<div class="card-body">
			    	<center>
				    	<form id="form-login" method="POST">
							<input type="text" class="form-control" id="nnombre" name="nnombre" placeholder="Usuario" style="width: 20%;" />
							<br />

							<input type="password" class="form-control" id="npassword" name="npassword" placeholder="Contraseña" style="width: 20%;"/>
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
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="http://malsup.github.com/jquery.form.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js" type="text/javascript"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#form-login").validate({
				event: "blur", rules: {'nnombre': "required",'npassword': "required"},
				message: {'nnombre': "Ingrese su Usuario",'npassword': "Ingrese su Contraseña"},
				debug: true,errorElement: "label",
				submitHandler: function(form) {
					$("#alert").show();
					$("#alert").html("<p>Aguande unos instantes...</p>");
					setTimeout(function(){
						$("#alert").fadeOut('slow');
					}, 500);
					var usuario = $("#nnombre").val();
					var pass = $("#npassword").val();
					$.ajax({
						type: "POST",
						url: "validar.php",
						data: "nnombre=" + usuario + "&npassword=" + pass,
						success: function(msg) {
							//$("#alert").html(msg);
							document.getElementById("nnombre").value="";
                   			document.getElementById("npassword").value="";
                   			setTimeout(function() {
                   				$("#alert").fadeOut('slow');
                   			}, 500);
						}
					});
				}
			});
		});
	</script>
</footer>

</html>
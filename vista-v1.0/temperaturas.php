<?php 

session_start();

$usuario = $_SESSION['usuario'];
$equipo = intval($_GET['idequipo']);

include('../controladores/conexion.php');

function convFecha($fecha){
	$date = date('d-m-Y H:i:s', strtotime(str_replace('-', '/', $fecha)));

	echo $date;
}

function todosLosDatos($con,$equipo){
	try {
		$sql = "SELECT temp, amp, volt, hr FROM registros WHERE equipo = '" . $equipo. "' ORDER BY hr DESC";
		$result = $con->query($sql);

		$return = mysqli_fetch_all($result, MYSQLI_ASSOC);

		return $return;
	} catch (Exception $e){
		throw $e;
	}

}

function buscarPorFecha($con, $equipo, $desde, $hasta){
	try{
		$sql = "SELECT temp, amp, volt, hr FROM registros
				WHERE equipo = '" . $equipo . "'
				AND hr BETWEEN '" . $desde . "' AND '" . $hasta . "' ORDER BY hr DESC";

		$result = $con->query($sql);

		$return = mysqli_fetch_all($result, MYSQLI_ASSOC);

		return $return;

		}catch(Exception $e){
			throw $e;
		}
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Temperatura</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

	<!-- FontAwesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="../src/css/estilos.css">
	<link rel="stylesheet" type="text/css" href="../src/css/scrollbar.css">>
</head>
<body>

	<div class="container">
		
		<!-- Barra de Navegacion -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 10px;">
			<a class="navbar-brand" href="./contenido2.php">
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
				         		<?php echo "". $usuario; ?>		
				         	</button>
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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

	<div class="container">
		
		<div class="card text-center">
			<div class="card-header">
		    	<?php 
					$sql_nombre = "SELECT nombrequipo FROM equipo WHERE idequipo = '" . $equipo . "'";
					$result = $conn->query($sql_nombre);
					$row = $result->fetch_assoc();	

					echo "Equipo: " . $row['nombrequipo'];
		    	 ?>

		  	</div>
		  	
		  	<div class="card-body">
		    	
		  		<div class="container left" style="text-align: center;">
		  			<div class="row row-sm-offset">
		  				<div class="col-md-3 multi-horizontal">
		  					<input class="form-control" placeholder="Desde" type="date" id="bd-desde">
		  				</div>
		  				<div class="col-md-3 multi-horizontal">
		  					<input class="form-control" type="date" id="bd-desde">
		  				</div>
		  				<div class="col-md-3 multi-horizontal">
		  					<button id="rango_fecha" class="btn-sm btn-amarillo">Buscar</button>
		  					<a onClick="javascript:reportePDF();" class="btn-sm btn-danger" style="color: white;">
		  						Exportar PDF
		  						<i class="far fa-file-pdf"></i>
		  					</a>
		  				</div>
		  			</div>
		  		</div>

		    	<table class="table">
		    		<thead>
		    			<tr>
		    				<th scope="col">Hora</th>
		    				<th scope="col">Temperatura</th>
		    				<th scope="col">Amperes</th>
		    				<th scope="col">Voltaje</th>
		    			</tr>
		    		</thead>

		    		<?php 
					
					$sql = "SELECT temp, amp, volt, hr FROM registros WHERE equipo = '" . $equipo ."'";
		    		$result = $conn->query($sql);

		    		/*if ($_POST['desde'] == false || $_POST['hasta'] == false) {
		    			$result = todosLosDatos($conn,$equipo);
		    		} else{
		    			
		    			$desde = $_POST['desde'];
						$hasta = $_POST['hasta'];

		    			$result = buscarPorFecha($conn,$equipo, $desde, $hasta);
		    		}*/

		    		if(!$result){
		    			trigger_error("Error de Consulta: ". $conn->error);
		    		} else {
		    			foreach ($result as $row) {
		    				
		    		 ?>

		    		<tbody id="actualizar">
		    			
		    			<tr>
		    				<td><?php echo convFecha($row['hr']); ?></td>
		    				<td><?php echo $row['temp']; ?></td>
		    				<td><?php echo $row['amp']; ?></td>
		    				<td><?php echo $row['volt']; ?></td>
		    			</tr>

		    		</tbody>

		    		<?php 
		    			}
		    		}

		    		 ?>
		    	</table>
		  	</div>
		</div>

	</div>

</body>

	<footer>
		<!-- Boostrap y Jquery -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

		<script type="text/javascript">
			(function(){
				$("#rango_fecha").on('click',function(){
					var desde = $('#bg-desde').val();
					var hasta = $('#bd-hasta').val();


				})
			})();
		</script>


	</footer>

</html>
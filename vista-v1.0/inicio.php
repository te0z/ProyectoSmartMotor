<?php 

session_start();

$usuario = $_SESSION['usuario'];

include('../controladores/conexion.php');

function convFecha($fecha){
	$date = date('d-m-Y H:i:s', strtotime(str_replace('-', '/', $fecha)));

	echo $date;
}

function mediatemperatura($totalTemp, $cantTemp){
	$total = $totalTemp / $cantTemp;

	return number_format($total, 2, '.', '');
}

function enviarMail($usuario,$conn){
	$sql_correo = "SELECT correo FROM clientes WHERE usuario = '" . $usuario ."'";
	$result = $conn->query($sql_correo);
	$row = $result->fetch_assoc();
	$correo = $row['correo'];

	$mail = "Prueba de Alerta";
	$titulo = "ALERTA TEMPERATURA ALTA";
	$headers = "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "From: EMAC\r\n";

	mail($correo,$titulo,$mail,$headers);
}


?>

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

	<!-- Barra de navegacion lateral 
	<div class="container" id="barraLateral">
		
		<h1><?php $usuario; ?></h1>

	</div>-->

	<div class="container">
		
		<!-- Barra de Navegacion -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 10px;">
			<a class="navbar-brand" href="contenido2.php">
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

	<div class="container" id="contenido">
		
		<table class="table">
			
			<thead>
				<tr>
					<th scope="col">
						ID Equipo
					</th>
					<th scope="col">
						<i class="fas fa-desktop"></i>
						Equipo
					</th>
					<th scope="col">
						<i class="fas fa-thermometer-half"></i>
						Temperatura
					</th>
					<th>
						Amperes
					</th>
					<th>
						Voltaje
					</th>
					<th scope="col">
						<i class="far fa-clock"></i>
						Hora
					</th>
					<th>
						Acciones
					</th>
				</tr>
			</thead>

			<?php 

			$col = 0;

			$sql = "SELECT idequipo, nombrequipo, temperatura, amperes, voltaje, hora
				FROM equipo
				WHERE equipo.`user` = (
										SELECT usuario 
										FROM clientes 
										WHERE usuario = '". $usuario ."')";

			$result = $conn->query($sql);

			if(!$result){
				trigger_error('Error de Consulta: ' . $conn->error);
			} else {
				foreach ($result as $row) {
			
				$col++;
		 ?>

		 	<tbody>
		 		
		 		<tr>
		 			<td><?php echo $row['idequipo']; ?></td>
		 			<td><?php echo $row['nombrequipo']; ?></td>
		 			
		 			<td>
		 				<?php 
		 					echo $row['temperatura']."ºC";
		 					/*if($row['temperatura'] > 24){
		 						enviarMail($usuario,$conn);
		 					} */
		 				?>
		 			</td>
		 			
		 			<td><?php echo $row['amperes']; ?></td>
		 			<td><?php echo $row['voltaje']; ?></td>
		 			<td><?php echo convFecha($row['hora']); ?></td>
		 			<?php echo '<td><center>
		 					<a href="temperaturas.php?idequipo='. $row['idequipo'] .'"data-toggle="tooltip" title="Ver Temperaturas" class="btn btn-sm btn-info">
		 						<i class="fas fa-thermometer"></i>
		 					</a>
		 					<a href="contenido.php?idequipo='. $row['idequipo'] . '" data-toggle="tooltip" title="Resumen" class="btn btn-sm btn-danger">
		 						<i class="fas fa-chart-area"></i>
		 					</a>
		 				</center></td>'
		 			?>
		 		</tr>

		 	</tbody>

			<?php 

					}
				}

		 	?>

		</table>

	</div>


</body>

<footer>
	
	<!-- Boostrap y Jquery -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
	<!-- HighCarts Plugin -->
	<script src="http://code.highcharts.com/stock/highstock.js"></script>
	<script src="http://code.highcharts.com/modules/exporting.js"></script>

	<!-- Google Chart Plugin -->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script src="src/js/GoogleChartTemperatura.js"></script>
	
	<!-- Efectos Pagina -->
	<script src="src/js/jsPag.js"></script>
	<script src="src/js/circleChart.js"></script>

</footer>

</html>
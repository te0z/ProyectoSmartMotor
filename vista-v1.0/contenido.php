<?php 

session_start();

$usuario = $_SESSION['usuario'];
$equipo = intval($_GET['idequipo']);

include('../controladores/conexion.php');
include('../modelo/cliente.php');
include('../pdf/fpdf/fpdf.php');

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
		  					<input class="form-control" type="date" id="bd-desde">
		  				</div>
		  				<div class="col-md-3 multi-horizontal">
		  					<input class="form-control" type="date" id="bd-hasta">
		  				</div>
		  				<div class="col-md-3 multi-horizontal">
		  					<button id="rango_fecha" class="btn btn-amarillo">Buscar</button>
		  					
		  					<!--<input class="btn btn-danger" type="button" id="reportar" data-toggle="modal" data-target="#modalPdf">-->

		  					<button class="btn btn-danger" type="button" id="reportar" data-toggle="modal" data-target="#modalPdf">
		  						<i class="far fa-file-pdf"></i>
		  					</button>
		  					<!--<button id="exportar_pdf" title="Exportar a PDF" class="btn btn-danger">
		  						<i class="far fa-file-pdf"></i>
		  					</button>-->
		  				</div>
		  			</div>
		  		</div>

		    	<table class="table">
		    		<thead>
		    			<tr>
		    				<th scope="col">#</th>
		    				<th scope="col">Hora</th>
		    				<th scope="col">Temperatura</th>
		    				<th scope="col">Amperes</th>
		    				<th scope="col">Voltaje</th>
		    			</tr>
		    		</thead>


		    		<tbody id="actualizar">
		    			
		    		</tbody>

		    	</table>
		  	</div>
		</div>

	</div>

	<div class="modal fade bd-example-modal-lg" id="modalPdf" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
	    	<div class="modal-content">
	      		<div class="modal-header">
	      			<h5 class="modal-title" id="myLargeModalLabel">Reporte Temperaturas</h5>
	      			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            			<span aria-hidden="true">&times;</span>
        			</button>
	      		</div>

	      		<div class="modal-body">
	      			<div id="cuerpoModal">
	      				
	      			</div>
	      		</div>

	      		<div class="modal-footer">
	      			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	      		</div>
	    	</div>
	  	</div>
	</div>


	<!--<div class="modal fade" id="ver-pdf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="x_panel">
			<div class="x_title">
				<h2 class="text-center">Reporte Generado</h2>
				<div class="clearfix"></div>
			</div>

			<div id="view_pdf"></div>
				<a id="cancel" class="btn btn-amarillo" data-dismiss="modal" aria-hidden="true">Cancelar</a>
			</div>
		</div>
	</div>-->

</body>

	<footer>
		<!-- Boostrap y Jquery -->
		<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="../src/css/pdf_object/pdfobject.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$.ajax({
					type: "POST",
					url: "../modelo/imprimir_todo.php",
					data: 'idequipo=' + <?php echo $equipo; ?>,
					dataType: "html",
					success: function(datos){
						$("#actualizar").html(datos);
					}
				});


				$("#rango_fecha").on('click',function(){
					var desde = $("#bd-desde").val();
					var hasta = $("#bd-hasta").val();
					$.ajax({
						type: "POST",
						url: "../modelo/buscar_por_fecha.php",
						data: 'idequipo=' + <?php echo $equipo ?> + '&desde=' + desde + '&hasta=' + hasta,
						dataType: "html",
						success: function(datos){
							$("#actualizar").html(datos);
						}
					});
				});

				$("#reportar").on('click', function(){
					var desde = $("#bd-desde").val();
					var hasta = $("#bd-hasta").val();
					$.ajax({
						type: "POST",
						url: "../modelo/exportar_pdf.php",
						data: 'idequipo=' + <?php echo $equipo ?> + '&desde=' + desde + '&hasta=' + hasta,
						dataType: "html",
						success: function(datos){
							//$("#cuerpoModal").html(datos);
							PDFObject.embed("reporte.pdf", "#cuerpoModal");
						}
					});
				});

				
				/*$("#exportar_pdf").click(function(){
					var desde = $("#bd-desde").val();
					var hasta = $("#bd-hasta").val();
					$.ajax({
						type: "POST",
						url = "../modelo/exportar_pdf.php",
						data: 'idequipo=' + <?php echo $equipo ?> + '&desde=' + desde + '&hasta=' + hasta,
						success: function(datos) {
							$("ver-pdf").modal({
								show: true,
								backdrop: 'static'
							});
							PDFObject.embed("../temp/reporte.pdf", "#view_pdf");
						}
					});
				});*/
			});
		</script>


	</footer>

</html>
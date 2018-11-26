<?php 

$equipo = $_POST['idequipo'];

include '../controladores/conexion.php';
include 'cliente.php';

$cl = new Cliente();

if($_POST['desde']==false || $_POST['hasta']==false){
	$todos = $cl->todosLosDatos($conn,$equipo);
	$col = 0;

	if (!$todos) {
		trigger_error('Error de Consulta: ' . $conn->error);
	}else{
		foreach ($todos as $row) {
			$col++;

?>

	<tr>
		<td><?php echo $col; ?></td>
		<td><?php echo convFecha($row['hr']); ?></td>
		<td><?php echo $row['temp']; ?></td>
		<td><?php echo $row['amp']; ?></td>
		<td><?php echo $row['volt']; ?></td>
	</tr>


<?php
		}
	}

}else{
	$desde = $_POST['desde'];
	$hasta = $_POST['hasta'];

	$datos = $cl->datosPorFecha($conn,$equipo,$desde,$hasta);
	$col = 0;

	if (!$datos) {
		trigger_error('Error de Consulta: ' . $conn->error);
	}else{
		foreach ($datos as $row) {
			$col++;
?>

	<tr>
		<td><?php echo $col; ?></td>
		<td><?php echo convFecha($row['hr']); ?></td>
		<td><?php echo $row['temp']; ?></td>
		<td><?php echo $row['amp']; ?></td>
		<td><?php echo $row['volt']; ?></td>
	</tr>

<?php 

		}
	}
}

 ?>

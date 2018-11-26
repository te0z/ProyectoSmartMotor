<?php 
$equipo = $_POST['idequipo'];

include '../controladores/conexion.php';
include 'cliente.php';

function convFecha($fecha){
	$date = date('d-m-Y H:i:s', strtotime(str_replace('-', '/', $fecha)));

	echo $date;
}

$impr = new Cliente();

$datos = $impr->todosLosDatos($conn, $equipo);
$col = 0;

/*function convFecha($fecha){
	$date = date('d-m-Y H:i:s', strtotime(str_replace('-', '/', $fecha)));

	echo $date;
}*/
 ?>

<?php 

if(!$datos){
	trigger_error('Error de Consulta: ' . $conn->error);
} else {
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

 ?>
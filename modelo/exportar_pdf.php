<?php
error_reporting(E_ALL ^ E_NOTICE);
$equipo = $_POST['idequipo'];

include ('../controladores/conexion.php');
include ('../modelo/cliente.php');

function convertirFecha($fecha){
	$date = date('d-m-Y H:i:s', strtotime(str_replace('-', '/', $fecha)));
	
	echo $date;
}

$sql_nombre = "SELECT nombrequipo FROM equipo WHERE idequipo = '" . $equipo . "'";
$result = $conn->query($sql_nombre);
$row = $result->fetch_assoc();	
$nombrequipo = $row['nombrequipo'];

$impr = new cliente();

if(strlen($_POST['desde'])>0 and strlen($_POST['hasta'])>0){
	$desde = $_POST['desde'];
	$hasta = $_POST['hasta'];

	$verDesde = date('d/m/Y', strtotime($desde));
	$verHasta = date('d/m/Y', strtotime($hasta));
}else{
	$desde = '1111-01-01';
	$hasta = '9999-12-30';

	$verDesde = '__/__/____';
	$verHasta = '__/__/____';
}
include('../tcpdf/tcpdf.php');


	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('©SmartMotor');
	$pdf->SetTitle($_POST['reporte_name']);

	$pdf->setPrintHeader(false); 
	$pdf->setPrintFooter(TRUE);
	$pdf->SetMargins(20, 10, 20, 20); 
	$pdf->SetAutoPageBreak(true, 20); 
	$pdf->SetFont('Helvetica', '', 10);
	$pdf->addPage();



$datos = $impr->datosPorFecha($conn,$equipo,$desde,$hasta);

$col = 0;

$content = '';

	$content .= '
		<div class="row">
		
        	<div class="col-md-12">
				
				<h1 style="text-align:center;">Reporte: Datos de '.$nombrequipo.'</h1>
            	<h3 style="text-align:center;">Desde '.$verDesde.' hasta: '.$verHasta.'</h3>

      <table border="1" cellpadding="5">
        <thead>
          <tr bgcolor="#FDDC5A">
            <th width="10%">#</th>
            <th width="30%">Fecha y Hora</th>
            <th width="20%">Temperatura</th>
            <th width="20%">Amperes</th>
            <th width="20%">Voltaje</th>
          </tr>
        </thead>
	';

	foreach($datos as $row){
	$col++;
	$fecha = date('d/m/Y H:i:s', strtotime($row['hr']));
	$temp = $row['temp'];
	$amp = $row['amp'];
	$volt = $row['volt'];
		
	$content .= '
		<tr nobr="true" bgcolor="#f5f5f5">
            <th width="10%">'.$col.'</th>
            <th width="30%">'.$fecha.'</th>
            <th width="20%">'.$temp.'</th>
            <th width="20%">'.$amp.'</th>
            <th width="20%">'.$volt.'</th>
        </tr>
	';
	}

	$content .= '</table>';

	
//CONSULTA

$pdf->writeHTML($content, true, 0, true, 0);

$pdf->lastPage();

$pdf->output('reporte.pdf', 'F');
?>
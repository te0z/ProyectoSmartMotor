<?php 
$equipo = $_POST['idequipo'];
require('../pdf/fpdf/fpdf.php');
require('../pdf/fpdf/WriteHtml.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,$equipo);


/*$content = '';

	$content .= '
		<div class="row">
		
        	<div class="col-md-12">
				
				<h1 style="text-align:center;">Reporte: Datos de '.$equipo.'</h1>

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

$pdf->WriteHtml($content);*/

$pdf->Output('reporte2.pdf', 'F');


 ?>
<?php
	
    require('fpdf/fpdf.php');
	
    $conn = pg_connect("host=190.114.253.237 port=5432 dbname=postgres user=richi password=i61AWW3Yp6uD3JPGb53l") or die('connection fallida !');
	

    $consulta = "SELECT rut_proveedor, nombre_proveedor, email_proveedor, telefono_proveedor,
    nombre_empresa_proveedor
    FROM proveedor WHERE habilitado_proveedor = true";


	$result = pg_query($conn,$consulta);
	
	$pdf = new FPDF();

	$pdf->AddPage();
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);

    $pdf->Cell(190,10, 'REPORTE DE PROVEEDORES DISPONIBLES',0,1,'C');

    $pdf->Ln(5);

    $pdf->Cell(2);

	$pdf->Cell(30,6,'RUT',1,0,'C',1);
	$pdf->Cell(50,6,'Nombre',1,0,'C',1);
    $pdf->Cell(50,6,'Email',1,0,'C',1);
    $pdf->Cell(30,6,'Telefono',1,0,'C',1);
    $pdf->Cell(30,6,'Empresa',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = pg_fetch_assoc($result))
	{
        $pdf->Cell(2);
		$pdf->Cell(30,6,utf8_decode($row['rut_proveedor']),1,0,'C',0);
		$pdf->Cell(50,6,utf8_decode($row['nombre_proveedor']),1,0,'C',0);
		$pdf->Cell(50,6,utf8_decode($row['email_proveedor']),1,0,'C',0);
        $pdf->Cell(30,6,utf8_decode($row['telefono_proveedor']),1,0,'C',0);
        $pdf->Cell(30,6,utf8_decode($row['nombre_empresa_proveedor']),1,1,'C',0);
        
        
	}
    

	$pdf->Output();

    

?>
<?php
	
    require('fpdf/fpdf.php');
	
    $conn = pg_connect("host=190.114.253.237 port=5432 dbname=postgres user=richi password=i61AWW3Yp6uD3JPGb53l") or die('connection fallida !');
	

    $consulta = "select prd.id_producto, prd.nombre_producto, total_vendidos, total_vendidos*prd.precio_producto as total
    from producto as prd
        join
        (select a.id_producto, sum(a.cantidad) as total_vendidos, prd.nombre_producto from agrega as a
        join producto as prd on
        a.id_producto = prd.id_producto
        join pedido as p on
        a.id_carro = p.id_carro
        group by a.id_producto, prd.nombre_producto) as s on prd.id_producto = s.id_producto
        order by total_vendidos desc limit 10";


	$result = pg_query($conn,$consulta);
	
	$pdf = new FPDF();

	$pdf->AddPage();
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);

    $pdf->Cell(190,10, 'REPORTE PRODUCTOS MAS VENDIDOS',0,1,'C');

    $pdf->Ln(5);

    $pdf->Cell(15);

	$pdf->Cell(15,6,'ID',1,0,'C',1);
	$pdf->Cell(70,6,'Nombre producto',1,0,'C',1);
    $pdf->Cell(30,6,'Total vendidos',1,0,'C',1);
    $pdf->Cell(45,6,'Total',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = pg_fetch_assoc($result))
	{
        $pdf->Cell(15);
		$pdf->Cell(15,6,utf8_decode($row['id_producto']),1,0,'C',0);
		$pdf->Cell(70,6,utf8_decode($row['nombre_producto']),1,0,'C',0);
		$pdf->Cell(30,6,utf8_decode($row['total_vendidos']),1,0,'C',0);
        $pdf->Cell(45,6,utf8_decode($row['total']),1,1,'C',0);
        
        
	}
    

	$pdf->Output();

    

?>
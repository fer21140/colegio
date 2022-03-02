<?php
require('../pdf/fpdf.php');

class PDF extends FPDF
{

function Header()
{
    
    $this->Image('logo.jpg',10,10,40);
    $this->SetFont('Arial','B',15);
    $this->Cell(210,20,utf8_decode('Instituto Mixto Privado San Cristóbal'),0,0,'C');
    $this->Ln(9);
    $this->Cell(210,20,utf8_decode('Reporte de grados académicos'),0,0,'C');
    $this->Ln(6);
    $this->SetFont('Arial','',12);
    $this->Cell(209,30,utf8_decode('Horarios de atencion: Lunes a Viernes: 7:00 AM - 6:00 PM'),0,0,'C');
    $this->Ln(30);
    
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
}
}

include('../db/Conexion.php');
include("../clases/Grado.php");

$grado = new Grado();
$res = $grado->obtenerGrados();


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->setFillColor(232, 232, 232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(15,6,utf8_decode('No.'),1,0,'C',1);
$pdf->Cell(175,6,utf8_decode('Grado académico'),1,1,'C',1);
$pdf->SetFont('Arial','',10);

for($i=0; $i<sizeof($res);$i++) {

    $id = $i + 1;
    $nombre = $res[$i]->getNombre();
	$pdf->Cell(15,8,$id,1,0,'C');
    $pdf->Cell(175,8,utf8_decode($nombre), 1, 1, 'C');
	

} 
$pdf->Output();

?>
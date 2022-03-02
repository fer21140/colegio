<?php
function limitarCadena($cadena, $limite, $sufijo){
	// Si la longitud es mayor que el límite...
	if(strlen($cadena) > $limite){
		// Entonces corta la cadena y ponle el sufijo
		return substr($cadena, 0, $limite) . $sufijo;
	}
	
	// Si no, entonces devuelve la cadena normal
	return $cadena;
}


?>

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
    $this->Cell(210,20,utf8_decode('Reporte de sueldos de empleados'),0,0,'C');
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
include("../clases/Sueldo.php");

$sueldo = new Sueldo();
$res = $sueldo->obtenerSueldos();


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->setFillColor(232, 232, 232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(15,6,utf8_decode('No.'),1,0,'C',1);
$pdf->Cell(130,6,utf8_decode('Empleado'),1,0,'C',1);
$pdf->Cell(45,6,utf8_decode('Sueldo'),1,1,'C',1);

$pdf->SetFont('Arial','',10);

$contador=0;
$suma = 0;

for($i=(sizeof($res)-1); $i>=0;$i--) {
    $contador = $contador + 1;
    $id = $contador;
   
    $nombre = $res[$i]->getNombreEmpleado();
	$sueldo = $res[$i]->getSueldo();

    $suma = $suma + $sueldo;

    $pdf->Cell(15,8,$id,1,0,'C');
    
    $pdf->Cell(130,8,limitarCadena(utf8_decode($nombre),35,"..."),1,0,'C');
    
    $pdf->Cell(45,8,limitarCadena(utf8_decode("Q " . $sueldo),20,"..."), 1, 1, 'C');
	

}
$pdf->SetFont('Arial','B',12);

    $pdf->Cell(15,8,"-----",1,0,'C',1);
    
    $pdf->Cell(130,8,limitarCadena(utf8_decode("TOTAL (Q)"),35,"..."),1,0,'C',1);
    
    $pdf->Cell(45,8,limitarCadena(utf8_decode("Q " . $suma),20,"..."), 1, 1, 'C',1);

$pdf->Output();

?>
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
    $this->Cell(210,20,utf8_decode('Reporte general de alumnos'),0,0,'C');
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
include("../clases/Alumno.php");

$alumno = new Alumno();
$res = $alumno->obtenerAlumnos();


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->setFillColor(232, 232, 232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(15,6,utf8_decode('No.'),1,0,'C',1);
$pdf->Cell(30,6,utf8_decode('Carnet'),1,0,'C',1);
$pdf->Cell(100,6,utf8_decode('Nombres'),1,0,'C',1);
$pdf->Cell(45,6,utf8_decode('Fecha de ingreso'),1,1,'C',1);

$pdf->SetFont('Arial','',10);

$contador=0;

for($i=(sizeof($res)-1); $i>=0;$i--) {
    $contador = $contador + 1;
    $id = $contador;
    $carnet = $res[$i]->getCarnet();
    $nombre = $res[$i]->getPrimerNombre() . " " . $res[$i]->getSegundoNombre() . " " . $res[$i]->getTercerNombre() . " " . $res[$i]->getPrimerApellido() ." ". $res[$i]->getSegundoApellido();
	$fecha = $res[$i]->getFechaCommit();

    $pdf->Cell(15,8,$id,1,0,'C');
    $pdf->Cell(30,8,limitarCadena(utf8_decode($carnet),10,"..."),1,0,'C');
    $pdf->Cell(100,8,limitarCadena(utf8_decode($nombre),35,"..."),1,0,'C');
    
    $pdf->Cell(45,8,limitarCadena(utf8_decode($fecha),20,"..."), 1, 1, 'C');
	

} 
$pdf->Output();

?>
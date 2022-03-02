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
    $this->Cell(210,20,utf8_decode('Reporte de tipos de operaciones monetarias'),0,0,'C');
    $this->Ln(6);
    $this->SetFont('Arial','',12);
    $this->Cell(209,30,utf8_decode('Horarios de atencion: Lunes a Viernes: 7:00 AM - 6:00 PM'),0,0,'C');
    $this->Ln(30);
    
}

// Pie de página
function Footer()
{
    // Posición: a 3 cm del final
    $this->SetY(-30);
    // Arial italic 8
   
    $this->SetFont('Arial','I',8);
    $this->Cell(0,5,utf8_decode('Simbología. CRÉDITO = El monto es considerado un ingreso acreditado a favor de la institución, DÉBITO = El monto es considerado un egreso.'),0,1,'C');
    $this->SetFont('Arial','B',8);
    $this->Cell(0,5,utf8_decode('#Observación: los montos presentados a continuación pueden variar de acuerdo a la administración.'),0,1,'C');
    $this->SetFont('Arial','I',8);
    $this->Cell(0,5,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'R');
}
}

include('../db/Conexion.php');
include("../clases/Operacion.php");

$operacion = new Operacion();
$res = $operacion->obtenerOperaciones();


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->setFillColor(232, 232, 232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(15,6,utf8_decode('No.'),1,0,'C',1);
$pdf->Cell(105,6,utf8_decode('Nombre'),1,0,'C',1);
$pdf->Cell(30,6,utf8_decode('Costo'),1,0,'C',1);
$pdf->Cell(40,6,utf8_decode('Tipo de operación'),1,1,'C',1);


$pdf->SetFont('Arial','',10);

$contador=0;


for($i=0; $i<sizeof($res);$i++) {
    $contador = $contador + 1;
    $id = $contador;
   
    $nombre = $res[$i]->getNombre();
    $costo = $res[$i]->getCosto();
    $tipoOperacion = $res[$i]->getCreditoDebito();

    $pdf->Cell(15,8,$id,1,0,'C');
    
    $pdf->Cell(105,8,limitarCadena(utf8_decode($nombre),40,"..."),1,0,'C');
    
    $pdf->Cell(30,8,limitarCadena(utf8_decode("Q " . $costo),15,"..."),1,0,'C');
    
    if($tipoOperacion==1){
    $pdf->Cell(40,8,limitarCadena(utf8_decode("CRÉDITO"),20,"..."), 1, 1, 'C');
    }else{
        $pdf->Cell(40,8,limitarCadena(utf8_decode("DÉBITO"),20,"..."), 1, 1, 'C');
    }

}


$pdf->Output();

?>
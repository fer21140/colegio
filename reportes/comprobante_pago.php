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
include('../db/Conexion.php');
include("../clases/Operacion.php");
include("../clases/Movimiento.php");
include("../clases/Alumno.php");
include("../clases/Usuario.php");

class PDF extends FPDF
{

function Header()
{
    
    //Obtenemos el id para obtener los datos del movimiento
    $idMovimiento = $_REQUEST['idMovimiento'];
  

    $this->Image('logo.jpg',10,10,40);
    $this->SetFont('Arial','B',15);
    $this->Cell(210,20,utf8_decode('Instituto Mixto Privado San Cristóbal'),0,0,'C');
    $this->Ln(9);
    $this->Cell(210,20,utf8_decode('Boleta de pago'),0,0,'C');
    $this->Ln(6);
    $this->SetFont('Arial','B',18);
    $this->setTextColor(244,48,13);
    $this->Cell(209,30,utf8_decode('No. ' . $idMovimiento),0,0,'C');
    $this->Ln(30);
    $this->setTextColor(3,3,3);
    $this->SetFont('Arial','',12);
    
}

// Pie de página
function Footer()
{
    // Posición: a 3 cm del final
    $this->SetY(-30);
    // Arial italic 8
   
    $this->SetFont('Arial','I',8);
    $this->Cell(0,5,utf8_decode('La información expuesta en este documento puede ser utilizada como comprobante de una transacción, guárdelo en un lugar seguro'),0,1,'C');
    $this->SetFont('Arial','B',8);
    $this->Cell(0,5,utf8_decode('#Observación: este documento puede ser anulado a solicitud del cliente en caso de error administrativo.'),0,1,'C');
    $this->SetFont('Arial','I',8);
    $this->Cell(0,5,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'R');
}
}



 //Obtenemos el id para obtener los datos del movimiento
 $idMovimiento = $_REQUEST['idMovimiento'];
 $movimiento = new Movimiento();
 $resMovimiento = $movimiento->buscarPorId($idMovimiento);
 $numeroCom = $resMovimiento->getNumeroComprobante();
 $idOperacion = $resMovimiento->getIdOperacion();
 $idUsuarioReceptor = $resMovimiento->getIdUsuarioReceptor();
 $idUsuarioOperacion = $resMovimiento->getIdUsuarioOperacion();
 $fecha = $resMovimiento->getFechaCommit();
 $total = $resMovimiento->getTotal();
 $estado = $resMovimiento->getEstado();

 //Obtenemos datos del alumno que hizo el pago

 $alumno = new Alumno();
 $resAlumno = $alumno->buscarPorId($idUsuarioReceptor);
 $nombreAlumno = $resAlumno->getPrimerNombre() . " " . $resAlumno->getSegundoNombre() . " " . $resAlumno->getTercerNombre() . " " . $resAlumno->getPrimerApellido() . " " . $resAlumno->getSegundoApellido();
 $carnet = $resAlumno->getCarnet();
 
//Obtenemos datos de la operacion
 $operacion = new Operacion();
 $resOperacion = $operacion->buscarPorId($idOperacion);

 $nombreOperacion = $resOperacion->getNombre();

 //Obtenemos datos del usuario responsable de la operacion
 $usuario = new Usuario();
 $resUsuario = $usuario->buscarPorId($idUsuarioOperacion);
 $nombreUsuario = $resUsuario->getNombres() . " " . $resUsuario->getApellidos();

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->setFillColor(232, 232, 232);

//datos del alumno y el usuario que hizo la operacion

//Imprimimos el alumno
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30,10,utf8_decode('ALUMNO: '),1,0,'L',1);
$pdf->SetFont('Arial','',12);
$pdf->Cell(160,10,limitarCadena(utf8_decode($nombreAlumno),40,"..."),1,1,'L',1);
//Imprimimos el carnet del alumno
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30,10,utf8_decode('CARNET: '),1,0,'L',1);
$pdf->SetFont('Arial','',12);
$pdf->Cell(160,10,limitarCadena(utf8_decode($carnet),40,"..."),1,1,'L',1);

//damos un espaciado hacia abajo
$pdf->ln(2);
//Imprimimos el tipo de transaccion
$pdf->SetFont('Arial','B',12);
$pdf->Cell(70,10,utf8_decode('TIPO DE TRANSACCIÓN: '),1,0,'L',1);
$pdf->SetFont('Arial','',12);
$pdf->Cell(120,10,limitarCadena(utf8_decode("  " . $nombreOperacion),40,"..."),1,1,'L',1);
//Imprimimos el numero de comprobante
$pdf->SetFont('Arial','B',12);
$pdf->Cell(70,10,utf8_decode('NÚMERO DE COMPROBANTE: '),1,0,'L',1);
$pdf->SetFont('Arial','',12);
$pdf->Cell(120,10,limitarCadena(utf8_decode("  " . $numeroCom),40,"..."),1,1,'L',1);

//Imprimimos el usuario que realizo la operacion
$pdf->SetFont('Arial','B',12);
$pdf->Cell(70,10,utf8_decode('USUARIO RESPONSABLE: '),1,0,'L',1);
$pdf->SetFont('Arial','',12);
$pdf->Cell(120,10,limitarCadena(utf8_decode("  " . $nombreUsuario),40,"..."),1,1,'L',1);

//Imprimimos la fecha del movimiento
$pdf->SetFont('Arial','B',12);
$pdf->Cell(70,10,utf8_decode('FECHA DE PAGO: '),1,0,'L',1);
$pdf->SetFont('Arial','',12);

$timestamp = strtotime($fecha); 
$newDate = date("d-m-Y h:i:s", $timestamp );

$pdf->Cell(120,10,limitarCadena(utf8_decode("  " . $newDate),40,"..."),1,1,'L',1);

//Imprimimos el valor pagado

$pdf->ln(2);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(70,10,utf8_decode('TOTAL PAGADO: '),1,0,'L',1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(120,10,limitarCadena(utf8_decode(" Q " . $total),40,"..."),1,1,'C',1);


if($estado==1){
$pdf->ln(10);

$pdf->Image('pago_valido.png',85,150,40);
$pdf->ln(46);
$pdf->Cell(192,20,utf8_decode('Documento válido'),0,0,'C');

}else{
    $pdf->ln(10);
    $pdf->Image('pago_invalido.png',85,150,40);
    $pdf->ln(46);
    $pdf->Cell(191,20,utf8_decode('Documento anulado'),0,0,'C');
}

$pdf->Output();

?>
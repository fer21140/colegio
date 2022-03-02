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
    $this->Cell(280,20,utf8_decode('Instituto Mixto Privado San Cristóbal'),0,0,'C');
    $this->Ln(9);

    $mes = $_REQUEST['mes'];
    $anio = $_REQUEST['anio'];

    $mesLetras="";
    
    if($mes==1){
        $mesLetras="ENERO";
    }

    if($mes==2){
        $mesLetras="FEBRERO";
    }
    if($mes==3){
        $mesLetras="MARZO";
    }
    if($mes==4){
        $mesLetras="ABRIL";
    }
    if($mes==5){
        $mesLetras="MAYO";
    }
    if($mes==6){
        $mesLetras="JUNIO";
    }
    if($mes==7){
        $mesLetras="JULIO";
    }
    if($mes==8){
        $mesLetras="AGOSTO";
    }
    if($mes==9){
        $mesLetras="SEPTIEMBRE";
    }
    if($mes==10){
        $mesLetras="OCTUBRE";
    }
    if($mes==11){
        $mesLetras="NOVIEMBRE";
    }
    if($mes==12){
        $mesLetras="DICIEMBRE";
    }

    $this->Cell(280,20,utf8_decode('Reporte de planilla mes de ' . $mesLetras . " de " . $anio),0,0,'C');
    $this->Ln(6);
    $this->SetFont('Arial','',12);
    $this->Cell(280,30,utf8_decode('Horarios de atencion: Lunes a Viernes: 7:00 AM - 6:00 PM'),0,0,'C');
    $this->Ln(30);
    
}

// Pie de página
function Footer()
{
    // Posición: a 1.5 cm del final
    $this->SetY(-15);
    
    $this->Cell(0,5,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'R');
}
}

include('../db/Conexion.php');
include("../clases/Planilla.php");
include("../clases/Usuario.php");

$planilla = new Planilla();

$mesBusqueda = $_REQUEST['mes'];
$anioBusqueda = $_REQUEST['anio'];

$res = $planilla->obtenerPlanillasMesAnio($mesBusqueda,$anioBusqueda);


// Creación del objeto de la clase heredada
$pdf=new PDF('L','mm','A4');
//$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->setFillColor(232, 232, 232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(15,6,utf8_decode('No.'),1,0,'C',1);
$pdf->Cell(35,6,utf8_decode('DPI'),1,0,'C',1);
$pdf->Cell(100,6,utf8_decode('Empleado'),1,0,'C',1);
$pdf->Cell(27,6,utf8_decode('S. Ordinario'),1,0,'C',1);
$pdf->Cell(20,6,utf8_decode('Abono'),1,0,'C',1);
$pdf->Cell(25,6,utf8_decode('Descuento'),1,0,'C',1);
$pdf->Cell(28,6,utf8_decode('No. Cheque'),1,0,'C',1);

$pdf->Cell(25,6,utf8_decode('S. Líquido'),1,1,'C',1);


$pdf->SetFont('Arial','',10);

$contador=0;
$total = 0;
$sumaOrdinario = 0;
$sumaAbono = 0;
$sumaDescuento = 0;

for($i=0; $i<sizeof($res);$i++) {
    $contador = $contador + 1;
    $id = $contador;
    
    $idEmpleado = $res[$i]->getIdEmpleado();
    $nombreEmpleado = $res[$i]->getNombreEmpleado();

    $empleado = new Usuario();

    $resEmpleado = $empleado->buscarPorId($idEmpleado);

    $dpiEmpleado = $resEmpleado->getDpi();

    $salarioOrdinario = $res[$i]->getSalarioOrdinario();
    $abono = $res[$i]->getAbono();
    $descuento = $res[$i]->getDescuento();
    $noCheque = $res[$i]->getNumeroCheque();
    $sueldoLiquido = $res[$i]->getSueldoLiquido();

    $total = $total + $sueldoLiquido;
    $sumaOrdinario = $sumaOrdinario + $salarioOrdinario;
    $sumaAbono = $sumaAbono + $abono;
    $sumaDescuento = $sumaDescuento + $descuento;

    $pdf->Cell(15,8,$id,1,0,'C');
    
    $pdf->Cell(35,8,limitarCadena(utf8_decode($dpiEmpleado),15,"..."),1,0,'C');
    
    $pdf->Cell(100,8,limitarCadena(utf8_decode($nombreEmpleado),35,"..."),1,0,'C');

    $pdf->Cell(27,8,limitarCadena(utf8_decode($salarioOrdinario),20,"..."),1,0,'C');
    $pdf->Cell(20,8,limitarCadena(utf8_decode($abono),20,"..."),1,0,'C');
    $pdf->Cell(25,8,limitarCadena(utf8_decode($descuento),20,"..."),1,0,'C');
    $pdf->Cell(28,8,limitarCadena(utf8_decode($noCheque),20,"..."),1,0,'C');


    $pdf->Cell(25,8,limitarCadena(utf8_decode("Q " . $sueldoLiquido),20,"..."), 1, 1, 'C');
    
    

}

$pdf->SetFont('Arial','B',10);

    $pdf->Cell(15,8,"----",1,0,'C',1);
    
    $pdf->Cell(35,8,limitarCadena(utf8_decode("--------------------"),30,"..."),1,0,'C',1);
    
    $pdf->Cell(100,8,limitarCadena(utf8_decode("-----Totales (Q)-----"),40,"..."),1,0,'C',1);

    $pdf->Cell(27,8,limitarCadena(utf8_decode("Q " . $sumaOrdinario),20,"..."),1,0,'C',1);
    $pdf->Cell(20,8,limitarCadena(utf8_decode("Q " . $sumaAbono),20,"..."),1,0,'C',1);
    $pdf->Cell(25,8,limitarCadena(utf8_decode("Q " . $sumaDescuento),20,"..."),1,0,'C',1);
    $pdf->Cell(28,8,limitarCadena(utf8_decode("----------"),20,"..."),1,0,'C',1);


    $pdf->Cell(25,8,limitarCadena(utf8_decode("Q " . $total),20,"..."), 1, 1, 'C',1);


$pdf->Output();

?>
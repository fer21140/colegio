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
    
    $tipoReporte = $_REQUEST['tipoReporte'];

    $nombreReporte="";

    if($tipoReporte==0){
        $nombreReporte="Reporte de todas las transacciones hasta la fecha";
    }
    if($tipoReporte==1){
        $nombreReporte="Reporte de transacciones por estudiante";
    }
    if($tipoReporte==2){
        $fechaInicio = $_REQUEST['fechaInicio'];
        $fechaFin = $_REQUEST['fechaFin'];
        $nombreReporte="Reporte de transacciones desde " . $fechaInicio . " hasta " . $fechaFin;
    }
    if($tipoReporte==3){
        $fechaInicio = $_REQUEST['fechaInicio'];
        $fechaFin = $_REQUEST['fechaFin'];
        $nombreReporte="Reporte de transacciones por estudiante desde " . $fechaInicio . " hasta " . $fechaFin;
    }

    $this->Image('logo.jpg',10,10,40);
    $this->SetFont('Arial','B',15);
    $this->Cell(280,20,utf8_decode('Instituto Mixto Privado San Cristóbal'),0,0,'C');
    $this->Ln(9);
    $this->Cell(280,20,utf8_decode($nombreReporte),0,0,'C');
    $this->Ln(6);
    $this->SetFont('Arial','',12);
    $this->Cell(280,30,utf8_decode('Horarios de atencion: Lunes a Viernes: 7:00 AM - 6:00 PM'),0,0,'C');
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

    include("../clases/Movimiento.php");
    include("../db/Conexion.php");
    include("../clases/Operacion.php");
    include("../clases/Usuario.php");
    include("../clases/Alumno.php");


// Creación del objeto de la clase heredada
$pdf=new PDF('L','mm','A4');
//$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$movimiento = new Movimiento();


$tipoResultados = $_REQUEST['tipoReporte'];

$movimientoArray;

if($tipoResultados==0){
    $movimientoArray = $movimiento->obtenerMovimientos();
}

if($tipoResultados==1){
    $idAlumnoBuscar = $_REQUEST['idAlumno'];
    $movimientoArray = $movimiento->obtenerMovimientosPorAlumno($idAlumnoBuscar);
}

if($tipoResultados==2){
    $fechaInicioMovimiento = $_REQUEST['fechaInicio'];
    $fechaFinMovimiento = $_REQUEST['fechaFin'];

    $movimientoArray = $movimiento->obtenerMovimientosPorFechas($fechaInicioMovimiento,$fechaFinMovimiento);
}

if($tipoResultados==3){
    $idAlumnoBusqueda = $_REQUEST['idAlumno'];
    $fechaInicioMovimiento = $_REQUEST['fechaInicio'];
    $fechaFinMovimiento = $_REQUEST['fechaFin'];
    $movimientoArray = $movimiento->obtenerMovimientosPorAlumnoFechas($fechaInicioMovimiento,$fechaFinMovimiento,$idAlumnoBusqueda);

}



$pdf->setFillColor(232, 232, 232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(15,6,utf8_decode('No.'),1,0,'C',1);
$pdf->Cell(85,6,utf8_decode('Operación'),1,0,'C',1);
$pdf->Cell(60,6,utf8_decode('Alumno'),1,0,'C',1);
//$pdf->Cell(60,6,utf8_decode('Usuario'),1,0,'C',1);
$pdf->Cell(30,6,utf8_decode('Comprobante'),1,0,'C',1);
$pdf->Cell(35,6,utf8_decode('Fecha'),1,0,'C',1);
$pdf->Cell(25,6,utf8_decode('Ingreso'),1,0,'C',1);
$pdf->Cell(25,6,utf8_decode('Egreso'),1,1,'C',1);

$pdf->SetFont('Arial','',10);

$contador=0;
$sumaIngresos= 0;
$sumaEgresos=0;

for($i=(sizeof($movimientoArray)-1); $i>=0;$i--){
    if($movimientoArray[$i]->getEstado()==1){

    $contador = $contador+1;

    $idMovimiento = $movimientoArray[$i]->getId();

    $idOperacion = $movimientoArray[$i]->getIdOperacion();
    $operacion = new Operacion();
    $resOperacion = $operacion->buscarPorId($idOperacion);
    $nombreOperacion = $resOperacion->getNombre();
    $tipoOperacionCreditoDebito = $resOperacion->getCreditoDebito();

    $idAlumno = $movimientoArray[$i]->getIdUsuarioReceptor();
    $alumno = new Alumno();
    $resAlumno = $alumno->buscarPorId($idAlumno);
    $nombreAlumno = $resAlumno->getPrimerNombre() . " " . $resAlumno->getSegundoNombre() . " " . $resAlumno->getTercerNombre() . " " . $resAlumno->getPrimerApellido() . " " . $resAlumno->getSegundoApellido();

   

      $idUsuario = $movimientoArray[$i]->getIdUsuarioOperacion();
      $usuario = new Usuario();
      $resUsuario = $usuario->buscarPorId($idUsuario);

      $usuarioEmisor = $resUsuario->getNombres() . " " . $resUsuario->getApellidos();
     
      $numeroComprobante = $movimientoArray[$i]->getNumeroComprobante();
      $total = $movimientoArray[$i]->getTotal();
      $fechaCommit = $movimientoArray[$i]->getFechaCommit();
      $estado = $movimientoArray[$i]->getEstado();

      $pdf->Cell(15,8,limitarCadena(utf8_decode($contador),15,"..."),1,0,'C');
      $pdf->Cell(85,8,limitarCadena(utf8_decode($nombreOperacion),30,"..."),1,0,'C');
      $pdf->Cell(60,8,limitarCadena(utf8_decode($nombreAlumno),20,"..."),1,0,'C');
      //$pdf->Cell(60,8,limitarCadena(utf8_decode($usuarioEmisor),20,"..."),1,0,'C');
      $pdf->Cell(30,8,limitarCadena(utf8_decode($numeroComprobante),20,"..."),1,0,'C');
      $pdf->Cell(35,8,limitarCadena(utf8_decode($fechaCommit),30,"..."),1,0,'C');

      if($tipoOperacionCreditoDebito==1){
        $pdf->Cell(25,8,limitarCadena(utf8_decode("Q ". $total),20,"..."),1,0,'C');
        $pdf->Cell(25,8,limitarCadena(utf8_decode("Q 0.00"),20,"..."),1,1,'C');

        $sumaIngresos = $sumaIngresos + $total;
      }
      if($tipoOperacionCreditoDebito==0){
        $pdf->Cell(25,8,limitarCadena(utf8_decode("Q 0.00"),20,"..."),1,0,'C');
        $pdf->Cell(25,8,limitarCadena(utf8_decode("Q " . $total),20,"..."),1,1,'C');

        $sumaEgresos = $sumaEgresos + $total;
      }
      
    
    }
    
  }

  $pdf->SetFont('Arial','B',10);

  $pdf->Cell(15,8,limitarCadena(utf8_decode("-----"),15,"..."),1,0,'C',1);
      $pdf->Cell(85,8,limitarCadena(utf8_decode("--------------------"),35,"..."),1,0,'C',1);
      $pdf->Cell(60,8,limitarCadena(utf8_decode("Totales (Q)"),35,"..."),1,0,'C',1);
      //$pdf->Cell(60,8,limitarCadena(utf8_decode("Totales (Q)"),35,"..."),1,0,'C',1);
      $pdf->Cell(30,8,limitarCadena(utf8_decode("----------"),20,"..."),1,0,'C',1);
      $pdf->Cell(35,8,limitarCadena(utf8_decode("----------"),30,"..."),1,0,'C',1);
      $pdf->Cell(25,8,limitarCadena(utf8_decode("Q ". $sumaIngresos),20,"..."),1,0,'C',1);
      $pdf->Cell(25,8,limitarCadena(utf8_decode("Q " . $sumaEgresos),20,"..."),1,1,'C',1);


$pdf->Output();

?>
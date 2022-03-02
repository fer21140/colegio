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
include("../clases/Curso.php");
include("../clases/Grado.php");
include("../clases/Usuario.php");
include("../clases/Matricula.php");
include("../clases/Alumno.php");

class PDF extends FPDF
{

function Header()
{
    
    $this->Image('logo.jpg',10,10,40);
    $this->SetFont('Arial','B',15);
    $this->Cell(210,20,utf8_decode('Instituto Mixto Privado San Cristóbal'),0,0,'C');
    $this->Ln(9);

    $idSearch = $_REQUEST['idGrado'];

    $gradoAux = new Grado();
    $resGradoAux = $gradoAux->buscarPorId($idSearch);
    $nombreGradoPensum = $resGradoAux->getNombre();

    if(strlen($nombreGradoPensum)>40){
        $this->SetFont('Arial','B',8);
        $this->Cell(210,20,limitarCadena(utf8_decode('ESTUDIANTES ' . $nombreGradoPensum),75,"..."),0,0,'C');
    }else{
        $this->SetFont('Arial','B',15);
        $this->Cell(210,20,limitarCadena(utf8_decode('ESTUDIANTES ' . $nombreGradoPensum),40,"..."),0,0,'C');
    
    }

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




$idBus = $_REQUEST['idGrado'];
$anioBus = $_REQUEST['anio'];
$matricula = new Matricula();
$matriculaArray = $matricula->obtenerMatriculasGradoAnio($idBus,$anioBus);


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->setFillColor(232, 232, 232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(15,6,utf8_decode('No.'),1,0,'C',1);
$pdf->Cell(50,6,utf8_decode('Carnet'),1,0,'C',1);
$pdf->Cell(125,6,utf8_decode('Estudiante'),1,1,'C',1);




$pdf->SetFont('Arial','',10);

$contador=0;

for($i=0; $i<sizeof($matriculaArray);$i++) {
    $contador = $contador + 1;
    $id = $contador;
    
     //Obtener nombres del alumno
     $alumno = new Alumno();
     $resAlumno = $alumno->buscarPorId($matriculaArray[$i]->getIdAlumno());
     $nombreAlumno = $resAlumno->getPrimerNombre() . " " . $resAlumno->getSegundoNombre() . " " . $resAlumno->getTercerNombre() . " " . $resAlumno->getPrimerApellido() . " " . $resAlumno->getSegundoApellido();
     $carnet = $resAlumno->getCarnet();

    $pdf->Cell(15,8,$id,1,0,'C');
    $pdf->Cell(50,8,limitarCadena(utf8_decode($carnet),15,"..."),1,0,'C');
    $pdf->Cell(125,8,limitarCadena(utf8_decode($nombreAlumno),45,"..."),1,1,'C');
    

    

} 
$pdf->Output();

?>
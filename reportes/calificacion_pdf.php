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
include("../clases/Nota.php");

class PDF extends FPDF
{

function Header()
{
    
    $this->Image('logo.jpg',10,10,40,50);
    $this->SetFont('Arial','B',15);
    $this->Cell(210,20,utf8_decode('Instituto Mixto Privado San Cristóbal'),0,0,'C');
    $this->Ln(9);

    $idSearch = $_REQUEST['idGrado'];

    $gradoAux = new Grado();
    $resGradoAux = $gradoAux->buscarPorId($idSearch);
    $nombreGradoPensum = $resGradoAux->getNombre();

    if(strlen($nombreGradoPensum)>40){
        $this->SetFont('Arial','B',8);
        $this->Cell(210,20,limitarCadena(utf8_decode($nombreGradoPensum),75,"..."),0,0,'C');
    }else{
        $this->SetFont('Arial','B',15);
        $this->Cell(210,20,limitarCadena(utf8_decode($nombreGradoPensum),40,"..."),0,0,'C');
    
    }
    $this->SetFont('Arial','B',12);
    $this->Ln(9);

    $alumnoSearch = new Alumno();
    $idAlumnoSearch = $_REQUEST['idAlumno'];
    $resAlumnoSearch = $alumnoSearch->buscarPorId($idAlumnoSearch);

    $nombreAlumnoSearch = $resAlumnoSearch->getPrimerNombre() . " " . $resAlumnoSearch->getSegundoNombre() . " " . $resAlumnoSearch->getTercerNombre() . " " . $resAlumnoSearch->getPrimerApellido() . " " . $resAlumnoSearch->getSegundoApellido();
    $carnetAlumnoSearch = $resAlumnoSearch->getCarnet();
    $this->setTextColor(244,48,13);
    $this->Ln(1);
    $this->Cell(210,20,limitarCadena(utf8_decode('TARJETA ELECTRÓNICA DE CALIFICACIONES'),37,"..."),0,0,'C');
    
    $this->Ln(9);
    $this->setTextColor(3,3,3);
    if(strlen($nombreAlumnoSearch)>31){
        $this->SetFont('Arial','B',8);
        $this->Cell(210,20,limitarCadena(utf8_decode("[ ". $carnetAlumnoSearch . " ] " . $nombreAlumnoSearch),75,"..."),0,0,'C');
    }else{
        $this->SetFont('Arial','B',12);
        $this->Cell(210,20,limitarCadena(utf8_decode('[ ' . $carnetAlumnoSearch . " ] " . $nombreAlumnoSearch),41,"..."),0,0,'C');
    
    }
    
    $this->SetFont('Arial','',12);
    $this->Ln(6);
    $this->Cell(209,30,utf8_decode('Horarios de atencion: Lunes a Viernes: 7:00 AM - 6:00 PM'),0,0,'C');
    $this->Ln(25);
    
}

// Pie de página
function Footer()
{
    
    // Posición: a 3 cm del final
    $this->SetY(-30);
    // Arial italic 8
   
    $this->SetFont('Arial','I',8);
    $this->Cell(0,5,utf8_decode('Simbología. NNI = NOTA NO INGRESADA.'),0,1,'C');
    $this->SetFont('Arial','B',8);
    $this->Cell(0,5,utf8_decode('#Observación: la nota total acumulada debe ser mayor o igual a 60 puntos al final del ciclo académico para que el estudiante sea promovido.'),0,1,'C');
    $this->SetFont('Arial','I',8);
    $this->Cell(0,5,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'R');
}
}


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->setFillColor(232, 232, 232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(15,6,utf8_decode('No.'),1,0,'C',1);
$pdf->Cell(100,6,utf8_decode('Curso'),1,0,'C',1);

$pdf->Cell(15,6,utf8_decode('B1'),1,0,'C',1);
$pdf->Cell(15,6,utf8_decode('B2'),1,0,'C',1);
$pdf->Cell(15,6,utf8_decode('B3'),1,0,'C',1);
$pdf->Cell(15,6,utf8_decode('B4'),1,0,'C',1);

$pdf->Cell(15,6,utf8_decode('Total'),1,1,'C',1);


$pdf->SetFont('Arial','',10);


//----------------------PROCESO DE GENERACIÓN DE TARJETA DE CALIFICACIÓN------

                
                $idAlumno = $_REQUEST['idAlumno'];
                $anio = $_REQUEST['anio'];
                $grado = $_REQUEST['idGrado'];

                $cursoB = new Curso();
                $cursoArray = $cursoB->obtenerCursosPorGrado($grado);
                
                $contador =0;
                for($i=0; $i<sizeof($cursoArray);$i++){
                  $contador = $contador + 1;
                  //Obtenemos id de la nota
                  $id = $cursoArray[$i]->getId();
                  //Obtenemos id del curso
                  $idCurso = $cursoArray[$i]->getId();
                  //Instanciamos la clase curso
                  $curso = new Curso();
                  //Buscamos el curso por id
                  $resCurso = $curso->buscarPorId($idCurso);
                  //Obtenemos nombre del curso
                  $nombreCurso = $resCurso->getNombre();

                  //---------Generamos las notas por bimestre 

                  $notaBimestre = new Nota();
                  $notaArrayBimestre = $notaBimestre->obtenerNotasAlumnoAnioCurso($idAlumno,$anio,$idCurso);
                
                  //Inicializamos bimestres
                  $bimestre1 =-1;
                  $idBim1=0;

                  $bimestre2=-1;
                  $idBim2=0;

                  $bimestre3=-1;
                  $idBim3=0;

                  $bimestre4=-1;
                  $idBim4=0;

                  //Recorremos los resultados
                  for($r=0;$r<sizeof($notaArrayBimestre);$r++){

                    if($notaArrayBimestre[$r]->getBimestre()==1){
                        $bimestre1=$notaArrayBimestre[$r]->getNota();
                        $idBim1 = $notaArrayBimestre[$r]->getId();
                    }
                    
                    if($notaArrayBimestre[$r]->getBimestre()==2){
                        $bimestre2=$notaArrayBimestre[$r]->getNota();
                        $idBim2 = $notaArrayBimestre[$r]->getId();
                    }
                    
                    if($notaArrayBimestre[$r]->getBimestre()==3){
                        $bimestre3=$notaArrayBimestre[$r]->getNota();
                        $idBim3 = $notaArrayBimestre[$r]->getId();
                    }
                    
                    if($notaArrayBimestre[$r]->getBimestre()==4){
                        $bimestre4=$notaArrayBimestre[$r]->getNota();
                        $idBim4 = $notaArrayBimestre[$r]->getId();
                    }


                  }

                  $total=-1;

                  

                  //Imprimimos datos
                  

                    $pdf->Cell(15,8,$contador,1,0,'C');
                    $pdf->Cell(100,8,limitarCadena(utf8_decode($nombreCurso),45,"..."),1,0,'C');
                    

                   
                    $total=0;
                    
                    if($bimestre1>=0){
                    
                    $total = $total + $bimestre1;
                    
                    $pdf->Cell(15,8,limitarCadena(utf8_decode($bimestre1),10,"..."),1,0,'C');
                   
                    }else{
                        $pdf->Cell(15,8,limitarCadena(utf8_decode("NNI"),10,"..."),1,0,'C');
                    }

                    if($bimestre2>=0){
                        $total = $total+$bimestre2;
                        
                        $pdf->Cell(15,8,limitarCadena(utf8_decode($bimestre2),10,"..."),1,0,'C');

                    }else{
                        $pdf->Cell(15,8,limitarCadena(utf8_decode("NNI"),10,"..."),1,0,'C');
                    }

                    if($bimestre3>=0){
                        $total = $total+$bimestre3;
                   
                        $pdf->Cell(15,8,limitarCadena(utf8_decode($bimestre3),10,"..."),1,0,'C');
                    
                    }else{
                        $pdf->Cell(15,8,limitarCadena(utf8_decode("NNI"),10,"..."),1,0,'C');
                    }
                    
                    if($bimestre4>=0){
                        $total = $total+$bimestre4;
                        
                        $pdf->Cell(15,8,limitarCadena(utf8_decode($bimestre4),10,"..."),1,0,'C');

                    }else{
                        $pdf->Cell(15,8,limitarCadena(utf8_decode("NNI"),10,"..."),1,0,'C');
                    }
                    
                    if($total>=0){
                        $pdf->Cell(15,8,limitarCadena(utf8_decode($total),10,"..."),1,1,'C');
                        
                    }else{
                        $pdf->Cell(15,8,limitarCadena(utf8_decode("NNI"),10,"..."),1,1,'C');
                    }
                  
                }
                $anioEscolar = $_REQUEST['anio'];
                $pdf->ln(2);
                $pdf->SetFont('Arial','B',12);
                $pdf->Cell(187,8,limitarCadena(utf8_decode("CICLO ESCOLAR ".$anioEscolar),50,"..."),0,1,'C');
 
$pdf->Output();


?>
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

class PDF extends FPDF
{

function Header()
{
    
    $this->Image('logo.jpg',10,10,40);
    $this->SetFont('Arial','B',15);
    $this->Cell(210,20,utf8_decode('Instituto Mixto Privado San Cristóbal'),0,0,'C');
    $this->Ln(9);

    $idSearch = $_REQUEST['id'];

    $gradoAux = new Grado();
    $resGradoAux = $gradoAux->buscarPorId($idSearch);
    $nombreGradoPensum = $resGradoAux->getNombre();

    if(strlen($nombreGradoPensum)>40){
        $this->SetFont('Arial','B',8);
        $this->Cell(210,20,limitarCadena(utf8_decode('PENSUM ' . $nombreGradoPensum),75,"..."),0,0,'C');
    }else{
        $this->SetFont('Arial','B',15);
        $this->Cell(210,20,limitarCadena(utf8_decode('PENSUM ' . $nombreGradoPensum),40,"..."),0,0,'C');
    
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




$idBus = $_REQUEST['id'];
$curso = new Curso();
$cursoArray = $curso->obtenerCursosPorGrado($idBus);


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->setFillColor(232, 232, 232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(15,6,utf8_decode('No.'),1,0,'C',1);
$pdf->Cell(100,6,utf8_decode('Nombre del curso'),1,0,'C',1);
$pdf->Cell(25,6,utf8_decode('Hora inicio'),1,0,'C',1);
$pdf->Cell(20,6,utf8_decode('Hora fin'),1,0,'C',1);
$pdf->Cell(30,6,utf8_decode('Días'),1,1,'C',1);


$pdf->SetFont('Arial','',10);

$contador=0;

$usuarioSesion;
$idUsuarioSesion;
if(isset($_SESSION)){
    $usuario = $_SESSION['usuario'];
    $idUsuarioSesion = $usuario->getId();
}else{
    session_start();
    $usuario = $_SESSION['usuario'];
    $idUsuarioSesion = $usuario->getId();

}



if(isset($_REQUEST['modoVista'])){

for($i=0; $i<sizeof($cursoArray);$i++) {
    if($cursoArray[$i]->getIdProfesor()==$idUsuarioSesion){
    $contador = $contador + 1;
    $id = $contador;
    $nombreCurso = $cursoArray[$i]->getNombre();
    $horaInicio = $cursoArray[$i]->getHoraInicio();
    $horaFin = $cursoArray[$i]->getHoraFin();
    $diasSemana = $cursoArray[$i]->getDiasSemana();
    

    $pdf->Cell(15,8,$id,1,0,'C');
    $pdf->Cell(100,8,limitarCadena(utf8_decode($nombreCurso),45,"..."),1,0,'C');
    $pdf->Cell(25,8,limitarCadena(utf8_decode($horaInicio),20,"..."),1,0,'C');
    $pdf->Cell(20,8,limitarCadena(utf8_decode($horaFin),20,"..."),1,0,'C');

    $cadenaDias ="";

                    for($r=0;$r<strlen($diasSemana);$r++){
                        
                        if(strcmp(strval($diasSemana[$r]), "1") === 0){
                            $cadenaDias = $cadenaDias . "L";
                        }

                        if(strcmp(strval($diasSemana[$r]), "2") === 0){
                            $cadenaDias = $cadenaDias . "M";
                        }
                        if(strcmp(strval($diasSemana[$r]), "3") === 0){
                            $cadenaDias = $cadenaDias . "M";
                        }
                        if(strcmp(strval($diasSemana[$r]), "4") === 0){
                            $cadenaDias = $cadenaDias . "J";
                        }
                        if(strcmp(strval($diasSemana[$r]), "5") === 0){
                            $cadenaDias = $cadenaDias . "V";
                        }
                        if(strcmp(strval($diasSemana[$r]), "6") === 0){
                            $cadenaDias = $cadenaDias . "S";
                        }
                        if(strcmp(strval($diasSemana[$r]), "7") === 0){
                            $cadenaDias = $cadenaDias . "D";
                        }

                    
                    }


    $pdf->Cell(30,8,limitarCadena(utf8_decode($cadenaDias),35,"..."),1,1,'C');
        }//Fin de if validador de profesor

    }
}else{
    //Imprimimos todos los horarios completos del grado
    for($i=0; $i<sizeof($cursoArray);$i++) {
       
        $contador = $contador + 1;
        $id = $contador;
        $nombreCurso = $cursoArray[$i]->getNombre();
        $horaInicio = $cursoArray[$i]->getHoraInicio();
        $horaFin = $cursoArray[$i]->getHoraFin();
        $diasSemana = $cursoArray[$i]->getDiasSemana();
        
    
        $pdf->Cell(15,8,$id,1,0,'C');
        $pdf->Cell(100,8,limitarCadena(utf8_decode($nombreCurso),45,"..."),1,0,'C');
        $pdf->Cell(25,8,limitarCadena(utf8_decode($horaInicio),20,"..."),1,0,'C');
        $pdf->Cell(20,8,limitarCadena(utf8_decode($horaFin),20,"..."),1,0,'C');
    
        $cadenaDias ="";
    
                        for($r=0;$r<strlen($diasSemana);$r++){
                            
                            if(strcmp(strval($diasSemana[$r]), "1") === 0){
                                $cadenaDias = $cadenaDias . "L";
                            }
    
                            if(strcmp(strval($diasSemana[$r]), "2") === 0){
                                $cadenaDias = $cadenaDias . "M";
                            }
                            if(strcmp(strval($diasSemana[$r]), "3") === 0){
                                $cadenaDias = $cadenaDias . "M";
                            }
                            if(strcmp(strval($diasSemana[$r]), "4") === 0){
                                $cadenaDias = $cadenaDias . "J";
                            }
                            if(strcmp(strval($diasSemana[$r]), "5") === 0){
                                $cadenaDias = $cadenaDias . "V";
                            }
                            if(strcmp(strval($diasSemana[$r]), "6") === 0){
                                $cadenaDias = $cadenaDias . "S";
                            }
                            if(strcmp(strval($diasSemana[$r]), "7") === 0){
                                $cadenaDias = $cadenaDias . "D";
                            }
    
                        
                        }
    
    
        $pdf->Cell(30,8,limitarCadena(utf8_decode($cadenaDias),35,"..."),1,1,'C');
            
    
        }
} 
$pdf->Output();

?>
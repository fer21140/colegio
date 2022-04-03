<?php

include("../../db/Conexion.php");
include("../../clases/Grado.php");
include("../../clases/Matricula.php");
include("GradosInscritosJson.php");

    $idAlumno = $_POST['idAlumno'];
    //$idAlumno=13;
    $grado = new Grado();
    $resultadoGrados = array();
    

    $matricula = new Matricula();
    
    $resMatricula = $matricula->obtenerMatriculas();
    
    for($i=0; $i<sizeof($resMatricula); $i++){
       
        $gradosIndex = new GradosInscritosJson();
        
        if($resMatricula[$i]->getIdAlumno() == $idAlumno){
            
            //Obtenemos el id del grado
            $idGrado = $resMatricula[$i]->getIdGrado();
            //Obtenemos el año del grado
            $anioGrado = $resMatricula[$i]->getAnio();
            
            $gradosIndex->setId($idGrado);
            $gradosIndex->setAnio($anioGrado);
            
            $resGrado = $grado->buscarPorId($idGrado);
            //Obtenemos el nombre del grado con una subconsulta
            $nombreGrado = $resGrado->getNombre();
            
            $gradosIndex->setNombre($nombreGrado);
            
            array_push($resultadoGrados,$gradosIndex);
                 
                  
            
            
        }
        
        
    }
    
    $query['grados'] = $resultadoGrados;
    //Imprimimos resultado de grados que cursa el alumno
    echo json_encode($query,JSON_UNESCAPED_UNICODE);


?>
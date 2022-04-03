<?php
                
                include("../../db/Conexion.php");
                include("../../clases/Curso.php");
                include("../../clases/Nota.php");
                include("NotaJson.php");
                
                
                //Array que guardará las notas
                $resultadoNotas = array();
                
                $idAlumno = $_POST['id_alumno'];
                $anio = $_POST['anio'];
                $grado = $_POST['grado'];
                
                //$idAlumno=13;
                //$anio=2022;
                //$grado=14;

                $cursoB = new Curso();
                $cursoArray = $cursoB->obtenerCursosPorGrado($grado);
                
                for($i=0; $i<sizeof($cursoArray);$i++){
                  
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
                  //datos obtenidos: $id, $nombreCurso, $bimestre1, $bimestre2, $bimestre3, $bimestre4, $total
                  
                  //guardamos el nombre del curso
                  
                  $notaJson = new NotaJson();
                  
                  $notaJson->setCurso($nombreCurso);
                   
                    $total=0;
                    
                    if($bimestre1>=0){
                    
                    $total = $total + $bimestre1;
                    
                    //guardamos el bimestre 1
                    $notaJson->setBimestre1($bimestre1);
                   
                    }else{
                       $notaJson->setBimestre1(0);
                    }

                    if($bimestre2>=0){
                        $total = $total+$bimestre2;
                        
                        //guardamos el bimestre 2
                        $notaJson->setBimestre2($bimestre2);
                    }else{
                       $notaJson->setBimestre2(0);
                    }

                    if($bimestre3>=0){
                        $total = $total+$bimestre3;
                        //guardamos el bimestre 3
                        $notaJson->setBimestre3($bimestre3);
                    
                    }else{
                       $notaJson->setBimestre3(0);
                    }
                    
                    if($bimestre4>=0){
                        $total = $total+$bimestre4;
                    
                    //guardamos el bimestre 4
                    $notaJson->setBimestre4($bimestre4);
                    
                    }else{
                        $notaJson->setBimestre4(0);
                    }
                    
                    if($total>=0){
                    $notaJson->setTotal($total);
                    }else{
                        $notaJson->setTotal(0);
                    }
                    
                    array_push($resultadoNotas,$notaJson);
                  //Terminamos de obtener un resultado y vuelve a iterar segun los resultados encontrados
                  
                }
                
                $resu['notas']= $resultadoNotas;
            
            echo json_encode($resu,JSON_UNESCAPED_UNICODE);
?>
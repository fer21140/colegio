<?php
                
                include("../../db/Conexion.php");
                include("../../clases/Grado.php");
                include("../../clases/Curso.php");
                include("../../clases/Usuario.php");
                include("HorarioJson.php");
                
                $idSearch = $_POST['id'];
                //$idSearch = 14;
                
                $curso = new Curso();
                $cursoArray = $curso->obtenerCursosPorGrado($idSearch);
                $arrayHorarios = array();
                
                for($i=0; $i<sizeof($cursoArray);$i++){
                  
                    //Si son cursos del profesor entonces los imprimimos
                  


                  $id = $cursoArray[$i]->getId();
                  $nombre = $cursoArray[$i]->getNombre();
                  $profesor = $cursoArray[$i]->getIdProfesor();
                  
                  $usuario = new Usuario();
                  $resUsuario = $usuario->buscarPorId($profesor);
                  $nombreProfesor = $resUsuario->getNombres() . " " . $resUsuario->getApellidos();

                  $grado = $cursoArray[$i]->getIdGrado();

                  $gradoClase = new Grado();
                  $gradoRes = $gradoClase->buscarPorId($grado);
                  $nombreGrado = $gradoRes->getNombre();

                  $horaInicio = $cursoArray[$i]->getHoraInicio();
                  $horaFin = $cursoArray[$i]->getHoraFin();
                  $diasSemana = $cursoArray[$i]->getDiasSemana();
                  $estado = $cursoArray[$i]->getEstado();
                  

                    
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
                    //Llenamos clase json
                  $horarioJson = new HorarioJson();
                  $horarioJson->setCurso($nombre);
                  $horarioJson->setProfesor($nombreProfesor);
                  $horarioJson->setHoraInicio($horaInicio);
                  $horarioJson->setHoraFin($horaFin);
                  $horarioJson->setDiasSemana($cadenaDias);
                  
                   array_push($arrayHorarios,$horarioJson);

                  
                
                }
                
                 $query['horarios'] = $arrayHorarios;
                 //Imprimimos los horarios en json
                echo json_encode($query,JSON_UNESCAPED_UNICODE);
                  ?>
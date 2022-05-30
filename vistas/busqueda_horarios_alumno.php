<?php

    include("../db/Conexion.php");
    include("../clases/Grado.php");
    include("../clases/Curso.php");
    include("../clases/Alumno.php");
    include("../clases/Usuario.php");

?>
<?php

$usuarioSesion;
$nombreSesion;
$apellidoSesion;


          if(isset($_SESSION['alumno'])){
            $usuarioSesion = $_SESSION['alumno'];
            $nombreSesion = $usuarioSesion->getPrimerNombre();
            $apellidoSesion = $usuarioSesion->getPrimerApellido();
          
          }else{
            session_start(); 
            $usuarioSesion = $_SESSION['alumno'];
            $nombreSesion = $usuarioSesion->getPrimerNombre();
            $apellidoSesion = $usuarioSesion->getPrimerApellido();
          
          }


    
        ?>

<div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Profesor</th>
                    <th>Grado</th>
                    <th>Hora de inicio</th>
                    <th>Hora de fin</th>
                    <th>Días de la semana</th>

                    <th>Estado</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                 
                 
                <?php
                
                $idSearch = $_REQUEST['id'];

                $curso = new Curso();
                $cursoArray = $curso->obtenerCursosPorGrado($idSearch);
                
                for($i=0; $i<sizeof($cursoArray);$i++){
                  
                    //Si son cursos del profesor entonces los imprimimos
                 

                  echo "<tr>";

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
                  

                  //Imprimimos datos
                  echo "
                    
                    <td>$id</td>
                    <td>$nombre</td>
                    <td>$nombreProfesor</td>
                    <td>$nombreGrado</td>
                    <td>$horaInicio</td>
                    <td>$horaFin</td>
                    
                    ";
                    
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

                    echo "<td>$cadenaDias</td>";
                    

                  //Imprimimos según estado
                 
                  if($estado==1){
                    echo "<td><h4><span class='badge bg-success'>Activo</span></h4></td>";
                  }else{
                    echo "<td><h4><span class='badge bg-danger'>Inactivo</span></h4></td>";
                  }

                  //Imprimimos botones
                  
                   
                    
                  
                  echo "</tr>";
                
                }
                  ?>
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Profesor</th>
                    <th>Grado</th>
                    <th>Hora de inicio</th>
                    <th>Hora de fin</th>
                    <th>Días de la semana</th>
                  <th>Estado</th>
                  </tr>
                  </tfoot>
                </table>
              </div>

              <?php

                    include("layout/librerias_sin_footer.php");
              
              ?>
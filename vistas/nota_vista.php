
    <?php
    
        include("../clases/Nota.php");
        include("../db/Conexion.php");
        include("../clases/Curso.php");
        include("../clases/Usuario.php");

        $usuario = new Usuario();
        $idRol=0;
        $idUsuario=0;

        if(isset($_SESSION)){
            $usuario = $_SESSION['usuario'];
            $idRol = $usuario->getIdRol();
            $idUsuario = $usuario->getId();
        }else{
            session_start();
            $usuario = $_SESSION['usuario'];
            $idRol = $usuario->getIdRol();
            $idUsuario = $usuario->getId();
        }
        
    
    ?>
    
    <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Curso</th>
                    <th>Primer bimestre</th>
                    <th>Segundo bimestre</th>
                    <th>Tercer bimestre</th>
                    <th>Cuarto bimestre</th>
                    <th>Total</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                 
                 
                <?php
                
                $idAlumno = $_REQUEST['id_alumno'];
                $anio = $_REQUEST['anio'];
                $grado = $_REQUEST['grado'];

                $cursoB = new Curso();
                $cursoArray = $cursoB->obtenerCursosPorGrado($grado);
             if($idRol==2){
                for($i=0; $i<sizeof($cursoArray);$i++){
                  echo "<tr>";
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
                  //Obtenemos el id del profesor del curso
                  $idProfesorCurso = $resCurso->getIdProfesor();

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

                  
                if($idUsuario==$idProfesorCurso){
                  //Imprimimos datos
                  echo "
                    
                    <td>$id</td>
                    <td>$nombreCurso</td>";
                   
                    $total=0;
                    
                    if($bimestre1>=0){
                    
                    $total = $total + $bimestre1;
                    echo"<td><h2><span class='badge bg-success'>$bimestre1</span> <a type='button' href='nota_editar.php?id=$idBim1&id_curso=$id&id_alumno=$idAlumno&bimestre=1&anio=$anio' class='btn btn-primary'>
                    <i class='fas fa-pen'></i> 
                    </a></h2></td>";
                   
                    }else{
                        echo"<td><h2><span class='badge bg-success'>NNI</span> <a type='button' href='nota_ingresar_manual.php?id_curso=$id&id_alumno=$idAlumno&bimestre=1&anio=$anio' class='btn btn-primary'>
                        <i class='fas fa-plus'></i> 
                        </a></h2></td>";
                    }

                    if($bimestre2>=0){
                        $total = $total+$bimestre2;
                    echo"<td><h2><span class='badge bg-success'>$bimestre2</span> <a type='button' href='nota_editar.php?id=$idBim2&id_curso=$id&id_alumno=$idAlumno&bimestre=2&anio=$anio' class='btn btn-primary'>
                    <i class='fas fa-pen'></i> 
                    </a></h2></td>";
                    }else{
                        echo"<td><h2><span class='badge bg-success'>NNI</span> <a type='button' href='nota_ingresar_manual.php?id_curso=$id&id_alumno=$idAlumno&bimestre=2&anio=$anio' class='btn btn-primary'>
                        <i class='fas fa-plus'></i> 
                        </a></h2></td>";
                    }

                    if($bimestre3>=0){
                        $total = $total+$bimestre3;
                    echo"<td><h2><span class='badge bg-success'>$bimestre3</span> <a type='button' href='nota_editar.php?id=$idBim3&id_curso=$id&id_alumno=$idAlumno&bimestre=3&anio=$anio' class='btn btn-primary'>
                    <i class='fas fa-pen'></i> 
                    </a></h2></td>";
                    
                    }else{
                        echo"<td><h2><span class='badge bg-success'>NNI</span> <a type='button' href='nota_ingresar_manual.php?id_curso=$id&id_alumno=$idAlumno&bimestre=3&anio=$anio' class='btn btn-primary'>
                        <i class='fas fa-plus'></i> 
                        </a></h2></td>";
                    }
                    
                    if($bimestre4>=0){
                        $total = $total+$bimestre4;
                    echo"<td><h2><span class='badge bg-success'>$bimestre4</span> <a type='button' href='nota_editar.php?id=$idBim4&id_curso=$id&id_alumno=$idAlumno&bimestre=4&anio=$anio' class='btn btn-primary'>
                    <i class='fas fa-pen'></i> 
                    </a></h2></td>";
                    
                    }else{
                        echo"<td><h2><span class='badge bg-success'>NNI</span> <a type='button' href='nota_ingresar_manual.php?id_curso=$id&id_alumno=$idAlumno&bimestre=4&anio=$anio' class='btn btn-primary'>
                        <i class='fas fa-plus'></i> 
                        </a></h2></td>";
                    }
                    
                    if($total>=0){
                    echo"<td><h2><span class='badge bg-success'>$total</span></h2></td>";
                    }else{
                        echo"<td><h2><span class='badge bg-success'>NNI</span></h2></td>";
                    }
                  
                    }//Fin de if validador si el profesor es quién da el curso

                    //Saltamos a la otra fila
                  echo "</tr>";
                }
            }

            //Si es administrador entonces tiene acceso a todos los cursos
            if($idRol==1){

                for($i=0; $i<sizeof($cursoArray);$i++){
                    echo "<tr>";
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
                    //Obtenemos el id del profesor del curso
                    $idProfesorCurso = $resCurso->getIdProfesor();
  
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
                    echo "
                      
                      <td>$id</td>
                      <td>$nombreCurso</td>";
                     
                      $total=0;
                      
                      if($bimestre1>=0){
                      
                      $total = $total + $bimestre1;
                      echo"<td><h2><span class='badge bg-success'>$bimestre1</span> <a type='button' href='nota_editar.php?id=$idBim1&id_curso=$id&id_alumno=$idAlumno&bimestre=1&anio=$anio' class='btn btn-primary'>
                      <i class='fas fa-pen'></i> 
                      </a></h2></td>";
                     
                      }else{
                          echo"<td><h2><span class='badge bg-success'>NNI</span> <a type='button' href='nota_ingresar_manual.php?id_curso=$id&id_alumno=$idAlumno&bimestre=1&anio=$anio' class='btn btn-primary'>
                          <i class='fas fa-plus'></i> 
                          </a></h2></td>";
                      }
  
                      if($bimestre2>=0){
                          $total = $total+$bimestre2;
                      echo"<td><h2><span class='badge bg-success'>$bimestre2</span> <a type='button' href='nota_editar.php?id=$idBim2&id_curso=$id&id_alumno=$idAlumno&bimestre=2&anio=$anio' class='btn btn-primary'>
                      <i class='fas fa-pen'></i> 
                      </a></h2></td>";
                      }else{
                          echo"<td><h2><span class='badge bg-success'>NNI</span> <a type='button' href='nota_ingresar_manual.php?id_curso=$id&id_alumno=$idAlumno&bimestre=2&anio=$anio' class='btn btn-primary'>
                          <i class='fas fa-plus'></i> 
                          </a></h2></td>";
                      }
  
                      if($bimestre3>=0){
                          $total = $total+$bimestre3;
                      echo"<td><h2><span class='badge bg-success'>$bimestre3</span> <a type='button' href='nota_editar.php?id=$idBim3&id_curso=$id&id_alumno=$idAlumno&bimestre=3&anio=$anio' class='btn btn-primary'>
                      <i class='fas fa-pen'></i> 
                      </a></h2></td>";
                      
                      }else{
                          echo"<td><h2><span class='badge bg-success'>NNI</span> <a type='button' href='nota_ingresar_manual.php?id_curso=$id&id_alumno=$idAlumno&bimestre=3&anio=$anio' class='btn btn-primary'>
                          <i class='fas fa-plus'></i> 
                          </a></h2></td>";
                      }
                      
                      if($bimestre4>=0){
                          $total = $total+$bimestre4;
                      echo"<td><h2><span class='badge bg-success'>$bimestre4</span> <a type='button' href='nota_editar.php?id=$idBim4&id_curso=$id&id_alumno=$idAlumno&bimestre=4&anio=$anio' class='btn btn-primary'>
                      <i class='fas fa-pen'></i> 
                      </a></h2></td>";
                      
                      }else{
                          echo"<td><h2><span class='badge bg-success'>NNI</span> <a type='button' href='nota_ingresar_manual.php?id_curso=$id&id_alumno=$idAlumno&bimestre=4&anio=$anio' class='btn btn-primary'>
                          <i class='fas fa-plus'></i> 
                          </a></h2></td>";
                      }
                      
                      if($total>=0){
                      echo"<td><h2><span class='badge bg-success'>$total</span></h2></td>";
                      }else{
                          echo"<td><h2><span class='badge bg-success'>NNI</span></h2></td>";
                      }
                    
  
                      //Saltamos a la otra fila
                    echo "</tr>";
                  }
            }
                  ?>
                  
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Id</th>
                  <th>Curso</th>
                  <th>Primer bimestre</th>
                  <th>Segundo bimestre</th>
                  <th>Tercer bimestre</th>
                  <th>Cuarto bimestre</th>
                  <th>Total</th>
                  
                  </tr>
                  </tfoot>
                </table>
<?php

include("layout/librerias_sin_footer.php");

?>

    
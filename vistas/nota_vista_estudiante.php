<?php
    
        include("../clases/Nota.php");
        include("../db/Conexion.php");
        include("../clases/Curso.php");
        include("../clases/Alumno.php");
        include("../clases/Matricula.php");

        $alumno = new Alumno();
        
        $idAlumno=0;

        if(isset($_SESSION)){
            $alumno = $_SESSION['alumno'];
           
            $idAlumno = $alumno->getId();
        }else{
            session_start();
            $alumno = $_SESSION['alumno'];
            
            $idAlumno = $alumno->getId();
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

                $solvencia = 0;//0 = no solvente

                //Validamos si el estudiante esta al dia en los pagos del ciclo academico de la consulta de notas
                $matricula = new Matricula();
                $resMatricula = $matricula->obtenerMatriculasGradoAnio($grado,$anio);

                for($i=0;$i<sizeof($resMatricula);$i++){

                    $idAlumnoMatricula = $resMatricula[$i]->getIdAlumno();
                    $mesesAbonados = $resMatricula[$i]->getPagosAbonados();
                    $numeroPagosTotales = $resMatricula[$i]->getNumeroPagos();

                    if($idAlumno==$idAlumnoMatricula){
                        
                        $anioActual = date("Y");
                        $numeroMesActual = date("n");

                        if($anio<$anioActual && $numeroPagosTotales == $mesesAbonados){
                            
                            $solvencia = 1;

                            $cursoB = new Curso();
                $cursoArray = $cursoB->obtenerCursosPorGrado($grado);
             
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
                    echo"<td><h2><span class='badge bg-success'>$bimestre1</span></h2></td>";
                   
                    }else{
                        echo"<td><h2><span class='badge bg-success'>NNI</span></h2></td>";
                    }

                    if($bimestre2>=0){
                        $total = $total+$bimestre2;
                    echo"<td><h2><span class='badge bg-success'>$bimestre2</span></h2></td>";
                    }else{
                        echo"<td><h2><span class='badge bg-success'>NNI</span></h2></td>";
                    }

                    if($bimestre3>=0){
                        $total = $total+$bimestre3;
                    echo"<td><h2><span class='badge bg-success'>$bimestre3</span></h2></td>";
                    
                    }else{
                        echo"<td><h2><span class='badge bg-success'>NNI</span></h2></td>";
                    }
                    
                    if($bimestre4>=0){
                        $total = $total+$bimestre4;
                    echo"<td><h2><span class='badge bg-success'>$bimestre4</span></h2></td>";
                    
                    }else{
                        echo"<td><h2><span class='badge bg-success'>NNI</span></h2></td>";
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

                        if($anio>=$anioActual && $mesesAbonados>=$numeroMesActual){

                            $solvencia=1;

                            $cursoB = new Curso();
                $cursoArray = $cursoB->obtenerCursosPorGrado($grado);
             
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
                    echo"<td><h2><span class='badge bg-success'>$bimestre1</span></h2></td>";
                   
                    }else{
                        echo"<td><h2><span class='badge bg-success'>NNI</span></h2></td>";
                    }

                    if($bimestre2>=0){
                        $total = $total+$bimestre2;
                    echo"<td><h2><span class='badge bg-success'>$bimestre2</span></h2></td>";
                    }else{
                        echo"<td><h2><span class='badge bg-success'>NNI</span></h2></td>";
                    }

                    if($bimestre3>=0){
                        $total = $total+$bimestre3;
                    echo"<td><h2><span class='badge bg-success'>$bimestre3</span></h2></td>";
                    
                    }else{
                        echo"<td><h2><span class='badge bg-success'>NNI</span></h2></td>";
                    }
                    
                    if($bimestre4>=0){
                        $total = $total+$bimestre4;
                    echo"<td><h2><span class='badge bg-success'>$bimestre4</span></h2></td>";
                    
                    }else{
                        echo"<td><h2><span class='badge bg-success'>NNI</span></h2></td>";
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

                        break;
                    }



                }

                if($solvencia==0){
                    echo "<script>alert('¡Se ha detectado insolvencia de pagos en la consulta que deseas realizar, ponte en contacto con tu institución educativa!');</script>";
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
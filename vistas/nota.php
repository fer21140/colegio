<?php

include("layout/header.php");

?>
<title>Módulo | Generar tarjeta de calificaciones</title>
<!-- Tell the browser to be responsive to screen width -->

<?php

include("layout/nav.php");

?>

<?php
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Seleccione un alumno y genere las notas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-12">
                    <!-- general form elements disabled -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Seleccionar alumno</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form role="form" method="post" action="#">
                                <div class="row">

                                <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Seleccionar el grado académico</label>
                                            <select class="form-control selectGrado" id="grado" name="grado">
                                                
                                                <?php
                                                $grado = new Grado();

                                                $resultado = $grado->obtenerGrados();
                                                //Si necesitamos recuperar la vista entonces validamos
                                                if(isset($_REQUEST['grado'])){
                                                    //Imprimimos el que ya estaba seleccionado
                                                    for ($i = 0; $i < sizeof($resultado); $i++) {
                                                        $idGrado = $resultado[$i]->getId();
    
    
                                                        $nombreGrado = $resultado[$i]->getNombre();
    
                                                        if ($resultado[$i]->getEstado() == 1 && $resultado[$i]->getId()==$_REQUEST['grado']) {
                                                            echo "<option value='$idGrado'>$nombreGrado</option>";
                                                        }
                                                    }

                                                    //Imprimimos los demás
                                                    for ($i = 0; $i < sizeof($resultado); $i++) {
                                                        $idGrado = $resultado[$i]->getId();
    
    
                                                        $nombreGrado = $resultado[$i]->getNombre();
    
                                                        if ($resultado[$i]->getEstado() == 1 && $resultado[$i]->getId()!=$_REQUEST['grado']) {
                                                            echo "<option value='$idGrado'>$nombreGrado</option>";
                                                        }
                                                    }
                                                
                                            }else{
                                                echo "<option value='0'>Seleccione el grado</option>";

                                                for ($i = 0; $i < sizeof($resultado); $i++) {
                                                    $idGrado = $resultado[$i]->getId();


                                                    $nombreGrado = $resultado[$i]->getNombre();

                                                    if ($resultado[$i]->getEstado() == 1) {
                                                        echo "<option value='$idGrado'>$nombreGrado</option>";
                                                    }
                                                }

                                            }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <?php
                    $Date = date("d-m-Y");  
                    $year = date("Y");


                    echo "<div class='col-sm-6'>
                    
                    <div class='form-group'>
                      <label>Seleccione el ciclo académico</label>
                      <select class='form-control selectAnio' name='anio' id='anio'>";
                      
                    if(isset($_REQUEST['anio'])){
                        //Si se desea volver a la vista anterior entonces recuperamos el año seleccionado
                        for($i=$year;$i>=2010;$i--) { 
                            if($_REQUEST['anio']==$i){
                            echo "<option value='".$i."'>".$i."</option>";
                            }
                        }
                        //Seguimos imprimiendo los demás
                        for($i=$year;$i>=2010;$i--) { 
                            if($_REQUEST['anio']!=$i){
                            echo "<option value='".$i."'>".$i."</option>";
                            }
                        }

                    }else{
                        
                        for($i=$year;$i>=2010;$i--) { 
                            echo "<option value='".$i."'>".$i."</option>";
                          }
                    }
                        
                    echo "</select>";
                    echo "</div>";
                    echo "</div>";


                   ?>


                            
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Seleccionar el alumno</label>
                                            <div id="alumnosCursos">
                                            <select class="form-control selectAlumno" id="id_alumno" name="id_alumno">
                                               
                                            
                                        
                                            <?php

                                            
                                                if(isset($_REQUEST['id_alumno']) && isset($_REQUEST['grado']) && isset($_REQUEST['anio'])){
                                                
                                                $idGrado = $_REQUEST['grado'];
                                                $anio = $_REQUEST['anio'];

                                                $matricula = new Matricula();

                                                $resultadoMatricula = $matricula->obtenerMatriculasGradoAnio($idGrado, $anio);


                                              
                                                //imprimimos el que estavamos utilizando
                                                for ($i = 0; $i < sizeof($resultadoMatricula); $i++) {
                                                    $idAlumnoSearch = $resultadoMatricula[$i]->getIdAlumno();

                                                    $alum = new Alumno();
                                                    $resAlum = $alum->buscarPorId($idAlumnoSearch);

                                                    $carnetAlumno = $resAlum->getCarnet();
                                                    $nombreAlumno = "[$carnetAlumno] " . $resAlum->getPrimerNombre() . " " . $resAlum->getSegundoNombre() . " " . $resAlum->getTercerNombre() . " " . $resAlum->getPrimerApellido() . " " . $resAlum->getSegundoApellido();
                                                    if($idAlumnoSearch==$_REQUEST['id_alumno']){
                                                    echo "<option value='$idAlumnoSearch'>$nombreAlumno</option>";
                                                    }
                                                }
                                                //Seguimos imprimiendo los demás
                                                for ($i = 0; $i < sizeof($resultadoMatricula); $i++) {
                                                    $idAlumnoSearch = $resultadoMatricula[$i]->getIdAlumno();

                                                    $alum = new Alumno();
                                                    $resAlum = $alum->buscarPorId($idAlumnoSearch);

                                                    $carnetAlumno = $resAlum->getCarnet();
                                                    $nombreAlumno = "[$carnetAlumno] " . $resAlum->getPrimerNombre() . " " . $resAlum->getSegundoNombre() . " " . $resAlum->getTercerNombre() . " " . $resAlum->getPrimerApellido() . " " . $resAlum->getSegundoApellido();
                                                    
                                                    if($idAlumnoSearch!=$_REQUEST['id_alumno']){
                                                    echo "<option value='$idAlumnoSearch'>$nombreAlumno</option>";
                                                    }
                                                }


                                                
                                            }else{
                                                echo "<option value='0'>Seleccione el alumno</option>";
                                            }
                                                ?>
                                                

                                            </select>
                                            </div>
                                        </div>
                                    </div>


                                
                                </div>
                                <div class="">
                                    <input type="button" value="Generar" class="btn btn-primary" name="btnGenerar" id="btnGenerar">
                                    <input type="button" value="Imprimir notas del alumno" class="btn btn-primary" name="btnTarjeta" id="btnTarjeta">
                                   
                                </div>
                            </form>
                        </div>

                        <!-- TABLA DE NOTAS -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          
            <div class="card">
              <div class="card-header">
                  
                  <h2>Notas del alumno <span class='badge bg-success'></span></h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <div id="tabla_notas">  

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
                if(isset($_REQUEST['id_alumno']) && isset($_REQUEST['anio']) && isset($_REQUEST['grado'])){
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


            </div>
            <!--Fin de div dinámico de tabla-->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- general form elements disabled -->

                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php

include("layout/footer.php");

?>

<script type="text/javascript">

function llenarAlumnos(){
    
    $.ajax({
        type:"POST",
        url:"imprimir_alumnos.php?idGrado=" + $ ('#grado').val() +"&anio="+ $ ('#anio').val(),
        //data:"id="+ $ ('#lista1').val(),
        success:function(r){
            $('#alumnosCursos').html(r);
        }
    
    });

}




</script>

<script type="text/javascript">

function cargarNotas(){
    
    $.ajax({
        type:"POST",
        url:"nota_vista.php?id_alumno=" + $ ('#id_alumno').val() +"&anio="+ $ ('#anio').val()+"&grado="+ $ ('#grado').val(),
        //data:"id="+ $ ('#lista1').val(),
        success:function(r){
            $('#tabla_notas').html(r);
        }
    
    });

}
</script>


<script>
    $(function() {
        //Initialize Select2 Elements
        $('.selectAlumno').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });

    /*$( ".select2" ).change(function() {
     //Aquí cargamos el usuario
    });*/
</script>

<script>
    $(function() {
        //Initialize Select2 Elements
        $('.selectAnio').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });

    /*$( ".select2" ).change(function() {
     //Aquí cargamos el usuario
    });*/
</script>




<script>
    $(function() {
        //Initialize Select2 Elements
        $('.selectGrado').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });

    /*$( ".select2" ).change(function() {
     //Aquí cargamos el usuario
    });*/
</script>

<script type="text/javascript">
    $(document).ready(function(){
    
        $('#btnGenerar').click(function(){
           
          var validadorGrado = document.getElementById('grado').value;
          var validadorAlumno = document.getElementById('id_alumno').value;
          var validadorAnio = document.getElementById('anio').value;

          if(validadorGrado>0){
            if(validadorAnio>0){
                if(validadorAlumno>0){
                    //Cargamos las notas del alumno
                    cargarNotas();
                }else{
                    alert('!Debes seleccionar un alumno primero¡');
                }
            }else{
                alert('¡Debes seleccionar un año académico primero!');
            }
          }else{
              alert('¡Debes seleccionar un grado académico primero!');
          }
           
       });

        $('#grado').change(function(){
           
            var idGradoB = document.getElementById('grado').value;
            
            if(idGradoB>0){
                 //Aquí llamamos a la función para cargar los alumnos del grado y sus cursos
                 llenarAlumnos();
                
            }
            
        });


        $('#anio').change(function(){
            
            var idGrado = document.getElementById('grado').value;

            if(idGrado>0){
                //Aquí llamamos a la función para cargar los estudiantes del grado académico
                llenarAlumnos();
                
            }
            else{
                alert('¡Selecciona un grado académico primero para cargar alumnos y cursos automáticamente!');
            }
        });

        $('#btnTarjeta').click(function(){
           
           var idGradoTarjeta = document.getElementById('grado').value;
           var anioTarjeta = document.getElementById('anio').value;
           var idAlumnoTarjeta = document.getElementById('id_alumno').value;

           if(idGradoTarjeta>0){
                
                if(anioTarjeta>0){
                    if(idAlumnoTarjeta>0){
                    //Aquí llamamos a la función para cargar las notas en formato pdf
                    window.open('../reportes/calificacion_pdf.php?idGrado='+idGradoTarjeta+'&anio='+anioTarjeta+'&idAlumno='+idAlumnoTarjeta, '_blank');
                    }else{
                        alert("¡Selecciona un alumno primero!");
                    }
                }else{
                    alert("¡Selecciona un año académico válido!");
                }
           }else{
               alert("¡Selecciona un grado académico primero!");
           }
           
       });

    });
</script>


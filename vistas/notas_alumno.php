<?php

include("layout/header.php");

?>
<title>Módulo | Generar tarjeta de calificaciones</title>
<!-- Tell the browser to be responsive to screen width -->

<?php

include("layout/nav_student.php");

?>

<?php
    $alumno = new Alumno();
    $idAlumno = 0;

    if(isset($_SESSION)){
        $alumno = $_SESSION['alumno'];
        $idAlumno = $alumno->getId();
    }else{
        session_start();
        $alumno = $_SESSION['alumno'];
        $idAlumno = $alumno->getId();
    }

?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Realiza consultas sobre tus calificaciones</h1>
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
                            <h3 class="card-title">Selecciona los filtros para realizar las consultas</h3>
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
                                            <label>Si no apareces en este campo aún no te encuentras inscrito</label>
                                            <div id="alumnosCursos">
                                            <select class="form-control selectAlumno" id="id_alumno" name="id_alumno" disabled="true">
                                               
                                            
                                        
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
                                                echo "<option value='0'>No inscrito en el ciclo académico seleccionado</option>";
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
        url:"imprimir_alumno_unico.php?idGrado=" + $ ('#grado').val() +"&anio="+ $ ('#anio').val(),
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
        url:"nota_vista_estudiante.php?id_alumno=" + $ ('#id_alumno').val() +"&anio="+ $ ('#anio').val()+"&grado="+ $ ('#grado').val(),
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
                    alert('!No te encuentras inscrito en el ciclo académico seleccionado¡');
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
                        alert("¡No te encuentras inscrito en el ciclo académico seleccionado!");
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
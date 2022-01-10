<?php

include("layout/header.php");

?>
<title>Módulo | Ingresar nota</title>
<!-- Tell the browser to be responsive to screen width -->

<?php

include("layout/nav.php");

?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ingresar nota</h1>
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
                            <h3 class="card-title">Ingresar datos de la nota</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form role="form" method="post" action="../crud/ingresarNota.php">
                                <div class="row">

                                <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Seleccionar el grado académico</label>
                                            <select class="form-control selectGrado" id="grado" name="grado">
                                                <option value="0">Seleccione el grado</option>
                                                <?php
                                                $grado = new Grado();

                                                $resultado = $grado->obtenerGrados();

                                                for ($i = 0; $i < sizeof($resultado); $i++) {
                                                    $idGrado = $resultado[$i]->getId();


                                                    $nombreGrado = $resultado[$i]->getNombre();

                                                    if ($resultado[$i]->getEstado() == 1) {
                                                        echo "<option value='$idGrado'>$nombreGrado</option>";
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
                      

                        for($i=$year;$i>=2010;$i--) { 
                          echo "<option value='".$i."'>".$i."</option>";
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
                                               
                                            
                                            
                                            <option value="0">Seleccione el alumno</option>
                                               
                                                

                                            </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Seleccionar el curso</label>
                                            
                                            <div id="divCursos"> 
                                            <select class="form-control selectCurso" id="id_curso" name="id_curso">
                                            
                                            
                                            <option value="0">Seleccione el curso</option>
                                                                                                

                                            </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Seleccionar el bimestre</label>
                                            
                                          
                                            <select class="form-control selectBimestre" id="bimestre" name="bimestre">
                                            
                                            
                                            <option value="0">Seleccione el bimestre</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>                                        

                                            </select>
                                            
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Ingresar nota</label>
                                            <input type="number" class="form-control" placeholder="Nota" name="nota" id="nota" pattern="^[0-9.]{1,5}" min="0" max="100" required step="0.01">
                                        </div>
                                    </div>

                                    <script>
                                        var input = document.getElementById('nota');
                                        input.addEventListener('input', function() {
                                            if (this.value.length > 5)
                                                this.value = this.value.slice(0, 5);
                                        })
                                    </script>

                                    
                   
                                </div>
                                <div class="">
                                    <input type="submit" value="Guardar" class="btn btn-primary" name="btnGuardar" id="btnGuardar">
                                    <a type="submit" class="btn btn-danger" href="matricula.php">Regresar</a>
                                </div>
                            </form>
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

function llenarCursos(){
    
    $.ajax({
        type:"POST",
        url:"imprimir_cursos.php?idGrado=" + $ ('#grado').val(),
        //data:"id="+ $ ('#lista1').val(),
        success:function(r){
            $('#divCursos').html(r);
        }
    
    });

}


</script>

<script>
    $(function() {
        //Initialize Select2 Elements
        $('.selectBimestre').select2()

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
        $('.selectCurso').select2()

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
    
        

        $('#grado').change(function(){
           
            var idGradoB = document.getElementById('grado').value;
            
            if(idGradoB>0){
                 //Aquí llamamos a la función para cargar los alumnos del grado y sus cursos
                 llenarAlumnos();
                 llenarCursos();
            }
            
        });

        $('#anio').change(function(){
            
            var idGrado = document.getElementById('grado').value;

            if(idGrado>0){
                //Aquí llamamos a la función para cargar los estudiantes del grado académico
                llenarAlumnos();
                llenarCursos();
            }
            else{
                alert('¡Selecciona un grado académico primero para cargar alumnos y cursos automáticamente!');
            }
        });

    });
</script>
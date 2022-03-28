<?php

include("layout/header.php");

?>
<title>Módulo | Ver curso</title>
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
                    <h1>Ver curso</h1>
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
                            <h3 class="card-title">Información del curso</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                        <?php
                        
                            $idCursoEditar = $_REQUEST['id'];
                            $curso = new Curso();
                            $resCurso = $curso->buscarPorId($idCursoEditar);

                            $nombre = $resCurso->getNombre();
                            $horaInicio = $resCurso->getHoraInicio();
                            $horaFin = $resCurso->getHoraFin();
                            $idProfesor = $resCurso->getIdProfesor();
                            $idGrado = $resCurso->getIdGrado();
                            $diasSemana = $resCurso->getDiasSemana();
                            $fechaCommit = $resCurso->getFechaCommit();
                        
                        ?>

                            <form role="form" method="post" action="#">
                                <div class="row">

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nombre del curso</label>
                                            <input type="text" class="form-control" placeholder="Nombre del curso" value="<?php echo $nombre; ?>" name="nombre" id="nombre" pattern="^[a-zA-ZáéíóúÁÉÍÓÚ0-9 ]{1,100}" required minlength="1" maxlength="100" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Hora de inicio</label>
                                            <input type="time" class="form-control" placeholder="Hora de inicio" value="<?php echo $horaInicio; ?>" name="hora_inicio" id="hora_inicio" pattern="^[a-zA-Z0-9: ]{1,100}" required minlength="1" maxlength="100" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Hora fin</label>
                                            <input type="time" class="form-control" placeholder="Hora fin" value="<?php echo $horaFin; ?>" name="hora_fin" id="hora_fin" pattern="^[a-zA-Z0-9: ]{1,100}" required minlength="1" maxlength="100" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Profesor que imparte el curso</label>
                                            <select class="form-control selectProfesor" id="id_profesor" name="id_profesor" disabled="true">
                                               
                                                <?php
                                                $profesor = new Usuario();

                                                $resultado = $profesor->obtenerUsuarios();

                                                $profesorClase = new Usuario();

                                                $resultadoProfesor = $profesorClase->buscarPorId($idProfesor);

                                                $dpiProfesor = $resultadoProfesor->getDpi();
                                                $nombresProfesor = $resultadoProfesor->getNombres() . " " . $resultadoProfesor->getApellidos();
                                                
                                                echo "<option value='$idProfesor'>" . "[" . $dpiProfesor . "] " . $nombresProfesor . "</option>";

                                                echo "<script>alert($nombresProfesor);</script>";
                                            

                                                for ($i = 0; $i < sizeof($resultado); $i++) {
                                                    $idProfe = $resultado[$i]->getId();

                                                    $dpi = $resultado[$i]->getDpi();
                                                    $nombreProfesor = "[" . $dpi . "] " . $resultado[$i]->getNombres() . " " . $resultado[$i]->getApellidos();

                                                    if ($resultado[$i]->getIdRol() == 2) {
                                                        if($idProfesor!=$idProfe){
                                                         echo "<option value='$idProfe'>$nombreProfesor</option>";
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Grado al que pertenece el curso</label>
                                            <select class="form-control selectGrado" id="grado" name="grado" disabled="true">
                                                
                                                <?php
                                                $grado = new Grado();

                                                $gradoClase = new Grado();
                                                $gradoResultado = $gradoClase->buscarPorId($idGrado);

                                                $nombreGradoRes = $gradoResultado->getNombre();

                                                echo "<option value='$idGrado'>$nombreGradoRes</option>";

                                                $resultado = $grado->obtenerGrados();

                                                for ($i = 0; $i < sizeof($resultado); $i++) {
                                                    $idGradoRes = $resultado[$i]->getId();


                                                    $nombreGrado = $resultado[$i]->getNombre();

                                                    if ($resultado[$i]->getEstado() == 1) {
                                                        
                                                        if($idGradoRes!=$idGrado){
                                                        echo "<option value='$idGradoRes'>$nombreGrado</option>";
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Fecha de creación</label>
                                            <input type="text" class="form-control" placeholder="Nombre del curso" value="<?php echo $fechaCommit; ?>" name="fechaCommit" id="fechaCommit" pattern="^[a-zA-ZáéíóúÁÉÍÓÚ0-9 ]{1,100}" required minlength="1" maxlength="100" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Días impartidos</label>

                                            <?php
                                            
                                            $lunes=0;
                                            $martes=0;
                                            $miercoles=0;
                                            $jueves=0;
                                            $viernes=0;
                                            $sabado=0;
                                            $domingo=0;

                                            for($l=0;$l<strlen($diasSemana);$l++){

                                                if(strcmp($diasSemana[$l], "1") === 0){
                                                    $lunes=1;
                                                }
                                                if(strcmp($diasSemana[$l], "2") === 0){
                                                    $martes=1;
                                                }
                                                if(strcmp($diasSemana[$l], "3") === 0){
                                                    $miercoles=1;
                                                }
                                                if(strcmp($diasSemana[$l], "4") === 0){
                                                    $jueves=1;
                                                }
                                                if(strcmp($diasSemana[$l], "5") === 0){
                                                    $viernes=1;
                                                }
                                                if(strcmp($diasSemana[$l], "6") === 0){
                                                    $sabado=1;
                                                }
                                                if(strcmp($diasSemana[$l], "7") === 0){
                                                    $domingo=1;
                                                }
                                                


                                            }
                                            
                                            ?>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="lunes"<?php if($lunes==1){echo "checked='true'";}?> name="lunes" disabled="true">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Lunes
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="2" id="martes" name="martes" <?php if($martes==1){echo "checked='true'";}?>
                                                <label class="form-check-label" for="flexCheckDefault" disabled="true">
                                                    Martes
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="3" id="miercoles" name="miercoles" <?php if($miercoles==1){echo "checked='true'";}?>
                                                <label class="form-check-label" for="flexCheckDefault" disabled="true">
                                                    Miércoles
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="4" id="jueves" name="jueves" <?php if($jueves==1){echo "checked='true'";}?>
                                                <label class="form-check-label" for="flexCheckDefault" disabled="true">
                                                    Jueves
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="5" id="viernes" name="viernes" <?php if($viernes==1){echo "checked='true'";}?>
                                                <label class="form-check-label" for="flexCheckDefault" disabled="true">
                                                    Viernes
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="6" id="sabado" name="sabado" <?php if($sabado==1){echo "checked='true'";}?>
                                                <label class="form-check-label" for="flexCheckDefault" disabled="true">
                                                    Sábado
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="7" id="domingo" name="domingo" <?php if($domingo==1){echo "checked='true'";}?>
                                                <label class="form-check-label" for="flexCheckDefault" disabled="true">
                                                    Domingo
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="">
                                <?php   
                                if(isset($_REQUEST['modoVista'])){
                                    echo "<a type='submit' class='btn btn-danger' href='horarios.php'>Regresar</a>";
                                    }else{
                                        echo "<a type='submit' class='btn btn-danger' href='curso.php'>Regresar</a>";
                                    }
                                    ?>
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

<script>
    $(function() {
        //Initialize Select2 Elements
        $('.selectProfesor').select2()

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
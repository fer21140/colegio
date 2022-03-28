<?php

include("layout/header.php");

?>
<title>Módulo | Ingresar curso</title>
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
                    <h1>Ingresar curso</h1>
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
                            <h3 class="card-title">Ingresar información del curso</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form role="form" method="post" action="../crud/ingresarCurso.php">
                                <div class="row">

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nombre del curso</label>
                                            <input type="text" class="form-control" placeholder="Nombre del curso" name="nombre" id="nombre" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{1,100}" required minlength="1" maxlength="100">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Hora de inicio</label>
                                            <input type="time" class="form-control" placeholder="Hora de inicio" name="hora_inicio" id="hora_inicio" pattern="^[a-zA-Z0-9: ]{1,100}" required minlength="1" maxlength="100">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Hora fin</label>
                                            <input type="time" class="form-control" placeholder="Hora fin" name="hora_fin" id="hora_fin" pattern="^[a-zA-Z0-9: ]{1,100}" required minlength="1" maxlength="100">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Seleccionar profesor que impartirá el curso</label>
                                            <select class="form-control selectProfesor" id="id_profesor" name="id_profesor">
                                                <option value="0">Seleccione el profesor</option>
                                                <?php
                                                $profesor = new Usuario();

                                                $resultado = $profesor->obtenerUsuarios();

                                                for ($i = 0; $i < sizeof($resultado); $i++) {
                                                    $idProfesor = $resultado[$i]->getId();

                                                    $dpi = $resultado[$i]->getDpi();
                                                    $nombreProfesor = "[" . $dpi . "] " . $resultado[$i]->getNombres() . " " . $resultado[$i]->getApellidos();

                                                    if ($resultado[$i]->getIdRol() == 2 && $resultado[$i]->getEstado()==1) {
                                                        echo "<option value='$idProfesor'>$nombreProfesor</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Seleccionar el grado al que pertenece el curso</label>
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

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Días impartidos</label>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="lunes" name="lunes">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Lunes
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="2" id="martes" name="martes">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Martes
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="3" id="miercoles" name="miercoles">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Miércoles
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="4" id="jueves" name="jueves">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Jueves
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="5" id="viernes" name="viernes">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Viernes
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="6" id="sabado" name="sabado">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Sábado
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="7" id="domingo" name="domingo">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Domingo
                                                </label>
                                            </div>

                                        </div>
                                    </div>




                                </div>
                                <div class="">
                                    <input type="submit" value="Guardar" class="btn btn-primary" name="btnGuardar" id="btnGuardar">
                                    <a type="submit" class="btn btn-danger" href="curso.php">Regresar</a>
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
<?php

include("layout/header.php");

?>
<title>Módulo | Editar inscripción</title>
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
                    <h1>Editar matrícula</h1>
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
                            <h3 class="card-title">Editar información</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                        <?php
                            $idEditar = $_REQUEST['id'];
                            
                            $matricula = new Matricula();
                            $resMatricula = $matricula->buscarPorId($idEditar);
                            
                            $idAlumnoM = $resMatricula->getIdAlumno();
                            $idGradoM= $resMatricula->getIdGrado();
                            $anioM = $resMatricula->getAnio();
                            $valorInscripcionM = $resMatricula->getValorInscripcion();
                            $valorMensualM = $resMatricula->getValorMensual();
                            $numeroPagos = $resMatricula->getNumeroPagos();
                            $pagosAbonados = $resMatricula->getPagosAbonados();
                            
                        
                        ?>

                            <form role="form" method="post" action="../crud/editarMatricula.php?id=<?php echo $idEditar; ?>">
                                <div class="row">

        
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Seleccionar el alumno</label>
                                            <select class="form-control selectAlumno" id="id_alumno" name="id_alumno">
                                                
                                                <?php
                                                $alumno = new Alumno();

                                                $resultado = $alumno->obtenerAlumnos();

                                                for ($i = 0; $i < sizeof($resultado); $i++) {
                                                    $idAlumno = $resultado[$i]->getId();

                                                    $carnet = $resultado[$i]->getCarnet();
                                                    $nombreAlumno = "[" . $carnet . "] " . $resultado[$i]->getPrimerNombre() . " " . $resultado[$i]->getSegundoNombre() . " " . $resultado[$i]->getTercerNombre() . " " . $resultado[$i]->getPrimerApellido() . " " . $resultado[$i]->getSegundoApellido();

                                                    if ($idAlumno == $idAlumnoM) {
                                                        echo "<option value='$idAlumno'>$nombreAlumno</option>";
                                                    }
                                                }

                                                for ($i = 0; $i < sizeof($resultado); $i++) {
                                                    $idAlumno = $resultado[$i]->getId();

                                                    $carnet = $resultado[$i]->getCarnet();
                                                    $nombreAlumno = "[" . $carnet . "] " . $resultado[$i]->getPrimerNombre() . " " . $resultado[$i]->getSegundoNombre() . " " . $resultado[$i]->getTercerNombre() . " " . $resultado[$i]->getPrimerApellido() . " " . $resultado[$i]->getSegundoApellido();

                                                    if ($resultado[$i]->getEstado()==1 && $idAlumno!=$idAlumnoM) {
                                                        echo "<option value='$idAlumno'>$nombreAlumno</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Seleccionar el grado al que será inscrito el alumno</label>
                                            <select class="form-control selectGrado" id="grado" name="grado">
                                                
                                                <?php
                                                $grado = new Grado();

                                                $resultado = $grado->obtenerGrados();

                                                for ($i = 0; $i < sizeof($resultado); $i++) {
                                                    $idGrado = $resultado[$i]->getId();


                                                    $nombreGrado = $resultado[$i]->getNombre();

                                                    if ($idGrado==$idGradoM) {
                                                        echo "<option value='$idGrado'>$nombreGrado</option>";
                                                    }
                                                }
                                                
                                                for ($i = 0; $i < sizeof($resultado); $i++) {
                                                    $idGrado = $resultado[$i]->getId();


                                                    $nombreGrado = $resultado[$i]->getNombre();

                                                    if ($resultado[$i]->getEstado() == 1 && $idGrado!=$idGradoM) {
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
                                            <label>Seleccionar el valor de inscripción</label>
                                            <select class="form-control selectInscripcion" id="valor_inscripcion" name="valor_inscripcion">
                                                <option value="<?php echo $valorInscripcionM; ?>">(Q <?php echo $valorInscripcionM; ?>)</option>
                                                <?php
                                                $operacion = new Operacion();

                                                $resultado = $operacion->obtenerOperaciones();

                                                for ($i = 0; $i < sizeof($resultado); $i++) {
                                                    $idOperacion = $resultado[$i]->getId();


                                                    $nombreOperacion = $resultado[$i]->getNombre();
                                                    $costo = $resultado[$i]->getCosto();

                                                    if ($resultado[$i]->getEstado() == 1) {
                                                        echo "<option value='$costo'>(Q $costo) $nombreOperacion</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Seleccionar la cuota mensual</label>
                                            <select class="form-control selectCuota" id="valor_mensual" name="valor_mensual">
                                            <option value="<?php echo $valorMensualM; ?>">(Q <?php echo $valorMensualM; ?>)</option>
                                                <?php
                                                $operacion = new Operacion();

                                                $resultado = $operacion->obtenerOperaciones();

                                                for ($i = 0; $i < sizeof($resultado); $i++) {
                                                    $idOperacion = $resultado[$i]->getId();


                                                    $nombreOperacion = $resultado[$i]->getNombre();
                                                    $costo = $resultado[$i]->getCosto();

                                                    if ($resultado[$i]->getEstado() == 1) {
                                                        echo "<option value='$costo'>(Q $costo) $nombreOperacion</option>";
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
                      <select class='form-control' name='anio' id='anio'>";
                      
                        echo "<option value='$anioM'>$anioM</option>";

                        for($i=$year;$i>=2010;$i--) {
                            if($i!=$anioM){ 
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
                                            <label>Número de pagos anuales</label>
                                            <input type="number" class="form-control" placeholder="Cantidad de pagos anuales" name="numero_pagos" id="numero_pagos" pattern="^[0-9.]{1,10}" min="0" max="9999999999" required step="1" value="<?php echo $numeroPagos;?>" readonly>
                                        </div>
                                    </div>

                                    <script>
                                        var input = document.getElementById('numero_pagos');
                                        input.addEventListener('input', function() {
                                            if (this.value.length > 10)
                                                this.value = this.value.slice(0, 10);
                                        })
                                    </script>

<div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Pagos abonados</label>
                                            <input type="number" class="form-control" placeholder="Pagos abonados" name="pagos_abonados" id="pagos_abonados" pattern="^[0-9.]{1,10}" min="0" max="9999999999" required step="1" value="<?php echo $pagosAbonados;?>" readonly>
                                        </div>
                                    </div>


                                </div>
                                <div class="">
                                    <input type="submit" value="Editar" class="btn btn-primary" name="btnEditar" id="btnEditar">
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
        $('.selectInscripcion').select2()

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
        $('.selectCuota').select2()

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
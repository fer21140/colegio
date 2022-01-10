<?php

include("layout/header.php");

?>
<title>Módulo | Ver movimiento</title>
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
                    <h1>Ver movimiento</h1>
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
                            <h3 class="card-title">Ver información del movimiento</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <?php
                            $idEditar = $_REQUEST['id'];

                            $movimiento = new Movimiento();
                            $resMovimiento = $movimiento->buscarPorId($idEditar);

                            $idAlumnoM = $resMovimiento->getIdUsuarioReceptor();
                            $idOperacionM = $resMovimiento->getIdOperacion();
                            $total = $resMovimiento->getTotal();
                            $numeroComprobante = $resMovimiento->getNumeroComprobante();
                            $fechaCommit = $resMovimiento->getFechaCommit();

                            $idUsuarioOperacion = $resMovimiento->getIdUsuarioOperacion();

                            $usuario = new Usuario();
                            $resUsuario = $usuario->buscarPorId($idUsuarioOperacion);

                            $nombreUsuarioOperacion = $resUsuario->getNombres() . " " . $resUsuario->getApellidos();


                            ?>

                            <form role="form" method="post" action="#">
                                <div class="row">


                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Alumno que efectuó el pago</label>
                                            <select class="form-control selectAlumno" id="id_alumno" name="id_alumno" disabled="true">

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

                                                    if ($idAlumno != $idAlumnoM) {
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
                                            <label>Tipo de operación</label>
                                            <select class="form-control selectOperacion" id="id_tipo_operacion" name="id_tipo_operacion" disabled="true">

                                                <?php
                                                $operacion = new Operacion();

                                                $resultado = $operacion->obtenerOperaciones();

                                                for ($i = 0; $i < sizeof($resultado); $i++) {
                                                    $idOperacion = $resultado[$i]->getId();


                                                    $nombreOperacion = $resultado[$i]->getNombre();
                                                    $costo = $resultado[$i]->getCosto();

                                                    if ($idOperacion == $idOperacionM) {
                                                        echo "<option value='$idOperacion'>$nombreOperacion</option>";
                                                    }
                                                }

                                                for ($i = 0; $i < sizeof($resultado); $i++) {
                                                    $idOperacion = $resultado[$i]->getId();


                                                    $nombreOperacion = $resultado[$i]->getNombre();
                                                    $costo = $resultado[$i]->getCosto();

                                                    if ($idOperacion != $idOperacionM) {
                                                        echo "<option value='$idOperacion'>$nombreOperacion</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Costo de la operación</label>

                                            <div id="imprimirTotal">
                                                <input type="number" class="form-control" placeholder="Costo (Q)" name="costo" id="costo" value="<?php echo $total; ?>" pattern="^[0-9.]{1,10}" min="0" max="9999999999" required step="0.01" readonly>
                                            </div>

                                        </div>
                                    </div>

                                    <script>
                                        var input = document.getElementById('costo');
                                        input.addEventListener('input', function() {
                                            if (this.value.length > 10)
                                                this.value = this.value.slice(0, 10);
                                        })
                                    </script>


                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Número de comprobante</label>
                                            <input type="text" class="form-control" placeholder="Número de comprobante" name="numero_comprobante" id="numero_comprobante" value="<?php echo $numeroComprobante; ?>" pattern="^[a-zA-Z0-9]{1,50}" required minlength="1" maxlength="50" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nombre del usuario que realizó el movimiento</label>
                                            <input type="text" class="form-control" placeholder="Nombre del usuario que realizó la operación" value="<?php echo $nombreUsuarioOperacion; ?>" name="nombre_usuario_operacion" id="nombre_usuario_operacion" pattern="^[a-zA-ZáéíóúÁÉÍÓÚ ]{1,75}" required minlength="1" maxlength="75" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Fecha de ingreso</label>
                                            <?php
                                            echo "<input type='text' class='form-control' placeholder='Fecha de ingreso' value='$fechaCommit' minlength='3' maxlength='120' required name='fecha_commit' id='fecha_commit' readonly>";
                                            ?>
                                        </div>
                                    </div>



                                </div>
                                <div class="">
                                   <a type="submit" class="btn btn-danger" href="movimiento.php">Regresar</a>
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
        $('.selectOperacion').select2()

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
    function obtenerPrecioOperacion() {
        $.ajax({
            type: "POST",
            url: "imprimir_costo_operacion.php?id=" + $('#id_tipo_operacion').val(),
            //data:"id="+ $ ('#lista1').val(),
            success: function(r) {
                $('#imprimirTotal').html(r);
            }

        });
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {

        //recargarLista();

        $('#id_tipo_operacion').change(function() {

            obtenerPrecioOperacion();
        });

    });
</script>

<script>
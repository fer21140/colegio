<?php

include("layout/header.php");

?>
<title>Módulo | Ver planilla</title>
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
                    <h1>Ver detalle de planilla</h1>
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
                            <h3 class="card-title">Ver la información</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                        <?php
                        
                            $id = $_REQUEST['id'];
                            $planilla = new Planilla();
                            $resPlanilla = $planilla->buscarPorId($id);

                            $idEmpleado = $resPlanilla->getIdEmpleado();
                            $mes = $resPlanilla->getMes();
                            $anio = $resPlanilla->getAnio();
                            $salarioOrdinario = $resPlanilla->getSalarioOrdinario();
                            $abono = $resPlanilla->getAbono();
                            $descuento = $resPlanilla->getDescuento();
                            $sueldoLiquido = $resPlanilla->getSueldoLiquido();
                            $numeroCheque = $resPlanilla->getNumeroCheque();
                            $fechaCommit = $resPlanilla->getFechaCommit();

                        
                        ?>

                            <form role="form" method="post" action="#">
                                <div class="row">

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Empleado</label>
                                            <select class="form-control selectProfesor" id="id_empleado" name="id_empleado" disabled="true">
                                               
                                                <?php
                                                $profesor = new Usuario();

                                                $resultado = $profesor->obtenerUsuarios();

                                                for ($i = 0; $i < sizeof($resultado); $i++) {
                                                    $idProfesor = $resultado[$i]->getId();

                                                    $dpi = $resultado[$i]->getDpi();
                                                    $nombreProfesor = "[" . $dpi . "] " . $resultado[$i]->getNombres() . " " . $resultado[$i]->getApellidos();

                                                    if ($resultado[$i]->getIdRol() == 2 && $resultado[$i]->getId() == $idEmpleado) {
                                                        echo "<option value='$idProfesor'>$nombreProfesor</option>";
                                                    }
                                                }

                                                for ($i = 0; $i < sizeof($resultado); $i++) {
                                                    $idProfesor = $resultado[$i]->getId();

                                                    $dpi = $resultado[$i]->getDpi();
                                                    $nombreProfesor = "[" . $dpi . "] " . $resultado[$i]->getNombres() . " " . $resultado[$i]->getApellidos();

                                                    if ($resultado[$i]->getIdRol() == 2 && $resultado[$i]->getId() != $idEmpleado) {
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
                                            <label>Seleccione el mes</label>
                                            <select class="form-control selectMes" name="mes" id="mes" disabled="true">
                                                <option value="1">Enero</option>
                                                <option value="2">Febrero</option>
                                                <option value="3">Marzo</option>
                                                <option value="4">Abril</option>
                                                <option value="5">Mayo</option>
                                                <option value="6">Junio</option>
                                                <option value="7">Julio</option>
                                                <option value="8">Agosto</option>
                                                <option value="9">Septiembre</option>
                                                <option value="10">Octubre</option>
                                                <option value="11">Noviembre</option>
                                                <option value="12">Diciembre</option>

                                            </select>

                                        <?php
                                            echo "<script>document.getElementById('mes').value = '$mes';</script>";
                                        
                                        ?>
                                        </div>
                                    </div>

                                    <?php
                                    $Date = date("d-m-Y");
                                    $year = date("Y");


                                    echo "<div class='col-sm-6'>
                    
                    <div class='form-group'>
                      <label>Seleccione el año</label>
                      <select class='form-control selectAnio' name='anio' id='anio' disabled='true'>";


                                    for ($i = $year; $i >= 2010; $i--) {
                                        echo "<option value='" . $i . "'>" . $i . "</option>";
                                    }

                                    echo "</select>";
                                    echo "</div>";
                                    echo "</div>";


                                    ?>

<?php
                                            echo "<script>document.getElementById('anio').value = '$anio';</script>";
                                        
                                        ?>


                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Salario ordinario (Q)</label>

                                            <div id="imprimirSueldo">
                                                <input type="number" class="form-control" placeholder="Salario ordinario (Q)" name="salarioOrdinario" id="salarioOrdinario" value="<?php echo $salarioOrdinario;?>" pattern="^[0-9.0-9]{1,10}" min="0" max="9999999999" required step="0.01" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        var inputSalarioOrdinario = document.getElementById('salarioOrdinario');
                                        inputSalarioOrdinario.addEventListener('input', function() {
                                            if (this.value.length > 10)
                                                this.value = this.value.slice(0, 10);
                                        })
                                    </script>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Abono (Q)</label>
                                            <input type="number" class="form-control" placeholder="Abono (Q)" name="abono" id="abono" value="<?php echo $abono;?>" pattern="^[0-9.0-9]{1,10}" min="0" max="9999999999" required step="0.01" readonly>
                                        </div>
                                    </div>

                                    <script>
                                        var inputAbono = document.getElementById('abono');
                                        inputAbono.addEventListener('input', function() {
                                            if (this.value.length > 10)
                                                this.value = this.value.slice(0, 10);
                                        })
                                    </script>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Descuento (Q)</label>
                                            <input type="number" class="form-control" placeholder="Descuento (Q)" name="descuento" id="descuento" value="<?php echo $descuento;?>" pattern="^[0-9.0-9]{1,10}" min="0" max="9999999999" required step="0.01" readonly>
                                        </div>
                                    </div>

                                    <script>
                                        var inputDescuento = document.getElementById('descuento');
                                        inputDescuento.addEventListener('input', function() {
                                            if (this.value.length > 10)
                                                this.value = this.value.slice(0, 10);
                                        })
                                    </script>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Sueldo líquido (Q)</label>
                                            <input type="number" class="form-control" placeholder="Sueldo líquido (Q)" name="sueldoLiquido" id="sueldoLiquido" value="<?php echo $sueldoLiquido;?>" pattern="^[0-9.0-9]{1,10}" min="0" max="9999999999" required step="0.01" readonly>
                                        </div>
                                    </div>

                                    <script>
                                        var inputSueldoLiquido = document.getElementById('sueldoLiquido');
                                        inputSueldoLiquido.addEventListener('input', function() {
                                            if (this.value.length > 10)
                                                this.value = this.value.slice(0, 10);
                                        })
                                    </script>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Número de cheque</label>
                                            <input type="text" class="form-control" placeholder="Número de cheque" name="numeroCheque" id="numeroCheque" value="<?php echo $numeroCheque;?>" pattern="^[a-zA-ZáéíóúÁÉÍÓÚ0-9 ]{1,75}" required minlength="1" maxlength="75" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Fecha de ingreso</label>
                                            <input type="text" class="form-control" placeholder="Fecha de ingreso" name="fechaCommit" id="fechaCommit" value="<?php echo $fechaCommit;?>" required minlength="1" maxlength="75" readonly>
                                        </div>
                                    </div>




                                </div>
                                <div class="">
                                    
                                    <a type="submit" class="btn btn-danger" href="planilla.php">Regresar</a>
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
        $('.selectMes').select2()

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
    function obtenerSueldo() {
        $.ajax({
            type: "POST",
            url: "obtener_sueldo.php?id=" + $('#id_empleado').val(),
            //data:"id="+ $ ('#lista1').val(),
            success: function(r) {
                $('#imprimirSueldo').html(r);
            }

        });
    }
</script>

<script type="text/javascript">
    function calcularSalarioOrdinario() {
        var sueldo = parseFloat(document.getElementById("salarioOrdinario").value);

        var abono = parseFloat(document.getElementById("abono").value);
        var descuento = parseFloat(document.getElementById("descuento").value);

        var sueldoLiquido = parseFloat(sueldo - (abono + descuento));



        if (abono >= 0 && descuento >= 0) {
            document.getElementById("sueldoLiquido").value = sueldoLiquido;
        }
    }

    $(document).ready(function() {

        //recargarLista();

        $('#id_empleado').change(function() {

            obtenerSueldo();

            calcularSalarioOrdinario();
        });

        abono.oninput = function() {
            calcularSalarioOrdinario();
        };

        descuento.oninput = function() {
            calcularSalarioOrdinario();
        };

        salarioOrdinario.oninput = function() {
            
            calcularSalarioOrdinario();
        };

        
    });
</script>
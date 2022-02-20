<?php

include("layout/header.php");

?>
<title>Módulo | Editar sueldo</title>
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
                    <h1>Editar sueldo de empleado</h1>
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
                            <h3 class="card-title">Nombre del empleado</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            
                            <?php
                                
                                $idBusqueda = $_REQUEST['id'];    
                                $sueldo = new Sueldo();
                                $resSueldo = $sueldo->buscarPorId($idBusqueda);

                                $idEmpleado = $resSueldo->getIdEmpleado();
                                
                                $sueldoQ = $resSueldo->getSueldo();
                                
                                ?>
                                
                            <form role="form" method="post" action="../crud/editarSueldo.php?id=<?php echo $idBusqueda; ?>">
                                <div class="row">
                                    
                                

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Selecciona el empleado</label>
                                            <select class="form-control selectProfesor" id="id_empleado" name="id_empleado" disabled="true">
                                                
                                                <?php
                                                $profesor = new Usuario();

                                                $resultado = $profesor->obtenerUsuarios();
                                                //Imprimimos primero el que fue seleccionado
                                                for ($i = 0; $i < sizeof($resultado); $i++) {
                                                    $idProfesor = $resultado[$i]->getId();

                                                    $dpi = $resultado[$i]->getDpi();
                                                    $nombreProfesor = "[" . $dpi . "] " . $resultado[$i]->getNombres() . " " . $resultado[$i]->getApellidos();

                                                    if ($resultado[$i]->getIdRol() == 2 && $resultado[$i]->getId()==$idEmpleado) {
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
                                            <label>Sueldo (Q)</label>
                                            <input type="number" class="form-control" placeholder="Sueldo (Q)" name="sueldo" id="sueldo" value="<?php echo $sueldoQ;?>" pattern="^[0-9.]{1,10}" min="0" max="9999999999" required step="0.01">
                                        </div>
                                    </div>

                                    <script>
                                        var input = document.getElementById('sueldo');
                                        input.addEventListener('input', function() {
                                            if (this.value.length > 10)
                                                this.value = this.value.slice(0, 10);
                                        })
                                    </script>



                                </div>
                                <div class="">
                                <input type="submit" value="Editar" class="btn btn-primary" name="btnEditar" id="btnEditar">       
                                <a type="submit" class="btn btn-danger" href="sueldo.php">Regresar</a>
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
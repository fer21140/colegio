<?php

include("layout/header.php");

?>
<title>Módulo | Ingresar nueva operación</title>
<!-- Tell the browser to be responsive to screen width -->

<?php

include("layout/nav.php");

?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">


                    <h1>Ingresar nueva operación</h1>
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
                            <h3 class="card-title">Ingresar información</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">


                            <form role="form" method="post" action="../crud/ingresarOperacion.php">
                                <div class="row">

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nombre de la operación</label>
                                            <input type="text" class="form-control" placeholder="Nombre de la operación" name="nombre_operacion" id="nombre_operacion" pattern="^[a-zA-ZáéíóúÁÉÍÓÚ ]{1,75}" required minlength="1" maxlength="75">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Descripción</label>
                                            <input type="text" class="form-control" placeholder="Descripción" name="descripcion" id="descripcion" pattern="^[a-zA-ZáéíóúÁÉÍÓÚ ]{1,150}" minlength="1" maxlength="150" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Costo de la operación</label>
                                            <input type="number" class="form-control" placeholder="Costo (Q)" name="costo" id="costo" pattern="^[0-9.]{1,10}" min="0" max="9999999999" required step="0.01">
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
                                            <label>Tipo de operación</label>
                                            <select class="form-control" name="tipo_operacion" id="tipo_operacion">

                                                <option value='1'>CRÉDITO</option>
                                                <option value='0'>DÉBITO</option>


                                            </select>
                                        </div>
                                    </div>


                                </div>
                                <div class="">
                                    <input type="submit" value="Guardar" class="btn btn-primary" name="btnGuardar" id="btnGuardar">
                                    <a type="submit" class="btn btn-danger" href="operacion.php">Regresar</a>
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
<?php

include("layout/header.php");

?>
<title>Módulo | Editar nota</title>
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
                    <h1>Editar nota</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <?php

    $idCurso = $_REQUEST['id_curso'];

    $curso = new Curso();
    $resCurso = $curso->buscarPorId($idCurso);
    $grado = $resCurso->getIdGrado();

    $idAlumno = $_REQUEST['id_alumno'];
    $anio = $_REQUEST['anio'];
    $bimestre = $_REQUEST['bimestre'];

    ?>

    <?php
    $nota = new Nota();
    $id = $_REQUEST['id'];
    $res = $nota->buscarPorId($id);

    $calificacion = $res->getNota();


    ?>
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
                            <h3 class="card-title">A continuación ingresa el nuevo valor de la nota</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form role="form" method="post" action="../crud/editarNota.php?id=<?php echo $id; ?>&anio=<?php echo $anio;?>&bimestre=<?php echo $bimestre;?>&id_alumno=<?php echo $idAlumno;?>&id_curso=<?php echo $idCurso;?>">
                                <div class="row">


                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Ingresar nota</label>
                                            <input type="number" class="form-control" value="<?php echo $calificacion; ?>" placeholder="Nota" name="nota" id="nota" pattern="^[0-9.]{1,5}" min="0" max="100" required step="0.01">
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
                                    <input type="submit" value="Editar" class="btn btn-primary" name="btnEditar" id="btnEditar">
                                    <a type="submit" class="btn btn-danger" href="nota.php?id_alumno=<?php echo $idAlumno;?>&anio=<?php echo $anio;?>&grado=<?php echo $grado;?>">Regresar</a>
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
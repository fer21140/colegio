<?php

include ("layout/header.php");
?>



<?php

include ("layout/nav.php");

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Información del grado académico</h1>
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
                <h3 class="card-title">Información</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
    
                <?php
                    $idGrado = $_REQUEST['id'];

                    $grado = new Grado();
                    $resGrado = $grado->buscarPorId($idGrado);
                    $nombre = $resGrado->getNombre();
                    $fechaCommit = $resGrado->getFechaCommit();
                
                ?>


                <form role="form" method="post" action="#">
                  <div class="row">
                    
    
                  <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nombre del grado académico</label>
                        <input type="text" class="form-control" placeholder="Nombre del grado académico" value="<?php echo $nombre; ?>" name="nombre" id="nombre"
                        pattern="^[a-zA-ZáéíóúÁÉÍÓÚ ,0-9]{1,100}" required minlength="1" maxlength="100" readonly>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Fecha de creación</label>
                        <input type="text" class="form-control" placeholder="Fecha de creación" value="<?php echo $fechaCommit; ?>" name="fechaCommit" id="fechaCommit"
                        pattern="^[a-zA-ZáéíóúÁÉÍÓÚ ,0-9]{1,100}" required minlength="1" maxlength="100" readonly>
                      </div>
                    </div>
                    
                  </div>  
                  <div class="">
                   <a type="submit" class="btn btn-danger" href="grado.php">Regresar</a>
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

include ("layout/footer.php");


?>

<script type="text/javascript">
$(function() {
    $('#btnGuardar').click(function() {

        var valid = this.form.checkValidity();
        if (valid) {
          alert('!Desea guardar los datos');
   
        } else {
          alert('Debe de rellenar los campos o coincidir con el formato indicado');
        }

        var nombre = $('#tipo').val();
        var apellido = $('#precio').val();
        

    });

});
</script>
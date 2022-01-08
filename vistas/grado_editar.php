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
            <h1>Ingresar grado académico</h1>
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
                <h3 class="card-title">Ingresar</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
    
                <?php
                    $idGrado = $_REQUEST['id'];

                    $grado = new Grado();
                    $resGrado = $grado->buscarPorId($idGrado);
                    $nombre = $resGrado->getNombre();
                
                ?>


                <form role="form" method="post" action="../crud/editarGrado.php?id=<?php echo $idGrado; ?>">
                  <div class="row">
                    
    
                  <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nombre del grado académico</label>
                        <input type="text" class="form-control" placeholder="Nombre del grado académico" value="<?php echo $nombre; ?>" name="nombre" id="nombre"
                        pattern="^[a-zA-ZáéíóúÁÉÍÓÚ ,0-9]{1,100}" required minlength="1" maxlength="100" >
                      </div>
                    </div>
                    
                  </div>  
                  <div class="">
                  <input type="submit" class="btn btn-primary" value="Editar" name="btnEditar" id="btnEditar">
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
          alert('¿Desea guardar los datos?');
   
        } else {
          alert('Debe de rellenar los campos o coincidir con el formato indicado');
        }

        var nombre = $('#tipo').val();
        var apellido = $('#precio').val();
        

    });

});
</script>
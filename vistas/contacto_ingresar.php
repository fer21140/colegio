<?php

include ("layout/header.php");

?>
  <title>Módulo | Ingresar tutor o encargado</title>
  <!-- Tell the browser to be responsive to screen width -->
 
<?php

include ("layout/nav.php");

?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

            <?php
            
                $idAlumnoEtiqueta = $_REQUEST['idAlumno'];

                $al = new Alumno();
                $resAl = $al->buscarPorId($idAlumnoEtiqueta);
                $nombreAlumnoEtiqueta = $resAl->getPrimerNombre() . " " . $resAl->getSegundoNombre() . " " . $resAl->getTercerNombre() . " " . $resAl->getPrimerApellido() . " " . $resAl->getSegundoApellido();
            ?>


            <h1>Ingresar tutor o encargado al alumno/a <?php  echo "<td><h4><span class='badge bg-success'>$nombreAlumnoEtiqueta</span></h4></td>";?></h1>
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

              <?php

                $idAlum = $_REQUEST['idAlumno'];
              
              ?>
              
                <form role="form" method="post" action="../crud/ingresarContacto.php?idAlumno=<?php echo $idAlum; ?>">
                  <div class="row">
                   
                  
                  
                  <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nombres</label>
                        <input type="text" class="form-control" placeholder="Nombres" name="nombres" id="nombres"
                        pattern="^[a-zA-ZáéíóúÁÉÍÓÚ ]{1,50}" required minlength="1" maxlength="50">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" class="form-control" placeholder="Apellidos" name="apellidos" id="apellidos"
                        pattern="^[a-zA-ZáéíóúÁÉÍÓÚ ]{1,50}" minlength="1" maxlength="50">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Dirección</label>
                        <input type="text" class="form-control" placeholder="Dirección" name="direccion" id="direccion"
                        pattern="^[a-zA-ZáéíóúÁÉÍÓÚ, ]{1,50}" minlength="1" maxlength="50">
                      </div>
                    </div>

                   

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Teléfono celular</label>
                        <input type="number" class="form-control" placeholder="Teléfono celular" name="telefonoCelular" id="telefonoCelular"
                        pattern="^[0-9]{1,20}" required minlength="1" maxlength="20">
                      </div>
                    </div>  
                    
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Teléfono de casa</label>
                        <input type="number" class="form-control" placeholder="Teléfono de casa" name="telefonoCasa" id="telefonoCasa"
                        pattern="^[0-9]{1,20}" minlength="1" maxlength="20">
                      </div>
                    </div> 

                  </div>  
                  <div class="">
                  <input type="submit" value="Guardar" class="btn btn-primary" name="btnGuardar" id="btnGuardar">
                  <a type="submit" class="btn btn-danger" href="alumno_vista.php?id=<?php echo $idAlum; ?>">Regresar</a>
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
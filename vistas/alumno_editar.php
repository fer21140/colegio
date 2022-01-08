<?php

include ("layout/header.php");

?>
  <title>Módulo | Editar alumno</title>
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
            <h1>Editar alumno</h1>
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
                  
                  $alumno = new Alumno();

                  $idBuscar = $_REQUEST['id'];

                  $resultado = $alumno->buscarPorId($idBuscar);

                  $carnet = $resultado->getCarnet();
                  $primerNombre = $resultado->getPrimerNombre();
                  $segundoNombre = $resultado->getSegundoNombre();
                  $tercerNombre = $resultado->getTercerNombre();
                  $primerApellido = $resultado->getPrimerApellido();
                  $segundoApellido = $resultado->getSegundoApellido();
                  $telefono = $resultado->getTelefono();
                  $direccion = $resultado->getDireccion();
                  $fechaCommit = $resultado->getFechaCommit();
                 
                
                ?>

                <form role="form" method="post" action="../crud/editarAlumno.php?id=<?php echo $idBuscar;?>">

                 


                  <div class="row">
                  <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Carnet</label>
                        <input type="text" class="form-control" placeholder="Carnet" value="<?php echo $carnet;?>" name="carnet" id="carnet"
                        pattern="^[a-zA-Z0-9]{1,50}" required minlength="1" maxlength="50">
                      </div>
                    </div>  
                   
                    
                  <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Primer nombre</label>
                        <input type="text" class="form-control" placeholder="Primer nombre" value="<?php echo $primerNombre; ?>" name="primerNombre" id="primerNombre"
                        pattern="^[a-zA-ZáéíóúÁÉÍÓÚ ]{1,50}" required minlength="1" maxlength="50">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Segundo nombre</label>
                        <input type="text" class="form-control" placeholder="Segundo nombre" value="<?php echo $segundoNombre;?>" name="segundoNombre" id="segundoNombre"
                        pattern="^[a-zA-ZáéíóúÁÉÍÓÚ ]{1,50}" minlength="1" maxlength="50">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tercer nombre</label>
                        <input type="text" class="form-control" placeholder="Tercer nombre" value="<?php echo $tercerNombre;?>" name="tercerNombre" id="tercerNombre"
                        pattern="^[a-zA-ZáéíóúÁÉÍÓÚ ]{1,50}" minlength="1" maxlength="50">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Primer Apellido</label>
                        <input type="text" class="form-control" placeholder="Primer apellido" value="<?php echo $primerApellido;?>" name="primerApellido" id="primerApellido"
                        pattern="^[a-zA-ZáéíóúÁÉÍÓÚ ]{1,50}" required minlength="1" maxlength="50">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Segundo apellido</label>
                        <input type="text" class="form-control" placeholder="Segundo apellido" value="<?php echo $segundoApellido;?>" name="segundoApellido" id="segundoApellido"
                        pattern="^[a-zA-ZáéíóúÁÉÍÓÚ ]{1,50}" minlength="1" maxlength="50">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Dirección</label>
                        <input type="text" class="form-control" placeholder="Dirección" value="<?php echo $direccion;?>" name="direccion" id="direccion"
                        pattern="^[a-zA-ZáéíóúÁÉÍÓÚ, ]{1,50}" minlength="1" maxlength="50">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Teléfono</label>
                        <input type="number" class="form-control" placeholder="Teléfono" value="<?php echo $telefono; ?>" name="telefono" id="telefono"
                        pattern="^[0-9]{1,20}" required minlength="1" maxlength="20">
                      </div>
                    </div>   
                    
                       

                  </div>  
                  <div class="">
                  <input type="submit" value="Editar" class="btn btn-primary" name="btnEditar" id="btnEditar">
                  
                  <a type="submit" class="btn btn-danger" href="alumno.php">Regresar</a>
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
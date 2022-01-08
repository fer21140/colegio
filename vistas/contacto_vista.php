<?php

include ("layout/header.php");

?>
  <title>Módulo |Ver tutor o encargado</title>
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


            <h1>Ver tutor o encargado del alumno/a <?php  echo "<td><h4><span class='badge bg-success'>$nombreAlumnoEtiqueta</span></h4></td>";?></h1>
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

                $idAlum = $_REQUEST['idAlumno'];
                $idContacto = $_REQUEST['id'];
              
              ?>
              
                <form role="form" method="post" action="../crud/editarContacto.php?id=<?php echo $idContacto;?>&idAlumno=<?php echo $idAlum; ?>">
                  <div class="row">
                   
                  <?php
                  
                    $contacto = new Contacto();

                    $resContacto = $contacto->buscarPorId($idContacto);

                    $nombres = $resContacto->getNombres();
                    $apellidos = $resContacto->getApellidos();
                    $direccion = $resContacto->getDireccion();
                    $telefonoCelular = $resContacto->getTelefonoCelular();
                    $telefonoCasa = $resContacto->getTelefonoCasa();
                    $fechaCommit = $resContacto->getFechaCommit();
                  
                  ?>
                  
                  <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nombres</label>
                        <input type="text" class="form-control" placeholder="Nombres" value="<?php echo $nombres;?>" name="nombres" id="nombres"
                        pattern="^[a-zA-ZáéíóúÁÉÍÓÚ ]{1,50}" required minlength="1" maxlength="50" readonly>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" class="form-control" placeholder="Apellidos" value="<?php echo $apellidos;?>" name="apellidos" id="apellidos"
                        pattern="^[a-zA-ZáéíóúÁÉÍÓÚ ]{1,50}" minlength="1" maxlength="50" readonly>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Dirección</label>
                        <input type="text" class="form-control" placeholder="Dirección" value="<?php echo $direccion;?>" name="direccion" id="direccion"
                        pattern="^[a-zA-ZáéíóúÁÉÍÓÚ ]{1,50}" minlength="1" maxlength="50" readonly>
                      </div>
                    </div>

                   

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Teléfono celular</label>
                        <input type="number" class="form-control" placeholder="Teléfono celular" value="<?php echo $telefonoCelular;?>" name="telefonoCelular" id="telefonoCelular"
                        pattern="^[0-9]{1,20}" required minlength="1" maxlength="20" readonly>
                      </div>
                    </div>  
                    
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Teléfono de casa</label>
                        <input type="number" class="form-control" placeholder="Teléfono de casa" value="<?php echo $telefonoCasa; ?>" name="telefonoCasa" id="telefonoCasa"
                        pattern="^[0-9]{1,20}" minlength="1" maxlength="20" readonly>
                      </div>
                    </div> 

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Fecha de creación</label>
                        <input type="text" class="form-control" placeholder="Fecha de creación" value="<?php echo $fechaCommit;?>" name="fechaCommit" id="fechaCommit"
                        pattern="^[a-zA-ZáéíóúÁÉÍÓÚ ]{1,50}" minlength="1" maxlength="50" readonly>
                      </div>
                    </div>
                   

                  </div>  
                  <div class="">
                 
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
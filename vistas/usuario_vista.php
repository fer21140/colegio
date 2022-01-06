<?php

include ("layout/header.php");

?>
  <title>Módulo | Ver usuario</title>
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
            <h1>Ver usuario</h1>
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
                <h3 class="card-title">Información del usuario</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <?php
              
                $usuario = new Usuario();
                $idBusqueda = $_REQUEST['id'];
                $resUsuario = $usuario->buscarPorId($idBusqueda);

                $nombres = $resUsuario->getNombres();
                $apellidos = $resUsuario->getApellidos();
                $correo = $resUsuario->getEmail();
                $rol = $resUsuario->getIdRol();
                $telefono = $resUsuario->getTelefono();
                $dpi = $resUsuario->getDpi();
                $fechaCreacion = $resUsuario->getFechaCommit();

                $permiso="";
                if($rol==1){
                    $permiso="Administrador";
                }
                if($rol==2){
                    $permiso="Profesor";
                }
              
              ?>
              
                <form role="form" method="post" action="#">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nombres</label>
                    
                    <?php
                        echo "<input type='text' class='form-control' placeholder='$nombres' name='nombres' id='nombres'
                        pattern='^[a-zA-Záéíóú ]{1,30}' required minlength='1' maxlength='50' readonly>";
                    ?>
                    </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Apellidos</label>
                        
                        <?php
                        echo "<input type='text' class='form-control' placeholder='$apellidos' name='apellidos' id='apellidos'
                        required pattern='^[a-zA-Záéíóú ]{1,30}' required minlength='1' maxlength='50' readonly>";
                        ?>
                      
                        </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Correo electrónico</label>
                        <?php
                        echo "<input type='email' class='form-control' placeholder='$correo' minlength='3' maxlength='120' required name='email' id='email' readonly>";
                        ?>
                     </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Teléfono</label>
                        <?php
                        echo "<input type='text' class='form-control' placeholder='$telefono' minlength='3' maxlength='120' required name='telefono' id='telefono' readonly>";
                        ?>
                     </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Dpi</label>
                        <?php
                        echo "<input type='text' class='form-control' placeholder='$dpi' minlength='3' maxlength='120' required name='dpi' id='dpi' readonly>";
                        ?>
                     </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Fecha de creación</label>
                        <?php
                        echo "<input type='text' class='form-control' placeholder='$fechaCreacion' minlength='3' maxlength='120' required name='fecha_commit' id='fecha_commit' readonly>";
                        ?>
                     </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Permisos</label>
                        
                        <?php
                        
                        echo "<input type='text' class='form-control' placeholder='$permiso' minlength='3' maxlength='120' required name='permisos' id='permisos' readonly>";
                        
                        ?>
                      </div>
                    </div>
                    
                  </div>  
                  <div class="">
                  
                  <a type="submit" class="btn btn-danger" href="usuario.php">Regresar</a>
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
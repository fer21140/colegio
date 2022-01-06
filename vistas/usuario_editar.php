<?php

include ("layout/header.php");

?>
  <title>Módulo | Editar usuario</title>
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
            <h1>Editar usuario</h1>
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
                  
                    $usuario = new Usuario();
                    $idBusqueda = $_REQUEST['id'];
                    $resultado = $usuario->buscarPorId($idBusqueda);

                    $nombres = $resultado->getNombres();
                    $apellidos = $resultado->getApellidos();
                    $correo = $resultado->getEmail();
                    $rol = $resultado->getIdRol();
                    $telefono = $resultado->getTelefono();
                    $dpi = $resultado->getDpi();
                    $password = $resultado->getPassword();

                   
                    $usuarioSesion = $_SESSION['usuario'];
                    $miId = $usuarioSesion->getId();

                    //Un usuario supervisor no podrá editar a otro usuario supervisor
                    
                    if($rol==1 && $miId !=$idBusqueda){
                        echo "<script>alert('¡No puedes editar la información de un supervisor a menos que sea tu usuario!');
                              window.location.href='../vistas/usuario.php';
                              </script>";    
                    }
                    
                  
                  
                  ?>
              
                <form role="form" method="post" action="../crud/editarUsuario.php?id=<?php echo $idBusqueda; ?>">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nombres</label>
                        <?php
                        echo "<input type='text' class='form-control' placeholder='Nombres' value='$nombres' name='nombres' id='nombres'
                        pattern='^[a-zA-ZáéíóúÁÉÍÓÚ ]{1,30}' required minlength='1' maxlength='50'>";
                        ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Apellidos</label>
                        <?php
                        echo "<input type='text' class='form-control' placeholder='Apellidos' value='$apellidos' name='apellidos' id='apellidos'
                        required pattern='^[a-zA-Záéíóú ]{1,30}' required minlength='1' maxlength='50'>";
                        ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Correo electrónico</label>
                        <?php
                        echo "<input type='email' class='form-control' placeholder='Correo electrónico' value='$correo' minlength='3' maxlength='120' required name='email' id='email'>";
                        ?>
                        </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Contraseña</label>
                        <?php
                        echo "<input type='password' class='form-control' placeholder='Contraseña' value='$password' minlength='3' maxlength='120' required name='password' id='password'>";
                        ?>
                        </div>
                    </div>


                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Teléfono</label>
                        <?php
                        echo "<input type='text' class='form-control' placeholder='Teléfono' value='$telefono' minlength='3' maxlength='120' required name='telefono' id='telefono'>";
                        ?>
                     </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Dpi</label>
                        <?php
                        echo "<input type='text' class='form-control' placeholder='Dpi' value='$dpi' minlength='3' maxlength='120' required name='dpi' id='dpi'>";
                        ?>
                     </div>
                    </div>


                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Permisos</label>
                        <select class="form-control" name="rol" id="rol">
                          
                           <?php
                            if($rol==1){
                                echo " <option value='1'>Administrador</option>";
                                echo " <option value='2'>Profesor</option>";
                            }
                            if($rol==2){
                                echo " <option value='2'>Profesor</option>";
                                echo " <option value='1'>Administrador</option>";
                            }
                           
                           ?>
     
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Fotografía</label>
                        <?php
                        echo "<input type='file' class='form-control' placeholder='fotografia' name='fotografia' id='fotografia'>";
                        ?>
                     </div>
                    </div>
                   
                  </div>  
                  <div class="">
                  <input type="submit" value="Editar" class="btn btn-primary" name="btnEditar" id="btnEditar">
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
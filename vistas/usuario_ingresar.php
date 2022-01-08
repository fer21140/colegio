<?php

include ("layout/header.php");

?>
  <title>Módulo | Ingresar usuario</title>
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
            <h1>Ingresar usuario</h1>
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
              
                <form role="form" method="post" action="../crud/ingresarUsuario.php">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nombres</label>
                        <input type="text" class="form-control" placeholder="Nombres" name="nombres" id="nombres"
                        pattern="^[a-zA-ZáéíóúÁÉÍÓÚ]{1,50}" required minlength="1" maxlength="50">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" class="form-control" placeholder="Apellidos" name="apellidos" id="apellidos"
                        required pattern="^[a-zA-ZáéíóúÁÉÍÓÚ]{1,50}" required minlength="1" maxlength="50">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Dpi</label>
                        
                        <input type="text" class="form-control" placeholder="Dpi" name="dpi" id="dpi"
                        required pattern="^[0-9]{1,50}" required minlength="1" maxlength="50">
                     </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Teléfono</label>
                        
                        <input type='text' class='form-control' placeholder='Teléfono' minlength='3' maxlength='120' required name='telefono' id='telefono'>
                        
                     </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Correo electrónico</label>
                        <input type="email" class="form-control" placeholder="Correo electrónico" minlength="3" maxlength="120" required name="email" id="email">
                      </div>
                    </div>
                    
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" class="form-control" placeholder="Contraseña" minlength="4" maxlength="8" required name="password" id="password" pattern="^[a-zA-Záéíóú0-9.,_- ]{1,30}">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Permisos</label>
                        <select class="form-control" name="rol" id="rol">
                          
                        <option value='1'>Administrador</option>
                        <option value='2'>Profesor</option>
                           
     
                        </select>
                      </div>
                    </div>

                   

                  </div>  
                  <div class="">
                  <input type="submit" value="Guardar" class="btn btn-primary" name="btnGuardar" id="btnGuardar">
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


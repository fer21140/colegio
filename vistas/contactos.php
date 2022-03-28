<!----------------------------------TABLA DE CONTACTOS----------------------------------->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tutores o encargados del alumno</h1>
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
          <div class="col-12">
          
          <?php
          
          $idAlum = $_REQUEST['id'];
          
          ?>


            <div class="card">
              <div class="card-header">
              
              <a type="submit" class="btn btn-primary" href="contacto_ingresar.php?idAlumno=<?php echo $idAlum; ?>">Agregar tutor o encargado</a>
              
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Dirección</th>
                    <th>Teléfono celular</th>
                    <th>Teléfono de casa</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                 
                <?php
                
                $contacto = new Contacto();
      
                $contactoArray = $contacto->obtenerContactosPorAlumno($idAlum);
                
                for($i=0; $i<sizeof($contactoArray);$i++){
                  echo "<tr>";

                  $id = $contactoArray[$i]->getId();
                  $nombres = $contactoArray[$i]->getNombres();
                  $apellidos = $contactoArray[$i]->getApellidos();
                  $direccion = $contactoArray[$i]->getDireccion();
                  $telefonoCelular = $contactoArray[$i]->getTelefonoCelular();
                  $telefonoCasa = $contactoArray[$i]->getTelefonoCasa();
                 

                  //Imprimimos datos
                  echo "
                    
                    <td>$id</td>
                   
                    <td>$nombres</td>
                    <td>$apellidos</td>
                    <td>$direccion</td>
                    <td>$telefonoCelular</td>
                    <td>$telefonoCasa</td>
                    ";

                  

                  //Imprimimos botones
                  
                    echo "<td><a type='submit' href='contacto_editar.php?id=$id&idAlumno=$idAlum' class='btn btn-primary'>
                    <i class='fas fa-pen'></i> 
                    </a>";

                    
                    echo"<a type='submit' class='btn btn-danger' id='btnEliminarContacto' href='../crud/eliminarContacto.php?id=$id&idAlumno=$idAlum'>
                    <i class='fas fa-trash-alt'></i>
                    </a>"; 
                    
                    echo"<a type='submit' href='contacto_vista.php?id=$id&idAlumno=$idAlum'class='btn bg-gradient-success'>
                    <i class='fas fa-eye'></i> 
                    </a></td>";
                  
                  echo "</tr>";
                }
                  ?>
                  
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Id</th>
                  
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Dirección</th>
                  <th>Teléfono celular</th>
                  <th>Teléfono de casa</th>
                  <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php

include ("layout/header.php");

?>
  <title>Módulo | Alumnos</title>
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
            <h1>Alumnos</h1>
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
          
            <div class="card">
              <div class="card-header">
              <a type="submit" class="btn btn-primary" href="alumno_ingresar.php">Ingresar alumno</a>
              <a type="submit" class="btn btn-primary" target="_blank" href="../reportes/reporte_usuario.php">Reporte</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Carnet</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                 
                <?php
                
                $alumno = new Alumno();
                $alumnoArray = $alumno->obtenerAlumnos();
                
                for($i=0; $i<sizeof($alumnoArray);$i++){
                  echo "<tr>";

                  $id = $alumnoArray[$i]->getId();
                  $carnet = $alumnoArray[$i]->getCarnet();
                  $nombres = $alumnoArray[$i]->getPrimerNombre() . " " . $alumnoArray[$i]->getSegundoNombre() . " ". $alumnoArray[$i]->getTercerNombre();
                  $apellidos = $alumnoArray[$i]->getPrimerApellido() . " " . $alumnoArray[$i]->getSegundoApellido();
                  $telefono = $alumnoArray[$i]->getTelefono();
                  $direccion = $alumnoArray[$i]->getDireccion();
                  $estado = $alumnoArray[$i]->getEstado();

                  //Imprimimos datos
                  echo "
                    
                    <td>$id</td>
                    <td>$carnet</td>
                    <td>$nombres</td>
                    <td>$apellidos</td>
                    <td>$telefono</td>
                    <td>$direccion</td>
                    ";

                    
                    

                  //Imprimimos según estado
                 
                  if($estado==1){
                    echo "<td><h4><span class='badge bg-success'>Activo</span></h4></td>";
                  }else{
                    echo "<td><h4><span class='badge bg-danger'>Inactivo</span></h4></td>";
                  }

                  //Imprimimos botones
                  
                    echo "<td><a type='submit' href='alumno_editar.php?id=$id' class='btn btn-primary'>
                    <i class='fas fa-pen'></i> 
                    </a>";

                    if($estado==1){
                    echo"<a type='submit' class='btn btn-danger' id='btnEliminarAlumno' href='../crud/eliminarAlumno.php?id=$id'>
                    <i class='fas fa-trash-alt'></i>
                    </a>"; 
                    }else{
                      //Imprimimo botón de reactivar
                      echo"<a type='submit' class='btn btn-warning' id='btnReactivarAlumno' href='../crud/reactivarAlumno.php?id=$id'>
                    <i class='fa fa-arrow-left'></i>
                    </a>"; 
                    }
                    echo"<a type='submit' href='alumno_vista.php?id=$id'class='btn bg-gradient-success'>
                    <i class='fas fa-eye'></i> 
                    </a></td>";
                  
                  echo "</tr>";
                }
                  ?>
                  
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Id</th>
                  <th>Carnet</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Teléfono</th>
                  <th>Dirección</th>
                  <th>Estado</th>
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

<?php

include ("layout/footer.php");

?>
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
            <h1>Sueldos de empleados</h1>
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
              <a type="submit" class="btn btn-primary" href="sueldo_ingresar.php">Asignar sueldo a empleado</a>
              <a type="submit" class="btn btn-primary" href="../reportes/reporte_sueldos.php" target="_blank">Reporte</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Empleado</th>
                    
                    <th>Sueldo</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $sueldo = new Sueldo();
                  $sueldoArray = $sueldo->obtenerSueldos();

                  for($i=0; $i<sizeof($sueldoArray); $i++){

                    $id =  $sueldoArray[$i]->getId();
                    $nombreEmpleado = $sueldoArray[$i]->getNombreEmpleado();
                    $sueldo = $sueldoArray[$i]->getSueldo();

                    echo "<tr>";

                    echo "
                        <td>$id</td>
                        <td>$nombreEmpleado</td>
                        <td>$sueldo</td>";

                    

                    echo "<td><a type='submit' href='sueldo_editar.php?id=$id' class='btn btn-primary'>
                    <i class='fas fa-pen'></i> 
                    </a>";

                    
                    echo"<a type='submit' href='sueldo_vista.php?id=$id'class='btn bg-gradient-success'>
                    <i class='fas fa-eye'></i> 
                    </a></td>";

                    echo "</tr>";

                  }

                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Id</th>
                    <th>Empleado</th>
                    
                    <th>Sueldo</th>
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
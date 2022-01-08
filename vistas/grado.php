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
            <h1>Grados académicos</h1>
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
              <a type="submit" class="btn btn-primary" href="grado_ingresar.php">Ingresar grado académico</a>
              <a type="submit" class="btn btn-primary" href="../reportes/reporte_plan.php" target="_blank">Reporte</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $grado = new Grado();
                  $gradoArray = $grado->obtenerGrados();

                  for($i=0; $i<sizeof($gradoArray); $i++){

                    $id =  $gradoArray[$i]->getId();
                    $nombre = $gradoArray[$i]->getNombre();
                    $estado = $gradoArray[$i]->getEstado();

                    echo "<tr>";

                    echo "
                        <td>$id</td>
                        <td>$nombre</td>";

                    if($estado==1){
                      echo "<td><h4><span class='badge bg-success'>Activo</span></h4></td>";
                    }else{
                      echo "<td><h4><span class='badge bg-danger'>Inactivo</span></h4></td>";
                    }

                    echo "<td><a type='submit' href='grado_editar.php?id=$id' class='btn btn-primary'>
                    <i class='fas fa-pen'></i> 
                    </a>";

                    if($estado==1){
                    echo"<a type='submit' class='btn btn-danger' id='btnEliminarGrado' href='../crud/eliminarGrado.php?id=$id'>
                    <i class='fas fa-trash-alt'></i>
                    </a>"; 
                    }else{
                      //Imprimimo botón de reactivar
                      echo"<a type='submit' class='btn btn-warning' id='btnReactivarGrado' href='../crud/reactivarGrado.php?id=$id'>
                    <i class='fa fa-arrow-left'></i>
                    </a>"; 
                    }
                    echo"<a type='submit' href='grado_vista.php?id=$id'class='btn bg-gradient-success'>
                    <i class='fas fa-eye'></i> 
                    </a></td>";



                    echo "</tr>";

                  }

                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Id</th>
                    <th>Nombre</th>
                    
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
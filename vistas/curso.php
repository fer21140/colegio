<?php

include ("layout/header.php");

?>
  <title>Módulo | Cursos</title>
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
            <h1>Cursos</h1>
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
              <a type="submit" class="btn btn-primary" href="curso_ingresar.php">Ingresar nuevo curso</a>
              <a type="submit" class="btn btn-primary" target="_blank" href="../reportes/reporte_usuario.php">Reporte</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Profesor</th>
                    <th>Grado</th>
                    <th>Hora de inicio</th>
                    <th>Hora de fin</th>
                    <th>Días de la semana</th>

                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                 
                <?php
                
                $curso = new Curso();
                $cursoArray = $curso->obtenerCursos();
                
                for($i=0; $i<sizeof($cursoArray);$i++){
                  echo "<tr>";

                  $id = $cursoArray[$i]->getId();
                  $nombre = $cursoArray[$i]->getNombre();
                  $profesor = $cursoArray[$i]->getIdProfesor();
                  
                  $usuario = new Usuario();
                  $resUsuario = $usuario->buscarPorId($profesor);
                  $nombreProfesor = $resUsuario->getNombres() . " " . $resUsuario->getApellidos();

                  $grado = $cursoArray[$i]->getIdGrado();

                  $gradoClase = new Grado();
                  $gradoRes = $gradoClase->buscarPorId($grado);
                  $nombreGrado = $gradoRes->getNombre();

                  $horaInicio = $cursoArray[$i]->getHoraInicio();
                  $horaFin = $cursoArray[$i]->getHoraFin();
                  $diasSemana = $cursoArray[$i]->getDiasSemana();
                  $estado = $cursoArray[$i]->getEstado();
                  

                  //Imprimimos datos
                  echo "
                    
                    <td>$id</td>
                    <td>$nombre</td>
                    <td>$nombreProfesor</td>
                    <td>$nombreGrado</td>
                    <td>$horaInicio</td>
                    <td>$horaFin</td>
                    
                    ";
                    
                    $cadenaDias ="";

                    for($r=0;$r<strlen($diasSemana);$r++){
                        
                        if(strcmp(strval($diasSemana[$r]), "1") === 0){
                            $cadenaDias = $cadenaDias . "L";
                        }

                        if(strcmp(strval($diasSemana[$r]), "2") === 0){
                            $cadenaDias = $cadenaDias . "M";
                        }
                        if(strcmp(strval($diasSemana[$r]), "3") === 0){
                            $cadenaDias = $cadenaDias . "M";
                        }
                        if(strcmp(strval($diasSemana[$r]), "4") === 0){
                            $cadenaDias = $cadenaDias . "J";
                        }
                        if(strcmp(strval($diasSemana[$r]), "5") === 0){
                            $cadenaDias = $cadenaDias . "V";
                        }
                        if(strcmp(strval($diasSemana[$r]), "6") === 0){
                            $cadenaDias = $cadenaDias . "S";
                        }
                        if(strcmp(strval($diasSemana[$r]), "7") === 0){
                            $cadenaDias = $cadenaDias . "D";
                        }

                    
                    }

                    echo "<td>$cadenaDias</td>";
                    

                  //Imprimimos según estado
                 
                  if($estado==1){
                    echo "<td><h4><span class='badge bg-success'>Activo</span></h4></td>";
                  }else{
                    echo "<td><h4><span class='badge bg-danger'>Inactivo</span></h4></td>";
                  }

                  //Imprimimos botones
                  
                    echo "<td><a type='submit' href='curso_editar.php?id=$id' class='btn btn-primary'>
                    <i class='fas fa-pen'></i> 
                    </a>";

                    if($estado==1){
                    echo"<a type='submit' class='btn btn-danger' id='btnEliminarCurso' href='../crud/eliminarCurso.php?id=$id'>
                    <i class='fas fa-trash-alt'></i>
                    </a>"; 
                    }else{
                      //Imprimimo botón de reactivar
                      echo"<a type='submit' class='btn btn-warning' id='btnReactivarCurso' href='../crud/reactivarCurso.php?id=$id'>
                    <i class='fa fa-arrow-left'></i>
                    </a>"; 
                    }
                    echo"<a type='submit' href='curso_vista.php?id=$id'class='btn bg-gradient-success'>
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
                    <th>Profesor</th>
                    <th>Grado</th>
                    <th>Hora de inicio</th>
                    <th>Hora de fin</th>
                    <th>Días de la semana</th>
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
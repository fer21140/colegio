<?php

include ("layout/header.php");

?>
  <title>Módulo | Operaciones</title>
  <!-- Tell the browser to be responsive to screen width -->
 
<?php

include ("layout/nav.php");

?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Operaciones</h1>
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
              <a type="submit" class="btn btn-primary" href="operacion_ingresar.php">Ingresar operación</a>
              <input type="button" class="btn btn-primary" target="_blank" value="Exportar a PDF" id="btnReporte" name="btnReporte" href="../reportes/reporte_operaciones.php">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Costo</th>
                    <th>Tipo de operación</th>
                    <th>Usuario creador</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                 
                <?php
                
                $operacion = new Operacion();
                $operacionArray = $operacion->obtenerOperaciones();
                
                for($i=0; $i<sizeof($operacionArray);$i++){
                  echo "<tr>";

                  $id = $operacionArray[$i]->getId();
                  $nombre = $operacionArray[$i]->getNombre();
                  $costo = $operacionArray[$i]->getCosto();

                  $tipo = $operacionArray[$i]->getCreditoDebito();

                  $tipoOperacion ="";

                  if($tipo==1){
                    $tipoOperacion ="CRÉDITO";
                  }
                  if($tipo==0){
                      $tipoOperacion = "DÉBITO";
                  }

                  $idUsuario = $operacionArray[$i]->getIdUsuario();

                  $usuario = new Usuario();
                  $resUsuario = $usuario->buscarPorId($idUsuario);

                  $estado = $operacionArray[$i]->getEstado();



                  $usuarioCreador = $resUsuario->getNombres() . " " . $resUsuario->getApellidos();

                  //Imprimimos datos
                  echo "
                    
                    <td>$id</td>
                    <td>$nombre</td>
                    <td>$costo</td>
                    <td>$tipoOperacion</td>
                    <td>$usuarioCreador</td>
                    
                    ";

                    
                    

                  //Imprimimos según estado
                 
                  if($estado==1){
                    echo "<td><h4><span class='badge bg-success'>Activo</span></h4></td>";
                  }else{
                    echo "<td><h4><span class='badge bg-danger'>Inactivo</span></h4></td>";
                  }

                  //Imprimimos botones
                  
                    echo "<td><a type='submit' href='operacion_editar.php?id=$id' class='btn btn-primary'>
                    <i class='fas fa-pen'></i> 
                    </a>";

                    if($estado==1){
                    echo"<a type='submit' class='btn btn-danger' id='btnEliminarOperacion' href='../crud/eliminarOperacion.php?id=$id'>
                    <i class='fas fa-trash-alt'></i>
                    </a>"; 
                    }else{
                      //Imprimimo botón de reactivar
                      echo"<a type='submit' class='btn btn-warning' id='btnReactivarOperacion' href='../crud/reactivarOperacion.php?id=$id'>
                    <i class='fa fa-arrow-left'></i>
                    </a>"; 
                    }
                    echo"<a type='submit' href='operacion_vista.php?id=$id'class='btn bg-gradient-success'>
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
                  <th>Costo</th>
                  <th>Tipo de operación</th>
                  <th>Usuario creador</th>
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

  <script type="text/javascript">
    $(document).ready(function(){
    
        $('#btnReporte').click(function(){
           
          window.open('../reportes/reporte_operaciones.php', '_blank');
                    
           
       });

        

    });
</script>

<?php

include ("layout/footer.php");

?>
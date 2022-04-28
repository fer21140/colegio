<!----------------------------------TABLA DE PAGOS----------------------------------->
<?php
  include("../db/Conexion.php");
  include("../clases/Matricula.php");

  $idBusqueda = $_REQUEST['idMatricula'];
  $matricula = new Matricula();
  //Abonamos el pago
  $matricula->descontarPago($idBusqueda);
  //Ahora consultamos datos de la matricula
  $resMatricula = $matricula->buscarPorId($idBusqueda);

  $pagosAnuales = $resMatricula->getNumeroPagos();

  $pagosAbonados = $resMatricula->getPagosAbonados();
  
  $anioM = $resMatricula->getAnio();

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Resumen de pagos del estudiante, año <?php echo $anioM;?></h1>
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
              
           
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Enero</th>
                    <th>Febrero</th>
                    <th>Marzo</th>
                    <th>Abril</th>
                    <th>Mayo</th>
                    <th>Junio</th>
                    <th>Julio</th>
                    <th>Agosto</th>
                    <th>Septiembre</th>
                    <th>Octubre</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                 
                <?php
                
              
                  echo "<tr>";
                 
                  for($i=0;$i<$pagosAbonados;$i++){
                    //Imprimimos datos
                    //Que no pase de los 10 meses ya que es desde enero a octubre
                    if($pagosAnuales<=10){
                        echo "<td><h4><span class='badge bg-success'>Pagado</span></h4></td>";
                    }
                  }
                $restantes = $pagosAnuales - $pagosAbonados;
                  for($r=0;$r<$restantes;$r++){
                      if($pagosAnuales<=10){
                        echo "<td><h4><span class='badge bg-warning'>Pendiente</span></h4></td>";
                      }
                  }

                  
                  echo "</tr>";
            
                  ?>
                  
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Enero</th>
                    <th>Febrero</th>
                    <th>Marzo</th>
                    <th>Abril</th>
                    <th>Mayo</th>
                    <th>Junio</th>
                    <th>Julio</th>
                    <th>Agosto</th>
                    <th>Septiembre</th>
                    <th>Octubre</th>
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
  
        include("layout/librerias_sin_footer.php");
  ?>
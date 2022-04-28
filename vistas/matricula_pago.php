<?php

include("layout/header.php");

?>
<title>Módulo | Ver inscripción</title>
<!-- Tell the browser to be responsive to screen width -->

<?php

include("layout/nav.php");

?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ver pagos de matrícula</h1>
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
                    
                    <?php
                            $idBusqueda = $_REQUEST['id'];
                            
                            $matricula = new Matricula();
                            $resMatricula = $matricula->buscarPorId($idBusqueda);

                            $idAlumnoM = $resMatricula->getIdAlumno();


                            $alumno = new Alumno();
                            $resAlumno = $alumno->buscarPorId($idAlumnoM);
                            $nombreAlumno = $resAlumno->getPrimerNombre() . " " . $resAlumno->getSegundoNombre() . " " . $resAlumno->getTercerNombre() ." " . $resAlumno->getPrimerApellido() . " " . $resAlumno->getSegundoApellido();

                            $idGradoM= $resMatricula->getIdGrado();

                            $grado = new Grado();
                            $resGrado = $grado->buscarPorId($idGradoM);
                            $nombreGrado = $resGrado->getNombre();

                            $anioM = $resMatricula->getAnio();
                            $valorInscripcionM = $resMatricula->getValorInscripcion();
                            $valorMensualM = $resMatricula->getValorMensual();
                            $numeroPagos = $resMatricula->getNumeroPagos();
                            $pagosAbonados = $resMatricula->getPagosAbonados();
                            
                        
                        ?>
                    
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Ver información de pagos de la matrícula</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                        

                            <form role="form" method="post" action="#">
                                <div class="row">

                                

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nombre del alumno</label>
                                            <input type="text" class="form-control" value="<?php echo $nombreAlumno;?>" name="nombre_alumno" id="nombre_alumno" required readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Número de matrícula o inscripción</label>
                                            <input type="text" class="form-control" value="<?php echo $idBusqueda;?>" name="numero_matricula" id="numero_matricula" required readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Grado académico</label>
                                            <input type="text" class="form-control" value="<?php echo $nombreGrado;?>" name="nombre_grado" id="nombre_grado" required readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Ciclo escolar</label>
                                            <input type="text" class="form-control" value="<?php echo $anioM;?>" name="ciclo_escolar" id="ciclo_escolar" required readonly>
                                        </div>
                                    </div>

                                    
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Cuota de inscripción</label>
                                            <input type="text" class="form-control" value="<?php echo "Q " . $valorInscripcionM;?>" name="valor_inscripcion" id="valor_inscripcion" required readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Cuota de pago mensual</label>
                                            <input type="text" class="form-control" value="<?php echo "Q " . $valorMensualM;?>" name="valor_mensual" id="valor_mensual" required readonly>
                                        </div>
                                    </div>
                   
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Número de pagos anuales</label>
                                            <input type="number" class="form-control" placeholder="Cantidad de pagos anuales" name="numero_pagos" id="numero_pagos" pattern="^[0-9.]{1,10}" min="0" max="9999999999" required step="1" value="<?php echo $numeroPagos;?>" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Pagos abonados</label>
                                            <input type="number" class="form-control" placeholder="Pagos abonados" name="pagos_abonados" id="pagos_abonados" pattern="^[0-9.]{1,10}" min="0" max="9999999999" required step="1" value="<?php echo $pagosAbonados;?>" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Pagos restantes</label>
                                            <input type="number" class="form-control" placeholder="Pagos restantes" name="pagos_restantes" id="pagos_restantes" pattern="^[0-9.]{1,10}" min="0" max="9999999999" required step="1" value="<?php echo ($numeroPagos - $pagosAbonados);?>" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Estado de cuenta</label>
                                            <?php
                                                $numeroMesActual = date("n");

                                                if($pagosAbonados>=$numeroMesActual){
                                                    echo "<h4><span class='badge bg-success' id='span'>Solvente</span></h4>";
                                                }else{
                                                    echo "<h4><span class='badge bg-warning' id='span'>Insolvente</span></h4>";
                                                }
                                            
                                            ?>
                                            
                                            </div>
                                    </div>

                                    

                                </div>
                                <div class="">
                                    <a type="submit" class="btn btn-danger" href="matricula.php">Regresar</a>
                                    <input type="button" value="Abonar pago" class="btn btn-primary" name="btnAbonar" id="btnAbonar">
                                    <input type="button" value="Descontar pago" class="btn btn-warning" name="btnDescontar" id="btnDescontar">
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
    <div id="divPagos">
   
   <!----------------------------------TABLA DE PAGOS----------------------------------->

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
                
                $pagosAnuales= $numeroPagos;
            
             
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
    </div>

    

<?php

include("layout/footer.php");

?>

<script type="text/javascript">

function abonarPago(){
    
   
    $.ajax({
        type:"POST",
        url:"abonar_pago.php?idMatricula=" + $ ('#numero_matricula').val(),
        //data:"id="+ $ ('#lista1').val(),
        success:function(r){
            $('#divPagos').html(r);
        }
    
    });

}

function descontarPago(){
    
   
    $.ajax({
        type:"POST",
        url:"descontar_pago.php?idMatricula=" + $ ('#numero_matricula').val(),
        //data:"id="+ $ ('#lista1').val(),
        success:function(r){
            $('#divPagos').html(r);
        }
    
    });

}

</script>

<script>

  

$(document).ready(function(){
    

   

    $('#btnAbonar').click(function(){
    
        var pagosAbonados = parseInt(document.getElementById('pagos_abonados').value);
        var nuevosPagosRestantes = pagosAbonados + 1;

        var numeroPagos = parseInt(document.getElementById('numero_pagos').value);
        
        var pagosPendientes = numeroPagos - nuevosPagosRestantes;
        if(pagosPendientes>=0){
        document.getElementById('pagos_restantes').value = pagosPendientes;
        //Seteamos nuevo valor
        document.getElementById('pagos_abonados').value = nuevosPagosRestantes;
        fecha = new Date();
        var mesActual = fecha.getMonth() + 1;

        if(mesActual>10){
            //Por si llega a diciembre o mes 12 se vuelve a mes 10
            mesActual =10;
        }

        if(nuevosPagosRestantes>=mesActual){
        
        document.getElementById('span').innerText = "Solvente";
        document.getElementById('span').className ="badge bg-success";
        
         }else{
            document.getElementById('span').innerText = "Insolvente";
            document.getElementById('span').className ="badge bg-warning";
             
         }

        }
        
        abonarPago();
   
    
    });

    $('#btnDescontar').click(function(){
    
        var pagosAbonados = parseInt(document.getElementById('pagos_abonados').value);
        var nuevosPagosRestantes = pagosAbonados - 1;

        var numeroPagos = parseInt(document.getElementById('numero_pagos').value);
        
        var pagosPendientes = numeroPagos - nuevosPagosRestantes;
      
        if(pagosPendientes>=0){
        document.getElementById('pagos_restantes').value = pagosPendientes;
        //Seteamos nuevo valor
        document.getElementById('pagos_abonados').value = nuevosPagosRestantes;

      
        fecha = new Date();
        var mesActual = fecha.getMonth() + 1;
      
        if(mesActual>10){
            //Por si llega a diciembre o mes 12 se vuelve a mes 10
            mesActual =10;
        }

        if(nuevosPagosRestantes>=mesActual){
        
        document.getElementById('span').innerText = "Solvente";
        document.getElementById('span').className ="badge bg-success";
        
         }else{
            document.getElementById('span').innerText = "Insolvente";
            document.getElementById('span').className ="badge bg-warning";
             
         }
    
        }

        descontarPago();
       

        

});

    

});


</script>


<?php
    include("../clases/Movimiento.php");
    include("../db/Conexion.php");
    include("../clases/Operacion.php");
    include("../clases/Usuario.php");
    include("../clases/Alumno.php");
?>

<div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                 
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Operación</th>
                    <th>Alumno</th>
                    <th>Usuario emisor</th>
                    <th>Número de comprobante</th>
                    <th>Fecha de pago</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                <?php
                
                $movimiento = new Movimiento();
                $fechaInicioMovimiento = $_REQUEST['fechaInicio'];
                $fechaFinMovimiento = $_REQUEST['fechaFin'];
               
                $movimientoArray = $movimiento->obtenerMovimientosPorFechas($fechaInicioMovimiento,$fechaFinMovimiento);

                if(isset($_SESSION)){
                    $_SESSION['movimientoArray'] = $movimientoArray;
                    $_SESSION['tipoReporte'] = 2;
                    $_SESSION['fechaInicio'] = $fechaInicioMovimiento;
                    $_SESSION['fechaFin'] = $fechaFinMovimiento;
                  }else{
                    session_start();
                    $_SESSION['movimientoArray'] = $movimientoArray;
                    $_SESSION['tipoReporte'] = 2;
                    $_SESSION['fechaInicio'] = $fechaInicioMovimiento;
                    $_SESSION['fechaFin'] = $fechaFinMovimiento;
                  }
                
                for($i=0; $i<sizeof($movimientoArray);$i++){
                  echo "<tr>";

                  $idMovimiento = $movimientoArray[$i]->getId();

                  $idOperacion = $movimientoArray[$i]->getIdOperacion();
                  $operacion = new Operacion();
                  $resOperacion = $operacion->buscarPorId($idOperacion);
                  $nombreOperacion = $resOperacion->getNombre();

                  $idAlumno = $movimientoArray[$i]->getIdUsuarioReceptor();
                  $alumno = new Alumno();
                  $resAlumno = $alumno->buscarPorId($idAlumno);
                  $nombreAlumno = $resAlumno->getPrimerNombre() . " " . $resAlumno->getSegundoNombre() . " " . $resAlumno->getTercerNombre() . " " . $resAlumno->getPrimerApellido() . " " . $resAlumno->getSegundoApellido();

                  //Imprimimos datos
                  echo "
                    
                    <td>$idMovimiento</td>
                    <td>$nombreOperacion</td>
                    <td>$nombreAlumno</td>";

                    $idUsuario = $movimientoArray[$i]->getIdUsuarioOperacion();
                    $usuario = new Usuario();
                    $resUsuario = $usuario->buscarPorId($idUsuario);

                    $usuarioEmisor = $resUsuario->getNombres() . " " . $resUsuario->getApellidos();


                    echo "<td>$usuarioEmisor</td>";
                    
                   
                    $numeroComprobante = $movimientoArray[$i]->getNumeroComprobante();
                    $total = $movimientoArray[$i]->getTotal();
                    $fechaCommit = $movimientoArray[$i]->getFechaCommit();
                    $estado = $movimientoArray[$i]->getEstado();

                    echo "<td>$numeroComprobante</td>
                    <td>$fechaCommit</td>
                    <td>$total</td>";
                    

                  //Imprimimos según estado
                 
                  if($estado==1){
                    echo "<td><h4><span class='badge bg-success'>Pagado</span></h4></td>";
                  }else{
                    echo "<td><h4><span class='badge bg-danger'>Anulado</span></h4></td>";
                  }

                  //Imprimimos botones
                  
                    echo "<td><a type='submit' href='movimiento_editar.php?id=$idMovimiento' class='btn btn-primary'>
                    <i class='fas fa-pen'></i> 
                    </a>";

                    if($estado==1){
                    echo"<a type='submit' class='btn btn-danger' id='btnEliminarMovimiento' href='../crud/eliminarMovimiento.php?id=$idMovimiento'>
                    <i class='fas fa-trash-alt'></i>
                    </a>"; 
                    }else{
                      //Imprimimo botón de reactivar
                      echo"<a type='submit' class='btn btn-warning' id='btnReactivarMovimiento' href='../crud/reactivarMovimiento.php?id=$idMovimiento'>
                    <i class='fa fa-arrow-left'></i>
                    </a>"; 
                    }
                    echo"<a type='submit' href='movimiento_vista.php?id=$idMovimiento'class='btn bg-gradient-success'>
                    <i class='fas fa-eye'></i> 
                    </a></td>";
                  
                  echo "</tr>";
                }
                  ?>


                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Operación</th>
                    <th>Alumno</th>
                    <th>Usuario emisor</th>
                    <th>Número de comprobante</th>
                    <th>Fecha de pago</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                 
                </table>
              </div>
              <!-- /.card-body -->

<?php

    include("layout/librerias_sin_footer.php");

?>
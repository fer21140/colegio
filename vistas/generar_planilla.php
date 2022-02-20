<?php

    include("../clases/Usuario.php");
    include("../clases/Planilla.php");
    include("../db/Conexion.php");

?>

<div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                 
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Dpi</th>
                    <th>Empleado</th>
                    <th>Salario ordinario</th>
                    <th>Abono</th>
                    <th>Descuento</th>
                    <th>No. Cheque</th>
                    <th>Sueldo líquido</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                <?php
                $mes = $_REQUEST['mes'];
                $anio = $_REQUEST['anio'];

                $planilla = new Planilla();
                $planillaArray = $planilla->obtenerPlanillasMesAnio($mes,$anio);
                
                for($i=0; $i<sizeof($planillaArray);$i++){
                  echo "<tr>";

                  $idPlanilla = $planillaArray[$i]->getId();
                  $idEmpleado = $planillaArray[$i]->getIdEmpleado();

                  $usuario = new Usuario();
                  $resUsuario = $usuario->buscarPorId($idEmpleado);
                  $dpi = $resUsuario->getDpi();

                  $nombreEmpleado = $planillaArray[$i]->getNombreEmpleado();
                  $salarioOrdinario = $planillaArray[$i]->getSalarioOrdinario();
                  $abono = $planillaArray[$i]->getAbono();
                  $descuento = $planillaArray[$i]->getDescuento();
                  $noCheque = $planillaArray[$i]->getNumeroCheque();
                  $sueldoLiquido = $planillaArray[$i]->getSueldoLiquido();

                  
                  //Imprimimos datos
                  echo "
                    
                    <td>$idPlanilla</td>
                    <td>$dpi</td>
                    <td>$nombreEmpleado</td>
                    <td>$salarioOrdinario</td>
                    <td>$abono</td>
                    <td>$descuento</td>
                    <td>$noCheque</td>
                    <td>$sueldoLiquido</td>";

                    
                

                  //Imprimimos botones
                  
                    echo "<td><a type='submit' href='planilla_editar.php?id=$idPlanilla' class='btn btn-primary'>
                    <i class='fas fa-pen'></i> 
                    </a>";

                    
                    echo"<a type='submit' class='btn btn-danger' id='btnEliminarPlani' href='../crud/eliminarPlanilla.php?id=$idPlanilla'>
                    <i class='fas fa-trash-alt'></i>
                    </a>"; 
                    
                    echo"<a type='submit' href='planilla_vista.php?id=$idPlanilla'class='btn bg-gradient-success'>
                    <i class='fas fa-eye'></i> 
                    </a></td>";
                  
                  echo "</tr>";
                }
                  ?>


                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Dpi</th>
                    <th>Empleado</th>
                    <th>Salario ordinario</th>
                    <th>Abono</th>
                    <th>Descuento</th>
                    <th>No. Cheque</th>
                    <th>Sueldo líquido</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                 
                </table>
              </div>

              

              <?php
              
              include("layout/librerias_sin_footer.php");
              
              
              ?>
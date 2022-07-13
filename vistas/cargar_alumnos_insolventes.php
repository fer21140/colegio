<?php

include("../db/Conexion.php");
include("../clases/Matricula.php");
include("../clases/Grado.php");
include("../clases/Alumno.php");

?>

<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                    <th>Id</th>
                    <th>Alumno</th>
                    <th>Grado académico</th>
                    <th>Ciclo escolar</th>
                    <th>Cuota mensual</th>
                    <th>Cuotas abonadas</th>
                    <th>Total abonado</th>
                    <th>Deuda pendiente</th>
                    <th>Estado</th>
            </tr>
        </thead>
        <tbody>


            <?php

            $idGradoSearch = $_REQUEST['idGrado'];
            $anioSearch = $_REQUEST['anio'];

            $matricula = new Matricula();
            $matriculaArray = $matricula->obtenerMatriculasGradoAnio($idGradoSearch, $anioSearch);

            for ($i = 0; $i < sizeof($matriculaArray); $i++) {
                echo "<tr>";

                $id = $matriculaArray[$i]->getId();

                //Obtener nombres del alumno
                $alumno = new Alumno();
                $resAlumno = $alumno->buscarPorId($matriculaArray[$i]->getIdAlumno());
                $nombreAlumno = $resAlumno->getPrimerNombre() . " " . $resAlumno->getSegundoNombre() . " " . $resAlumno->getTercerNombre() . " " . $resAlumno->getPrimerApellido() . " " . $resAlumno->getSegundoApellido();

                //Obtener nombre del grado académico
                $grado = new Grado();
                $resGrado = $grado->buscarPorId($matriculaArray[$i]->getIdGrado());
                $nombreGrado = $resGrado->getNombre();

                $valorInscripcion = $matriculaArray[$i]->getValorInscripcion();
                $valorMensual = $matriculaArray[$i]->getValorMensual();

                $anio = $matriculaArray[$i]->getAnio();
                $estado = $matriculaArray[$i]->getEstado();


                //Obtenemos pagos abonados
                $pagosAbonados = $matriculaArray[$i]->getPagosAbonados();
                //Obtenemos el total abonado
                $totalAbonado = $pagosAbonados * $valorMensual;
                //Deuda pendiente
                $deudaPendiente = ((10 - $pagosAbonados)*$valorMensual);
                //obtener año
                $anioActual = date("Y");
                //Obtener mes
                $mesActual = date("m");

                $statusSolvencia ="INSOLVENTE";
                $validadorSolvencia=0;//0=insolvente, 1=solvente

                //En caso de que el año de selección sea menor al año actual se deduce la solvencia por los pagos
                if($anio<$anioActual){
                    if($pagosAbonados < 10){
                        $statusSolvencia="INSOLVENTE";
                        $validadorSolvencia = 0;

                        $mesesDeuda = 10 - $pagosAbonados;

                        $deudaPendiente = ($mesesDeuda*$valorMensual);

                    }else{
                        $statusSolvencia="SOLVENTE";
                        $validadorSolvencia=1;
                        $deudaPendiente=" 0.00";
                    }

                }else{
                    //Si el año de busqueda es igual al año actual entonces deducimos por el mes actual
                    if($anio==$anioActual){

                        //Para que no pase a los meses de noviembre y diciembre
                        if($mesActual>10){
                            $mesActual=10;
                        }

                        if($pagosAbonados>=$mesActual){
                            $statusSolvencia="SOLVENTE";
                            $validadorSolvencia=1;
                            $deudaPendiente=" 0.00";
                        }else{
                            $statusSolvencia="INSOLVENTE";
                            $validadorSolvencia=0;
                           
                            $mesesDeuda = $mesActual - $pagosAbonados;

                            $deudaPendiente =  ($mesesDeuda*$valorMensual);
                        }
                    }
                }

                //Imprimimos datos
                echo "
                    
                    <td>$id</td>
                    <td>$nombreAlumno</td>
                    <td>$nombreGrado</td>
                    <td>$anio</td>
                    
                    <td>$valorMensual</td>
                    <td>$pagosAbonados</td>
                    <td>Q $totalAbonado</td>
                    <td>Q $deudaPendiente</td>
                    
                    ";

                    if($validadorSolvencia==0){
                        echo "<td><h4><span class='badge bg-danger'>$statusSolvencia</span></h4></td>";
                    }else{
                        if($validadorSolvencia==1){
                            echo "<td><h4><span class='badge bg-success'>$statusSolvencia</span></h4></td>";
                        }
                    }



                //Imprimimos botones

            

                echo "</tr>";
            }
            ?>

        </tbody>
        <tfoot>
            <tr>
                    <th>Id</th>
                    <th>Alumno</th>
                    <th>Grado académico</th>
                    <th>Ciclo escolar</th>
                    <th>Cuota mensual</th>
                    <th>Cuotas abonadas</th>
                    <th>Total abonado</th>
                    <th>Deuda pendiente</th>
                    <th>Estado</th>
            </tr>
        </tfoot>
    </table>
</div>

<?php

include("layout/librerias_sin_footer.php");

?>
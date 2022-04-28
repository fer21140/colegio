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
                <th>Valor de inscripción</th>
                <th>Cuota mensual</th>
                <th>Ciclo escolar</th>
                <th>Estado</th>
                <th>Acciones</th>
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



                //Imprimimos datos
                echo "
                    
                    <td>$id</td>
                    <td>$nombreAlumno</td>
                    <td>$nombreGrado</td>
                    <td>$valorInscripcion</td>
                    <td>$valorMensual</td>
                    <td>$anio</td>
                    ";




                //Imprimimos según estado

                if ($estado == 1) {
                    echo "<td><h4><span class='badge bg-success'>Activo</span></h4></td>";
                } else {
                    echo "<td><h4><span class='badge bg-danger'>Inactivo</span></h4></td>";
                }

                //Imprimimos botones

                echo "<td><a type='submit' href='matricula_editar.php?id=$id' class='btn btn-primary'>
                    <i class='fas fa-pen'></i> 
                    </a>";

                if ($estado == 1) {
                    echo "<a type='submit' class='btn btn-danger' id='btnEliminarMatricula' href='../crud/eliminarMatricula.php?id=$id'>
                    <i class='fas fa-trash-alt'></i>
                    </a>";
                } else {
                    //Imprimimo botón de reactivar
                    echo "<a type='submit' class='btn btn-warning' id='btnReactivarMatricula' href='../crud/reactivarMatricula.php?id=$id'>
                    <i class='fa fa-arrow-left'></i>
                    </a>";
                }

                echo "<a type='submit' href='matricula_pago.php?id=$id'class='btn bg-gradient-warning'>
                <i class='fas fa-wallet'></i> 
                </a>";

                echo "<a type='submit' href='matricula_vista.php?id=$id'class='btn bg-gradient-success'>
                    <i class='fas fa-eye'></i> 
                    </a></td>";

                echo "</tr>";
            }
            ?>

        </tbody>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Alumno</th>
                <th>Grado académico</th>
                <th>Valor de inscripción</th>
                <th>Cuota mensual</th>
                <th>Ciclo escolar</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
    </table>
</div>

<?php

include("layout/librerias_sin_footer.php");

?>
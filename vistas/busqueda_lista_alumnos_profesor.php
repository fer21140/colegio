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
                <th>Carnet</th>
                <th>Alumno</th>
                <th>Grado académico</th>
               
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
                $idAlumno = $resAlumno->getId();
                $nombreAlumno = $resAlumno->getPrimerNombre() . " " . $resAlumno->getSegundoNombre() . " " . $resAlumno->getTercerNombre() . " " . $resAlumno->getPrimerApellido() . " " . $resAlumno->getSegundoApellido();
                $carnet = $resAlumno->getCarnet();
                //Obtener nombre del grado académico
                $grado = new Grado();
                $resGrado = $grado->buscarPorId($matriculaArray[$i]->getIdGrado());
                $nombreGrado = $resGrado->getNombre();

                

                $anio = $matriculaArray[$i]->getAnio();
                $estado = $matriculaArray[$i]->getEstado();



                //Imprimimos datos
                echo "
                    
                    <td>$id</td>
                    <td>$carnet</td>
                    <td>$nombreAlumno</td>
                    <td>$nombreGrado</td>
                    <td>$anio</td>
                    ";




                //Imprimimos según estado

                if ($estado == 1) {
                    echo "<td><h4><span class='badge bg-success'>Activo</span></h4></td>";
                } else {
                    echo "<td><h4><span class='badge bg-danger'>Inactivo</span></h4></td>";
                }

                //Imprimimos botones     

                    echo "<td><a type='submit' href='alumno_vista.php?id=$idAlumno&modoVista=2'class='btn bg-gradient-success'>
                    <i class='fas fa-eye'></i> 
                    </a></td>";

                echo "</tr>";
            }
            ?>

        </tbody>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Carnet</th>
                <th>Alumno</th>
                <th>Grado académico</th>
               
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
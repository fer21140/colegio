<?php

    include("../db/Conexion.php");
    include("../clases/Matricula.php");
    include("../clases/Alumno.php");

    $idGrado = $_REQUEST['idGrado'];
    $anio = $_REQUEST['anio'];

    $matricula = new Matricula();

    $resultadoMatricula = $matricula->obtenerMatriculasGradoAnio($idGrado,$anio);


    //Valor por defecto
    echo "<select class='form-control selectAlumno' id='id_alumno' name='id_alumno'>";
                                              
    echo "<option value='0'>Seleccione alumno</option>";

    for($i=0;$i<sizeof($resultadoMatricula);$i++){
        $idAlumnoSearch = $resultadoMatricula[$i]->getIdAlumno();

        $alum = new Alumno();
        $resAlum = $alum->buscarPorId($idAlumnoSearch);

        $carnetAlumno = $resAlum->getCarnet();
        $nombreAlumno = "[$carnetAlumno] " . $resAlum->getPrimerNombre() . " " . $resAlum->getSegundoNombre() . " " . $resAlum->getTercerNombre() . " " . $resAlum->getPrimerApellido() . " " . $resAlum->getSegundoApellido();

        echo "<option value='$idAlumnoSearch'>$nombreAlumno</option>";
        
    }

    echo "</select>";

    echo"<script>
    $(function() {
        //Initialize Select2 Elements
        $('.selectAlumno').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });

    /*$( '.select2' ).change(function() {
     
    });*/
</script>";


?>
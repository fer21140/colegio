<?php

    include("../db/Conexion.php");
    include("../clases/Matricula.php");
    include("../clases/Alumno.php");

    $alumno = new Alumno();
    $idAlumno = 0;

    if(isset($_SESSION)){
        $alumno = $_SESSION['alumno'];
        $idAlumno = $alumno->getId();
    }else{
        session_start();
        $alumno = $_SESSION['alumno'];
        $idAlumno = $alumno->getId();
    }

    $idGrado = $_REQUEST['idGrado'];
    $anio = $_REQUEST['anio'];

    $matricula = new Matricula();

    $resultadoMatricula = $matricula->obtenerMatriculasGradoAnio($idGrado,$anio);


    //Valor por defecto
    echo "<select class='form-control selectAlumno' id='id_alumno' name='id_alumno' disabled='true'>";
                                              
    $validador=0;

    for($i=0;$i<sizeof($resultadoMatricula);$i++){
        $idAlumnoSearch = $resultadoMatricula[$i]->getIdAlumno();

        $alum = new Alumno();
        $resAlum = $alum->buscarPorId($idAlumnoSearch);

        if($idAlumnoSearch==$idAlumno){
        $carnetAlumno = $resAlum->getCarnet();
        $nombreAlumno = "[$carnetAlumno] " . $resAlum->getPrimerNombre() . " " . $resAlum->getSegundoNombre() . " " . $resAlum->getTercerNombre() . " " . $resAlum->getPrimerApellido() . " " . $resAlum->getSegundoApellido();

        echo "<option value='$idAlumnoSearch'>$nombreAlumno</option>";
        $validador=1;
        }

        
    }

    if($validador==0){
        echo "<option value='0'>No inscrito en el ciclo académico seleccionado</option>";
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
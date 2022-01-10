<?php

    include("../db/Conexion.php");
    include("../clases/Curso.php");

    $idGrado = $_REQUEST['idGrado'];
    

    $curso = new Curso();

    $resultadoCurso = $curso->obtenerCursosPorGrado($idGrado);


    //Valor por defecto
    echo "<select class='form-control selectCurso' id='id_curso' name='id_curso'>";
                                              
    echo "<option value='0'>Seleccione el curso</option>";

    for($i=0;$i<sizeof($resultadoCurso);$i++){
        $idCurso = $resultadoCurso[$i]->getId();

        $nombreCurso = $resultadoCurso[$i]->getNombre();
       
        echo "<option value='$idCurso'>$nombreCurso</option>";
        
    }

    echo "</select>";

    echo"<script>
    $(function() {
        //Initialize Select2 Elements
        $('.selectCurso').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });

    /*$( '.select2' ).change(function() {
     
    });*/
</script>";


?>
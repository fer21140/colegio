<?php

include("../db/Conexion.php");
include("../clases/Matricula.php");

if (isset($_POST['btnEditar'])) {

    if (intval($_POST['id_alumno']) != 0) {
        if (intval($_POST['grado']) != 0) {
            if (intval($_POST['valor_inscripcion']) > 0) {
                if (intval($_POST['valor_mensual']) > 0) {
                    $mat = new Matricula();
                    //Validamos si el alumno ya se encuentra inscrito
                   
                        $idAlumno = $_POST['id_alumno'];
                        $idGrado = $_POST['grado'];
                        $valorInscripcion = $_POST['valor_inscripcion'];
                        $valorMensual = $_POST['valor_mensual'];
                        $anio = $_POST['anio'];

                        $idEditar = $_REQUEST['id'];

                        $matricula = new Matricula();

                       $matricula->editar($idAlumno,$idGrado,$valorInscripcion,$valorMensual,$anio,$idEditar);
                        header("Location: ../vistas/matricula.php");
                    
                } else {
                    echo "<script>alert('¡Debes seleccionar un valor de cobro mensual válido!');
        window.history.back ();
              </script>";
                }
            } else {
                echo "<script>alert('¡Selecciona un valor de inscripción válido!');
        window.history.back ();
              </script>";
            }
        } else {
            echo "<script>alert('¡Debes seleccionar un grado académico!');
        window.history.back ();
              </script>";
        }
    } else {
        echo "<script>alert('¡Debes seleccionar un alumno!');
    window.history.back ();
    </script>";
    }
}
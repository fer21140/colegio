<?php

    include("../db/Conexion.php");
    include("../clases/Curso.php");

    if(isset($_POST['btnGuardar'])){
    
      if(intval($_POST['id_profesor'])!=0){
        if(intval($_POST['grado']) !=0){

        $nombre = mb_strtoupper($_POST['nombre']);
        $horaInicio = $_POST['hora_inicio'];
        $horaFin = $_POST['hora_fin'];
        $idProfesor = $_POST['id_profesor'];
        $idGrado = $_POST['grado'];
/*
        $lunes = $_POST['lunes'];
        $martes = $_POST['martes'];
        $miercoles = $_POST['miercoles'];
        $jueves = $_POST['jueves'];
        $viernes = $_POST['viernes'];
        $sabado = $_POST['sabado'];
        $domingo = $_POST['domingo'];
*/

        $cadenaDias="";

        if(isset($_POST['lunes'])){
            $cadenaDias = $cadenaDias . "1";
        }
        if(isset($_POST['martes'])){
            $cadenaDias = $cadenaDias . "2";
        }
        if(isset($_POST['miercoles'])){
            $cadenaDias = $cadenaDias . "3";
        }
        if(isset($_POST['jueves'])){
            $cadenaDias = $cadenaDias . "4";
        }
        if(isset($_POST['viernes'])){
            $cadenaDias = $cadenaDias . "5";
        }
        if(isset($_POST['sabado'])){
            $cadenaDias = $cadenaDias . "6";
        }
        if(isset($_POST['domingo'])){
            $cadenaDias = $cadenaDias . "7";
        }

        $curso = new Curso();

        $curso->guardar($idProfesor,$idGrado,$nombre,$horaInicio,$horaFin,$cadenaDias);

        header("Location: ../vistas/curso.php");
    }else{
        echo "<script>alert('¡Debes seleccionar un grado académico!');
        window.history.back ();
              </script>";  
    }
}else{
    echo "<script>alert('¡Debes seleccionar un profesor primero!');
    window.history.back ();
    </script>";  
}

    }


?>
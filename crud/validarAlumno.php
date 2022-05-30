<?php

    include("../db/Conexion.php");
    include("../clases/Alumno.php");

    $correo = $_POST['correo'];
    $password = $_POST['password'];

    if(isset($_POST['btnEntrar'])){

        $alumno = new Alumno();

        if($alumno->validarAlumnoExistente($correo,$password)==1){
            header("Location: ../vistas/student_dashboard.php");
        }else{
            echo "<script>alert('¡Usuario incorrecto!'); window.location.href='../vistas/estudiantes.php';</script>";
        }

    }

?>
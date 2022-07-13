<?php

    include("../db/Conexion.php");
    include("../clases/Alumno.php");

    $correo = $_POST['correo'];
    $password = $_POST['password'];

    if(isset($_POST['btnEntrar'])){

        $alumno = new Alumno();

        if($alumno->validarAlumnoExistente($correo,$password)==1){
            

            session_start();
            if($_SESSION['estado']==1){
                header("Location: ../vistas/student_dashboard.php");
            }else{
                //Destruimos la sesión para evitar que acceda una vez logeado
               
                session_destroy();
                
                echo "<script>alert('¡Estudiante INACTIVO, debes ponerte en contacto con tu institución educativa!'); window.location.href='../vistas/estudiantes.php';</script>";
            }




        }else{
            echo "<script>alert('¡Usuario incorrecto!'); window.location.href='../vistas/estudiantes.php';</script>";
        }

    }

?>
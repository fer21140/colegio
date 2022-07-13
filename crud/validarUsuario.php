<?php

    include("../db/Conexion.php");
    include("../clases/Usuario.php");

    $correo = $_POST['correo'];
    $password = $_POST['password'];

    if(isset($_POST['btnEntrar'])){

        $usuario = new Usuario();

        if($usuario->validarUsuarioExistente($correo,$password)==1){
            session_start();
            if($_SESSION['estado']==1){
                header("Location: ../vistas/index.php"); 
            }else{
                //Destruimos la sesión para evitar que acceda una vez logeado
               
                session_destroy();
                
                echo "<script>alert('¡Usuario INACTIVO, debes ponerte en contacto con tu institución!'); window.location.href='../vistas/login.php';</script>";
            }
        }else{
            echo "<script>alert('¡Usuario incorrecto!'); window.location.href='../vistas/login.php';</script>";
        }

    }

?>
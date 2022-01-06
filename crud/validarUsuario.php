<?php

    include("../db/Conexion.php");
    include("../clases/Usuario.php");

    $correo = $_POST['correo'];
    $password = $_POST['password'];

    if(isset($_POST['btnEntrar'])){

        $usuario = new Usuario();

        if($usuario->validarUsuarioExistente($correo,$password)==1){
            header("Location: ../vistas/index.php");
        }else{
            echo "<script>alert('¡Usuario incorrecto!'); window.location.href='../vistas/login.php';</script>";
        }

    }

?>
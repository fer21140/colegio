<?php

    include("../clases/Usuario.php");
    include("../db/Conexion.php");

    $nombres = mb_strtoupper($_POST['nombres']);
    $apellidos = mb_strtoupper($_POST['apellidos']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dpi = $_POST['dpi'];
    $telefono = $_POST['telefono'];
    $rol = $_POST['rol'];

    if(isset($_POST['btnGuardar'])){

        $usuario = new Usuario();

        if($usuario->validarEmailExistente($email)==0){
            session_start();
            $usuarioSesion = $_SESSION['usuario'];
            $idUsuario = $usuarioSesion->getId();
            $usuario->guardar($rol,$dpi,$nombres,$apellidos,$email,$password,$telefono);
            header("Location: ../vistas/usuario.php");
        }else{
            echo "<script>alert('¡El correo electrónico ya existe!');
                window.location.href='../vistas/usuario_ingresar.php';
            </script>";    
        }
        
    }




?>
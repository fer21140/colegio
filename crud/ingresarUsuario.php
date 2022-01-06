<?php

    include("../clases/Usuario.php");
    include("../db/Conexion.php");

    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];

    if(isset($_POST['btnGuardar'])){

        $usuario = new Usuario();

        if($usuario->validarEmailExistente($email)==0){
            session_start();
            $usuarioSesion = $_SESSION['usuario'];
            $idUsuario = $usuarioSesion->getId();
            $usuario->guardar($nombres,$apellidos,$rol,$email,$password,$idUsuario);
            header("Location: ../vistas/usuario.php");
        }else{
            echo "<script>alert('¡El correo electrónico ya existe!');
                window.location.href='../vistas/usuario_ingresar.php';
            </script>";    
        }
        
    }




?>
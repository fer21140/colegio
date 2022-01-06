<?php

    include("../clases/Usuario.php");
    include("../db/Conexion.php");

    $usuario = new Usuario();
    $idEliminar = $_REQUEST['id'];

    $consultaUsuario = $usuario->buscarPorId($idEliminar);
    $rol = $consultaUsuario->getIdRol();

    session_start();
    $usuarioMio = $_SESSION['usuario'];
    $miId = $usuarioMio->getId();

    //Validar que no sea supervisor para que un supervisor no pueda desactivar a un supervisor

    if($rol==1 && $miId !=$idEliminar){
        echo "<script>alert('¡No puedes eliminar un usuario con permisos de supervisor a menos que sea tu usuario!');
              window.location.href='../vistas/usuario.php';
              </script>";    
    }else{
        $usuario->desactivar($idEliminar);

    header("Location: ../vistas/usuario.php");
    }

?>
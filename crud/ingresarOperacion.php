<?php

    include("../db/Conexion.php");
    include("../clases/Operacion.php");
    include("../clases/Usuario.php");

    if(isset($_POST['btnGuardar'])){
        $nombre = mb_strtoupper($_POST['nombre_operacion']);
        $descripcion = mb_strtoupper($_POST['descripcion']);
        $costo = $_POST['costo'];
        $creditoDebito = $_POST['tipo_operacion'];

        session_start();
        $usuario = $_SESSION['usuario'];
        $idUsuario = $usuario->getId();

        $operacion = new Operacion();

        $operacion->guardar($idUsuario,$nombre,$descripcion,$costo,$creditoDebito);

        header("Location: ../vistas/operacion.php");
    }


?>
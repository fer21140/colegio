<?php

    include("../db/Conexion.php");
    include("../clases/Operacion.php");
    

    if(isset($_POST['btnEditar'])){
        $nombre = mb_strtoupper($_POST['nombre_operacion']);
        $descripcion = mb_strtoupper($_POST['descripcion']);
        $costo = $_POST['costo'];
        $creditoDebito = $_POST['tipo_operacion'];

        $idEditar = $_REQUEST['id'];

        $operacion = new Operacion();

        $operacion->editar($nombre,$descripcion,$costo,$creditoDebito,$idEditar);

        header("Location: ../vistas/operacion.php");
    }


?>
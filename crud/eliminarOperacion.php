<?php

    include("../db/Conexion.php");
    include("../clases/Operacion.php");

    $idEliminar = $_REQUEST['id'];

    $operacion = new Operacion();

    $operacion->desactivar($idEliminar);
    
    header("Location: ../vistas/operacion.php");

?>
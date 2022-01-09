<?php

    include("../db/Conexion.php");
    include("../clases/Operacion.php");

    $idReactivar = $_REQUEST['id'];

    $operacion = new Operacion();

    $operacion->reactivar($idReactivar);
    
    header("Location: ../vistas/operacion.php");

?>
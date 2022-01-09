<?php

    include("../db/Conexion.php");
    include("../clases/Movimiento.php");

    $idReactivar = $_REQUEST['id'];
    

    $movimiento = new Movimiento();

    $movimiento->reactivar($idReactivar);

    header("Location: ../vistas/movimiento.php");

?>
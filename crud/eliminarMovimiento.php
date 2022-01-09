<?php

    include("../db/Conexion.php");
    include("../clases/Movimiento.php");

    $idEliminar = $_REQUEST['id'];
    

    $movimiento = new Movimiento();

    $movimiento->desactivar($idEliminar);

    header("Location: ../vistas/movimiento.php");

?>
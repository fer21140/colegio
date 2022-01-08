<?php

    include("../db/Conexion.php");
    include("../clases/Grado.php");

    $idReactivar = $_REQUEST['id'];

    $grado = new Grado();

    $grado->reactivar($idReactivar);
    
    header("Location: ../vistas/grado.php");

?>
<?php

    include("../db/Conexion.php");
    include("../clases/Grado.php");

    $idEliminar = $_REQUEST['id'];

    $grado = new Grado();

    $grado->desactivar($idEliminar);
    
    header("Location: ../vistas/grado.php");

?>
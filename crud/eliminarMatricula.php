<?php

    include("../db/Conexion.php");
    include("../clases/Matricula.php");

    $idEliminar = $_REQUEST['id'];

    $matricula = new Matricula();

    $matricula->desactivar($idEliminar);

    header("Location: ../vistas/matricula.php");

?>
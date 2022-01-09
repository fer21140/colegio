<?php

    include("../db/Conexion.php");
    include("../clases/Matricula.php");

    $idReactivar = $_REQUEST['id'];

    $matricula = new Matricula();

    $matricula->reactivar($idReactivar);

    header("Location: ../vistas/matricula.php");

?>
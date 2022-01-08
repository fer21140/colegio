<?php

    include("../clases/Alumno.php");
    include("../db/Conexion.php");

    $idReactivar = $_REQUEST['id'];
    $alumno = new Alumno();

    $alumno->reactivar($idReactivar);

    header("Location: ../vistas/alumno.php");


?>
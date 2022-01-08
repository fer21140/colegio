<?php

    include("../clases/Alumno.php");
    include("../db/Conexion.php");

    $idEliminar = $_REQUEST['id'];
    $alumno = new Alumno();

    $alumno->desactivar($idEliminar);

    header("Location: ../vistas/alumno.php");


?>
<?php

    include("../db/Conexion.php");
    include("../clases/Curso.php");

    $idReactivar = $_REQUEST['id'];
    

    $curso = new Curso();

    $curso->reactivar($idReactivar);

    header("Location: ../vistas/curso.php");

?>
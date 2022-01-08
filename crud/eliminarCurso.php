<?php

    include("../db/Conexion.php");
    include("../clases/Curso.php");

    $idEliminar = $_REQUEST['id'];
    

    $curso = new Curso();

    $curso->desactivar($idEliminar);

    header("Location: ../vistas/curso.php");

?>
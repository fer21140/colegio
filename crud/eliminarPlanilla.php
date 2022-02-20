<?php
    include("../db/Conexion.php");
    include("../clases/Planilla.php");

    $planilla = new Planilla();
    $idEliminar = $_REQUEST['id'];
    $planilla->eliminar($idEliminar);

    header("Location: ../vistas/planilla.php");

?>
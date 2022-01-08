<?php

    include("../db/Conexion.php");
    include("../clases/Contacto.php");

    $idEliminar = $_REQUEST['id'];
    $idAlumno = $_REQUEST['idAlumno'];

    $contacto = new Contacto();

    $contacto->eliminar($idEliminar);

    header("Location: ../vistas/alumno_vista.php?id=$idAlumno");

?>
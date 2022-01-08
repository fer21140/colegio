<?php

    include("../db/Conexion.php");
    include("../clases/Grado.php");

    if(isset($_POST['btnGuardar'])){

        $nombre = mb_strtoupper($_POST['nombre']);

        $grado = new Grado();

        $grado->guardar($nombre);

        header("Location: ../vistas/grado.php");

    }


?>
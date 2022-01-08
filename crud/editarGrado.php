<?php

    include("../db/Conexion.php");
    include("../clases/Grado.php");

    if(isset($_POST['btnEditar'])){

        $idEditar = $_REQUEST['id'];

        $nombre = mb_strtoupper($_POST['nombre']);

        $grado = new Grado();

        $grado->editar($nombre,$idEditar);

        header("Location: ../vistas/grado.php");

    }


?>
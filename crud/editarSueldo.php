<?php

    include("../db/Conexion.php");
    include("../clases/Sueldo.php");

    if(isset($_POST['btnEditar'])){
        
        $idEditare = $_REQUEST['id'];
        $sueldo = $_POST['sueldo'];

        $sueldoClass = new Sueldo();

            $sueldoClass->editar($sueldo,$idEditare);
            header("Location: ../vistas/sueldo.php");
        
    }


?>
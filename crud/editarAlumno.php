<?php

    include("../clases/Alumno.php");
    include("../db/Conexion.php");

    if(isset($_POST['btnEditar'])){

        $alumno = new Alumno();

        $idEditar = $_REQUEST['id'];

        $carnet = strtoupper($_POST['carnet']);
        $primerNombre = strtoupper($_POST['primerNombre']);
        $segundoNombre = strtoupper($_POST['segundoNombre']);
        $tercerNombre = strtoupper($_POST['tercerNombre']);
        $primerApellido = strtoupper($_POST['primerApellido']);
        $segundoApellido = strtoupper($_POST['segundoApellido']);
        $direccion = strtoupper($_POST['direccion']);
        $telefono = $_POST['telefono'];

        $alumno->editar($carnet,$primerNombre,$segundoNombre,$tercerNombre,$primerApellido,$segundoApellido,$direccion,$telefono,$idEditar);
        header("Location: ../vistas/alumno.php");
    }



?>
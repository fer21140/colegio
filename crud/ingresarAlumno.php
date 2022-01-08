<?php

    include("../clases/Alumno.php");
    include("../db/Conexion.php");

    if(isset($_POST['btnGuardar'])){

        $alumno = new Alumno();

        $carnet = mb_strtoupper($_POST['carnet']);
        $primerNombre = mb_strtoupper($_POST['primerNombre']);
        $segundoNombre = mb_strtoupper($_POST['segundoNombre']);
        $tercerNombre = mb_strtoupper($_POST['tercerNombre']);
        $primerApellido = mb_strtoupper($_POST['primerApellido']);
        $segundoApellido = mb_strtoupper($_POST['segundoApellido']);
        $direccion = mb_strtoupper($_POST['direccion']);
        $telefono = $_POST['telefono'];

        $alumno->guardar($carnet,$primerNombre,$segundoNombre,$tercerNombre,$primerApellido,$segundoApellido,$direccion,$telefono);
        header("Location: ../vistas/alumno.php");
    }



?>
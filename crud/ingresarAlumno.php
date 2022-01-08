<?php

    include("../clases/Alumno.php");
    include("../db/Conexion.php");

    if(isset($_POST['btnGuardar'])){

        $alumno = new Alumno();

        $carnet = strtoupper($_POST['carnet']);
        $primerNombre = strtoupper($_POST['primerNombre']);
        $segundoNombre = strtoupper($_POST['segundoNombre']);
        $tercerNombre = strtoupper($_POST['tercerNombre']);
        $primerApellido = strtoupper($_POST['primerApellido']);
        $segundoApellido = strtoupper($_POST['segundoApellido']);
        $direccion = strtoupper($_POST['direccion']);
        $telefono = $_POST['telefono'];

        $alumno->guardar($carnet,$primerNombre,$segundoNombre,$tercerNombre,$primerApellido,$segundoApellido,$direccion,$telefono);
        header("Location: ../vistas/alumno.php");
    }



?>
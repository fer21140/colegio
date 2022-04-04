<?php

    include("../clases/Alumno.php");
    include("../db/Conexion.php");

    if(isset($_POST['btnEditar'])){

        $alumno = new Alumno();

        $idEditar = $_REQUEST['id'];

        $carnet = mb_strtoupper($_POST['carnet']);
        $primerNombre = mb_strtoupper($_POST['primerNombre']);
        $segundoNombre = mb_strtoupper($_POST['segundoNombre']);
        $tercerNombre = mb_strtoupper($_POST['tercerNombre']);
        $primerApellido = mb_strtoupper($_POST['primerApellido']);
        $segundoApellido = mb_strtoupper($_POST['segundoApellido']);
        $direccion = mb_strtoupper($_POST['direccion']);
        $telefono = $_POST['telefono'];
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        $alumno->editar($carnet,$primerNombre,$segundoNombre,$tercerNombre,$primerApellido,$segundoApellido,$direccion,$telefono,$usuario,$password,$idEditar);
        header("Location: ../vistas/alumno.php");
    }



?>
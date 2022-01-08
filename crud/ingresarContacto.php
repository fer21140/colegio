<?php

    include("../db/Conexion.php");
    include("../clases/Contacto.php");

    if(isset($_POST['btnGuardar'])){

        $idAlumno = $_REQUEST['idAlumno'];

        $nombres = mb_strtoupper($_POST['nombres']);
        $apellidos = mb_strtoupper($_POST['apellidos']);
        $direccion = mb_strtoupper($_POST['direccion']);
        $telefonoCelular = $_POST['telefonoCelular'];
        $telefonoCasa = $_POST['telefonoCasa'];


        $contacto = new Contacto();

        $contacto->guardar($idAlumno,$nombres,$apellidos,$direccion,$telefonoCelular,$telefonoCasa);

        header("Location: ../vistas/alumno_vista.php?id=$idAlumno");




    }


?>
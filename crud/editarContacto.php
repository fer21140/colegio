<?php

    include("../db/Conexion.php");
    include("../clases/Contacto.php");

    if(isset($_POST['btnEditar'])){

        $idAlumno = $_REQUEST['idAlumno'];
        $idContactoEditar = $_REQUEST['id'];

        $nombres = mb_strtoupper($_POST['nombres']);
        $apellidos = mb_strtoupper($_POST['apellidos']);
        $direccion = mb_strtoupper($_POST['direccion']);
        $telefonoCelular = $_POST['telefonoCelular'];
        $telefonoCasa = $_POST['telefonoCasa'];


        $contacto = new Contacto();

        $contacto->editar($nombres,$apellidos,$direccion,$telefonoCelular,$telefonoCasa,$idContactoEditar);
        
        header("Location: ../vistas/alumno_vista.php?id=$idAlumno");

    }


?>
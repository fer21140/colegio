<?php

include("../clases/Usuario.php");
include("../db/Conexion.php");




$nombres = mb_strtoupper($_POST['nombres']);
$apellidos = mb_strtoupper($_POST['apellidos']);
$email = $_POST['email'];
$rol = $_POST['rol'];
$telefono = $_POST['telefono'];
$dpi = $_POST['dpi'];
$password = $_POST['password'];

if(isset($_POST['btnEditar'])){

    $usuario = new Usuario();
    $idEditar = $_REQUEST['id'];



    $usuario->editar($rol,$dpi,$nombres,$apellidos,$email,$password,$telefono,$idEditar);
    
    header("Location: ../vistas/usuario.php");
   
    
}

?>
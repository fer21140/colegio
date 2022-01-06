<?php

include("../clases/Usuario.php");
include("../db/Conexion.php");

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$rol = $_POST['rol'];
$telefono = $_POST['telefono'];
$dpi = $_POST['dpi'];
$fotografia = $_POST['fotografia'];
$password = $_POST['password'];

if(isset($_POST['btnEditar'])){

    $usuario = new Usuario();
    $idEditar = $_REQUEST['id'];


    $tempName=$_FILES['fotografia']['tmp_name'];
    

    $usuario->editar($rol,$dpi,$nombres,$apellidos,$email,$password,$telefono,$tempName,$idEditar);
    
    //header("Location: ../vistas/usuario.php");
   
    
}

?>
<?php


include("../../db/Conexion.php");
include("../../clases/Usuario.php");

 $email = $_POST['email'];
 $clave = $_POST['clave'];
 //$email="ferfer21140@gmail.com";
 //$clave = "Fer.2020";
 $usuario = new Usuario();
 
 $res = $usuario->buscarPorEmailClave($email,$clave);
 
 if($res!=null){
 
 echo json_encode($res,JSON_UNESCAPED_UNICODE);

 }

?>
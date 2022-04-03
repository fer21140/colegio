<?php


include("../../db/Conexion.php");
include("../../clases/Alumno.php");

$usuario = $_POST['usuario'];
$password = $_POST['password'];
 //$usuario="fer21140";
 //$password = "12345";
 
 $alumno = new Alumno();
 
 $res = $alumno->buscarPorEmailClave($usuario,$password);
 
 if($res!=null){
 
 echo json_encode($res,JSON_UNESCAPED_UNICODE);

 }

?>
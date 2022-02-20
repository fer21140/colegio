<?php

    include("../db/Conexion.php");
    include("../clases/Sueldo.php");

    $idEmpleado = $_REQUEST['id'];
    $sueldo = new Sueldo();
    $resSueldo= $sueldo->buscarPorIdEmpleado($idEmpleado);
    $cantidad = $resSueldo->getSueldo();

    echo "<input type='number' class='form-control' placeholder='Salario ordinario (Q)' value='$cantidad' name='salarioOrdinario' id='salarioOrdinario' pattern='^[0-9.]{1,10}' min='0' max='9999999999' required step='0.01'>";


?>
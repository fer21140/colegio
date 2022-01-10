<?php

    include("../db/Conexion.php");
    include("../clases/Operacion.php");

    $idOperacion = $_REQUEST['id'];
    $operacion = new Operacion();
    $resOperacion = $operacion->buscarPorId($idOperacion);
    $costo = $resOperacion->getCosto();

    echo "<input type='number' class='form-control' placeholder='Costo (Q)' value='$costo' name='costo' id='costo' pattern='^[0-9.]{1,10}' min='0' max='9999999999' required step='0.01'>";


?>
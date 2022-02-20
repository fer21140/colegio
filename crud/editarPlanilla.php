<?php

    include("../db/Conexion.php");
    include("../clases/Planilla.php");

    if(isset($_POST['btnEditar'])){

        $idEmpleado = $_POST['id_empleado'];
        $mes = $_POST['mes'];
        $anio = $_POST['anio'];
        $salarioOrdinario = $_POST['salarioOrdinario'];
        $abono = $_POST['abono'];
        $descuento = $_POST['descuento'];
        $numeroCheque = $_POST['numeroCheque'];
        $sueldoLiquido = $_POST['sueldoLiquido'];

        $idEditare = $_REQUEST['id'];

        $planilla = new Planilla();
       
          
            $planilla->editar($mes,$anio,$salarioOrdinario,$abono,$descuento,$numeroCheque,$sueldoLiquido,$idEditare);

        header("Location: ../vistas/planilla.php");
        
    }


?>
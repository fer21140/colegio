<?php

    include("../db/Conexion.php");
    include("../clases/Planilla.php");

    if(isset($_POST['btnGuardar'])){

        $idEmpleado = $_POST['id_empleado'];
        $mes = $_POST['mes'];
        $anio = $_POST['anio'];
        $salarioOrdinario = $_POST['salarioOrdinario'];
        $abono = $_POST['abono'];
        $descuento = $_POST['descuento'];
        $numeroCheque = $_POST['numeroCheque'];
        $sueldoLiquido = $_POST['sueldoLiquido'];

        $planilla = new Planilla();
        if($planilla->validarPlanillaIngresada($idEmpleado,$mes,$anio)==0){
          
            $planilla->guardar($idEmpleado,$mes,$anio,$salarioOrdinario,$abono,$descuento,$numeroCheque,$sueldoLiquido);

        header("Location: ../vistas/planilla.php");
        }else{
            echo "<script>alert('¡El pago de planilla que intentas ingresar ya existe!');
                window.location.href='../vistas/planilla_ingresar.php';
            </script>";  
        }
    }


?>
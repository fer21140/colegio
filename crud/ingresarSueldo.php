<?php

    include("../db/Conexion.php");
    include("../clases/Sueldo.php");

    if(isset($_POST['btnGuardar'])){
        $idEmpleado = $_POST['id_empleado'];
        $sueldo = $_POST['sueldo'];

        $sueldoClass = new Sueldo();

        if($sueldoClass->validarSueldoExistente($idEmpleado)==0){
            $sueldoClass->guardar($idEmpleado,$sueldo);
            header("Location: ../vistas/sueldo.php");
        }else{
            echo "<script>alert('¡El empleado ya tiene un sueldo asignado!');
                         window.history.back ();
              </script>";
        }
    }


?>
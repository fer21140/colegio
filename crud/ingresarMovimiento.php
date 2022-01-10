<?php

    include("../db/Conexion.php");
    include("../clases/Movimiento.php");
    include("../clases/Usuario.php");

    if(isset($_POST['btnGuardar'])){

        $idOperacion = $_POST['id_tipo_operacion'];
        $idUsuarioReceptor = $_POST['id_alumno'];
        $total = $_POST['costo'];
        $numeroComprobante = $_POST['numero_comprobante'];
        $idUsuarioOperacion=0;

        if(isset($_SESSION)){
            $usuario = new Usuario();
            $usuario = $_SESSION['usuario'];
            $idUsuarioOperacion = $usuario->getId();
        }else{
            session_start();
            $usuario = new Usuario();
            $usuario = $_SESSION['usuario'];
            $idUsuarioOperacion = $usuario->getId();
        }

        if($idOperacion>0){
            if($idUsuarioReceptor>0){
                if($total>0){
                    $movimiento = new Movimiento();
                    $movimiento->guardar($idOperacion,$idUsuarioReceptor,$idUsuarioOperacion,$total,$numeroComprobante);
                    header("Location: ../vistas/movimiento.php");
                }else{
                    //Imprimir mensaje para que el total sea mayor a 0
                    echo "<script>alert('¡El costo de la operación es inválido!');
                    window.history.back ();
                    </script>";
                }
            }else{
                //Imprimir mensaje debe seleccionar alumno efectuador del pago
                echo "<script>alert('¡Selecciona un alumno válido para poder efectuar el movimiento!');
                window.history.back ();
                </script>";
            }
        }else{
            //Imprimir mensaje debe seleccionar operación
            echo "<script>alert('¡Debes seleccionar un tipo de operación válido!');
            window.history.back ();
            </script>";
        }
    }

?>
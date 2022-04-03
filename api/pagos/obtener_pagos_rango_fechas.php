<?php

    include("../../clases/Movimiento.php");
    include("../../db/Conexion.php");
    include("../../clases/Operacion.php");
    include("../../clases/Usuario.php");
    include("../../clases/Alumno.php");
    include("PagoJson.php");


    //Respuesta del web service
    $arrayPagos = array();

    $movimiento = new Movimiento();

    $fechaInicioMovimiento = $_POST['fechaInicio'];
    $fechaFinMovimiento = $_POST['fechaFin'];
    $idAlumnoMovimiento = $_POST['idAlumno'];

    //$movimientoArray = $movimiento->obtenerMovimientosPorFechas($fechaInicioMovimiento, $fechaFinMovimiento
    $movimientoArray = $movimiento->obtenerMovimientosPorAlumnoFechas($fechaInicioMovimiento,$fechaFinMovimiento,$idAlumnoMovimiento);

    for ($i = 0; $i < sizeof($movimientoArray); $i++) {


        $idMovimiento = $movimientoArray[$i]->getId();

        $idOperacion = $movimientoArray[$i]->getIdOperacion();
        $operacion = new Operacion();
        $resOperacion = $operacion->buscarPorId($idOperacion);
        $nombreOperacion = $resOperacion->getNombre();

        $idAlumno = $movimientoArray[$i]->getIdUsuarioReceptor();
        $alumno = new Alumno();
        $resAlumno = $alumno->buscarPorId($idAlumno);
        $nombreAlumno = $resAlumno->getPrimerNombre() . " " . $resAlumno->getSegundoNombre() . " " . $resAlumno->getTercerNombre() . " " . $resAlumno->getPrimerApellido() . " " . $resAlumno->getSegundoApellido();

        $idUsuario = $movimientoArray[$i]->getIdUsuarioOperacion();
        $usuario = new Usuario();
        $resUsuario = $usuario->buscarPorId($idUsuario);

        $usuarioEmisor = $resUsuario->getNombres() . " " . $resUsuario->getApellidos();

        $numeroComprobante = $movimientoArray[$i]->getNumeroComprobante();
        $total = $movimientoArray[$i]->getTotal();
        $fechaCommit = $movimientoArray[$i]->getFechaCommit();
        $estado = $movimientoArray[$i]->getEstado();

        //Si son pagos activos o válidos los añadimos
        if ($estado == 1) {
            $pagoJson = new PagoJson();

            $pagoJson->setId($idMovimiento);
            $pagoJson->setOperacion($nombreOperacion);
            $pagoJson->setComprobante($numeroComprobante);
            $pagoJson->setFecha($fechaCommit);
            $pagoJson->setTotal($total);

            array_push($arrayPagos, $pagoJson);
        }
    }

    $query['pagos'] = $arrayPagos;

    //Imprimimos resultado en json
    echo json_encode($query, JSON_UNESCAPED_UNICODE);
    ?>


                  

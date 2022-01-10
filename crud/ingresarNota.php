<?php

    include("../db/Conexion.php");
    include("../clases/Nota.php");

    if(isset($_POST['btnGuardar'])){

        $anio = $_POST['anio'];
        $idAlumno = $_POST['id_alumno'];
        $idCurso = $_POST['id_curso'];
        $nota = $_POST['nota'];
        $bimestre = $_POST['bimestre'];

        if($idAlumno>0){
            if($idCurso>0){
                if($bimestre>0){
                    if($nota>0){
                        
                        $notaGuardar = new Nota();

                        if($notaGuardar->validarNotaExistente($idAlumno,$idCurso,$bimestre,$anio)==0){

                        //Guardamos
                        $notaGuardar->guardar($idCurso,$idAlumno,$bimestre,$anio,$nota);
                        echo "<script>window.history.back ();</script>";
                        }else{
                            //Imprimimos que la nota ya existe
                            echo "<script>alert('¡La nota ya existe!');
                            window.history.back ();
                          </script>";
                        }
                        
                    }else{
                        //Imprimir mensaje para que ingrese una nota
                        echo "<script>alert('¡La nota no puede estar vacía o ser igual a 0!');
                            window.history.back ();
                          </script>";
                    }
                }else{
                    //Imprimimos mensaje para que seleccione un bimestre
                    echo "<script>alert('¡Debes seleccionar un bimestre!');
                            window.history.back ();
                          </script>";
                }

            }else{
                //Imprimimos mensaje para que seleccione un curso
                echo "<script>alert('¡Debes seleccionar un curso!');
                            window.history.back ();
                          </script>";
            }
        }else{
            //Imprimimos mensaje para que seleccione alumno
            echo "<script>alert('¡Debes seleccionar un alumno!');
                            window.history.back ();
                          </script>";
        }

    }


?>
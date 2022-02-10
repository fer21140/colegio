<?php

    include("../db/Conexion.php");
    include("../clases/Nota.php");
    include("../clases/Curso.php");

    if(isset($_POST['btnEditar'])){

        $anio = $_REQUEST['anio'];
        $idAlumno = $_REQUEST['id_alumno'];
        $idCurso = $_REQUEST['id_curso'];

        $curso = new Curso();
        $resCurso = $curso->buscarPorId($idCurso);
        $grado = $resCurso->getIdGrado();

        $nota = $_POST['nota'];
        $idEditar = $_REQUEST['id'];
                    if($nota>0){
                        
                        $notaEditar = new Nota();

                        //Guardamos
                        $notaEditar->editar($nota,$idEditar);
                        header("Location: ../vistas/nota.php?id_alumno=$idAlumno&anio=$anio&grado=$grado");
                        
                   
        }else{
            //Imprimimos mensaje para que seleccione alumno
            echo "<script>alert('¡Ingresa una nota válida!');
                            window.history.back();
                          </script>";
        }

    }


?>
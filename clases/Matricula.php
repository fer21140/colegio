<?php

    class Matricula{

        public $id;
        public $idAlumno;
        public $idGrado;
        public $valorInscripcion;
        public $valorMensual;
        public $numeroPagos;
        public $pagosAbonados;
        public $estado;
        public $fechaCommit;
        public $anio;

        //Obtener id
        public function getId(){
            return $this->id;
        }
        //Setear id
        public function setId($_id){
            $this->id = $_id;
        }
        //Obtener id de alumno
        public function getIdAlumno(){
            return $this->idAlumno;
        }
        //Setear id de alumno
        public function setIdAlumno($_idAlumno){
            $this->idAlumno = $_idAlumno;
        }
        //Obtener id del grado
        public function getIdGrado(){
            return $this->idGrado;
        }
        //Setear id del grado
        public function setIdGrado($_idGrado){
            $this->idGrado = $_idGrado;
        }
        //Obtener valor de inscripción
        public function getValorInscripcion(){
            return $this->valorInscripcion;
        }
        //Setear valor de inscripción
        public function setValorInscripcion($_valorInscripcion){
            $this->valorInscripcion = $_valorInscripcion;
        }
        //Obtener valor mensual
        public function getValorMensual(){
            return $this->valorMensual;
        }
        //Setear valor mensual
        public function setValorMensual($_valorMensual){
            $this->valorMensual = $_valorMensual;
        }
        //Obtener numero de pagos
        public function getNumeroPagos(){
            return $this->numeroPagos;
        }
        //Setear numero de pagos
        public function setNumeroPagos($_numeroPagos){
            $this->numeroPagos = $_numeroPagos;
        }
        //obtener numero de pagos abonados
        public function getPagosAbonados(){
            return $this->pagosAbonados;
        }
        //setear pagos abonados
        public function setPagosAbonados($_pagosAbonados){
            $this->pagosAbonados = $_pagosAbonados;
        }
        //Obtener estado
        public function getEstado(){
            return $this->estado;
        }
        //Setear estado
        public function setEstado($_estado){
            $this->estado = $_estado;
        }
        //Obtener fechaCommit
        public function getFechaCommit(){
            return $this->fechaCommit;
        }
        //Setear fechaCommit
        public function setFechaCommit($_fechaCommit){
            $this->fechaCommit = $_fechaCommit;
        }
        //Obtener año
        public function getAnio(){
            return $this->anio;
        }
        //Setear año
        public function setAnio($_anio){
            $this->anio = $_anio;
        }

        //--------------------Función para guardar una matrícula-----------------------

        public function guardar($idAlumnog,$idGradog,$valorInscripciong,$valorMensualg,$aniog,$numeroPagosg){
        
            //Instanciamos la clase conexión
            $conexion = new Conexion();
            //Conectamos a la base de datos
            $conexion->conectar();
            //Instrucción SQL
            $sql = "insert into matricula(id_alumno,id_grado,valor_inscripcion,valor_mensual,anio,numero_pagos)values(?,?,?,?,?,?)";
            //Preparamos la instrucción sql
            $stmt = $conexion->db->prepare($sql);
            
            //Enviamos los parámetros
            //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
            $stmt->bind_param('iiddii',$idAlumnog,$idGradog,$valorInscripciong,$valorMensualg,$aniog,$numeroPagosg);
              
            //Ejecutamos instrucción
            $stmt->execute();
            
            //Desconectamos la base de datos
            $conexion->desconectar();
    
           }

        //-----------------Función para editar una matrícula-----------------------

        public function editar($idAlumnoe,$idGradoe,$valorInscripcione,$valorMensuale,$anioe,$numeroPagose,$idEditare){
        
            //Instanciamos la clase conexión
            $conexion = new Conexion();
            //Conectamos a la base de datos
            $conexion->conectar();
            //Instrucción SQL
            $sql = "update matricula set id_alumno=?,id_grado=?,valor_inscripcion=?,valor_mensual=?,anio=?,numero_pagos=? where id=?";
            //Preparamos la instrucción sql
            $stmt = $conexion->db->prepare($sql);
            
            //Enviamos los parámetros
            //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
            $stmt->bind_param('iiddiii',$idAlumnoe,$idGradoe,$valorInscripcione,$valorMensuale,$anioe,$numeroPagose,$idEditare);
              
            //Ejecutamos instrucción
            $stmt->execute();
            
            //Desconectamos la base de datos
            $conexion->desconectar();
    
           }

           //--------Función para abonar un pago-----------------------------------

           public function abonarPago($idMatriculaAbonar){
                 //Instanciamos la clase conexión
            
            $resMatricula = $this->buscarPorId($idMatriculaAbonar);
            
            $numeroPagosMatricula = $resMatricula->getNumeroPagos();
            $pagosAbonadosMatricula = $resMatricula->getPagosAbonados();



            if($pagosAbonadosMatricula < $numeroPagosMatricula){
                
                
            $restante = $pagosAbonadosMatricula+1;
                
            $conexion = new Conexion();
            //Conectamos a la base de datos
            $conexion->conectar();
            //Instrucción SQL
            $sql = "update matricula set pagos_abonados=? where id=?";
            //Preparamos la instrucción sql
            $stmt = $conexion->db->prepare($sql);
            
            //Enviamos los parámetros
            //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
            $stmt->bind_param('ii',$restante,$idMatriculaAbonar);
              
            //Ejecutamos instrucción
            $stmt->execute();
            
            //Desconectamos la base de datos
            $conexion->desconectar();
                  
            }

           }

           public function descontarPago($idMatriculaAbonar){
            //Instanciamos la clase conexión
       
       $resMatricula = $this->buscarPorId($idMatriculaAbonar);
       
       $numeroPagosMatricula = $resMatricula->getNumeroPagos();
       $pagosAbonadosMatricula = $resMatricula->getPagosAbonados();


       if($pagosAbonadosMatricula >0){
           
           
       $restante = $pagosAbonadosMatricula-1;
           
       $conexion = new Conexion();
       //Conectamos a la base de datos
       $conexion->conectar();
       //Instrucción SQL
       $sql = "update matricula set pagos_abonados=? where id=?";
       //Preparamos la instrucción sql
       $stmt = $conexion->db->prepare($sql);
       
       //Enviamos los parámetros
       //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
       $stmt->bind_param('ii',$restante,$idMatriculaAbonar);
         
       //Ejecutamos instrucción
       $stmt->execute();
       
       //Desconectamos la base de datos
       $conexion->desconectar();
             
       }

      }

           //--------------Función para desactivar una matrícula-------------

           public function desactivar($idDesactivar){
            
            //Instanciamos la clase conexión
            $conexion = new Conexion();
            //Conectamos a la base de datos
            $conexion->conectar();
            //Estado a enviar
            $estado = 0;
            //Instrucción SQL
            $sql = "update matricula set estado=? where id=?";
            //Preparamos la instrucción sql
            $stmt = $conexion->db->prepare($sql);
            
            //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
            $stmt->bind_param('ii',$estado,$idDesactivar);
            
            //Ejecutamos instrucción
            $stmt->execute();
            
            //Desconectamos la base de datos
            $conexion->desconectar();
    
          }

          //------------------Función para reactivar una matrícula-------------------

          public function reactivar($idReactivar){
            
            //Instanciamos la clase conexión
            $conexion = new Conexion();
            //Conectamos a la base de datos
            $conexion->conectar();
            //Estado a enviar
            $estado = 1;
            //Instrucción SQL
            $sql = "update matricula set estado=? where id=?";
            //Preparamos la instrucción sql
            $stmt = $conexion->db->prepare($sql);
            
            //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
            $stmt->bind_param('ii',$estado,$idReactivar);
            
            //Ejecutamos instrucción
            $stmt->execute();
            
            //Desconectamos la base de datos
            $conexion->desconectar();
    
          }

          //-----------Función para buscar matrícula por id----------------------

          public function buscarPorId($idBusqueda){
         
            //Instanciamos la clase conexión
             $conexion = new Conexion();
             //Conectamos a la base de datos
             $conexion->conectar();
             //Declaramos el objeto contenedor del resultado
             $resultadoMatricula= new Matricula();
             
             //Instrucción SQL
            $sql = "select *from matricula where id='" . $idBusqueda . "'";
            //Ejecución de instrucción     
            $ejecutar = mysqli_query($conexion->db, $sql);
    
            while($fila = mysqli_fetch_array($ejecutar)){
                
                $resultadoMatricula->setId($fila['id']);
                $resultadoMatricula->setIdAlumno($fila['id_alumno']);
                $resultadoMatricula->setIdGrado($fila['id_grado']);
                $resultadoMatricula->setValorInscripcion($fila['valor_inscripcion']);
                $resultadoMatricula->setValorMensual($fila['valor_mensual']);
                $resultadoMatricula->setNumeroPagos($fila['numero_pagos']);
                $resultadoMatricula->setPagosAbonados($fila['pagos_abonados']);
                $resultadoMatricula->setEstado($fila['estado']);
                $resultadoMatricula->setFechaCommit($fila['fecha_commit']);
                $resultadoMatricula->setAnio($fila['anio']);
                           
            }
                //Nos desconectamos de la base de datos
                $conexion->desconectar();
                //Devolvemos el usuario encontrado
                return $resultadoMatricula;
           }

           //----------------Función para obtener todas las matrículas------------------------

    public function obtenerMatriculas(){
            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoMatriculas = array();
        //Instrucción SQL
        $sql = "select *from matricula";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);
    
        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $matriculaIndex = new Matricula();
    
            $matriculaIndex->setId($fila['id']);
            $matriculaIndex->setIdAlumno($fila['id_alumno']);
            $matriculaIndex->setIdGrado($fila['id_grado']);
            $matriculaIndex->setValorInscripcion($fila['valor_inscripcion']);
            $matriculaIndex->setValorMensual($fila['valor_mensual']);
            $matriculaIndex->setNumeroPagos($fila['numero_pagos']);
            $matriculaIndex->setPagosAbonados($fila['pagos_abonados']);
            $matriculaIndex->setEstado($fila['estado']);
            $matriculaIndex->setFechaCommit($fila['fecha_commit']);
            $matriculaIndex->setAnio($fila['anio']);
               
                
            //Llenamos el array de resultados de usuarios
            array_push($resultadoMatriculas,$matriculaIndex);
           
        }
    
        //Nos desconectamos de la base de datos
        $conexion->desconectar();
    
        //Devolvemos los usuarios encontrados
        return $resultadoMatriculas;
        }

        //------------Obtener matriculas por grado y año-------------------------------

        public function obtenerMatriculasGradoAnio($idGradoBusqueda,$anioBusqueda){
            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoMatriculas = array();
        //Instrucción SQL
        $sql = "select *from matricula where id_grado='" . $idGradoBusqueda . "' and anio='" . $anioBusqueda . "'";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);
    
        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $matriculaIndex = new Matricula();
    
            $matriculaIndex->setId($fila['id']);
            $matriculaIndex->setIdAlumno($fila['id_alumno']);
            $matriculaIndex->setIdGrado($fila['id_grado']);
            $matriculaIndex->setValorInscripcion($fila['valor_inscripcion']);
            $matriculaIndex->setValorMensual($fila['valor_mensual']);
            $matriculaIndex->setNumeroPagos($fila['numero_pagos']);
            $matriculaIndex->setPagosAbonados($fila['pagos_abonados']);
            $matriculaIndex->setEstado($fila['estado']);
            $matriculaIndex->setFechaCommit($fila['fecha_commit']);
            $matriculaIndex->setAnio($fila['anio']);
               
                
            //Llenamos el array de resultados de usuarios
            array_push($resultadoMatriculas,$matriculaIndex);
           
        }
    
        //Nos desconectamos de la base de datos
        $conexion->desconectar();
    
        //Devolvemos los usuarios encontrados
        return $resultadoMatriculas;
        }

        

        //---------------Validar si un alumno ya se encuentra inscrito--------------------

        public function validarInscripcionExistente($anioValidar,$idAlumnoValidar){
        
            //Instanciamos clase conexión
            $conexion = new Conexion();
            //Nos conectamos a la base de datos
            $conexion->conectar();
            //Variable validadora de existencia de nickname
            $res=0;
    
            $sql = "select anio, id_alumno from matricula where anio='" . $anioValidar . "' and id_alumno='" . $idAlumnoValidar . "'";
                    
            $ejecutar = mysqli_query($conexion->db, $sql);
    
            while($fila = mysqli_fetch_array($ejecutar)){
                if($fila['id_alumno']==$idAlumnoValidar && $fila['anio']==$anioValidar){
                    $res=1;//Ya existe
                    break;//Rompemos ciclo debido a que no sirve de nada seguir buscando debido a que ya hay primera coincidencia
                }
            }
    
            //Nos desconectamos de la base de datos
            $conexion->desconectar();
            //Devolvemos resultado 1=existe, 0 = no existe
            return $res;
           }
    
        
    


    }

?>
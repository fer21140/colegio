<?php

    class Curso{
       
        public $id;
        public $idProfesor;
        public $idGrado;
        public $nombre;
        public $horaInicio;
        public $horaFin;
        public $diasSemana;
        public $estado;
        public $fechaCommit;

        //Obtener id
        public function getId(){
            return $this->id;
        }
        //Setear id
        public function setId($_id){
            $this->id = $_id;
        }
        //Obtener id de profesor
        public function getIdProfesor(){
            return $this->idProfesor;
        }
        //Setear id de profesor
        public function setIdProfesor($_idProfesor){
            $this->idProfesor = $_idProfesor;
        }
        //Obtener id de grado
        public function getIdGrado(){
            return $this->idGrado;
        }
        //Setear id de grado
        public function setIdGrado($_idGrado){
            $this->idGrado = $_idGrado;
        }
        //Obtener nombre
        public function getNombre(){
            return $this->nombre;
        }
        //Setear nombre
        public function setNombre($_nombre){
            $this->nombre = $_nombre;
        }
        //Obtener hora de inicio
        public function getHoraInicio(){
            return $this->horaInicio;
        }
        //Setear hora de inicio
        public function setHoraInicio($_horaInicio){
            $this->horaInicio = $_horaInicio;
        }
        //Obtener hora de fin
        public function getHoraFin(){
            return $this->horaFin;
        }
        //Setear hora de fin
        public function setHoraFin($_horaFin){
            $this->horaFin = $_horaFin;
        }
        //Obtener dias semana
        public function getDiasSemana(){
            return $this->diasSemana;
        }
        //Setear dias de la semana
        public function setDiasSemana($_diasSemana){
            $this->diasSemana = $_diasSemana;
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

        //---------------Función para guardar un curso------------------------

        public function guardar($idProfesorg,$idGradog,$nombreg,$horaIniciog,$horaFing,$diasSemanag){
        
            //Instanciamos la clase conexión
            $conexion = new Conexion();
            //Conectamos a la base de datos
            $conexion->conectar();
            //Instrucción SQL
            $sql = "insert into cursos(id_profesor,id_grado,nombre,hora_inicio,hora_fin,dias_semana) values(?,?,?,?,?,?)";
            //Preparamos la instrucción sql
            $stmt = $conexion->db->prepare($sql);
            
            //Enviamos los parámetros
            //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
            $stmt->bind_param('iissss',$idProfesorg,$idGradog,$nombreg,$horaIniciog,$horaFing,$diasSemanag);
              
            //Ejecutamos instrucción
            $stmt->execute();
            
            //Desconectamos la base de datos
            $conexion->desconectar();
    
           }

           //--------------Función para editar---------------------------------------

           public function editar($idProfesore,$idGradoe,$nombree,$horaInicioe,$horaFine,$diasSemanae,$idEditare){
        
            //Instanciamos la clase conexión
            $conexion = new Conexion();
            //Conectamos a la base de datos
            $conexion->conectar();
            //Instrucción SQL
            $sql = "update cursos set id_profesor=?,id_grado=?,nombre=?,hora_inicio=?,hora_fin=?,dias_semana=? where id=?";
            //Preparamos la instrucción sql
            $stmt = $conexion->db->prepare($sql);
            
            //Enviamos los parámetros
            //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
            $stmt->bind_param('iissssi',$idProfesore,$idGradoe,$nombree,$horaInicioe,$horaFine,$diasSemanae,$idEditare);
              
            //Ejecutamos instrucción
            $stmt->execute();
            
            //Desconectamos la base de datos
            $conexion->desconectar();
    
           }

           //---------------Función para desactivar un curso------------
           public function desactivar($idDesactivar){
            
            //Instanciamos la clase conexión
            $conexion = new Conexion();
            //Conectamos a la base de datos
            $conexion->conectar();
            //Estado a enviar
            $estado = 0;
            //Instrucción SQL
            $sql = "update cursos set estado=? where id=?";
            //Preparamos la instrucción sql
            $stmt = $conexion->db->prepare($sql);
            
            //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
            $stmt->bind_param('ii',$estado,$idDesactivar);
            
            //Ejecutamos instrucción
            $stmt->execute();
            
            //Desconectamos la base de datos
            $conexion->desconectar();
    
          }
    
          //--------------Función para reactivar un curso

          public function reactivar($idReactivar){
            
            //Instanciamos la clase conexión
            $conexion = new Conexion();
            //Conectamos a la base de datos
            $conexion->conectar();
            //Estado a enviar
            $estado = 1;
            //Instrucción SQL
            $sql = "update cursos set estado=? where id=?";
            //Preparamos la instrucción sql
            $stmt = $conexion->db->prepare($sql);
            
            //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
            $stmt->bind_param('ii',$estado,$idReactivar);
            
            //Ejecutamos instrucción
            $stmt->execute();
            
            //Desconectamos la base de datos
            $conexion->desconectar();
    
          }

          //--------------------Función para buscar curso por id--------------------------------------

          public function buscarPorId($idBusqueda){
         
            //Instanciamos la clase conexión
             $conexion = new Conexion();
             //Conectamos a la base de datos
             $conexion->conectar();
             //Declaramos el objeto contenedor del resultado
             $resultadoCurso = new Curso();
             
             //Instrucción SQL
            $sql = "select *from cursos where id='" . $idBusqueda . "'";
            //Ejecución de instrucción     
            $ejecutar = mysqli_query($conexion->db, $sql);
    
            while($fila = mysqli_fetch_array($ejecutar)){
                
                $resultadoCurso->setId($fila['id']);
                $resultadoCurso->setIdProfesor($fila['id_profesor']);
                $resultadoCurso->setIdGrado($fila['id_grado']);
                $resultadoCurso->setNombre($fila['nombre']);
                $resultadoCurso->setHoraInicio($fila['hora_inicio']);
                $resultadoCurso->setHoraFin($fila['hora_fin']);
                $resultadoCurso->setDiasSemana($fila['dias_semana']);
                $resultadoCurso->setEstado($fila['estado']);
                $resultadoCurso->setFechaCommit($fila['fecha_commit']);
                
                
               
            }
                //Nos desconectamos de la base de datos
                $conexion->desconectar();
                //Devolvemos el usuario encontrado
                return $resultadoCurso;
           }
    
    

          //--------------Función para obtener todos los cursos---------------------------------------

          public function obtenerCursos(){
            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoCursos = array();
        //Instrucción SQL
        $sql = "select *from cursos";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);
    
        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $cursoIndex = new Curso();
    
                $cursoIndex->setId($fila['id']);
                $cursoIndex->setIdProfesor($fila['id_profesor']);
                $cursoIndex->setIdGrado($fila['id_grado']);
                $cursoIndex->setNombre($fila['nombre']);
                $cursoIndex->setHoraInicio($fila['hora_inicio']);
                $cursoIndex->setHoraFin($fila['hora_fin']);
                $cursoIndex->setDiasSemana($fila['dias_semana']);
                $cursoIndex->setEstado($fila['estado']);
                $cursoIndex->setFechaCommit($fila['fecha_commit']);
                
            //Llenamos el array de resultados de usuarios
            array_push($resultadoCursos,$cursoIndex);
           
        }
    
        //Nos desconectamos de la base de datos
        $conexion->desconectar();
    
        //Devolvemos los usuarios encontrados
        return $resultadoCursos;
        }
    //--------------Obtener cursos por grado-------------

    public function obtenerCursosPorGrado($idGradoBuscar){
        //Instanciamos la clase conexión
    $conexion = new Conexion();
    //Conectamos a la base de datos
    $conexion->conectar();
    //Array contenedor de resultados
    $resultadoCursos = array();
    //Instrucción SQL
    $sql = "select *from cursos where id_grado='". $idGradoBuscar . "'";
    //Ejecución de instrucción     
    $ejecutar = mysqli_query($conexion->db, $sql);

    while($fila = mysqli_fetch_array($ejecutar)){
        
        //Instanciamos objeto
        $cursoIndex = new Curso();

            $cursoIndex->setId($fila['id']);
            $cursoIndex->setIdProfesor($fila['id_profesor']);
            $cursoIndex->setIdGrado($fila['id_grado']);
            $cursoIndex->setNombre($fila['nombre']);
            $cursoIndex->setHoraInicio($fila['hora_inicio']);
            $cursoIndex->setHoraFin($fila['hora_fin']);
            $cursoIndex->setDiasSemana($fila['dias_semana']);
            $cursoIndex->setEstado($fila['estado']);
            $cursoIndex->setFechaCommit($fila['fecha_commit']);
            
        //Llenamos el array de resultados de usuarios
        array_push($resultadoCursos,$cursoIndex);
       
    }

    //Nos desconectamos de la base de datos
    $conexion->desconectar();

    //Devolvemos los usuarios encontrados
    return $resultadoCursos;
    }

    }


?>
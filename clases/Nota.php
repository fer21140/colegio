<?php

    class Nota{

        public $id;
        public $idCurso;
        public $idAlumno;
        public $bimestre;
        public $anio;
        public $nota;
        public $fechaCommit;

        //Obtener id
        public function getId(){
            return $this->id;
        }
        //Setear id
        public function setId($_id){
            $this->id = $_id;
        }
        //Obtener id de curso
        public function getIdCurso(){
            return $this->idCurso;
        }
        //Setear id de curso
        public function setIdCurso($_idCurso){
            $this->idCurso = $_idCurso;
        }
        //Obtener id de alumno
        public function getIdAlumno(){
            return $this->idAlumno;
        }
        //Setear id de alumno
        public function setIdAlumno($_idAlumno){
            $this->idAlumno = $_idAlumno;
        }
        //obtener bimestre
        public function getBimestre(){
            return $this->bimestre;
        }
        //Setear bimestre
        public function setBimestre($_bimestre){
            $this->bimestre = $_bimestre;
        }
        //Obtener año
        public function getAnio(){
            return $this->anio;
        }
        //Setear año
        public function setAnio($_anio){
            $this->anio = $_anio;
        }
        //Obtener nota
        public function getNota(){
            return $this->nota;
        }
        //Setear nota
        public function setNota($_nota){
            $this->nota = $_nota;
        }
        //Obtener fechacommit
        public function getFechaCommit(){
            return $this->fechaCommit;
        }
        //Setear fechacommit
        public function setFechaCommit($_fechaCommit){
            $this->fechaCommit = $_fechaCommit;
        }

        //----------Función para guardar una nota--------------
        public function guardar($idCursog,$idAlumnog,$bimestreg,$aniog,$notag){
        
            //Instanciamos la clase conexión
            $conexion = new Conexion();
            //Conectamos a la base de datos
            $conexion->conectar();
            //Instrucción SQL
            $sql = "insert into notas(id_curso,id_alumno,bimestre,anio,nota)values(?,?,?,?,?)";
            //Preparamos la instrucción sql
            $stmt = $conexion->db->prepare($sql);
            
            //Enviamos los parámetros
            //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
            $stmt->bind_param('iiiid',$idCursog,$idAlumnog,$bimestreg,$aniog,$notag);
              
            //Ejecutamos instrucción
            $stmt->execute();
            
            //Desconectamos la base de datos
            $conexion->desconectar();
    
           }

           //------------------Función para editar una nota---------------------

           public function editar($notae,$idEditare){
        
            //Instanciamos la clase conexión
            $conexion = new Conexion();
            //Conectamos a la base de datos
            $conexion->conectar();
            //Instrucción SQL
            $sql = "update notas set nota=? where id=?";
            //Preparamos la instrucción sql
            $stmt = $conexion->db->prepare($sql);
            
            //Enviamos los parámetros
            //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
            $stmt->bind_param('di',$notae,$idEditare);
              
            //Ejecutamos instrucción
            $stmt->execute();
            
            //Desconectamos la base de datos
            $conexion->desconectar();
    
           }

           //-------------Función para buscar nota por id-----------------

           public function buscarPorId($idBusqueda){
         
            //Instanciamos la clase conexión
             $conexion = new Conexion();
             //Conectamos a la base de datos
             $conexion->conectar();
             //Declaramos el objeto contenedor del resultado
             $resultadoNota= new Nota();
             
             //Instrucción SQL
            $sql = "select *from notas where id='" . $idBusqueda . "'";
            //Ejecución de instrucción     
            $ejecutar = mysqli_query($conexion->db, $sql);
    
            while($fila = mysqli_fetch_array($ejecutar)){
                
                $resultadoNota->setId($fila['id']);
                $resultadoNota->setIdCurso($fila['id_curso']);
                $resultadoNota->setIdAlumno($fila['id_alumno']);
                $resultadoNota->setBimestre($fila['bimestre']);
                $resultadoNota->setAnio($fila['anio']);
                $resultadoNota->setNota($fila['nota']);
                $resultadoNota->setFechaCommit($fila['fecha_commit']);
                           
            }
                //Nos desconectamos de la base de datos
                $conexion->desconectar();
                //Devolvemos el usuario encontrado
                return $resultadoNota;
           }

           //-------------Función para obtener todas las notas----------------

    public function obtenerNotas(){
            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoNotas = array();
        //Instrucción SQL
        $sql = "select *from notas";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);
    
        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $notaIndex = new Nota();
    
            $notaIndex->setId($fila['id']);
            $notaIndex->setIdCurso($fila['id_curso']);
            $notaIndex->setIdAlumno($fila['id_alumno']);
            $notaIndex->setBimestre($fila['bimestre']);
            $notaIndex->setAnio($fila['anio']);
            $notaIndex->setNota($fila['nota']);
            $notaIndex->setFechaCommit($fila['fecha_commit']);      
                
            //Llenamos el array de resultados de usuarios
            array_push($resultadoNotas,$notaIndex);
           
        }
    
        //Nos desconectamos de la base de datos
        $conexion->desconectar();
    
        //Devolvemos los usuarios encontrados
        return $resultadoNotas;
        }

        //--------Obtener nota por alumno y año académico---------------

        public function obtenerNotasAlumnoAnio($idAlumnoBuscar,$anioBuscar){
            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoNotas = array();
        //Instrucción SQL
        $sql = "select *from notas where id_alumno='".$idAlumnoBuscar . "' and anio='". $anioBuscar . "'";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);
    
        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $notaIndex = new Nota();
    
            $notaIndex->setId($fila['id']);
            $notaIndex->setIdCurso($fila['id_curso']);
            $notaIndex->setIdAlumno($fila['id_alumno']);
            $notaIndex->setBimestre($fila['bimestre']);
            $notaIndex->setAnio($fila['anio']);
            $notaIndex->setNota($fila['nota']);
            $notaIndex->setFechaCommit($fila['fecha_commit']);      
                
            //Llenamos el array de resultados de usuarios
            array_push($resultadoNotas,$notaIndex);
           
        }
    
        //Nos desconectamos de la base de datos
        $conexion->desconectar();
    
        //Devolvemos los usuarios encontrados
        return $resultadoNotas;
        }


        //--Obtener notas de alumo por id de alumno, año y curso

        public function obtenerNotasAlumnoAnioCurso($idAlumnoBuscar,$anioBuscar,$cursoBuscar){
            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoNotas = array();
        //Instrucción SQL
        $sql = "select *from notas where id_alumno='".$idAlumnoBuscar . "' and anio='". $anioBuscar . "' and id_curso='". $cursoBuscar . "'";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);
    
        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $notaIndex = new Nota();
    
            $notaIndex->setId($fila['id']);
            $notaIndex->setIdCurso($fila['id_curso']);
            $notaIndex->setIdAlumno($fila['id_alumno']);
            $notaIndex->setBimestre($fila['bimestre']);
            $notaIndex->setAnio($fila['anio']);
            $notaIndex->setNota($fila['nota']);
            $notaIndex->setFechaCommit($fila['fecha_commit']);      
                
            //Llenamos el array de resultados de usuarios
            array_push($resultadoNotas,$notaIndex);
           
        }
    
        //Nos desconectamos de la base de datos
        $conexion->desconectar();
    
        //Devolvemos los usuarios encontrados
        return $resultadoNotas;
        }



        //----------Validar si la nota ya ha sido ingresada--------------------

        public function validarNotaExistente($idAlumnoB,$idCursoB,$bimestreB,$anioB){
        
            //Instanciamos clase conexión
            $conexion = new Conexion();
            //Nos conectamos a la base de datos
            $conexion->conectar();
            //Variable validadora de existencia de nickname
            $res=0;
    
            $sql = "select id_alumno, id_curso, bimestre, anio from notas where id_alumno='" . $idAlumnoB . "' and id_curso='" . $idCursoB . "'" . " and bimestre='" . $bimestreB . "'" . " and anio='" . $anioB . "'";
                    
            $ejecutar = mysqli_query($conexion->db, $sql);
    
            while($fila = mysqli_fetch_array($ejecutar)){
                if($fila['id_alumno']==$idAlumnoB && $fila['id_curso']==$idCursoB && $fila['bimestre'] == $bimestreB && $fila['anio']==$anioB){
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
<?php

    class Alumno{

        public $id;
        public $carnet;
        public $primerNombre;
        public $segundoNombre;
        public $tercerNombre;
        public $primerApellido;
        public $segundoApellido;
        public $direccion;
        public $telefono;
        public $usuario;
        public $clave;
        public $claveMaestra;//Primer contraseña, será utilizada para recuperar la clave si se olvida
        public $estado;
        public $fechaCommit;
        public $fotografia;

        //Obtener id
        public function getId(){
            return $this->id;
        }
        //Setear id
        public function setId($_id){
            $this->id = $_id;
        }
        //Obtener carnet
        public function getCarnet(){
            return $this->carnet;
        }
        //Setear carnet
        public function setCarnet($_carnet){
            $this->carnet = $_carnet;
        }
        //Obtener primer nombre
        public function getPrimerNombre(){
            return $this->primerNombre;
        }
        //Setear primer nombre
        public function setPrimerNombre($_primerNombre){
            $this->primerNombre = $_primerNombre;
        }
        //Obtener segundo nombre
        public function getSegundoNombre(){
            return $this->segundoNombre;
        }
        //Setear segundo nombre
        public function setSegundoNombre($_segundoNombre){
            $this->segundoNombre = $_segundoNombre;
        }
        //Obtener tercer nombre
        public function getTercerNombre(){
            return $this->tercerNombre;
        }
        //Setear tercer nombre
        public function setTercerNombre($_tercerNombre){
            $this->tercerNombre = $_tercerNombre;
        }
        //Obtener primer apellido
        public function getPrimerApellido(){
            return $this->primerApellido;
        }
        //Setear primer apellido
        public function setPrimerApellido($_primerApellido){
            $this->primerApellido = $_primerApellido;
        }
        //Obtener segundo apellido
        public function getSegundoApellido(){
            return $this->segundoApellido;
        }
        //Setear segundo apellido
        public function setSegundoApellido($_segundoApellido){
            $this->segundoApellido = $_segundoApellido;
        }
        //Obtener dirección
        public function getDireccion(){
            return $this->direccion;
        }
        //Setear dirección
        public function setDireccion($_direccion){
            $this->direccion = $_direccion;
        }
        //Obtener teléfono
        public function getTelefono(){
            return $this->telefono;
        }
        //Setear teléfono
        public function setTelefono($_telefono){
            $this->telefono = $_telefono;
        }
         //Obtener usuario
         public function getUsuario(){
            return $this->usuario;
        }
        //Setear usuario
        public function setUsuario($_usuario){
            $this->usuario = $_usuario;
        }
        //Obtener clave
        public function getClave(){
            return $this->clave;
        }
        //Setear clave
        public function setClave($_clave){
            $this->clave = $_clave;
        }
        //Obtener clave maestra
        public function getClaveMaestra(){
            return $this->claveMaestra;
        }
        //Setear clave maestra
        public function setClaveMaestra($_claveMaestra){
            $this->claveMaestra = $_claveMaestra;
        }
        //obtener fotografía
        public function getFotografia(){
            return $this->fotografia;
        }
        //Setear fotografia
        public function setFotografia($_fotografia){
            $this->fotografia = $_fotografia;
        }
        //Función para obtener estado
        public function getEstado(){
            return $this->estado;
        }
        //Función para setear estado
        public function setEstado($_estado){
            $this->estado = $_estado;
        }
        //Obtener fecha
        public function getFechaCommit(){
            return $this->fechaCommit;
        }
        //Setear fechaCommit
        public function setFechaCommit($_fechaCommit){
            $this->fechaCommit = $_fechaCommit;
        }


        //Función para guardar un alumno

        public function guardar($carnetg,$primerNombreg,$segundoNombreg,$tercerNombreg,$primerApellidog,$segundoApellidog,$direcciong,$telefonog,$usuariog,$passwordg,$claveMaestrag){
        
            //Instanciamos la clase conexión
            $conexion = new Conexion();
            //Conectamos a la base de datos
            $conexion->conectar();
            //Instrucción SQL
            $sql = "insert into alumnos(carnet,primerNombre,segundoNombre,tercerNombre,primerApellido,segundoApellido,direccion,telefono,usuario,password,clave_maestra)values(?,?,?,?,?,?,?,?,?,?,?)";
            //Preparamos la instrucción sql
            $stmt = $conexion->db->prepare($sql);
            
            //Enviamos los parámetros
            //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
            $stmt->bind_param('sssssssisss',$carnetg,$primerNombreg,$segundoNombreg,$tercerNombreg,$primerApellidog,$segundoApellidog,$direcciong,$telefonog,$usuariog,$passwordg,$claveMaestrag);
              
            //Ejecutamos instrucción
            $stmt->execute();
            
            //Desconectamos la base de datos
            $conexion->desconectar();
    
           }

           //--------------------Función para editar alumno----------------------

           public function editar($carnete,$primerNombree,$segundoNombree,$tercerNombree,$primerApellidoe,$segundoApellidoe,$direccione,$telefonoe,$usuarioe,$passworde,$idEditare){
        
            //Instanciamos la clase conexión
            $conexion = new Conexion();
            //Conectamos a la base de datos
            $conexion->conectar();
            //Instrucción SQL
            $sql = "update alumnos set carnet=?,primerNombre=?,segundoNombre=?,tercerNombre=?,primerApellido=?,segundoApellido=?,direccion=?,telefono=?,usuario=?,clave_maestra=?,password=? where id=?";
            //Preparamos la instrucción sql
            $stmt = $conexion->db->prepare($sql);
            
            //Enviamos los parámetros
            //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
            $stmt->bind_param('sssssssisssi',$carnete,$primerNombree,$segundoNombree,$tercerNombree,$primerApellidoe,$segundoApellidoe,$direccione,$telefonoe,$usuarioe,$passworde,$passworde,$idEditare);
              
            //Ejecutamos instrucción
            $stmt->execute();
            
            //Desconectamos la base de datos
            $conexion->desconectar();
    
           }


   //Función para desactivar un alumno
   
   public function desactivar($idDesactivar){
            
    //Instanciamos la clase conexión
    $conexion = new Conexion();
    //Conectamos a la base de datos
    $conexion->conectar();
    //Estado a enviar
    $estado = 0;
    //Instrucción SQL
    $sql = "update alumnos set estado=? where id=?";
    //Preparamos la instrucción sql
    $stmt = $conexion->db->prepare($sql);
    
    //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
    $stmt->bind_param('ii',$estado,$idDesactivar);
    
    //Ejecutamos instrucción
    $stmt->execute();
    
    //Desconectamos la base de datos
    $conexion->desconectar();

  }

  //------------------------Función para reactivar un alumno

   //Función para desactivar un alumno
   
   public function reactivar($idReactivar){
            
    //Instanciamos la clase conexión
    $conexion = new Conexion();
    //Conectamos a la base de datos
    $conexion->conectar();
    //Estado a enviar
    $estado = 1;
    //Instrucción SQL
    $sql = "update alumnos set estado=? where id=?";
    //Preparamos la instrucción sql
    $stmt = $conexion->db->prepare($sql);
    
    //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
    $stmt->bind_param('ii',$estado,$idReactivar);
    
    //Ejecutamos instrucción
    $stmt->execute();
    
    //Desconectamos la base de datos
    $conexion->desconectar();

  }


   //Obtener todos los alumnos

    public function obtenerAlumnos(){
            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoAlumnos = array();
        //Instrucción SQL
        $sql = "select *from alumnos";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);
    
        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $alumnoIndex = new Alumno();
    
                $alumnoIndex->setId($fila['id']);
                $alumnoIndex->setCarnet($fila['carnet']);
                $alumnoIndex->setPrimerNombre($fila['primerNombre']);
                $alumnoIndex->setSegundoNombre($fila['segundoNombre']);
                $alumnoIndex->setTercerNombre($fila['tercerNombre']);
                $alumnoIndex->setPrimerApellido($fila['primerApellido']);
                $alumnoIndex->setSegundoApellido($fila['segundoApellido']);
                $alumnoIndex->setDireccion($fila['direccion']);
                $alumnoIndex->setTelefono($fila['telefono']);
                $alumnoIndex->setUsuario($fila['usuario']);
                $alumnoIndex->setClave($fila['password']);
                $alumnoIndex->setClaveMaestra($fila['clave_maestra']);
                $alumnoIndex->setEstado($fila['estado']);
                $alumnoIndex->setFechaCommit($fila['fecha_commit']);
               
    
            //Llenamos el array de resultados de usuarios
            array_push($resultadoAlumnos,$alumnoIndex);
           
        }
    
        //Nos desconectamos de la base de datos
        $conexion->desconectar();
    
        //Devolvemos los usuarios encontrados
        return $resultadoAlumnos;
        }
    
        //--------------Función para buscar alumno por id

        public function buscarPorId($idBusqueda){
         
            //Instanciamos la clase conexión
             $conexion = new Conexion();
             //Conectamos a la base de datos
             $conexion->conectar();
             //Declaramos el objeto contenedor del resultado
             $resultadoAlumno = new Alumno();
             
             //Instrucción SQL
            $sql = "select *from alumnos where id='" . $idBusqueda . "'";
            //Ejecución de instrucción     
            $ejecutar = mysqli_query($conexion->db, $sql);
    
            while($fila = mysqli_fetch_array($ejecutar)){
                
                $resultadoAlumno->setId($fila['id']);
                $resultadoAlumno->setCarnet($fila['carnet']);
                $resultadoAlumno->setPrimerNombre($fila['primerNombre']);
                $resultadoAlumno->setSegundoNombre($fila['segundoNombre']);
                $resultadoAlumno->setTercerNombre($fila['tercerNombre']);
                $resultadoAlumno->setPrimerApellido($fila['primerApellido']);
                $resultadoAlumno->setSegundoApellido($fila['segundoApellido']);
                $resultadoAlumno->setDireccion($fila['direccion']);
                $resultadoAlumno->setTelefono($fila['telefono']);
                $resultadoAlumno->setUsuario($fila['usuario']);
                $resultadoAlumno->setClave($fila['password']);
                $resultadoAlumno->setClaveMaestra($fila['clave_maestra']);
                $resultadoAlumno->setEstado($fila['estado']);
                $resultadoAlumno->setFechaCommit($fila['fecha_commit']);
                
               
            }
                //Nos desconectamos de la base de datos
                $conexion->desconectar();
                //Devolvemos el usuario encontrado
                return $resultadoAlumno;
           }

           //----------Función para buscar alumno por email y clave
           
           public function buscarPorEmailClave($usuario,$clave){
         
            //Instanciamos la clase conexión
             $conexion = new Conexion();
             //Conectamos a la base de datos
             $conexion->conectar();
             //Declaramos el objeto contenedor del resultado
             $resultadoAlumno = new Alumno();
             
             //Instrucción SQL
            $sql = "select *from alumnos where usuario='" . $usuario . "' AND password='" . $clave . "'";
            //Ejecución de instrucción     
            $ejecutar = mysqli_query($conexion->db, $sql);
    
            while($fila = mysqli_fetch_array($ejecutar)){
                
                $resultadoAlumno->setId($fila['id']);
                $resultadoAlumno->setCarnet($fila['carnet']);
                $resultadoAlumno->setPrimerNombre($fila['primerNombre']);
                $resultadoAlumno->setSegundoNombre($fila['segundoNombre']);
                $resultadoAlumno->setTercerNombre($fila['tercerNombre']);
                $resultadoAlumno->setPrimerApellido($fila['primerApellido']);
                $resultadoAlumno->setSegundoApellido($fila['segundoApellido']);
                $resultadoAlumno->setDireccion($fila['direccion']);
                $resultadoAlumno->setTelefono($fila['telefono']);
                $resultadoAlumno->setEstado($fila['estado']);
                $resultadoAlumno->setFechaCommit($fila['fecha_commit']);
                $resultadoAlumno->setUsuario($fila['usuario']);
                $resultadoAlumno->setClave($fila['password']);
                $resultadoAlumno->setClaveMaestra($fila['clave_maestra']);
                
               
            }
                //Nos desconectamos de la base de datos
                $conexion->desconectar();
                //Devolvemos el usuario encontrado
                return $resultadoAlumno;
           }

           //Funcion para validar alumno existente

           public function validarAlumnoExistente($usuario,$clave){
         
            //Instanciamos la clase conexión
             $conexion = new Conexion();
             //Conectamos a la base de datos
             $conexion->conectar();
             //Declaramos el objeto contenedor del resultado
             $resultadoAlumno = new Alumno();
             //Validador de exsistencia de alumno
             $validador = 0;
             
             //Instrucción SQL
            $sql = "select *from alumnos where usuario='" . $usuario . "' AND password='" . $clave . "'";
            //Ejecución de instrucción     
            $ejecutar = mysqli_query($conexion->db, $sql);
    
            while($fila = mysqli_fetch_array($ejecutar)){
                
                //notificamos que el alumno existe
                $validador=1;

                $resultadoAlumno->setId($fila['id']);
                $resultadoAlumno->setCarnet($fila['carnet']);
                $resultadoAlumno->setPrimerNombre($fila['primerNombre']);
                $resultadoAlumno->setSegundoNombre($fila['segundoNombre']);
                $resultadoAlumno->setTercerNombre($fila['tercerNombre']);
                $resultadoAlumno->setPrimerApellido($fila['primerApellido']);
                $resultadoAlumno->setSegundoApellido($fila['segundoApellido']);
                $resultadoAlumno->setDireccion($fila['direccion']);
                $resultadoAlumno->setTelefono($fila['telefono']);
                $resultadoAlumno->setEstado($fila['estado']);
                $resultadoAlumno->setFechaCommit($fila['fecha_commit']);
                $resultadoAlumno->setUsuario($fila['usuario']);
                $resultadoAlumno->setClave($fila['password']);
                $resultadoAlumno->setClaveMaestra($fila['clave_maestra']);
                
                //rompemos el ciclo ya que lo hemos encontrado

                break;
               
            }
            //Guardamos el objeto usuario en sesión
                if($validador==1){
                  //---Inicializamos la sesión
                   session_start();
                  $_SESSION['alumno']=$resultadoAlumno;
    
                }
                //Nos desconectamos de la base de datos
                $conexion->desconectar();
                //Devolvemos el usuario encontrado
                return $validador;
           }
    
    

    }



?>
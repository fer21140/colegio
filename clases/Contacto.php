<?php

    class Contacto{

        public $id;
        public $idAlumno;
        public $nombres;
        public $apellidos;
        public $direccion;
        public $telefonoCelular;
        public $telefonoCasa;
        public $fechaCommit;

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
        //obtener nombres
        public function getNombres(){
            return $this->nombres;
        }
        //Setear nombres
        public function setNombres($_nombres){
            $this->nombres = $_nombres;
        }
        //Obtener apellidos
        public function getApellidos(){
            return $this->apellidos;
        }
        //Setear apellidos
        public function setApellidos($_apellidos){
            $this->apellidos = $_apellidos;
        }
        //obtener direccion
        public function getDireccion(){
            return $this->direccion;
        }
        //Setear direccion
        public function setDireccion($_direccion){
            $this->direccion = $_direccion;
        }
        //Obtener telefono celular
        public function getTelefonoCelular(){
            return $this->telefonoCelular;
        }
        //Setear telefono celular
        public function setTelefonoCelular($_telefonoCelular){
            $this->telefonoCelular = $_telefonoCelular;
        }
        //Obtener telefono de casa
        public function getTelefonoCasa(){
            return $this->telefonoCasa;
        }
        //Setear teléfono de casa
        public function setTelefonoCasa($_telefonoCasa){
            $this->telefonoCasa = $_telefonoCasa;
        }
        //Obtener fecha commit
        public function getFechaCommit(){
            return $this->fechaCommit;
        }
        //Setear fecha commit
        public function setFechaCommit($_fechaCommit){
            $this->fechaCommit = $_fechaCommit;
        }

        //----------------Función para guardar un contacto----------

        public function guardar($idAlumnog, $nombresg,$apellidosg,$direcciong,$telefonoCelularg,$telefonoCasag){
            //Instanciamos la clase conexión
            $conexion = new Conexion();
            //Conectamos a la base de datos
            $conexion->conectar();
            //Instrucción SQL
            $sql = "insert into contacto(id_alumno,nombres,apellidos,direccion,telefonoCelular,telefonoCasa)values(?,?,?,?,?,?)";
            //Preparamos la instrucción sql
            $stmt = $conexion->db->prepare($sql);
            
            //Enviamos los parámetros
            //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
            $stmt->bind_param('isssii',$idAlumnog,$nombresg,$apellidosg,$direcciong,$telefonoCelularg,$telefonoCasag);
              
            //Ejecutamos instrucción
            $stmt->execute();
            
            //Desconectamos la base de datos
            $conexion->desconectar();
    
        }

        //----------------------Función para editar un contacto-------------------------------------

        public function editar($nombrese,$apellidose,$direccione,$telefonoCelulare,$telefonoCasae,$idEditare){
            //Instanciamos la clase conexión
            $conexion = new Conexion();
            //Conectamos a la base de datos
            $conexion->conectar();
            //Instrucción SQL
            $sql = "update contacto set nombres=?,apellidos=?,direccion=?,telefonoCelular=?,telefonoCasa=? where id=?";
            //Preparamos la instrucción sql
            $stmt = $conexion->db->prepare($sql);
            
            //Enviamos los parámetros
            //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
            $stmt->bind_param('sssiii',$nombrese,$apellidose,$direccione,$telefonoCelulare,$telefonoCasae,$idEditare);
              
            //Ejecutamos instrucción
            $stmt->execute();
            
            //Desconectamos la base de datos
            $conexion->desconectar();
    
        }

        //-----------------------Función para eliminar un contacto----------------------------------

        //Función para desactivar un alumno
   
   public function eliminar($idEliminar){
            
    //Instanciamos la clase conexión
    $conexion = new Conexion();
    //Conectamos a la base de datos
    $conexion->conectar();
    
    //Instrucción SQL
    $sql = "delete from contacto where id=?";
    //Preparamos la instrucción sql
    $stmt = $conexion->db->prepare($sql);
    
    //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
    $stmt->bind_param('i',$idEliminar);
    
    //Ejecutamos instrucción
    $stmt->execute();
    
    //Desconectamos la base de datos
    $conexion->desconectar();

  }

  //------------Función para obtener contactos de alumno------------------------------------

  //Obtener todos los alumnos

  public function obtenerContactosPorAlumno($idAlumnoBusqueda){
    //Instanciamos la clase conexión
$conexion = new Conexion();
//Conectamos a la base de datos
$conexion->conectar();
//Array contenedor de resultados
$resultadoContactos = array();
//Instrucción SQL
$sql = "select *from contacto where id_alumno='" . $idAlumnoBusqueda . "'";
//Ejecución de instrucción     
$ejecutar = mysqli_query($conexion->db, $sql);

while($fila = mysqli_fetch_array($ejecutar)){
    
    //Instanciamos objeto
    $contactoIndex = new Contacto();

        $contactoIndex->setId($fila['id']);
        $contactoIndex->setIdAlumno($fila['id_alumno']);
        $contactoIndex->setNombres($fila['nombres']);
        $contactoIndex->setApellidos($fila['apellidos']);
        $contactoIndex->setDireccion($fila['direccion']);
        $contactoIndex->setTelefonoCelular($fila['telefonoCelular']);
        $contactoIndex->setTelefonoCasa($fila['telefonoCasa']);
        $contactoIndex->setFechaCommit($fila['fecha_commit']);

    //Llenamos el array de resultados de usuarios
    array_push($resultadoContactos,$contactoIndex);
   
}

//Nos desconectamos de la base de datos
$conexion->desconectar();

//Devolvemos los usuarios encontrados
return $resultadoContactos;
}

//-------------------Función para buscar contacto por id--------------------------------------

public function buscarPorId($idBusqueda){
         
    //Instanciamos la clase conexión
     $conexion = new Conexion();
     //Conectamos a la base de datos
     $conexion->conectar();
     //Declaramos el objeto contenedor del resultado
     $resultadoContacto = new Contacto();
     
     //Instrucción SQL
    $sql = "select *from contacto where id='" . $idBusqueda . "'";
    //Ejecución de instrucción     
    $ejecutar = mysqli_query($conexion->db, $sql);

    while($fila = mysqli_fetch_array($ejecutar)){
        
        $resultadoContacto->setId($fila['id']);
        $resultadoContacto->setIdAlumno($fila['id_alumno']);
        $resultadoContacto->setNombres($fila['nombres']);
        $resultadoContacto->setApellidos($fila['apellidos']);
        $resultadoContacto->setDireccion($fila['direccion']);
        $resultadoContacto->setTelefonoCelular($fila['telefonoCelular']);
        $resultadoContacto->setTelefonoCasa($fila['telefonoCasa']);
        $resultadoContacto->setFechaCommit($fila['fecha_commit']);
        
        
       
    }
        //Nos desconectamos de la base de datos
        $conexion->desconectar();
        //Devolvemos el usuario encontrado
        return $resultadoContacto;
   }



    }


?>
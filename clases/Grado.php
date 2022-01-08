<?php

    class Grado{

        public $id;
        public $nombre;
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
        //Obtener nombre
        public function getNombre(){
            return $this->nombre;
        }
        //Setear nombre
        public function setNombre($_nombre){
            $this->nombre = $_nombre;
        }
        //Obtener estado
        public function getEstado(){
            return $this->estado;
        }
        //Setear estado
        public function setEstado($_estado){
            $this->estado = $_estado;
        }
        //Obtener fecha
        public function getFechaCommit(){
            return $this->fechaCommit;
        }
        //Setear fecha
        public function setFechaCommit($_fechaCommit){
            $this->fechaCommit = $_fechaCommit;
        }

        //------Función para guardar un grado académico

        public function guardar($nombreg){
            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Instrucción SQL
        $sql = "insert into grados(nombre) values(?)";
        //Preparamos la instrucción sql
        $stmt = $conexion->db->prepare($sql);
        
        //Enviamos los parámetros
        //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
        $stmt->bind_param('s',$nombreg);
          
        //Ejecutamos instrucción
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();
        }

        //---------------Función para editar un grado académico

        public function editar($nombree,$idEditare){
            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Instrucción SQL
        $sql = "update grados set nombre=? where id=?";
        //Preparamos la instrucción sql
        $stmt = $conexion->db->prepare($sql);
        
        //Enviamos los parámetros
        //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
        $stmt->bind_param('si',$nombree,$idEditare);
          
        //Ejecutamos instrucción
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();
        }

        //-----------Función para desactivar un grado

        public function desactivar($idDesactivar){

            //Instanciamos la clase conexión
         $conexion = new Conexion();
         //Conectamos a la base de datos
         $conexion->conectar();
         //Estado a enviar
         $estado = 0;
         //Instrucción SQL
         $sql = "update grados set estado=? where id=?";
         //Preparamos la instrucción sql
         $stmt = $conexion->db->prepare($sql);
         
         //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
		 $stmt->bind_param('ii',$estado,$idDesactivar);
		 
         //Ejecutamos instrucción
         $stmt->execute();
         
         //Desconectamos la base de datos
         $conexion->desconectar();
        }


        //------------Función para reactivar un grado

        public function reactivar($idReactivar){
            //Instanciamos la clase conexión
         $conexion = new Conexion();
         //Conectamos a la base de datos
         $conexion->conectar();
         //Estado a enviar
         $estado = 1;
         //Instrucción SQL
         $sql = "update grados set estado=? where id=?";
         //Preparamos la instrucción sql
         $stmt = $conexion->db->prepare($sql);
         
         //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
		 $stmt->bind_param('ii',$estado,$idReactivar);
		 
         //Ejecutamos instrucción
         $stmt->execute();
         
         //Desconectamos la base de datos
         $conexion->desconectar();
        }

    //---------Función para buscar grado por id

    public function buscarPorId($idBusqueda){
        //Instanciamos la clase conexión
     $conexion = new Conexion();
     //Conectamos a la base de datos
     $conexion->conectar();
     //Declaramos el objeto contenedor del resultado
     $resultadoGrado = new Grado();
     
     //Instrucción SQL
    $sql = "select *from grados where id='" . $idBusqueda . "'";
    //Ejecución de instrucción     
    $ejecutar = mysqli_query($conexion->db, $sql);

    while($fila = mysqli_fetch_array($ejecutar)){
        
        $resultadoGrado->setId($fila['id']);
        $resultadoGrado->setNombre($fila['nombre']);
        $resultadoGrado->setEstado($fila['estado']);
        $resultadoGrado->setFechaCommit($fila['fecha_commit']);
       
    }
        //Nos desconectamos de la base de datos
        $conexion->desconectar();
        //Devolvemos el usuario encontrado
        return $resultadoGrado;
    }


//-----------------Función para obtener todos los grados académicos

public function obtenerGrados(){
    //Instanciamos la clase conexión
$conexion = new Conexion();
//Conectamos a la base de datos
$conexion->conectar();
//Array contenedor de resultados
$resultadoGrado = array();
//Instrucción SQL
$sql = "select *from grados";
//Ejecución de instrucción     
$ejecutar = mysqli_query($conexion->db, $sql);

while($fila = mysqli_fetch_array($ejecutar)){
    
    //Instanciamos objeto
    $gradoIndex = new Grado();

    $gradoIndex->setId($fila['id']);
    $gradoIndex->setNombre($fila['nombre']);
    $gradoIndex->setEstado($fila['estado']);
    $gradoIndex->setFechaCommit($fila['fecha_commit']);
    
    //Llenamos el array de resultados de usuarios
    array_push($resultadoGrado,$gradoIndex);
   
}

//Nos desconectamos de la base de datos
$conexion->desconectar();

//Devolvemos los usuarios encontrados
return $resultadoGrado;

}

}


?>
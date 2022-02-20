<?php

class Sueldo{

    public $id;
    public $idEmpleado;
    public $nombreEmpleado;
    public $sueldo;

    //Obtener id
    public function getId(){
        return $this->id;
    }
    //Setear id
    public function setId($_id){
        $this->id = $_id;
    }
    //obtener id de empleado
    public function getIdEmpleado(){
        return $this->idEmpleado;
    }
    //Setear id de empleado
    public function setIdEmpleado($_idEmpleado){
        $this->idEmpleado = $_idEmpleado;
    }
    //Obtener nombre de empleado
    public function getNombreEmpleado(){
        return $this->nombreEmpleado;
    }
    //Setear nombre de empleado
    public function setNombreEmpleado($_nombreEmpleado){
        $this->nombreEmpleado = $_nombreEmpleado;
    }
    //Obtener sueldo
    public function getSueldo(){
        return $this->sueldo;
    }
    //Setear sueldo
    public function setSueldo($_sueldo){
        $this->sueldo = $_sueldo;
    }

    //----------Función para guardar sueldo
    
    public function guardar($idEmpleadog,$sueldog){

            //Instanciamos la clase conexión
            $conexion = new Conexion();
            //Conectamos a la base de datos
            $conexion->conectar();
            //Instrucción SQL
            $sql = "insert into sueldos(id_empleado,sueldo) values(?,?)";
            //Preparamos la instrucción sql
            $stmt = $conexion->db->prepare($sql);
            
            //Enviamos los parámetros
            //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
            $stmt->bind_param('id',$idEmpleadog,$sueldog);
              
            //Ejecutamos instrucción
            $stmt->execute();
            
            //Desconectamos la base de datos
            $conexion->desconectar();

    }
    //----------Función para editar sueldo
    public function editar($sueldoe,$idEditare){
        //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Instrucción SQL
        $sql = "update sueldos set sueldo=? where id=?";
        //Preparamos la instrucción sql
        $stmt = $conexion->db->prepare($sql);
        
        //Enviamos los parámetros
        //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
        $stmt->bind_param('di',$sueldoe,$idEditare);
          
        //Ejecutamos instrucción
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();
    }
    //----------Función para validar sueldo existente
    public function validarSueldoExistente($idEmpleadob){
        
        //Instanciamos clase conexión
        $conexion = new Conexion();
        //Nos conectamos a la base de datos
        $conexion->conectar();
        //Variable validadora de existencia de nickname
        $res=0;

        $sql = "select id_empleado from sueldos where id_empleado='" . $idEmpleadob . "'";
                
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            if($fila['id_empleado']==$idEmpleadob){
                $res=1;//Ya existe
                break;//Rompemos ciclo debido a que no sirve de nada seguir buscando debido a que ya hay primera coincidencia
            }
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();
        //Devolvemos resultado 1=existe, 0 = no existe
        return $res;
       }
       //--------------------Obtener todos los sueldos de los empleados------------------
       public function obtenerSueldos(){
        //Instanciamos la clase conexión
    $conexion = new Conexion();
    //Conectamos a la base de datos
    $conexion->conectar();
    //Array contenedor de resultados
    $resultadoSueldos = array();
    //Instrucción SQL
    $sql = "select s.id as IDSUELDO, s.id_empleado, s.sueldo, u.id, u.nombres, u.apellidos, u.id_rol, u.estado from sueldos s, tblusuarios u where s.id_empleado = u.id and u.id_rol=2 and u.estado=1";
    //Ejecución de instrucción     
    $ejecutar = mysqli_query($conexion->db, $sql);
    
    while($fila = mysqli_fetch_array($ejecutar)){
        
        //Instanciamos objeto
        $sueldoIndex = new Sueldo();
    
        $sueldoIndex->setId($fila['IDSUELDO']);
        $sueldoIndex->setIdEmpleado($fila['id_empleado']);
        $sueldoIndex->setSueldo($fila['sueldo']);
        $sueldoIndex->setNombreEmpleado($fila['nombres'] . " " . $fila['apellidos']);
        
        //Llenamos el array de resultados de usuarios
        array_push($resultadoSueldos,$sueldoIndex);
       
    }
    
    //Nos desconectamos de la base de datos
    $conexion->desconectar();
    
    //Devolvemos los usuarios encontrados
    return $resultadoSueldos;
    
    }
    //--------------Buscar sueldo por id
    public function buscarPorId($idBusqueda){
        //Instanciamos la clase conexión
     $conexion = new Conexion();
     //Conectamos a la base de datos
     $conexion->conectar();
     //Declaramos el objeto contenedor del resultado
     $resultadoSueldo = new Sueldo();
     
     //Instrucción SQL
    $sql = "select s.id as IDSUELDO, s.id_empleado, s.sueldo, u.id, u.nombres, u.apellidos from sueldos s, tblusuarios u where s.id_empleado=u.id and s.id='" . $idBusqueda . "'";
    //Ejecución de instrucción     
    $ejecutar = mysqli_query($conexion->db, $sql);

    while($fila = mysqli_fetch_array($ejecutar)){
        
        $resultadoSueldo->setId($fila['IDSUELDO']);
        $resultadoSueldo->setIdEmpleado($fila['id_empleado']);
        $resultadoSueldo->setSueldo($fila['sueldo']);
        $resultadoSueldo->setNombreEmpleado($fila['nombres'] . " " . $fila['apellidos']);
       
    }
        //Nos desconectamos de la base de datos
        $conexion->desconectar();
        //Devolvemos el usuario encontrado
        return $resultadoSueldo;
    }

    //----------Buscar sueldo por id de empleado

    public function buscarPorIdEmpleado($idEmpleado){
        //Instanciamos la clase conexión
     $conexion = new Conexion();
     //Conectamos a la base de datos
     $conexion->conectar();
     //Declaramos el objeto contenedor del resultado
     $resultadoSueldo = new Sueldo();
     
     //Instrucción SQL
    $sql = "select s.id as IDSUELDO, s.id_empleado, s.sueldo, u.id, u.nombres, u.apellidos from sueldos s, tblusuarios u where s.id_empleado=u.id and s.id_empleado='" . $idEmpleado . "'";
    //Ejecución de instrucción     
    $ejecutar = mysqli_query($conexion->db, $sql);

    while($fila = mysqli_fetch_array($ejecutar)){
        
        $resultadoSueldo->setId($fila['IDSUELDO']);
        $resultadoSueldo->setIdEmpleado($fila['id_empleado']);
        $resultadoSueldo->setSueldo($fila['sueldo']);
        $resultadoSueldo->setNombreEmpleado($fila['nombres'] . " " . $fila['apellidos']);
       
    }
        //Nos desconectamos de la base de datos
        $conexion->desconectar();
        //Devolvemos el usuario encontrado
        return $resultadoSueldo;
    }


}



?>
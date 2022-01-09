<?php

    class Operacion{

        public $id;
        public $idUsuario;
        public $nombre;
        public $descripcion;
        public $costo;
        public $fechaCommit;
        public $creditoDebito;
        public $estado;

        //--Obtener id
        public function getId(){
            return $this->id;
        }
        //Setear id
        public function setId($_id){
            $this->id = $_id;
        }
        //Obtener id de usuario
        public function getIdUsuario(){
            return $this->idUsuario;
        }
        //Setear id de usuario
        public function setIdUsuario($_idUsuario){
            $this->idUsuario = $_idUsuario;
        }
        //Obtener nombre
        public function getNombre(){
            return $this->nombre;
        }
        //Setear nombre
        public function setNombre($_nombre){
            $this->nombre = $_nombre;
        }
        //Obtener descripción
        public function getDescripcion(){
            return $this->descripcion;
        }
        //Setear descripción
        public function setDescripcion($_descripcion){
            $this->descripcion = $_descripcion;
        }
        //Obtener costo
        public function getCosto(){
            return $this->costo;
        }
        //Setear costo
        public function setCosto($_costo){
            $this->costo = $_costo;
        }
        //obtener fecha
        public function getFechaCommit(){
            return $this->fechaCommit;
        }
        //Setear fechaCommit
        public function setFechaCommit($_fechaCommit){
            $this->fechaCommit = $_fechaCommit;
        }
        //Obtener credito o debito
        public function getCreditoDebito(){
            return $this->creditoDebito;
        }
        //Setear credito débito
        public function setCreditoDebito($_creditoDebito){
            $this->creditoDebito = $_creditoDebito;
        }
        //Obtener estado
        public function getEstado(){
            return $this->estado;
        }
        //Setear estado
        public function setEstado($_estado){
            $this->estado = $_estado;
        }

        //-----------------Función para guardar una operación

        public function guardar($idUsuariog,$nombreg,$descripciong,$costog,$creditoDebitog){
        
            //Instanciamos la clase conexión
            $conexion = new Conexion();
            //Conectamos a la base de datos
            $conexion->conectar();
            //Instrucción SQL
            $sql = "insert into operaciones(id_usuario,nombre,descripcion,costo,credito_debito)values(?,?,?,?,?)";
            //Preparamos la instrucción sql
            $stmt = $conexion->db->prepare($sql);
            
            //Enviamos los parámetros
            //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
            $stmt->bind_param('issdi',$idUsuariog,$nombreg,$descripciong,$costog,$creditoDebitog);
              
            //Ejecutamos instrucción
            $stmt->execute();
            
            //Desconectamos la base de datos
            $conexion->desconectar();
    
           }

           //--------------Función para editar una operación

           public function editar($nombree,$descripcione,$costoe,$creditoDebitoe,$idEditare){
        
            //Instanciamos la clase conexión
            $conexion = new Conexion();
            //Conectamos a la base de datos
            $conexion->conectar();
            //Instrucción SQL
            $sql = "update operaciones set nombre=?,descripcion=?,costo=?,credito_debito=? where id=?";
            //Preparamos la instrucción sql
            $stmt = $conexion->db->prepare($sql);
            
            //Enviamos los parámetros
            //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
            $stmt->bind_param('ssdii',$nombree,$descripcione,$costoe,$creditoDebitoe,$idEditare);
              
            //Ejecutamos instrucción
            $stmt->execute();
            
            //Desconectamos la base de datos
            $conexion->desconectar();
    
           }

           //-----------------Función para desactivar una operación-------------

           public function desactivar($idDesactivar){
            
            //Instanciamos la clase conexión
            $conexion = new Conexion();
            //Conectamos a la base de datos
            $conexion->conectar();
            //Estado a enviar
            $estado = 0;
            //Instrucción SQL
            $sql = "update operaciones set estado=? where id=?";
            //Preparamos la instrucción sql
            $stmt = $conexion->db->prepare($sql);
            
            //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
            $stmt->bind_param('ii',$estado,$idDesactivar);
            
            //Ejecutamos instrucción
            $stmt->execute();
            
            //Desconectamos la base de datos
            $conexion->desconectar();
    
          }

          //----------Función para reactivar-----------------

          public function reactivar($idReactivar){
            
            //Instanciamos la clase conexión
            $conexion = new Conexion();
            //Conectamos a la base de datos
            $conexion->conectar();
            //Estado a enviar
            $estado = 1;
            //Instrucción SQL
            $sql = "update operaciones set estado=? where id=?";
            //Preparamos la instrucción sql
            $stmt = $conexion->db->prepare($sql);
            
            //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
            $stmt->bind_param('ii',$estado,$idReactivar);
            
            //Ejecutamos instrucción
            $stmt->execute();
            
            //Desconectamos la base de datos
            $conexion->desconectar();
    
          }

          //------------------------Función para buscar operación por id----------------------------------

          public function buscarPorId($idBusqueda){
         
            //Instanciamos la clase conexión
             $conexion = new Conexion();
             //Conectamos a la base de datos
             $conexion->conectar();
             //Declaramos el objeto contenedor del resultado
             $resultadoOperacion= new Operacion();
             
             //Instrucción SQL
            $sql = "select *from operaciones where id='" . $idBusqueda . "'";
            //Ejecución de instrucción     
            $ejecutar = mysqli_query($conexion->db, $sql);
    
            while($fila = mysqli_fetch_array($ejecutar)){
                
                $resultadoOperacion->setId($fila['id']);
                $resultadoOperacion->setIdUsuario($fila['id_usuario']);
                $resultadoOperacion->setNombre($fila['nombre']);
                $resultadoOperacion->setDescripcion($fila['descripcion']);
                $resultadoOperacion->setCosto($fila['costo']);
                $resultadoOperacion->setFechaCommit($fila['fecha_commit']);
                $resultadoOperacion->setCreditoDebito($fila['credito_debito']);
                $resultadoOperacion->setEstado($fila['estado']);
                           
            }
                //Nos desconectamos de la base de datos
                $conexion->desconectar();
                //Devolvemos el usuario encontrado
                return $resultadoOperacion;
           }


           //---------------Función para obtener todas las operaciones-------------------------

           public function obtenerOperaciones(){
            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoOperaciones = array();
        //Instrucción SQL
        $sql = "select *from operaciones";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);
    
        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $operacionIndex = new Operacion();
    
                $operacionIndex->setId($fila['id']);
                $operacionIndex->setIdUsuario($fila['id_usuario']);
                $operacionIndex->setNombre($fila['nombre']);
                $operacionIndex->setDescripcion($fila['descripcion']);
                $operacionIndex->setCosto($fila['costo']);
                $operacionIndex->setFechaCommit($fila['fecha_commit']);
                $operacionIndex->setCreditoDebito($fila['credito_debito']);
                $operacionIndex->setEstado($fila['estado']);
               
                
            //Llenamos el array de resultados de usuarios
            array_push($resultadoOperaciones,$operacionIndex);
           
        }
    
        //Nos desconectamos de la base de datos
        $conexion->desconectar();
    
        //Devolvemos los usuarios encontrados
        return $resultadoOperaciones;
        }
    


    }


?>
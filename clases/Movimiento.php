<?php

    class Movimiento{

        public $id;
        public $idOperacion;
        public $idUsuarioReceptor;
        public $idUsuarioOperacion;
        public $total;
        public $numeroComprobante;
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
        //Obtener id de operación
        public function getIdOperacion(){
            return $this->idOperacion;
        }
        //Setear id de operación
        public function setIdOperacion($_idOperacion){
            $this->idOperacion = $_idOperacion;
        }
        //Obtener id de usuario receptor
        public function getIdUsuarioReceptor(){
            return $this->idUsuarioReceptor;
        }
        //Setear id de usuario receptor
        public function setIdUsuarioReceptor($_idUsuarioReceptor){
            $this->idUsuarioReceptor = $_idUsuarioReceptor;
        }
        //Obtener id de usuario que hizo la operacion
        public function getIdUsuarioOperacion(){
            return $this->idUsuarioOperacion;
        }
        //Setear id de usuario que hizo la operacion
        public function setIdUsuarioOperacion($_idUsuarioOperacion){
            $this->idUsuarioOperacion = $_idUsuarioOperacion;
        }
        //Obtener total
        public function getTotal(){
            return $this->total;
        }
        //Setear total
        public function setTotal($_total){
            $this->total =$_total;
        }
        //Obtener numero de comprobante
        public function getNumeroComprobante(){
            return $this->numeroComprobante;
        }
        //Setear numero de comporante
        public function setNumeroComprobante($_numeroComprobante){
            $this->numeroComprobante = $_numeroComprobante;
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

        //Función para guardar un pago

        public function guardar($idOperaciong,$idUsuarioReceptorg,$idUsuarioOperaciong,$totalg,$numeroComprobanteg){
        
            //Instanciamos la clase conexión
            $conexion = new Conexion();
            //Conectamos a la base de datos
            $conexion->conectar();
            //Instrucción SQL
            $sql = "insert into movimientos(id_operacion,id_usuario_receptor,id_usuario_operacion,total,numero_comprobante)values(?,?,?,?,?)";
            //Preparamos la instrucción sql
            $stmt = $conexion->db->prepare($sql);
            
            //Enviamos los parámetros
            //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
            $stmt->bind_param('iiids',$idOperaciong,$idUsuarioReceptorg,$idUsuarioOperaciong,$totalg,$numeroComprobanteg);
              
            //Ejecutamos instrucción
            $stmt->execute();
            
            //Desconectamos la base de datos
            $conexion->desconectar();
    
           }

           //---------------Función para editar movimiento

           public function editar($idOperacione,$idUsuarioReceptore,$totale,$numeroComprobantee,$idEditare){
        
            //Instanciamos la clase conexión
            $conexion = new Conexion();
            //Conectamos a la base de datos
            $conexion->conectar();
            //Instrucción SQL
            $sql = "update movimientos set id_operacion=?,id_usuario_receptor=?,total=?,numero_comprobante=? where id=?";
            //Preparamos la instrucción sql
            $stmt = $conexion->db->prepare($sql);
            
            //Enviamos los parámetros
            //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
            $stmt->bind_param('iidsi',$idOperacione,$idUsuarioReceptore,$totale,$numeroComprobantee,$idEditare);
              
            //Ejecutamos instrucción
            $stmt->execute();
            
            //Desconectamos la base de datos
            $conexion->desconectar();
    
           }

           //-------------Anular un movimiento------------------------

           public function desactivar($idDesactivar){
            
            //Instanciamos la clase conexión
            $conexion = new Conexion();
            //Conectamos a la base de datos
            $conexion->conectar();
            //Estado a enviar
            $estado = 0;
            //Instrucción SQL
            $sql = "update movimientos set estado=? where id=?";
            //Preparamos la instrucción sql
            $stmt = $conexion->db->prepare($sql);
            
            //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
            $stmt->bind_param('ii',$estado,$idDesactivar);
            
            //Ejecutamos instrucción
            $stmt->execute();
            
            //Desconectamos la base de datos
            $conexion->desconectar();
    
          }

          //---------Reactivar un movimiento-------------

          public function reactivar($idReactivar){
            
            //Instanciamos la clase conexión
            $conexion = new Conexion();
            //Conectamos a la base de datos
            $conexion->conectar();
            //Estado a enviar
            $estado = 1;
            //Instrucción SQL
            $sql = "update movimientos set estado=? where id=?";
            //Preparamos la instrucción sql
            $stmt = $conexion->db->prepare($sql);
            
            //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
            $stmt->bind_param('ii',$estado,$idReactivar);
            
            //Ejecutamos instrucción
            $stmt->execute();
            
            //Desconectamos la base de datos
            $conexion->desconectar();
    
          }
    
          //---------------Buscar movimiento por id

          public function buscarPorId($idBusqueda){
         
            //Instanciamos la clase conexión
             $conexion = new Conexion();
             //Conectamos a la base de datos
             $conexion->conectar();
             //Declaramos el objeto contenedor del resultado
             $resultadoMovimiento= new Movimiento();
             
             //Instrucción SQL
            $sql = "select *from movimientos where id='" . $idBusqueda . "'";
            //Ejecución de instrucción     
            $ejecutar = mysqli_query($conexion->db, $sql);
    
            while($fila = mysqli_fetch_array($ejecutar)){
                
                $resultadoMovimiento->setId($fila['id']);
                $resultadoMovimiento->setIdOperacion($fila['id_operacion']);
                $resultadoMovimiento->setIdUsuarioReceptor($fila['id_usuario_receptor']);
                $resultadoMovimiento->setIdUsuarioOperacion($fila['id_usuario_operacion']);
                $resultadoMovimiento->setTotal($fila['total']);
                $resultadoMovimiento->setNumeroComprobante($fila['numero_comprobante']);
                $resultadoMovimiento->setEstado($fila['estado']);
                $resultadoMovimiento->setFechaCommit($fila['fecha_commit']);
                           
            }
                //Nos desconectamos de la base de datos
                $conexion->desconectar();
                //Devolvemos el usuario encontrado
                return $resultadoMovimiento;
           }

           //-------------Función para obtener todos los movimientos----------------------

           public function obtenerMovimientos(){
            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoMovimientos = array();
        //Instrucción SQL
        $sql = "select *from movimientos";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);
    
        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $movimientoIndex = new Movimiento();
            $movimientoIndex->setId($fila['id']);
            $movimientoIndex->setIdOperacion($fila['id_operacion']);
            $movimientoIndex->setIdUsuarioReceptor($fila['id_usuario_receptor']);
            $movimientoIndex->setIdUsuarioOperacion($fila['id_usuario_operacion']);
            $movimientoIndex->setTotal($fila['total']);
            $movimientoIndex->setNumeroComprobante($fila['numero_comprobante']);
            $movimientoIndex->setEstado($fila['estado']);
            $movimientoIndex->setFechaCommit($fila['fecha_commit']);
               
            //Llenamos el array de resultados de usuarios
            array_push($resultadoMovimientos,$movimientoIndex);
           
        }
    
        //Nos desconectamos de la base de datos
        $conexion->desconectar();
    
        //Devolvemos los usuarios encontrados
        return $resultadoMovimientos;
        }

        //------------Obtener pagos por alumno-------------------

        public function obtenerMovimientosPorAlumno($idAlumnoSearch){
            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoMovimientos = array();
        //Instrucción SQL
        $sql = "select *from movimientos where id_usuario_receptor='" . $idAlumnoSearch . "'";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $movimientoIndex = new Movimiento();

            $movimientoIndex->setId($fila['id']);
            $movimientoIndex->setIdOperacion($fila['id_operacion']);
            $movimientoIndex->setIdUsuarioReceptor($fila['id_usuario_receptor']);
            $movimientoIndex->setIdUsuarioOperacion($fila['id_usuario_operacion']);
            $movimientoIndex->setTotal($fila['total']);
            $movimientoIndex->setNumeroComprobante($fila['numero_comprobante']);
            $movimientoIndex->setEstado($fila['estado']);
            $movimientoIndex->setFechaCommit($fila['fecha_commit']);
            

            //Llenamos el array de resultados de usuarios
            array_push($resultadoMovimientos,$movimientoIndex);
           
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();

        //Devolvemos los usuarios encontrados
        return $resultadoMovimientos;
        }

        //----------------Obtener movimientos por fechas--------------------------

        public function obtenerMovimientosPorFechas($fechaInicioMovimiento,$fechaFinMovimiento){
            //Instanciamos la clase conexión
       $conexion = new Conexion();
       //Conectamos a la base de datos
       $conexion->conectar();
       //Array contenedor de resultados
       $resultadoMovimientos = array();
       //Instrucción SQL
       $sql = "select *from movimientos where fecha_commit between '" . $fechaInicioMovimiento . " 00:00:00'" ." and '". $fechaFinMovimiento . " 23:59:59'";
       //Ejecución de instrucción     
       $ejecutar = mysqli_query($conexion->db, $sql);

       while($fila = mysqli_fetch_array($ejecutar)){
           
           //Instanciamos objeto
           $movimientoIndex = new Movimiento();

           $movimientoIndex->setId($fila['id']);
           $movimientoIndex->setIdOperacion($fila['id_operacion']);
           $movimientoIndex->setIdUsuarioReceptor($fila['id_usuario_receptor']);
           $movimientoIndex->setIdUsuarioOperacion($fila['id_usuario_operacion']);
           $movimientoIndex->setTotal($fila['total']);
           $movimientoIndex->setNumeroComprobante($fila['numero_comprobante']);
           $movimientoIndex->setEstado($fila['estado']);
           $movimientoIndex->setFechaCommit($fila['fecha_commit']);
           

           //Llenamos el array de resultados de usuarios
           array_push($resultadoMovimientos,$movimientoIndex);
          
       }

       //Nos desconectamos de la base de datos
       $conexion->desconectar();

       //Devolvemos los usuarios encontrados
       return $resultadoMovimientos;
       }

       //------------------Obtener movimientos por rango de fechas y alumno

       public function obtenerMovimientosPorAlumnoFechas($fechaInicioMovimientoB,$fechaFinMovimientoB,$idAlumnoMovimientoB){
        //Instanciamos la clase conexión
   $conexion = new Conexion();
   //Conectamos a la base de datos
   $conexion->conectar();
   //Array contenedor de resultados
   $resultadoMovimientos = array();
   //Instrucción SQL
   $sql = "select *from movimientos where fecha_commit between '" . $fechaInicioMovimientoB . " 00:00:00'" ." and '". $fechaFinMovimientoB . " 23:59:59'" . " and id_usuario_receptor='" . $idAlumnoMovimientoB . "'";
   //Ejecución de instrucción     
   $ejecutar = mysqli_query($conexion->db, $sql);

   while($fila = mysqli_fetch_array($ejecutar)){
       
       //Instanciamos objeto
       $movimientoIndex = new Movimiento();

       $movimientoIndex->setId($fila['id']);
       $movimientoIndex->setIdOperacion($fila['id_operacion']);
       $movimientoIndex->setIdUsuarioReceptor($fila['id_usuario_receptor']);
       $movimientoIndex->setIdUsuarioOperacion($fila['id_usuario_operacion']);
       $movimientoIndex->setTotal($fila['total']);
       $movimientoIndex->setNumeroComprobante($fila['numero_comprobante']);
       $movimientoIndex->setEstado($fila['estado']);
       $movimientoIndex->setFechaCommit($fila['fecha_commit']);
       

       //Llenamos el array de resultados de usuarios
       array_push($resultadoMovimientos,$movimientoIndex);
      
   }

   //Nos desconectamos de la base de datos
   $conexion->desconectar();

   //Devolvemos los usuarios encontrados
   return $resultadoMovimientos;
   }

   //Obtener el ultimo id
    //---------------Buscar movimiento por id

    public function obtenerUltimoId(){
         
        //Instanciamos la clase conexión
         $conexion = new Conexion();
         //Conectamos a la base de datos
         $conexion->conectar();
         //Declaramos el objeto contenedor del resultado
         $resultadoMovimiento= new Movimiento();
         
         //Instrucción SQL
        $sql = "select *from movimientos order by id desc limit 1";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            $resultadoMovimiento->setId($fila['id']);
            $resultadoMovimiento->setIdOperacion($fila['id_operacion']);
            $resultadoMovimiento->setIdUsuarioReceptor($fila['id_usuario_receptor']);
            $resultadoMovimiento->setIdUsuarioOperacion($fila['id_usuario_operacion']);
            $resultadoMovimiento->setTotal($fila['total']);
            $resultadoMovimiento->setNumeroComprobante($fila['numero_comprobante']);
            $resultadoMovimiento->setEstado($fila['estado']);
            $resultadoMovimiento->setFechaCommit($fila['fecha_commit']);
                       
        }
            //Nos desconectamos de la base de datos
            $conexion->desconectar();
            //Devolvemos el usuario encontrado
            return $resultadoMovimiento;
       }


    }



?>
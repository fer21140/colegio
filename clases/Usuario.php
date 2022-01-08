<?php

    class Usuario{

        public $id;
        public $idRol;
        public $dpi;
        public $nombres;
        public $apellidos;
        public $email;
        public $password;
        public $telefono;
        public $fotografia;
        public $fechaCommit;
        public $estado;

        //Obtener id
        public function getId(){
            return $this->id;
        }
        //Setear id
        public function setId($_id){
            $this->id = $_id;
        }
        //Obtener id de rol
        public function getIdRol(){
            return $this->idRol;
        }
        //Setear id de rol
        public function setIdRol($_idRol){
            $this->idRol = $_idRol;
        }
        //Obtener dpi
        public function getDpi(){
            return $this->dpi;
        }
        //Setear dpi
        public function setDpi($_dpi){
            $this->dpi = $_dpi;
        }
        //Obtener nombres
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
        //Obtener email
        public function getEmail(){
            return $this->email;
        }
        //Setear email
        public function setEmail($_email){
            $this->email = $_email;
        }
        //Obtener Password
        public function getPassword(){
            return $this->password;
        }
        //Setear password
        public function setPassword($_password){
            $this->password = $_password;
        }
        //Obtener teléfono
        public function getTelefono(){
            return $this->telefono;
        }
        //Setear teléfono
        public function setTelefono($_telefono){
            $this->telefono = $_telefono;
        }
        //Obtener fotografia
        public function getFotografia(){
            return $this->fotografia;
        }
        //Setear fotografia
        public function setFotografia($_fotografia){
            $this->fotografia = $_fotografia;
        }
        //Obtener fecha
        public function getFechaCommit(){
            return $this->fechaCommit;
        }
        //Setear fecha
        public function setFechaCommit($_fechaCommit){
            $this->fechaCommit = $_fechaCommit;
        }
        //Obtener estado
        public function getEstado(){
            return $this->estado;
        }
        //Setear estado
        public function setEstado($_estado){
            $this->estado = $_estado;
        }

        //------------Función para guardar un usuario--------------------------------------

        //-------------------------------Función para guardar un usuario----------------------------------------

       public function guardar($idRolg,$dpig,$nombresg,$apellidosg,$emailg,$passwordg,$telefonog){
        
        //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Instrucción SQL
        $sql = "insert into tblusuarios(id_rol,dpi,nombres,apellidos,email,password,telefono) values(?,?,?,?,?,?,?)";
        //Preparamos la instrucción sql
        $stmt = $conexion->db->prepare($sql);
        
        //Enviamos los parámetros
        //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
        $stmt->bind_param('isssssi',$idRolg,$dpig,$nombresg,$apellidosg,$emailg,$passwordg,$telefonog);
          
        //Ejecutamos instrucción
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();

       }

       //-----------------------------------Función para editar--------------------------------------------

       public function editar($idRole,$dpie,$nombrese,$apellidose,$emaile,$passworde,$telefonoe,$idEditare){
        
        
        //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Instrucción SQL

        
        $sql = "update tblusuarios set id_rol=?,dpi=?,nombres=?,apellidos=?,email=?,password=?,telefono=? where id=?";
        //Preparamos la instrucción sql
        $stmt = $conexion->db->prepare($sql);
        
        //Enviamos los parámetros
        //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
        $stmt->bind_param('isssssii',$idRole,$dpie,$nombrese,$apellidose,$emaile,$passworde,$telefonoe,$idEditare);
          
        //Ejecutamos instrucción
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();
        
       }

       //--------------Función para validar usuario existente--------------------------

       //------------------------Función para validar usuario existente-------------------------------------------------

       public function validarUsuarioExistente($email,$pass){
        
        //Instanciamos la clase conexión
       $conexion = new Conexion();
       //Nos conectamos a la base de datos
       $conexion->conectar();
       //Variable validadora de credenciales correctos
       $validador=0;
       //Instanciamos la clase usuario
       $usuario = new Usuario();
       //Sentencia sql
       $sql = "select *from tblusuarios where email='" . $email . "'" . " and password='" . $pass . "'";

       $ejecutar = mysqli_query($conexion->db, $sql);
        //Recorremos los resultados de la consulta
        while($fila = mysqli_fetch_array($ejecutar)){
         //Validamos si el usuario y contraseña existe
         if(strcmp($fila['email'], $email) === 0 && strcmp($fila['password'],$pass)===0){
    
            $validador=1;//Si existe el usuario

            $usuario->setId($fila['id']);
            $usuario->setIdRol($fila['id_rol']);
            $usuario->setDpi($fila['dpi']);
            $usuario->setNombres($fila['nombres']);
            $usuario->setApellidos($fila['apellidos']);
            $usuario->setEmail($fila['email']);
            $usuario->setPassword($fila['password']);
            $usuario->setEstado($fila['estado']);
            $usuario->setFechaCommit($fila['fecha_commit']);
            $usuario->setTelefono($fila['telefono']);
            $usuario->setFotografia($fila['fotografia']);


            break;//Rompemos ciclo debido a que no sirve de nada seguir buscando debido a que ya hay primera coincidencia
         }
    }

    //---Guardamos en variable de sesión el usuario
    
    //Guardamos el objeto usuario en sesión
    if($validador==1){
        //---Inicializamos la sesión
         session_start();
        $_SESSION['usuario']=$usuario;
    
    }
    //Desconectamos la base de datos
    $conexion->desconectar();
    //Devolvemos resultados
    return $validador;
    }

    //-----------------------Función para validar email existente---------------------------

    //----------------Función para validar email existente-------------------------

    public function validarEmailExistente($emailValidar){
        
        //Instanciamos clase conexión
        $conexion = new Conexion();
        //Nos conectamos a la base de datos
        $conexion->conectar();
        //Variable validadora de existencia de nickname
        $res=0;

        $sql = "select email from tblusuarios where email='" . $emailValidar . "'";
                
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            if(strcmp($fila[0], $emailValidar) === 0){
                $res=1;//Ya existe
                break;//Rompemos ciclo debido a que no sirve de nada seguir buscando debido a que ya hay primera coincidencia
            }
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();
        //Devolvemos resultado 1=existe, 0 = no existe
        return $res;
       }

       //----------------------------------Función para obtener todos los usuarios------------------

       //-----------------------Función para obtener todos los usuarios-----------------------------

       public function obtenerUsuarios(){
        //Instanciamos la clase conexión
    $conexion = new Conexion();
    //Conectamos a la base de datos
    $conexion->conectar();
    //Array contenedor de resultados
    $resultadoUsuarios = array();
    //Instrucción SQL
    $sql = "select *from tblusuarios";
    //Ejecución de instrucción     
    $ejecutar = mysqli_query($conexion->db, $sql);

    while($fila = mysqli_fetch_array($ejecutar)){
        
        //Instanciamos objeto
        $usuarioIndex = new Usuario();

            $usuarioIndex->setId($fila['id']);
            $usuarioIndex->setIdRol($fila['id_rol']);
            $usuarioIndex->setDpi($fila['dpi']);
            $usuarioIndex->setNombres($fila['nombres']);
            $usuarioIndex->setApellidos($fila['apellidos']);
            $usuarioIndex->setEmail($fila['email']);
            $usuarioIndex->setPassword($fila['password']);
            $usuarioIndex->setEstado($fila['estado']);
            $usuarioIndex->setFechaCommit($fila['fecha_commit']);
            $usuarioIndex->setTelefono($fila['telefono']);
            $usuarioIndex->setFotografia($fila['fotografia']);

        //Llenamos el array de resultados de usuarios
        array_push($resultadoUsuarios,$usuarioIndex);
       
    }

    //Nos desconectamos de la base de datos
    $conexion->desconectar();

    //Devolvemos los usuarios encontrados
    return $resultadoUsuarios;
    }

    //----------------------------Función para desactivar un usuario-----------------------------

    public function desactivar($idDesactivar){
            
        //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Estado a enviar
        $estado = 0;
        //Instrucción SQL
        $sql = "update tblusuarios set estado=? where id=?";
        //Preparamos la instrucción sql
        $stmt = $conexion->db->prepare($sql);
        
        //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
        $stmt->bind_param('ii',$estado,$idDesactivar);
        
        //Ejecutamos instrucción
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();

      }

      //---------------------Función para reactivar un usuario-------------------------------------

      public function reactivar($idReactivar){
            
        //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Estado a enviar
        $estado = 1;
        //Instrucción SQL
        $sql = "update tblusuarios set estado=? where id=?";
        //Preparamos la instrucción sql
        $stmt = $conexion->db->prepare($sql);
        
        //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
        $stmt->bind_param('ii',$estado,$idReactivar);
        
        //Ejecutamos instrucción
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();

      }

      //-----------------------Función para buscar usuario por id------------------

      //--------------------------Función para consultar por id de usuario------------------------------------

      public function buscarPorId($idBusqueda){
         
        //Instanciamos la clase conexión
         $conexion = new Conexion();
         //Conectamos a la base de datos
         $conexion->conectar();
         //Declaramos el objeto contenedor del resultado
         $resultadoUsuario = new Usuario();
         
         //Instrucción SQL
        $sql = "select *from tblusuarios where id='" . $idBusqueda . "'";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            $resultadoUsuario->setId($fila['id']);
            $resultadoUsuario->setIdRol($fila['id_rol']);
            $resultadoUsuario->setDpi($fila['dpi']);
            $resultadoUsuario->setNombres($fila['nombres']);
            $resultadoUsuario->setApellidos($fila['apellidos']);
            $resultadoUsuario->setEmail($fila['email']);
            $resultadoUsuario->setPassword($fila['password']);
            $resultadoUsuario->setEstado($fila['estado']);
            $resultadoUsuario->setFechaCommit($fila['fecha_commit']);
            $resultadoUsuario->setTelefono($fila['telefono']);
            $resultadoUsuario->setFotografia($fila['fotografia']);
            
           
        }
            //Nos desconectamos de la base de datos
            $conexion->desconectar();
            //Devolvemos el usuario encontrado
            return $resultadoUsuario;
       }


    }



?>
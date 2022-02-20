<?php

    class Planilla{

        public $id;
        public $idEmpleado;
        public $nombreEmpleado;
        public $mes;
        public $anio;
        public $salarioOrdinario;
        public $abono;
        public $descuento;
        public $numeroCheque;
        public $sueldoLiquido;
        public $fechaCommit;

        //Obtener id
        public function getId(){
            return $this->id;
        }
        //Setear id
        public function setId($_id){
            $this->id = $_id;
        }
        //Obtener id de empleado
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
        //obtener mes
        public function getMes(){
            return $this->mes;
        }
        //setear mes
        public function setMes($_mes){
            $this->mes =$_mes;
        }
        //Obtener año
        public function getAnio(){
            return $this->anio;
        }
        //Setear año
        public function setAnio($_anio){
            $this->anio = $_anio;
        }
        //Obtener salario ordinario
        public function getSalarioOrdinario(){
            return $this->salarioOrdinario;
        }
        //Setear salario ordinario
        public function setSalarioOrdinario($_salarioOrdinario){
            $this->salarioOrdinario = $_salarioOrdinario;
        }
        //Obtener abono
        public function getAbono(){
            return $this->abono;
        }
        //Setear abono
        public function setAbono($_abono){
            $this->abono = $_abono;
        }
        //Obtener descuento
        public function getDescuento(){
            return $this->descuento;
        }
        //Setear descuento
        public function setDescuento($_descuento){
            $this->descuento = $_descuento;
        }
        //Obtener numero de cheque
        public function getNumeroCheque(){
            return $this->numeroCheque;
        }
        //Setear numero de cheque
        public function setNumeroCheque($_numeroCheque){
            $this->numeroCheque = $_numeroCheque;
        }
        //Obtener sueldo líquido
        public function getSueldoLiquido(){
            return $this->sueldoLiquido;
        }
        //Setear sueldo líquido
        public function setSueldoLiquido($_sueldoLiquido){
            $this->sueldoLiquido = $_sueldoLiquido;
        }
        //Obtener fechaCommit
        public function getFechaCommit(){
            return $this->fechaCommit;
        }
        //Setear fechaCommit
        public function setFechaCommit($_fechaCommit){
            $this->fechaCommit = $_fechaCommit;
        }

        //--------------Función para guardar una planilla
        public function guardar($idEmpleadog,$mesg,$aniog,$salarioOrdinariog,$abonog,$descuentog,$numeroChequeg,$sueldoLiquidog){

            //Instanciamos la clase conexión
            $conexion = new Conexion();
            //Conectamos a la base de datos
            $conexion->conectar();
            //Instrucción SQL
            $sql = "insert into planilla(id_empleado,mes,anio,salario_ordinario,abono,descuento,numero_cheque,sueldo_liquido) values(?,?,?,?,?,?,?,?)";
            //Preparamos la instrucción sql
            $stmt = $conexion->db->prepare($sql);
            
            //Enviamos los parámetros
            //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
            $stmt->bind_param('iiiddddd',$idEmpleadog,$mesg,$aniog,$salarioOrdinariog,$abonog,$descuentog,$numeroChequeg,$sueldoLiquidog);
              
            //Ejecutamos instrucción
            $stmt->execute();
            
            //Desconectamos la base de datos
            $conexion->desconectar();

    }
    //------------Editar planilla---------------------
    public function editar($mese,$anioe,$salarioOrdinarioe,$abonoe,$descuentoe,$numeroChequee,$sueldoLiquidoe,$idEditare){

        //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Instrucción SQL
        $sql = "update planilla set mes=?,anio=?,salario_ordinario=?,abono=?,descuento=?,numero_cheque=?,sueldo_liquido=? where id=?";
        //Preparamos la instrucción sql
        $stmt = $conexion->db->prepare($sql);
        
        //Enviamos los parámetros
        //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
        $stmt->bind_param('iidddddi',$mese,$anioe,$salarioOrdinarioe,$abonoe,$descuentoe,$numeroChequee,$sueldoLiquidoe,$idEditare);
          
        //Ejecutamos instrucción
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();

      }
      //-------------Obtener planillas--------------------------

      public function obtenerPlanillas(){
        //Instanciamos la clase conexión
    $conexion = new Conexion();
    //Conectamos a la base de datos
    $conexion->conectar();
    //Array contenedor de resultados
    $resultadoPlanillas = array();
    //Instrucción SQL
    $sql = "select p.id as IDPLANILLA, p.id_empleado, p.mes, p.anio, p.salario_ordinario, p.abono, p.descuento, p.numero_cheque, p.sueldo_liquido, p.fecha_commit, u.id, u.nombres, u.apellidos, u.id_rol from planilla p, tblusuarios u where p.id_empleado = u.id";
    //Ejecución de instrucción     
    $ejecutar = mysqli_query($conexion->db, $sql);
    
    while($fila = mysqli_fetch_array($ejecutar)){
        
        //Instanciamos objeto
        $planillaIndex = new Planilla();
    
        $planillaIndex->setId($fila['IDPLANILLA']);
        $planillaIndex->setIdEmpleado($fila['id_empleado']);
        $planillaIndex->setNombreEmpleado($fila['nombres'] . " " . $fila['apellidos']);
        $planillaIndex->setMes($fila['mes']);
        $planillaIndex->setAnio($fila['anio']);
        $planillaIndex->setSalarioOrdinario($fila['salario_ordinario']);
        $planillaIndex->setAbono($fila['abono']);
        $planillaIndex->setDescuento($fila['descuento']);
        $planillaIndex->setNumeroCheque($fila['numero_cheque']);
        $planillaIndex->setSueldoLiquido($fila['sueldo_liquido']);
        $planillaIndex->setFechaCommit($fila['fecha_commit']);
        
        //Llenamos el array de resultados de usuarios
        array_push($resultadoPlanillas,$planillaIndex);
       
    }
    
    //Nos desconectamos de la base de datos
    $conexion->desconectar();
    
    //Devolvemos los usuarios encontrados
    return $resultadoPlanillas;
    
    }

    //------Obtener planillas por mes y año
    public function obtenerPlanillasMesAnio($mesBusqueda,$anioBusqueda){
        //Instanciamos la clase conexión
    $conexion = new Conexion();
    //Conectamos a la base de datos
    $conexion->conectar();
    //Array contenedor de resultados
    $resultadoPlanillas = array();
    //Instrucción SQL
    $sql = "select p.id as IDPLANILLA, p.id_empleado, p.mes, p.anio, p.salario_ordinario, p.abono, p.descuento, p.numero_cheque, p.sueldo_liquido, p.fecha_commit, u.id, u.nombres, u.apellidos, u.id_rol from planilla p, tblusuarios u where p.id_empleado = u.id and p.anio='" . $anioBusqueda . "' and p.mes='" . $mesBusqueda . "'";
    //Ejecución de instrucción     
    $ejecutar = mysqli_query($conexion->db, $sql);
    
    while($fila = mysqli_fetch_array($ejecutar)){
        
        //Instanciamos objeto
        $planillaIndex = new Planilla();
    
        $planillaIndex->setId($fila['IDPLANILLA']);
        $planillaIndex->setIdEmpleado($fila['id_empleado']);
        $planillaIndex->setNombreEmpleado($fila['nombres'] . " " . $fila['apellidos']);
        $planillaIndex->setMes($fila['mes']);
        $planillaIndex->setAnio($fila['anio']);
        $planillaIndex->setSalarioOrdinario($fila['salario_ordinario']);
        $planillaIndex->setAbono($fila['abono']);
        $planillaIndex->setDescuento($fila['descuento']);
        $planillaIndex->setNumeroCheque($fila['numero_cheque']);
        $planillaIndex->setSueldoLiquido($fila['sueldo_liquido']);
        $planillaIndex->setFechaCommit($fila['fecha_commit']);
        
        //Llenamos el array de resultados de usuarios
        array_push($resultadoPlanillas,$planillaIndex);
       
    }
    
    //Nos desconectamos de la base de datos
    $conexion->desconectar();
    
    //Devolvemos los usuarios encontrados
    return $resultadoPlanillas;
    
    }

      //-------------Obtener planilla por id--------------------
      public function buscarPorId($idBusqueda){
        //Instanciamos la clase conexión
     $conexion = new Conexion();
     //Conectamos a la base de datos
     $conexion->conectar();
     //Declaramos el objeto contenedor del resultado
     $resultadoPlanilla = new Planilla();
     
     //Instrucción SQL
    $sql = "select p.id as IDPLANILLA, p.id_empleado, p.mes, p.anio, p.salario_ordinario, p.abono, p.descuento, p.numero_cheque, p.sueldo_liquido, p.fecha_commit, u.id, u.nombres, u.apellidos, u.id_rol from planilla p, tblusuarios u where p.id_empleado = u.id and p.id='" . $idBusqueda . "'";
    //Ejecución de instrucción     
    $ejecutar = mysqli_query($conexion->db, $sql);

    while($fila = mysqli_fetch_array($ejecutar)){
        
        $resultadoPlanilla->setId($fila['IDPLANILLA']);
        $resultadoPlanilla->setIdEmpleado($fila['id_empleado']);
        $resultadoPlanilla->setNombreEmpleado($fila['nombres'] . " " . $fila['apellidos']);
        $resultadoPlanilla->setMes($fila['mes']);
        $resultadoPlanilla->setAnio($fila['anio']);
        $resultadoPlanilla->setSalarioOrdinario($fila['salario_ordinario']);
        $resultadoPlanilla->setAbono($fila['abono']);
        $resultadoPlanilla->setDescuento($fila['descuento']);
        $resultadoPlanilla->setNumeroCheque($fila['numero_cheque']);
        $resultadoPlanilla->setSueldoLiquido($fila['sueldo_liquido']);
        $resultadoPlanilla->setFechaCommit($fila['fecha_commit']);
        
       
    }
        //Nos desconectamos de la base de datos
        $conexion->desconectar();
        //Devolvemos el usuario encontrado
        return $resultadoPlanilla;
    }

    //Validar planilla ya ingresada

    public function validarPlanillaIngresada($idEmpleadob,$mesb,$aniob){
        
        //Instanciamos clase conexión
        $conexion = new Conexion();
        //Nos conectamos a la base de datos
        $conexion->conectar();
        //Variable validadora de existencia de nickname
        $res=0;

        $sql = "select id_empleado, mes, anio from planilla where id_empleado='" . $idEmpleadob . "' and mes='" . $mesb . "' and anio='" . $aniob . "'";
                
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            if($fila['id_empleado']== $idEmpleadob && $fila['anio'] == $aniob && $fila['mes']==$mesb){
                $res=1;//Ya existe
                break;//Rompemos ciclo debido a que no sirve de nada seguir buscando debido a que ya hay primera coincidencia
            }
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();
        //Devolvemos resultado 1=existe, 0 = no existe
        return $res;
       }

       //---------Eliminar planilla-------------

       //--------------Función para guardar una planilla
       public function eliminar($idEliminar){

        //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Instrucción SQL
        $sql = "delete from planilla where id=?";
        //Preparamos la instrucción sql
        $stmt = $conexion->db->prepare($sql);
        
        //Enviamos los parámetros
        //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
        $stmt->bind_param('i',$idEliminar);
          
        //Ejecutamos instrucción
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();

}

    }

    

?>
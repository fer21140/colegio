<?php
 
 class Conexion{
     public $hostname="localhost";
     public $username="root";
     public $password="";
     public $dbname="db_a6edc2_dbimp";
     public $db;
     
    //obtener el nombre del host de la base de datos
     public function getHostname(){
         return $this->hostname;
     }
     //obtener el nombre de usuario de la base de datos
     public function getUserName(){
         return $this->username;
     }
     //Obtener la contraseña de la base datos
     public function getPassword(){
         return $this->password;
     }
     //Obtener el nombre de la base de datos
     public function getDbName(){
         return $this->dbname;
     }
     //Obtener conexión o Db
     public function getDb(){
         return $this->db;
     }

     //Función para conectarse a la base de datos

     public function conectar(){
        
        $this->db = mysqli_connect($this->getHostname(),$this->getUserName(), $this->getPassword()) 
        or die("<html><script language='JavaScript'>alert('¡No es posible conectarse a la base de datos! Vuelve a intentarlo más tarde.'),history.go(-1)</script></html>");
        
        mysqli_select_db($this->db,$this->getDbName());
     }

     //Función para cerrar conexión de la base de datos

     public function desconectar(){
          
        mysqli_close($this->db);
     }
 
}

?>
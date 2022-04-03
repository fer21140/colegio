<?php

    class GradosInscritosJson{
        
        public $id;
        public $nombre;
        public $anio;
        
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
        //Obtener anio
        public function getAnio(){
            return $this->anio;
        }
        //Setear anio
        public function setAnio($_anio){
            $this->anio = $_anio;
        }
        
        
    }


?>
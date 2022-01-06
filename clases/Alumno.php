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
        //obtener fotografía
        public function getFotografia(){
            return $this->fotografia;
        }
        //Setear fotografia
        public function setFotografia($_fotografia){
            $this->fotografia = $_fotografia;
        }

        //Función para guardar un alumno

    }



?>
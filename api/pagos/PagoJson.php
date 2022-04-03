<?php

    class PagoJson{

        public $id;
        public $operacion;
        public $comprobante;
        public $fecha;
        public $total;

        //Obtener id
        public function getId(){
            return $this->id;
        }
        //setear id
        public function setId($_id){
            $this->id = $_id;
        }
        //Obtener operacion
        public function getOperacion(){
            return $this->operacion;
        }
        //Setear operacion
        public function setOperacion($_operacion){
            $this->operacion = $_operacion;
        }
        //Obtener comprobante
        public function getComprobante(){
            return $this->comprobante;
        }
        //Setear comprobante
        public function setComprobante($_comprobante){
            $this->comprobante = $_comprobante;
        }
        //Obtener fecha
        public function getFecha(){
            return $this->fecha;
        }
        //Setear fecha
        public function setFecha($_fecha){
            $this->fecha = $_fecha;
        }
        //Obtener total
        public function getTotal(){
            return $this->total;
        }
        //Setear total
        public function setTotal($_total){
            $this->total = $_total;
        }

    }


?>
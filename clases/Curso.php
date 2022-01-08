<?php

    class Curso{
       
        public $id;
        public $idProfesor;
        public $idGrado;
        public $nombre;
        public $horaInicio;
        public $horaFin;
        public $diasSemana;
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
        //Obtener id de profesor
        public function getIdProfesor(){
            return $this->idProfesor;
        }
        //Setear id de profesor
        public function setIdProfesor($_idProfesor){
            $this->idProfesor = $_idProfesor;
        }
        //Obtener id de grado
        public function getIdGrado(){
            return $this->idGrado;
        }
        //Setear id de grado
        public function setIdGrado($_idGrado){
            $this->idGrado = $_idGrado;
        }
        //Obtener nombre
        public function getNombre(){
            return $this->nombre;
        }
        //Setear nombre
        public function setNombre($_nombre){
            $this->nombre = $_nombre;
        }
        //Obtener hora de inicio
        public function getHoraInicio(){
            return $this->horaInicio;
        }
        //Setear hora de inicio
        public function setHoraInicio($_horaInicio){
            $this->horaInicio = $_horaInicio;
        }
        //Obtener hora de fin
        public function getHoraFin(){
            return $this->horaFin;
        }
        //Setear hora de fin
        public function setHoraFin($_horaFin){
            $this->horaFin = $_horaFin;
        }
        //Obtener dias semana
        public function getDiasSemana(){
            return $this->diasSemana;
        }
        //Setear dias de la semana
        public function setDiasSemana($_diasSemana){
            $this->diasSemana = $_diasSemana;
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

    }


?>
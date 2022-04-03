<?php

    class HorarioJson{
        
        public $curso;
        public $profesor;
        public $horaInicio;
        public $horaFin;
        public $diasSemana;
        
        //Obtener curso
        public function getCurso(){
            return $this->curso;
        }
        //Setear curso
        public function setCurso($_curso){
            $this->curso = $_curso;
        }
        //Obtener profesor
        public function getProfesor(){
            return $this->profesor;
        }
        //Setear profesor
        public function setProfesor($_profesor){
            $this->profesor = $_profesor;
        }
        //Obtener hora inicio
        public function getHoraInicio(){
            return $this->horaInicio;
        }
        //Setear hora inicio
        public function setHoraInicio($_horaInicio){
            $this->horaInicio = $_horaInicio;
        }
        //Obtener hora fin
        public function getHoraFin(){
            return $this->horaFin;
        }
        //Setear hora fin
        public function setHoraFin($_horaFin){
            $this->horaFin = $_horaFin;
        }
        //Obtener dias semana
        public function getDiasSemana(){
            return $this->diasSemana;
        }
        //Setear dias semana
        public function setDiasSemana($_diasSemana){
            $this->diasSemana = $_diasSemana;
        }
        
    }

?>
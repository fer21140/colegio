<?php

    class NotaJson{
        
        public $curso;
        public $bimestre1;
        public $bimestre2;
        public $bimestre3;
        public $bimestre4;
        public $total;
        
        //Obtener curso
        public function getCurso(){
            return $this->curso;
        }
        //Setear curso
        public function setCurso($_curso){
            $this->curso = $_curso;
        }
        //Obtener bimestre1
        public function getBimestre1(){
            return $this->bimestre1;
        }
        //Setear bimestre1
        public function setBimestre1($_bimestre1){
            $this->bimestre1 = $_bimestre1;
        }
        //Obtener bimestre2
        public function getBimestre2(){
            return $this->bimestre2;
        }
        //Setear bimestre2
        public function setBimestre2($_bimestre2){
            $this->bimestre2 = $_bimestre2;
        }
        //Obtener bimestre3
        public function getBimestre3(){
            return $this->bimestre3;
        }
        //Setear bimestre3
        public function setBimestre3($_bimestre3){
            $this->bimestre3 = $_bimestre3;
        }
        //Obtener bimestre4
        public function getBimestre4(){
            return $this->bimestre4;
        }
        //Setear bimestre4
        public function setBimestre4($_bimestre4){
            $this->bimestre4 = $_bimestre4;
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
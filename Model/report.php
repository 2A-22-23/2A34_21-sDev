<?php
    class report{
        private int $idReport;
        private int $idQuestion;
        private int $id_auteur;
        private string $cause;
        private string $description;
        public function __construct (int $id = NULL,int $idQuestion,int $id_auteur, string $cause, string $description){
            $this->id=$id;
            $this->idQuestion = $idQuestion;
            $this->id_auteur = $id_auteur;
            $this->cause = $cause;
            $this->description = $description;
        }
        public function getId(){
            return $this->id;
        } 
        public function setId(int $id){
            $this->id=$id;
        }
        public function getIdQuestion(){
            return $this->idQuestion;
        } 
        public function setIdQuestion(int $idQuestion){
            $this->idQuestion=$idQuestion;
        }
        public function getId_auteur(){
            return $this->id_auteur;
        } 
        public function setId_auteur(int $id_auteur){
            $this->id_auteur=$id_auteur;
        }
        public function getCause(){
            return $this->cause;
        } 
        public function setCause(string $cause){
            $this->cause=$cause;
        }
        public function getDescription(){
            return $this->description;
        } 
        public function setDescription(string $description){
            $this->description=$description;
        }
    }
?>
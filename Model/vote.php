<?php
    class vote{
        private int $idVote;
        private int $idQuestion;
        private int $id_auteur;
        private int $type;
        private string $date_publication;
        public function __construct (int $id = NULL,int $idQuestion,int $id_auteur, int $type, string $date_publication){
            $this->id=$id;
            $this->idQuestion = $idQuestion;
            $this->id_auteur = $id_auteur;
            $this->date_publication = $date_publication;
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
        public function getType(){
            return $this->type;
        } 
        public function setType(int $type){
            $this->type=$type;
        }
        public function getDate_publication(){
            return $this->date_publication;
        } 
        public function setDate_publication(string $date_publication){
            $this->date_publication=$date_publication;
        }
    }
?>
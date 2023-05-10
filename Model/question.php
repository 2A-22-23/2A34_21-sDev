<?php
    class question{
        private int $idQuestion;
        private string $titre;
        private string $contenu;
        private int $id_auteur;
        private string $date_publication;
        public function __construct (int $id = NULL,string $titre,string $contenu,int $id_auteur , string $date_publication){
            $this->id=$id;
            $this->titre = $titre;
            $this->contenu = $contenu;
            $this->id_auteur = $id_auteur;
            $this->date_publication = $date_publication;
        }
        public function getId(){
            return $this->id;
        } 
        public function setId(int $id){
            $this->id=$id;
        }
        public function getTitre(){
            return $this->titre;
        } 
        public function setTitre(string $titre){
            $this->titre=$titre;
        }
        public function getContenu(){
            return $this->contenu;
        } 
        public function setContenu(string $contenu){
            $this->contenu=$contenu;
        }
        public function getId_auteur(){
            return $this->id_auteur;
        } 
        public function setId_auteur(int $id_auteur){
            $this->id_auteur=$id_auteur;
        }
        public function getDate_publication(){
            return $this->date_publication;
        } 
        public function setDate_publication(string $date_publication){
            $this->date_publication=$date_publication;
        }
    }
?>
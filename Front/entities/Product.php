<?php

class Product{ 
    private $nom;
    private $descriptions;
    private $genre;
    private $prix;
    private $img;
  
    function __construct($nom,$descriptions,$genre,$prix,$img){
        $this->nom=$nom;
        $this->descriptions=$descriptions;
        $this->genre=$genre;
        $this->prix=$prix;
        $this->img=$img;
     
    }
    function getnom(){
        return $this->nom;
    }
    function getdescriptions(){
        return $this->descriptions;
    }
    function getimg(){
        return $this->img;
    }
    function getgenre(){
        return $this->genre;
    }
    function getprix(){
        return $this->prix;
    }
  
    
    function setnom($nom){
        $this->nom=$nom;
    }
    function setdescriptions($descriptions){
        $this->descriptions=$descriptions;
    }
    function setimg($img){
        $this->img=$img;
    }
    function setgenre($genre){
        $this->genre=$genre;
    }
    function setprix($prix){
        $this->prix=$prix;
    }
}








?>
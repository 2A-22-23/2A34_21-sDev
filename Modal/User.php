<?php
class User {
    private $Nom;
    private $Prenom;
    private $Age;
    private $Sexe;
    private $Email;
    private $Mdp;
    private $Role;

    public function __construct($Nom, $Prenom, $Age, $Sexe, $Email, $Mdp,$Role) {
        $this->Nom = $Nom;
        $this->Prenom = $Prenom;
        $this->Age = $Age;
        $this->Sexe = $Sexe;
        $this->Email = $Email;
        $this->Mdp = $Mdp;
        $this->Role = $Role;
    }

    public function getNom() {
        return $this->Nom;
    }

    public function getPrenom() {
        return $this->Prenom;
    }

    public function getAge() {
        return $this->Age;
    }

    public function getSexe() {
        return $this->Sexe;
    }

    public function getEmail() {
        return $this->Email;
    }

    public function getMdp() {
        return $this->Mdp;
    }
    public function getRole() {
        return $this->Role;
    }


    public function setNom($Nom) {
        $this->Nom = $Nom;
    }

    public function setPrenom($Prenom) {
        $this->Prenom = $Prenom;
    }

    public function setAge($Age) {
        $this->Age = $Age;
    }

    public function setSexe($Sexe) {
        $this->Sexe = $Sexe;
    }

    public function setEmail($Email) {
        $this->Email = $Email;
    }

    public function setMdp($Mdp) {
        $this->Mdp = $Mdp;
    }
    public function setRole($Role) {
        $this->Role = $Role;
    }
}


?>  
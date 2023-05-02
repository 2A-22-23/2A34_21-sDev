<?php
class User {
    private $Nom;
    private $Prenom;
    private $Age;
    private $Sexe;
    private $Email;
    private $Mdp;
    private $Role;
    private $Etat;
    private $Token;
    private $TokenE;
    private $TokenP;
    private $Tokenverif;
    

    public function __construct($Nom, $Prenom, $Age, $Sexe, $Email, $Mdp, $Role, $Etat, $Token, $TokenE, $TokenP,$Tokenverif ) {
        $this->Nom = $Nom;
        $this->Prenom = $Prenom;
        $this->Age = $Age;
        $this->Sexe = $Sexe;
        $this->Email = $Email;
        $this->Mdp = $Mdp;
        $this->Role = $Role;
        $this->Etat = $Etat;
        $this->Token = $Token;
        $this->TokenE = $TokenE;
        $this->TokenP = $TokenP;
        $this->Tokenverif = $Tokenverif;

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

    public function getEtat() {
        return $this->Etat;
    }

    public function setEtat($Etat) {
        $this->Etat = $Etat;
    }

    public function getToken() {
        return $this->Token;
    }
    public function setToken($Token) {
        $this->Token = $Token;
    }



    public function getTokenE() {
        return $this->TokenE;
    }
    public function setTokenE($TokenE) {
        $this->TokenE = $TokenE;
    }



    public function getTokenP() {
        return $this->TokenP;
    }
    public function setTokenP($TokenP) {
        $this->TokenP = $TokenP;
    }
    public function getTokenverif() {
        return $this->Tokenverif;
    }
    public function setTokenverif($Tokenverif) {
        $this->Tokenverif = $Tokenverif;
    }
  
}
?>

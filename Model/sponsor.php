<?php

class sponsor {

    private $id;
    private $nom;
    private $secteur_activite;
    private $date_debut;
    private $date_fin;
    private $montant_sponsoring;
    private $description_sponsorship;
    private $id_event;
    private $logo_sponsor;

    public function __construct($id, $nom, $secteur_activite, $date_debut, $date_fin, $montant_sponsoring, $description_sponsorship, $id_event, $logo_sponsor) {
        $this->id = $id;
        $this->nom = $nom;
        $this->secteur_activite = $secteur_activite;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->montant_sponsoring = $montant_sponsoring;
        $this->description_sponsorship = $description_sponsorship;
        $this->id_event = $id_event;
        $this->logo_sponsor = $logo_sponsor;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getSecteurActivite() {
        return $this->secteur_activite;
    }

    public function setSecteurActivite($secteur_activite) {
        $this->secteur_activite = $secteur_activite;
    }

    public function getDateDebut() {
        return $this->date_debut;
    }

    public function setDateDebut($date_debut) {
        $this->date_debut = $date_debut;
    }

    public function getDateFin() {
        return $this->date_fin;
    }

    public function setDateFin($date_fin) {
        $this->date_fin = $date_fin;
    }

    public function getMontantSponsoring() {
        return $this->montant_sponsoring;
    }

    public function setMontantSponsoring($montant_sponsoring) {
        $this->montant_sponsoring = $montant_sponsoring;
    }

    public function getDescriptionSponsorship() {
        return $this->description_sponsorship;
    }

    public function setDescriptionSponsorship($description_sponsorship) {
        $this->description_sponsorship = $description_sponsorship;
    }

    public function getIdEvent() {
        return $this->id_event;
    }

    public function setIdEvent($id_event) {
        $this->id_event = $id_event;
    }

    public function getLogoSponsor() {
        return $this->logo_sponsor;
    }

    public function setLogoSponsor($logo_sponsor) {
        $this->logo_sponsor = $logo_sponsor;
    }

}

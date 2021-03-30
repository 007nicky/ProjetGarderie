<?php
Class EnfantVO {
    // Les variables contenant les details des Enfants
    protected $idEnfant;
    protected $prenom;
    protected $nom;
    protected $Gender;
    protected $Educatrices;
    protected $Programme;
    protected $dateNa;
    protected $CoordPr;
    protected $CoordSec;
    protected $Allergies;
    protected $ContMed;
    protected $ListeVaccination;
    protected $ProbComport;
    protected $HistoIncident;
    protected $DevelopmentEnfant;
    protected $ListeContactRecup;
    protected $HistoPay;
    protected $photo;
    
    // les setter pour les details de Enfants
    public function setIdEnfant($idEnfant) {
        $this->idEnfant = $idEnfant;
    }
    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }
    public function setNom($nom) {
        $this->nom = $nom;
    }
    public function setGender($Gender) {
        $this->Gender = $Gender;
    }
    public function setEducatrices($Educatrices) {
        $this->Educatrices = $Educatrices;
    }
    public function setProgramme($Programme) {
        $this->Programme = $Programme;
    }
    public function setDateNa($dateNa) {
        $this->dateNa = $dateNa;
    }
    public function setCoordPr($CoordPr) {
        $this->CoordPr = $CoordPr;
    }
    public function setCoordSec($CoordSec) {
        $this->CoordSec = $CoordSec;
    }
    public function setAllergies($Allergies) {
        $this->Allergies = $Allergies;
    }
    public function setContMed($ContMed) {
        $this->ContMed = $ContMed;
    }
    public function setListeVaccination($ListeVaccination) {
        $this->ListeVaccination = $ListeVaccination;
    }
    public function setProbComport($ProbComport) {
        $this->ProbComport = $ProbComport;
    }
    public function setHistoIncident($HistoIncident) {
        $this->HistoIncident = $HistoIncident;
    }
    public function setDevelopmentEnfant($DevelopmentEnfant) {
        $this->DevelopmentEnfant = $DevelopmentEnfant;
    }
    public function setListeContactRecup($ListeContactRecup) {
        $this->ListeContactRecup = $ListeContactRecup;
    }
    public function setHistoPay($HistoPay) {
        $this->HistoPay = $HistoPay;
    }
    public function setPhoto($photo) {
        $this->photo = $photo;
    }


    
    // Les getter pour les details des Enfants
     public function getIdEnfant() {
        return $this->idEnfant;
    }
    public function getPrenom() {
        return $this->prenom;
    }
    public function getNom() {
        return $this->nom;
    }
    public function getGender() {
        return $this->Gender;
    }
    public function getEducatrices() {
        return $this->Educatrices;
    }
    public function getProgramme() {
        return $this->Programme;
    }
    public function getDateNa() {
        return $this->dateNa;
    }
    public function getCoordPr() {
        return $this->CoordPr;
    }
    public function getCoordSec() {
        return $this->CoordSec;
    }
    public function getAllergies() {
        return $this->Allergies;
    }
    public function getContMed() {
        return $this->ContMed;
    }
    public function getListeVaccination() {
        return $this->ListeVaccination;
    }
    public function getProbComport() {
        return $this->ProbComport;
    }
    public function getHistoIncident() {
        return $this->HistoIncident;
    }
    public function getDevelopmentEnfant() {
        return $this->DevelopmentEnfant;
    }
    public function getListeContactRecup() {
        return $this->ListeContactRecup;
    }
    public function getHistoPay() {
        return $this->HistoPay;
    }
    public function getPhoto() {
        return $this->photo;
    }
    
}
?>
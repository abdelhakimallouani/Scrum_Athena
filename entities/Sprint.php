<?php

class Sprint
{

    protected $idSprint;
    protected $titre;
    protected $dateDebut;
    protected $dateFin;
    protected $idProjet;

    public function __construct($titre, $dateDebut, $dateFin, $idProjet)
    {
        $this->titre = $titre;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->idProjet = $idProjet;
    }

    public function getTitre()
    {
        return $this->titre;
    }
    public function getDateDebut()
    {
        return $this->dateDebut;
    }
    public function getDateFin()
    {
        return $this->dateFin;
    }
    public function getProjet()
    {
        return $this->idProjet;
    }
}

<?php

class Sprint {
    
    protected $idSprint;
    protected $titre;
    protected $statut;
    protected $dateDebut;
    protected $dateFin;

    public function __construct($idSprint,$titre,$statut,$dateDebut,$dateFin)
    {
        $this->idSprint = $idSprint;
        $this->titre = $titre ;
        $this->statut = $statut;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
    }
}
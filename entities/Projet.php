<?php
class Projet
{
    protected $idProjet;
    protected $titre;
    protected $description;
    protected $statut;
    protected $date_create;
    protected $idChefProjet;

    public function __construct($titre, $description, $statut, $idChefProjet)
    {
        $this->titre = $titre;
        $this->description = $description;
        $this->statut = $statut;
        $this->idChefProjet = $idChefProjet;
    }


    public function getTitre()
    {
        return $this->titre;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function getStatut()
    {
        return $this->statut;
    }
    public function getChefProjet()
    {
        return $this->idChefProjet;
    }
}

<?php
class Tache
{
    private $id_tache;
    private $titre;
    private $description;
    private $statut;
    private $id_sprint;

    public function __construct($titre, $description, $id_sprint, $statut = 'A_FAIRE', $id_tache = null)
    {
        $this->titre = $titre;
        $this->description = $description;
        $this->id_sprint = $id_sprint;
        $this->statut = $statut;
        $this->id_tache = $id_tache;
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
    public function getIdSprint()
    {
        return $this->id_sprint;
    }
}

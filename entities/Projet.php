<?php
class Projet {
    protected $idProjet ;
    protected $titre;
    protected $description;
    protected $statut;

    public function __construct($idProjet,$titre,$description,$statut)
    {
        $this->idProjet = $idProjet;
        $this->titre = $titre; 
        $this->description = $description;
        $this->statut = $statut;
        
    }
}

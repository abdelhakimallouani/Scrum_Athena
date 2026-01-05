<?php 

class Tache {
    protected $idTache;
    protected $titre;
    protected $description;
    protected $statut;

    public function __construct($idTache,$titre,$description,$statut)
    {
        $this->idTache = $idTache ;
        $this->titre = $titre ;
        $this->description = $description;
        $this->statut = $statut;

    }


}
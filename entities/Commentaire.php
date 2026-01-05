<?php
class Commentaire{
    protected $idCommentaire;
    protected $contenu;
    protected $dateCreation;

    public function __construct($idCommentaire,$contenu)
    {
        $this->idCommentaire = $idCommentaire ;
        $this->contenu = $contenu ;
        $this->dateCreation ;
    }
}
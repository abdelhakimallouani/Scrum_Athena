<?php

class ProjetService
{
    private $repo;

    public function __construct()
    {
        $this->repo = new ProjetRepository();
    }

    public function createProjet($data)
    {
        if ($_SESSION['user']['role'] === 'MEMBRE') {
            throw new Exception("pas acces");
        }

        $projet = new Projet(
            $data['titre'],
            $data['description'],
            $data['statut'],
            $data['id_chef_projet']

        );

        return $this->repo->create($projet);
    }
}

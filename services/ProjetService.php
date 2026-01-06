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

        public function listProjets()
    {
        if ($_SESSION['user']['role'] === 'ADMIN') {
            // option: get all projets
        }

        return $this->repo->getAllByChef($_SESSION['user']['id_user']);
    }

    }
}

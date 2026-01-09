<?php

class SprintService
{
    private $repo;

    public function __construct()
    {
        $this->repo = new SprintRepository();
    }

    public function createSprint($data)
    {
        if ($_SESSION['user']['role'] === 'MEMBRE') {
            throw new Exception("Accès refusé");
        }

        // if ($this->repo->hasDateConflict(
        //     $data['id_projet'],
        //     $data['date_debut'],
        //     $data['date_fin']
        // )) {
        //     throw new Exception("Conflit de dates entre sprints");
        // }

        $sprint = new Sprint(
            $data['titre'],
            $data['date_debut'],
            $data['date_fin'],
            $data['id_projet']
        );

        return $this->repo->create($sprint);
    }
}

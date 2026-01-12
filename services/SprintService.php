<?php
require_once __DIR__ . '/../repositories/SprintRepository.php';
require_once __DIR__ . '/../entities/Sprint.php';

class SprintService
{
    private $sprintRepo;

    public function __construct()
    {
        $this->sprintRepo = new SprintRepository();
    }


    public function createSprint(Sprint $sprint, $statut)
    {

        if ($sprint->getDateFin() < $sprint->getDateDebut()) {
            throw new Exception("La date de fin doit etre superieure à la date de debut");
        }
        return $this->sprintRepo->create($sprint, $statut);
    }

    // public function updateSprint(Sprint $sprint): bool {
    //     return $this->sprintRepo->update($sprint);
    // }

    // public function deleteSprint(int $id): bool {
    //     return $this->sprintRepo->delete($id);
    // }

    public function getSprintsByProjet($idProjet)
    {
        return $this->sprintRepo->getAllByProjet($idProjet);
    }
}

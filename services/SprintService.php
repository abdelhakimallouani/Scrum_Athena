<?php
require_once __DIR__ . '/../repositories/SprintRepository.php';
require_once __DIR__ . '/../entities/Sprint.php';

class SprintService {
    private $sprintRepo;

    public function __construct() {
        $this->sprintRepo = new SprintRepository();
    }

    public function createSprint(Sprint $sprint): bool {
        // Vérification des dates
        if ($sprint->getDateFin() < $sprint->getDateDebut()) {
            throw new Exception("La date de fin doit être supérieure à la date de début");
        }
        return $this->sprintRepo->create($sprint);
    }

    // public function updateSprint(Sprint $sprint): bool {
    //     return $this->sprintRepo->update($sprint);
    // }

    // public function deleteSprint(int $id): bool {
    //     return $this->sprintRepo->delete($id);
    // }

    // public function getSprintsByProjet(int $idProjet): array {
    //     return $this->sprintRepo->getAllByProjet($idProjet);
    // }
}

<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../entities/Sprint.php';

class SprintRepository {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function findById(int $id): ?Sprint {
        $stmt = $this->db->prepare("SELECT * FROM sprints WHERE id_sprint=:id");
        $stmt->execute(['id' => $id]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data ;
    }

    public function create(Sprint $sprint): bool {
        $stmt = $this->db->prepare(
            "INSERT INTO sprints (titre, date_debut, date_fin, id_projet)
             VALUES (:titre, :debut, :fin, :projet)"
        );
        return $stmt->execute([
            'titre' => $sprint->getTitre(),
            'debut' => $sprint->getDateDebut(),
            'fin' => $sprint->getDateFin(),
            'projet' => $sprint->getProjet()
        ]);
    }

    // public function update(Sprint $sprint): bool {
    //     $stmt = $this->db->prepare(
    //         "UPDATE sprints SET titre=:titre, date_debut=:debut, date_fin=:fin WHERE id_sprint=:id"
    //     );
    //     return $stmt->execute([
    //         // 'id' => $sprint->getId(),
    //         'titre' => $sprint->getTitre(),
    //         'debut' => $sprint->getDateDebut(),
    //         'fin' => $sprint->getDateFin()
    //     ]);
    // }

    // public function delete(int $id): bool {
    //     $stmt = $this->db->prepare("DELETE FROM sprints WHERE id_sprint=:id");
    //     return $stmt->execute(['id' => $id]);
    // }

    // public function getAllByProjet(int $idProjet): array {
    //     $stmt = $this->db->prepare("SELECT * FROM sprints WHERE id_projet=:id");
    //     $stmt->execute(['id' => $idProjet]);
    //     $sprints = [];
    //     while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //         $sprints[] = new Sprint($data);
    //     }
    //     return $sprints;
    // }
}

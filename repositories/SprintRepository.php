<?php

require_once __DIR__ . '/../config/config_db.php';
require_once __DIR__ . '/../entities/Sprint.php';

class SprintRepository
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function findById(int $id)
    {
        $stmt = $this->db->prepare("SELECT * FROM sprints WHERE id_sprint = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(Sprint $sprint, string $statut): bool
    {
        $stmt = $this->db->prepare(
            "INSERT INTO sprints (titre, date_debut, date_fin, id_projet, statut)
         VALUES (:titre, :debut, :fin, :projet, :statut)"
        );
        return $stmt->execute([
            'titre'  => $sprint->getTitre(),
            'debut'  => $sprint->getDateDebut(),
            'fin'    => $sprint->getDateFin(),
            'projet' => $sprint->getProjet(),
            'statut' => $statut 
        ]);
    }

    public function getAllByProjet($idProjet)
    {
        $stmt = $this->db->prepare("SELECT * FROM sprints WHERE id_projet = ?");
        $stmt->execute([$idProjet]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

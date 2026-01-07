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

    public function create(Sprint $sprint)
    {
        $sql = "INSERT INTO sprints (titre,date_debut,date_fin,id_projet) VALUES (?,?,?,?)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $sprint->getTitre(),
            $sprint->getDateDebut(),
            $sprint->getDateFin(),
            $sprint->getProjet()
        ]);
    }

    // public function 
}

<?php
require_once __DIR__ . '/../config/config_db.php';

class TacheRepository
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create(Tache $tache)
    {
        $stmt = $this->db->prepare("INSERT INTO taches (titre, description, statut, id_sprint) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$tache->getTitre(), $tache->getDescription(), $tache->getStatut(), $tache->getIdSprint()]);
    }

    public function getBySprint($id_sprint)
    {
        $stmt = $this->db->prepare("SELECT * FROM taches WHERE id_sprint = ?");
        $stmt->execute([$id_sprint]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

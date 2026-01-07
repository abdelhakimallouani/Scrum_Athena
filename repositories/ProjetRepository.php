<?php

require_once __DIR__ . '/../config/config_db.php';
require_once __DIR__ . '/../entities/Projet.php';

class ProjetRepository
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create(Projet $projet)
    {
        $sql = "INSERT INTO projets (titre, description, statut, id_chef_projet)
                VALUES (?,?,?,?)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $projet->getTitre(),
            $projet->getDescription(),
            $projet->getStatut(),
            $projet->getIdChefProjet()
        ]);
    }

    public function getAllByChef($idChef)
    {
        $sql = "SELECT * FROM projets WHERE id_chef_projet = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idChef]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProjetById(int $id_projet): ?array {
    $stmt = $this->db->prepare("SELECT * FROM projets WHERE id_projet = ?");
    $stmt->execute([$id_projet]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Retourne les données ou null si le projet n'existe pas
    return $result ?: null;
}
}

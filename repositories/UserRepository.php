<?php
require_once __DIR__ . '/../config/config_db.php';
require_once __DIR__ . '/../entities/User.php';

class UserRepository
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function findByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM utilisateur WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function save(User $user)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO utilisateur (nom_complet, email, password, role)
             VALUES (?, ?, ?, ?)"
        );

        return $stmt->execute([
            $user->getNomComplet(),
            $user->getEmail(),
            password_hash($user->getPassword(), PASSWORD_BCRYPT),
            $user->getRole()
        ]);
    }
}

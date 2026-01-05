<?php
require_once __DIR__ . '/../repositories/UserRepository.php';

class AuthService
{
    private $userRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepository();
    }

    public function login($email, $password)
    {
        $user = $this->userRepo->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            return true;
        }
        return false;
    }

    public function signup($nom, $email, $password, $role)
    {
        if ($this->userRepo->findByEmail($email)) {
            return false;
        }

        $user = new User($nom, $email, $password, $role);
        return $this->userRepo->save($user);
    }

    public function logout()
    {
        session_destroy();
    }
}

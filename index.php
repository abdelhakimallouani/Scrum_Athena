<?php
session_start();

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/config/config_db.php';

require_once __DIR__ . '/entities/User.php';

require_once __DIR__ . '/repositories/UserRepository.php';

require_once __DIR__ . '/services/AuthService.php';

require_once __DIR__ . '/utils/SessionManager.php';

$auth = new AuthService();

// LOGIN
if (isset($_POST['login'])) {
    if ($auth->login($_POST['email'], $_POST['password'])) {
        header("Location: views/dashboard.php");
        exit;
    } else {
        $error = "Email ou mot de passe incorrect";
    }
}

// SIGNUP
if (isset($_POST['signup'])) {
    $auth->signup(
        $_POST['nom'],
        $_POST['email'],
        $_POST['password'],
        $_POST['role']
    );
    $success = "Compte créé avec succès";
}

// AFFICHAGE
if (!isset($_SESSION['user'])) {
    include 'views/login.php';
} else {
    header("Location: views/dashboard.php");
    exit;
}

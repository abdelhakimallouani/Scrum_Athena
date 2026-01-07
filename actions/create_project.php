<?php
session_start();

require_once '../config/Database.php';
require_once '../repositories/ProjetRepository.php';
require_once '../services/ProjetService.php';
require_once '../entities/Projet.php';

try {
    $service = new ProjetService();
    $service->createProjet($_POST);

    header("Location: ../views/projets.php");
    exit;
} catch (Exception $e) {
    die($e->getMessage());
}

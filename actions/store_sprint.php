<?php
session_start();

require_once __DIR__ . '/../config/config_db.php';
require_once __DIR__ . '/../entities/Sprint.php';
require_once __DIR__ . '/../repositories/SprintRepository.php';
require_once __DIR__ . '/../services/SprintService.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $titre = $_POST['titre'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $id_projet = $_POST['id_projet'];
    $statut = $_POST['statut'] ?? 'A_VENIR';

    if (empty($titre) || empty($date_debut) || empty($date_fin) || empty($id_projet)) {
        die("Erreur : Tous les champs sont obligatoires.");
    }

    $sprint = new Sprint($titre, $date_debut, $date_fin, (int)$id_projet);
    $service = new SprintService();

    try {

        if ($service->createSprint($sprint, $statut)) {

            header("Location: ../views/detail_projet.php?id=" . $id_projet);
            exit();
        } else {
            echo "Le sprint n'a pas pu être enregistré.";
        }
    } catch (Exception $e) {

        echo "Oups ! Une erreur est survenue : " . $e->getMessage();
    }
} else {
    header("Location: ../views/projets.php");
    exit();
}

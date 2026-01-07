<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}

require_once '../config/config_db.php';
require_once '../repositories/ProjetRepository.php';
require_once '../repositories/SprintRepository.php';

if (!isset($_GET['id'])) {
    header("Location: projets.php");
    exit;
}

$idProjet = $_GET['id'];

$projetRepo = new ProjetRepository();
$sprintRepo = new SprintRepository();

$projet = $projetRepo->getProjetById($idProjet);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Détails Projet</title>
    <link rel="stylesheet" href="../src/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-[#f4f7f6] flex h-screen font-sans">

    <section class="w-64 bg-emerald-500 text-white flex flex-col p-6 hidden md:flex">
        <div class="text-2xl font-bold mb-10 flex items-center justify-center gap-2">
            AthenaScrum
        </div>

        <nav class="flex-1 space-y-4">
            <a href="dashboard.php" class="flex items-center gap-4 px-4 py-2 hover:bg-white/10 rounded-lg">
                <i class="fas fa-chart-pie w-5"></i> Dashboard
            </a>

            <a href="projets.php" class="flex items-center gap-4 px-4 py-2 bg-white text-emerald-500 rounded-lg font-semibold">
                <i class="fas fa-project-diagram w-5"></i> Projet
            </a>

            <a href="sprints.php" class="flex items-center gap-4 px-4 py-2 hover:bg-white/10 rounded-lg">
                <i class="fas fa-running w-5"></i> Sprint
            </a>

            <a href="taches.php" class="flex items-center gap-4 px-4 py-2 hover:bg-white/10 rounded-lg">
                <i class="fas fa-tasks w-5"></i> Tache
            </a>
        </nav>

        <form action="../logout.php" method="POST">
            <button class="w-full flex items-center gap-4 px-4 py-2 hover:bg-red-500/20 rounded-lg">
                <i class="fas fa-power-off w-5"></i> Quit
            </button>
        </form>
    </section>

    <main class="flex-1 flex flex-col overflow-hidden bg-white md:m-4 md:rounded-3xl shadow-xl">

        <header class="flex items-center justify-between px-8 py-6 border-b">
            <h1 class="text-gray-400 text-xl">Détails du Projet</h1>

            <div class="flex items-center gap-3">
                <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['user']['nom_complet'] ?>"
                     class="w-10 h-10 rounded-lg">
                <div>
                    <p class="text-sm font-bold"><?= $_SESSION['user']['nom_complet'] ?></p>
                    <p class="text-[10px] uppercase text-gray-400"><?= $_SESSION['user']['role'] ?></p>
                </div>
            </div>
        </header>

        <section class="flex-1 overflow-y-auto p-8">
            <div class="bg-[#e9eceb] rounded-3xl p-8 mb-10">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800">
                            <?= htmlspecialchars($projet['titre']) ?>
                        </h2>
                        <p class="text-sm text-gray-500">
                            Créé le <?= date('d/m/Y', strtotime($projet['date_create'])) ?>
                        </p>
                    </div>

                    <span class="px-3 py-1 text-xs font-bold rounded-full
                        <?= $projet['statut'] === 'actif'
                            ? 'bg-emerald-100 text-emerald-600'
                            : 'bg-red-100 text-red-600' ?>">
                        <?= $projet['statut'] ?>
                    </span>
                </div>

                <p class="text-gray-600 mb-8">
                    <?= htmlspecialchars($projet['description']) ?>
                </p>

                <?php if ($_SESSION['user']['role'] !== 'MEMBRE'): ?>
                    <div class="flex gap-2">
                        <a href="edit_projet.php?id=<?= $projet['id_projet'] ?>"
                           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl font-bold">
                            Modifier
                        </a>

                        <a href="../actions/delete_project.php?id=<?= $projet['id_projet'] ?>"
                           class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl font-bold">
                            Supprimer
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <h3 class="text-2xl font-bold text-gray-800 mb-6">Sprints du projet</h3>

            <?php if (empty($sprints)): ?>
                <p class="text-gray-400">Aucun sprint pour ce projet.</p>
            <?php else: ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($sprints as $sprint): ?>
                        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-md">
                            <h4 class="font-bold text-gray-800 mb-2">
                                <?= htmlspecialchars($sprint['nom']) ?>
                            </h4>
                            <p class="text-xs text-gray-500 mb-3">
                                <?= htmlspecialchars($sprint['objectif']) ?>
                            </p>
                            <span class="text-[10px] font-bold uppercase px-2 py-1 rounded-full bg-emerald-100 text-emerald-600">
                                <?= $sprint['statut'] ?>
                            </span>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </section>
    </main>

</body>
</html>

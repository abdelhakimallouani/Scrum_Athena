<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}

if (!isset($_GET['projet_id'])) {
    header("Location: projets.php");
    exit;
}

$idProjet = $_GET['projet_id'];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter un Sprint - AthenaScrum</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
            <button class="w-full flex items-center gap-4 px-4 py-2 hover:bg-red-500/20 rounded-lg text-left">
                <i class="fas fa-power-off w-5"></i> Quit
            </button>
        </form>
    </section>

    <main class="flex-1 flex flex-col overflow-hidden bg-white md:m-4 md:rounded-3xl shadow-xl">

        <header class="flex items-center justify-between px-8 py-6 border-b">
            <h1 class="text-gray-400 text-xl">Nouveau Sprint</h1>

            <div class="flex items-center gap-3">
                <img src="https://ui-avatars.com/api/?name=<?= urlencode($_SESSION['user']['nom_complet']) ?>"
                    class="w-10 h-10 rounded-lg">
                <div>
                    <p class="text-sm font-bold"><?= $_SESSION['user']['nom_complet'] ?></p>
                    <p class="text-[10px] uppercase text-gray-400"><?= $_SESSION['user']['role'] ?></p>
                </div>
            </div>
        </header>

        <section class="flex-1 overflow-y-auto p-8 flex justify-center items-start">
            <div class="w-full max-w-2xl bg-[#e9eceb] rounded-3xl p-8 shadow-inner">
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800">Planifier le Sprint</h2>
                    <p class="text-gray-500 text-sm">Définissez les dates et l'objectif de votre nouvelle itération.</p>
                </div>

                <form action="../actions/store_sprint.php" method="POST" class="space-y-6">
                    <input type="hidden" name="id_projet" value="<?= htmlspecialchars($idProjet) ?>">

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Titre du Sprint</label>
                        <input type="text" name="titre" required
                            placeholder="Ex: Sprint 1 - Core Features"
                            class="w-full px-5 py-3 rounded-2xl border-none focus:ring-2 focus:ring-emerald-500 outline-none shadow-sm">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Date de début</label>
                            <input type="date" name="date_debut" required
                                class="w-full px-5 py-3 rounded-2xl border-none focus:ring-2 focus:ring-emerald-500 outline-none shadow-sm text-gray-600">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Date de fin</label>
                            <input type="date" name="date_fin" required
                                class="w-full px-5 py-3 rounded-2xl border-none focus:ring-2 focus:ring-emerald-500 outline-none shadow-sm text-gray-600">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Statut Initial</label>
                        <select name="statut" required
                            class="w-full px-5 py-3 rounded-2xl border-none focus:ring-2 focus:ring-emerald-500 outline-none shadow-sm text-gray-600 appearance-none bg-white">
                            <option value="A_VENIR" selected>A Venir</option>
                            <option value="EN_COURS">En Cours</option>
                            <option value="TERMINEE">Terminée</option>
                        </select>
                    </div>

                    <div class="flex items-center gap-4 pt-4">
                        <button type="submit"
                            class="bg-emerald-500 hover:bg-emerald-600 text-white px-8 py-3 rounded-2xl font-bold shadow-lg shadow-emerald-200 transition-all flex-1 md:flex-none">
                            Créer le Sprint
                        </button>
                        <a href="detail_projet.php?id=<?= $idProjet ?>"
                            class="bg-white hover:bg-gray-100 text-gray-500 px-8 py-3 rounded-2xl font-bold transition-all text-center">
                            Annuler
                        </a>
                    </div>
                </form>
            </div>
        </section>
    </main>

</body>

</html>
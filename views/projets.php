<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Athena Scrum</title>
</head>

<body class="bg-[#f4f7f6] flex h-screen font-sans">

    <section class="w-64 bg-emerald-500 text-white flex flex-col p-6 hidden md:flex">
        <div class="text-2xl font-bold mb-10 flex items-center justify-center gap-2">
            <span class="text-white ">AthenaScrum</span>
        </div>

        <nav class="flex-1 space-y-4">
            <a href="dashboard.php" class="flex items-center gap-4 px-4 py-2 hover:bg-white/10 rounded-lg transition">
                <i class="fas fa-chart-pie w-5 text-center"></i> Dashboard
            </a>

            <a href="projets.php" class="flex items-center gap-4 px-4 py-2 bg-white text-emerald-500 rounded-lg font-semibold shadow-sm">
                <i class="fas fa-project-diagram w-5 text-center"></i> Projet
            </a>

            <a href="sprints.php" class="flex items-center gap-4 px-4 py-2 hover:bg-white/10 rounded-lg transition">
                <i class="fas fa-running w-5 text-center"></i> Sprint
            </a>

            <a href="taches.php" class="flex items-center gap-4 px-4 py-2 hover:bg-white/10 rounded-lg transition">
                <i class="fas fa-tasks w-5 text-center"></i> Tache
            </a>

            <a href="notifications.php" class="flex items-center gap-4 px-4 py-2 hover:bg-white/10 rounded-lg transition">
                <i class="fas fa-bell w-5 text-center"></i> Notification
            </a>

            <a href="#" class="flex items-center gap-4 px-4 py-2 hover:bg-white/10 rounded-lg transition">
                <i class="fas fa-sliders-h w-5 text-center"></i> Settings
            </a>
        </nav>

        <form action="../logout.php" method="POST" class="mt-4">
            <button class="w-full flex items-center gap-4 px-4 py-2 hover:bg-red-500/20 rounded-lg transition text-white hover:text-red-600">
                <i class="fas fa-power-off w-5 text-center "></i> Quit
            </button>
        </form>
    </section>

    <main class="flex-1 flex flex-col overflow-hidden bg-white md:m-4 md:rounded-3xl shadow-xl">

        <header class="flex items-center justify-between px-8 py-6 border-b border-gray-100">
            <h1 class="text-gray-400 text-xl font-medium tracking-wide">Projects</h1>

            <div class="flex items-center gap-3 group relative cursor-pointer">
                <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['user']['nom_complet'] ?>&background=3d9970&color=fff"
                    class="w-10 h-10 rounded-lg shadow-md" alt="Profil">
                <div class="text-right">
                    <p class="text-sm font-bold text-gray-700"><?= $_SESSION['user']['nom_complet'] ?></p>
                    <p class="text-[10px] text-gray-400 uppercase tracking-tighter flex justify-start"><?= $_SESSION['user']['role'] ?></p>
                </div>

                <div class="absolute right-0 top-full mt-2 w-48 bg-white shadow-2xl rounded-xl border border-gray-100 hidden group-hover:block z-50">
                    <div class="p-2 space-y-1">
                        <a href="#" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">
                            <i class="far fa-user w-4"></i> Profile
                        </a>
                        <a href="#" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">
                            <i class="fas fa-cog w-4"></i> Settings
                        </a>
                        <form action="../logout.php" method="POST">
                            <button class="w-full flex items-center gap-3 px-4 py-2 text-sm text-white bg-emerald-500 hover:bg-[#2d7a58] rounded-lg">
                                <i class="fas fa-power-off w-4"></i> Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>


        <section class="flex-1 overflow-y-auto p-8">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Gestion des Projets</h2>
                    <p class="text-sm text-gray-500">Consultez et gérez le cycle de vie de vos projets Scrum.</p>
                </div>

                <?php if ($_SESSION['user']['role'] !== 'MEMBRE'): ?>
                    <button onclick="document.getElementById('modal-projet').classList.remove('hidden')"
                        class="bg-emerald-500 hover:bg-emerald-600 text-white px-6 py-3 rounded-xl font-bold shadow-lg transition-all flex items-center gap-2">
                        <i class="fas fa-plus"></i> Nouveau Projet
                    </button>
                <?php endif; ?>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <div class="bg-[#e9eceb] p-6 rounded-2xl hover:shadow-md transition-shadow group">
                    <div class="flex justify-between items-start mb-4">
                        <div class="bg-white p-3 rounded-lg text-emerald-500 shadow-sm">
                            <i class="fas fa-project-diagram text-xl"></i>
                        </div>
                        <span class="bg-emerald-100 text-emerald-600 text-[10px] font-bold px-2 py-1 rounded-full uppercase">En cours</span>
                    </div>

                    <h3 class="text-lg font-bold text-gray-800 mb-2">Refonte Plateforme Athena</h3>
                    <p class="text-xs text-gray-500 line-clamp-2 mb-6">
                        Mise en place d'une architecture orientée objet pour la gestion commerciale des sprints.
                    </p>

                    <div class="flex items-center justify-between border-t border-gray-200 pt-4">
                        <div class="flex -space-x-2">
                            <img class="w-7 h-7 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=Membre+1" alt="">
                            <img class="w-7 h-7 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=Membre+2" alt="">
                            <div class="w-7 h-7 rounded-full bg-gray-300 border-2 border-white flex items-center justify-center text-[10px] text-gray-600">+3</div>
                        </div>

                        <a href="details_projet.php?id=1" class="text-emerald-500 text-sm font-bold hover:underline flex items-center gap-1">
                            Voir Sprints <i class="fas fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <div id="modal-projet" class="fixed inset-0 bg-black/50 hidden flex items-center justify-center z-[100] backdrop-blur-sm">
            <div class="bg-white rounded-3xl p-8 w-full max-w-md shadow-2xl">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold text-gray-800">Nouveau Projet</h3>
                    <button onclick="document.getElementById('modal-projet').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <form action="../actions/create_project.php" method="POST" class="space-y-4">
                    <input type="hidden" name="id_chef_projet" value="<?= $_SESSION['user']['id_user'] ?>">

                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase ml-1">Titre du Projet</label>
                        <input type="text" name="titre" maxlength="150" required
                            placeholder="Ex: Refonte Athena"
                            class="w-full bg-gray-100 border-none rounded-xl px-4 py-3 mt-1 focus:ring-2 focus:ring-emerald-500 outline-none">
                    </div>

                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase ml-1">Description</label>
                        <textarea name="description" rows="3"
                            placeholder="Objectifs et contexte du projet..."
                            class="w-full bg-gray-100 border-none rounded-xl px-4 py-3 mt-1 focus:ring-2 focus:ring-emerald-500 outline-none"></textarea>
                    </div>

                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase ml-1">Statut Initial</label>
                        <select name="statut" class="w-full bg-gray-100 border-none rounded-xl px-4 py-3 mt-1 focus:ring-2 focus:ring-emerald-500 outline-none appearance-none text-gray-600">
                            <option value="actif">Actif</option>
                            <option value="inactive">Inactif</option>
                        </select>
                    </div>

                    <button type="submit" name="add_project" class="w-full bg-emerald-500 text-white font-bold py-3 rounded-xl mt-4 shadow-lg hover:bg-emerald-600 transition uppercase tracking-wider text-sm">
                        <i class="fas fa-save mr-2"></i> Enregistrer le Projet
                    </button>
                </form>
            </div>
        </div>
    </main>

</body>

</html>
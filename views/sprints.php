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
    <link rel="stylesheet" href="../src/output.css">
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

            <a href="projets.php" class="flex items-center gap-4 px-4 py-2 hover:bg-white/10 rounded-lg transition">
                <i class="fas fa-project-diagram w-5 text-center"></i> Projet
            </a>

            <a href="sprints.php" class="flex items-center gap-4 px-4 py-2 bg-white text-emerald-500 rounded-lg font-semibold shadow-sm" >
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
            <h1 class="text-gray-400 text-xl font-medium tracking-wide">Sprints</h1>

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

        
    </main>

</body>

</html>
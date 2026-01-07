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

    <aside class="w-64 bg-emerald-500 text-white flex flex-col p-6 hidden md:flex">
        <div class="text-2xl font-bold mb-10 flex items-center justify-center gap-2">
            <span class="text-white ">AthenaScrum</span>
        </div>

        <nav class="flex-1 space-y-4">
            <a href="dashboard.php" class="flex items-center gap-4 px-4 py-2 bg-white text-emerald-500 rounded-lg font-semibold shadow-sm"
            >
                <i class="fas fa-chart-pie w-5 text-center"></i> Dashboard
            </a>

            <a href="projets.php" class="flex items-center gap-4 px-4 py-2 hover:bg-white/10 rounded-lg transition">
                <i class="fas fa-project-diagram w-5 text-center"></i> Projet
            </a>

            <a href="sprints.php" class="flex items-center gap-4 px-4 py-2 hover:bg-white/10 rounded-lg transition" >
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
    </aside>

    <main class="flex-1 flex flex-col overflow-hidden bg-white md:m-4 md:rounded-3xl shadow-xl">

        <header class="flex items-center justify-between px-8 py-6 border-b border-gray-100">
            <h1 class="text-gray-400 text-xl font-medium tracking-wide">Dashboard</h1>

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

        <!-- <section class="flex-1 overflow-y-auto p-8 space-y-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-[#e9eceb] p-6 rounded-2xl relative overflow-hidden">
                    <div class="flex justify-between items-start">
                        <h3 class="text-gray-500 font-medium">Sales</h3>
                        <div class="bg-white p-2 rounded-lg text-emerald-500"><i class="fas fa-chart-line"></i></div>
                    </div>
                    <div class="mt-4">
                        <p class="text-3xl font-bold text-gray-800">67343</p>
                        <p class="text-xs text-emerald-500 mt-1 flex items-center gap-1">
                            <i class="fas fa-arrow-up text-[8px]"></i> 5.674% <span class="text-gray-400">Since Last Months</span>
                        </p>
                    </div>
                </div>

                <div class="bg-[#e9eceb] p-6 rounded-2xl">
                    <div class="flex justify-between items-start">
                        <h3 class="text-gray-500 font-medium">Purchases</h3>
                        <div class="bg-white p-2 rounded-lg text-gray-400"><i class="fas fa-circle-notch"></i></div>
                    </div>
                    <div class="mt-4">
                        <p class="text-3xl font-bold text-gray-800">2343</p>
                        <p class="text-xs text-red-500 mt-1 flex items-center gap-1">
                            <i class="fas fa-arrow-down text-[8px]"></i> 5.64% <span class="text-gray-400">Since Last Months</span>
                        </p>
                    </div>
                </div>

                <div class="bg-[#e9eceb] p-6 rounded-2xl">
                    <div class="flex justify-between items-start">
                        <h3 class="text-gray-500 font-medium">Orders</h3>
                        <div class="bg-white p-2 rounded-lg text-gray-400"><i class="fas fa-shopping-bag"></i></div>
                    </div>
                    <div class="mt-4">
                        <p class="text-3xl font-bold text-gray-800">35343</p>
                        <p class="text-xs text-emerald-500 mt-1 flex items-center gap-1">
                            <i class="fas fa-arrow-up text-[8px]"></i> 5.674% <span class="text-gray-400">Since Last Months</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pb-8">
                <div class="bg-[#e9eceb] p-6 rounded-2xl">
                    <h3 class="text-gray-400 font-medium mb-4">Overview</h3>
                    <div class="space-y-3">
                        <div class="bg-emerald-500 text-white p-3 rounded-lg flex justify-between text-xs">
                            <span>Member Profit <br><small class="opacity-70">Last Months</small></span>
                            <span class="font-bold flex items-center">+2343</span>
                        </div>
                        <?php for ($i = 0; $i < 3; $i++): ?>
                            <div class="p-3 border-b border-gray-200 flex justify-between text-xs text-gray-500">
                                <span>Member Profit <br><small class="opacity-70">Last Months</small></span>
                                <span class="font-bold flex items-center">+2343</span>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>

                <div class="bg-[#e9eceb] p-6 rounded-2xl text-center flex flex-col items-center">
                    <div class="w-full flex justify-between items-center mb-4">
                        <h3 class="text-gray-400 font-medium">Total Sale</h3>
                        <span class="bg-emerald-500 text-white text-[10px] px-3 py-1 rounded">View All</span>
                    </div>
                    <div class="relative w-32 h-32 flex items-center justify-center mt-4">
                        <svg class="w-full h-full transform -rotate-90">
                            <circle cx="64" cy="64" r="50" stroke="white" stroke-width="8" fill="transparent" />
                            <circle cx="64" cy="64" r="50" stroke="#3d9970" stroke-width="8" fill="transparent"
                                stroke-dasharray="314" stroke-dashoffset="94" stroke-linecap="round" />
                        </svg>
                        <span class="absolute text-2xl font-bold text-gray-700">70%</span>
                    </div>
                </div>

                <div class="bg-[#e9eceb] p-6 rounded-2xl">
                    <div class="w-full flex justify-between items-center mb-6">
                        <h3 class="text-gray-400 font-medium">Activity</h3>
                        <span class="bg-emerald-500 text-white text-[10px] px-3 py-1 rounded">View All</span>
                    </div>
                    <div class="space-y-4">
                        <div class="flex gap-3 text-[10px] leading-tight">
                            <div class="w-2 h-2 rounded-full bg-orange-400 shrink-0 mt-1"></div>
                            <p class="text-gray-500">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                        <div class="flex gap-3 text-[10px] leading-tight">
                            <div class="w-2 h-2 rounded-full bg-red-500 shrink-0 mt-1"></div>
                            <p class="text-gray-500">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                        <div class="flex gap-3 text-[10px] leading-tight">
                            <div class="w-2 h-2 rounded-full bg-emerald-500 shrink-0 mt-1"></div>
                            <p class="text-gray-500">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                    </div>
                </div>
            </div>

        </section> -->
    </main>

</body>

</html>
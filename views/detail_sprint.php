<?php

$idSprint = $_GET['id'];
$sprintRepo = new SprintRepository();
$tacheRepo = new TacheRepository();

$sprint = $sprintRepo->findById($idSprint); 
$taches = $tacheRepo->getBySprint($idSprint);
?>

<main class="flex-1 flex flex-col overflow-hidden bg-white md:m-4 md:rounded-3xl shadow-xl">
    <header class="flex items-center justify-between px-8 py-6 border-b">
        <div>
            <h1 class="text-gray-400 text-sm">Projet / Sprint</h1>
            <h2 class="text-2xl font-bold text-gray-800"><?= htmlspecialchars($sprint['titre']) ?></h2>
        </div>
        <button onclick="window.location.href='create_tache.php?id_sprint=<?= $idSprint ?>'" 
                class="bg-blue-600 text-white px-5 py-2 rounded-xl font-bold flex items-center gap-2 hover:bg-blue-700 transition">
            <i class="fas fa-plus"></i> Ajouter une Tâche
        </button>
    </header>

    <section class="flex-1 overflow-y-auto p-8">
        <div class="grid grid-cols-1 gap-4">
            <h3 class="text-lg font-bold text-gray-700 mb-2">Backlog des tâches</h3>
            
            <?php if(empty($taches)): ?>
                <div class="bg-gray-50 border-2 border-dashed border-gray-200 rounded-3xl p-10 text-center text-gray-400">
                    Aucune tâche n'a été ajoutée à ce sprint.
                </div>
            <?php else: ?>
                <?php foreach($taches as $t): ?>
                <div class="bg-white border border-gray-100 p-6 rounded-2xl shadow-sm hover:shadow-md transition flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800"><?= htmlspecialchars($t['titre']) ?></h4>
                            <p class="text-sm text-gray-500"><?= htmlspecialchars($t['description']) ?></p>
                        </div>
                    </div>
                    <span class="px-3 py-1 text-[10px] font-black uppercase rounded-full bg-gray-100 text-gray-500">
                        <?= $t['statut'] ?>
                    </span>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
</main>
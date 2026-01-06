<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Sign Up</title>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">

    <div class="bg-white rounded-3xl shadow-2xl flex flex-col md:flex-row w-full max-w-4xl overflow-hidden">
        
        <div class="hidden md:flex w-2/5 bg-emerald-500 p-12 text-white flex-col items-center justify-center text-center">
            <h2 class="text-4xl font-bold mb-4">Welcome Back!</h2>
            <div class="w-12 h-1 bg-white mx-auto mb-6 opacity-50"></div>
            <p class="mb-10 text-emerald-50 font-light">To keep connected with us please login with your personal info.</p>
            <a href="../index.php" class="border-2 border-white text-white font-bold py-3 px-12 rounded-full hover:bg-white hover:text-emerald-500 transition-all">
                Sign In
            </a>
        </div>

        <div class="w-full md:w-3/5 p-8 md:p-12 text-center">
            <h2 class="text-2xl font-bold text-emerald-500 mb-2">Create Account</h2>
            <div class="w-12 h-1 bg-emerald-500 mx-auto mb-8"></div>

            <form method="POST" action="../index.php" class="space-y-4">
                <input type="text" name="nom" placeholder="Nom complet" required 
                       class="w-full bg-gray-100 border-none rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-emerald-500 text-gray-700">
                
                <input type="email" name="email" placeholder="Email" required 
                       class="w-full bg-gray-100 border-none rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-emerald-500 text-gray-700">
                
                <input type="password" name="password" placeholder="Mot de passe" required 
                       class="w-full bg-gray-100 border-none rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-emerald-500 text-gray-700">

                <div class="relative text-left">
                    <label class="text-xs text-gray-400 ml-1">Sélectionnez votre rôle</label>
                    <select name="role" class="w-full bg-gray-100 border-none rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-emerald-500 text-gray-600 appearance-none">
                        <option value="MEMBRE">Membre</option>
                        <option value="CHEF_PROJET">Chef Projet</option>
                        <option value="ADMiN">Admin</option>
                    </select>
                </div>

                <button name="signup" type="submit" class="w-48 bg-emerald-500 text-white font-bold py-3 rounded-full mt-6 hover:bg-emerald-600 transition shadow-lg uppercase tracking-wider">
                    Sign Up
                </button>
            </form>
        </div>
    </div>

</body>
</html>
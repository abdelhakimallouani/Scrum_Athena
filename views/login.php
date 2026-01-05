<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Login</title>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">

    <div class="bg-white rounded-3xl shadow-2xl flex flex-col md:flex-row w-full max-w-4xl overflow-hidden">

        <div class="w-full md:w-3/5 p-8 md:p-12 text-center">
            <div class="text-emerald-500 font-bold text-left mb-8 text-4xl flex justify-center">Athna Srum</div>

            <h2 class="text-2xl font-bold text-emerald-500 mb-2">Sign in to Account</h2>
            <div class="w-12 h-1 bg-emerald-500 mx-auto mb-6"></div>

            <?php if (isset($error)) echo "<p class='text-red-500 mb-4 text-sm font-semibold'>$error</p>"; ?>
            <?php if (isset($success)) echo "<p class='text-emerald-500 mb-4 text-sm font-semibold'>$success</p>"; ?>

            <form method="POST" class="space-y-4">
                <div class="relative text-left">
                    <input type="email" name="email" placeholder="example@mail.com" required
                        class="w-full border-2 border-emerald-400 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-emerald-200">
                </div>

                <div class="relative text-left">

                    <input type="password" name="password" placeholder="password" required
                        class="w-full border-2 border-emerald-400 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-emerald-200">
                </div>

                <div class="flex items-center justify-between text-sm py-2 text-gray-500">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" class="mr-2 accent-emerald-500"> Remember me
                    </label>
                    <a href="#" class="font-semibold text-gray-800 hover:underline">Forgot Password?</a>
                </div>

                <button name="login" type="submit" class="w-48 bg-emerald-500 text-white font-bold py-3 rounded-full mt-4 hover:bg-emerald-600 transition shadow-lg uppercase tracking-wider">
                    Login
                </button>
            </form>

            <div class="mt-12 flex justify-center gap-4 text-xs text-gray-400">
                <a href="#">Privacy Policy</a> <span>•</span> <a href="#">Terms & Conditions</a>
            </div>
        </div>

        <div class="hidden md:flex w-2/5 bg-emerald-500 p-12 text-white flex-col items-center justify-center text-center">
            <h2 class="text-4xl font-bold mb-4">Hello, Friend!</h2>
            <div class="w-12 h-1 bg-white mx-auto mb-6 opacity-50"></div>
            <p class="mb-10 text-emerald-50 font-light">Enter your personal details and start your journey with us.</p>

            <a href="views/signup.php" class="border-2 border-white text-white font-bold py-3 px-12 rounded-full hover:bg-white hover:text-emerald-500 transition-all">
                Sign Up
            </a>
        </div>
    </div>
</body>

</html>
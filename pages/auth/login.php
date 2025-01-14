<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Youdemy - Login</title>
</head>
<body>
    <div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 flex items-center">
        <div class="max-w-lg  w-full mx-auto">
            <div class="bg-white rounded-xl shadow-md p-8 w-full max-w-lg mx-auto">
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-bold text-red-600 mb-2">Welcome Back!</h2>
                    <p class="text-gray-600">Login to continue your learning journey</p>
                </div>
                <form action="" method="POST" class="space-y-6">
                      <!-- Email --------------------------------------------------------------------------------------- -->
                    <div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                            </div>
                            <input
                                type="email"
                                name="email"
                                required
                                class="pl-10 w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-1 focus:ring-red-500 focus:outline-none"
                                placeholder="Email address"
                            >
                        </div>
                    </div>
                    <!-- Password --------------------------------------------------------------------------------------- -->
                    <div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input
                                type="password"
                                name="password"
                                required
                                class="pl-10 w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-1 focus:ring-red-500 focus:outline-none"
                                placeholder="Password"
                            >
                        </div>
                    </div>
                    <button
                        type="submit"
                        name="login"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                    >
                        Login In
                    </button>
                </form>
                <div class="text-center mt-6">
                    <p class="text-sm text-gray-600">
                        Don't have an account?
                        <a href="./signup.php" class="font-medium text-red-600 hover:text-red-500">
                            Sign up
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
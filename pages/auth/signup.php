<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/styles.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Youdemy - Sign Up</title>
</head>
<body>

  <div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 flex items-center">
    <div class="max-w-lg w-full mx-auto">
        <div class="bg-white rounded-xl shadow-md p-8 w-full max-w-lg mx-auto">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-red-600 mb-2">Create your account</h2>
                <p class="text-gray-600">Join our learning community today</p>
            </div>
            <form action="" method="POST" class="space-y-6">
                <!-- username ---------------------------------------------------------------------------------- -->
                <div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input
                            type="text"
                            name="username"
                            required
                            class="pl-10 w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-1 focus:ring-red-500 focus:outline-none"
                            placeholder="User Name"
                        >
                    </div>
                </div>
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
                            placeholder=" Email address"
                        >
                    </div>
                </div>
                <!-- Password ------------------------------------------------------------------------------------- -->
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
                <!-- Select Role ----------------------------------------------------------------------------------- -->
                <div>
                    <div class="relative mb-6">
                      <form action="" method="POST">  
                        <select name="selectRole" onchange="this.form.submit()"
                            name="role"
                            required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-1 focus:ring-red-500 focus:outline-none appearance-none bg-white cursor-pointer"
                        >
                            <option value="" disabled selected>Role</option>
                            <option value="student" >Student</option>
                            <option value="teacher">Instructor</option>
                        </select>
                        <button type="submit" style="display:none;"></button>
                      </form> 
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
                <button
                    type="submit"
                    name="signup"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                >
                    Create Account
                </button>
            </form>
            <div class="text-center mt-6">
                <p class="text-sm text-gray-600">
                    Already have an account?
                    <a href="./login.php" class="font-medium text-red-600 hover:text-red-500">
                        Log in
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
</body>
</html>

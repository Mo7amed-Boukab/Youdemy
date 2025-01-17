<?php 
      require_once  __DIR__ . "/../../controllers/signupController.php"; 
?>

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
<nav class="bg-white border-b fixed top-0 left-0 right-0  shadow-md z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
            <div class="flex justify-between h-16 items-center">
                <div>
                    <a href="../../index.php" class="flex items-center space-x-2">
                        <span class="text-2xl font-bold text-red-600">YOUDEMY</span>
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="./signup.php" class="text-red-600 px-4 py-2 rounded-md hover:text-red-700">Sign In</a>
                    <a href="./login.php" class="bg-red-600 text-white px-6 py-2 rounded-md hover:bg-red-700">Log In</a>
                </div>
            </div>
        </div>
    </nav>

  <div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 flex items-center">
    <div class="max-w-lg w-full mx-auto">
        <div class="bg-white rounded-xl shadow-md p-8 w-full max-w-lg mx-auto">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-red-600 mb-2">Create your account</h2>
                <p class="text-gray-600">Join our learning community today</p>
                <p class="text-center text-red-600">
                    <?php echo isset($error) ? htmlspecialchars($error) : ''; ?>
                </p>

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
                        <select 
                            name="role"
                            required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-1 focus:ring-red-500 focus:outline-none appearance-none bg-white cursor-pointer"
                        >
                            <option value="" disabled selected>Role</option>
                            <option value="student" >Student</option>
                            <option value="teacher">Teacher</option>
                        </select>
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

<!-------------------------------------------------- Footer Section ------------------------------------------------->
<footer class="bg-gray-900 text-gray-300 pt-16 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
            <div class="space-y-4">
                <div>
                    <span class="text-3xl font-bold text-red-600">YOUDEMY</span>
                </div>
                <p class="text-gray-400 text-sm">
                    Transform your life through learning. 
                    Online courses taught by experts to help you acquire new skills.
                </p>
                <!-- Social Media Links ---------------------------------------- -->
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.016 18.6h-2.472v-3.9c0-.923-.018-2.112-1.287-2.112-1.288 0-1.485 1.006-1.485 2.045v3.967H9.3v-8.016h2.376v1.09h.033c.33-.627 1.137-1.29 2.34-1.29 2.505 0 2.967 1.65 2.967 3.795v4.42zM7.362 9.583a1.434 1.434 0 110-2.868 1.434 1.434 0 010 2.868zM8.6 18.6H6.123v-8.016H8.6v8.016z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <!-- Quick Links ---------------------------------------- -->
            <div>
                <h3 class="text-white font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Home</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Courses</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Become an Instructor</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Become a Student</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Contact Us</a></li>
                </ul>
            </div>
            <!-- Popular Categories Links----------------------------------- -->
            <div>
                <h3 class="text-white font-semibold mb-4">Popular Categories</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Web Development</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">UI/UX Design</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Digital Marketing</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Data Science</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Artificial Intelligence</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-4">Newsletter</h3>
                <p class="text-gray-400 text-sm mb-4">
                    Subscribe to receive the latest news and updates.
                </p>
                <form class="space-y-3">
                    <div class="relative">
                        <input type="email" 
                               placeholder="Your email" 
                               class="w-full px-4 py-2 bg-gray-800 text-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                    </div>
                    <button type="submit" class="w-full bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition-colors">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>

        <div class="border-t border-gray-800 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div class="text-gray-400 text-sm">
                    © 2024 Youdemy. All rights reserved.
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Terms of Service</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Legal Notice</a>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>

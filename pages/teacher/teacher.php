<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Dashboard Enseignant</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <!-- Menu Button ------------------- -->
    <div class="lg:hidden fixed top-4 left-4 z-50">
        <button id="menuButton" class="bg-slate-950 p-2 rounded-lg text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

    <!-- Sidebar ------------------------ -->
    <div id="sidebar" class="fixed left-0 top-0 h-full w-64 bg-slate-950 text-white transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out z-40">
        <div class="p-4">
      <!-- Logo ------------------------- -->
            <div class="flex items-center justify-between mb-16 mt-4">
                <div class="flex items-center space-x-3">
                    <svg width="44" height="44" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 12L16 6L30 12L16 18L2 12Z" fill="#DC2626"/>
                        <path d="M8 14V22C8 22 12 25 16 25C20 25 24 22 24 22V14" stroke="#DC2626" stroke-width="2"/>
                        <path d="M16 18V25" stroke="#DC2626" stroke-width="2"/>
                        <circle cx="16" cy="12" r="3" fill="#FFFFFF"/>
                        <path d="M5 11L7 12M25 11L27 12" stroke="#EF4444" stroke-width="1.5"/>
                    </svg>
                    <span class="text-3xl font-bold text-red-600">YOUDEMY</span>
                </div>
                <button id="closeSidebar" class="lg:hidden text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        <!-- Nav links ------------------- -->
            <nav class="space-y-4">
                <a href="teacher.php" class="flex items-center space-x-3 p-3 bg-red-600 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    <span>Dashboard</span>
                </a>
                <a href="#" id="coursesButton"  class="flex items-center space-x-3 p-3 hover:bg-gray-800 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    <span>Courses</span>
                </a>
                <div class="relative group">
                    <a href="#" id="studentsButton" class="flex items-center space-x-3 p-3 hover:bg-gray-800 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        <span>Students</span>
                    </a>
                </div>
                <a href="#" id="profileButton" class="flex items-center space-x-3 p-3 hover:bg-gray-800 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span>Profile</span>
                </a>
                <a href="#" class="flex items-center space-x-3 p-3 hover:bg-gray-800 rounded-lg text-red-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    <span>Logout </span>
                </a>
            </nav>
        </div>
    </div>
<!-- ---------------------------------------------------- Header --------------------------------------------------- -->
    <div class="lg:ml-64 p-4 lg:p-8">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8 mt-16 lg:mt-0">
            <div class="mb-4 lg:mb-0">
                <h1 class="text-2xl font-bold">Tableau de bord</h1>
                <p class="text-gray-600">Bienvenue, mohamed</p>
            </div>
            <div class="flex space-x-4">
                <button id="newCourse" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    <span>Nouveau Cours</span>
                </button>
            </div>
        </div>
  <!-- ------------------------------------------------ Statistics ---------------------------------------------------- -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600">Total Students</p>
                        <h3 class="text-3xl font-bold">120</h3>
                        <p class="text-green-600 text-sm mt-1">+5 today</p>
                    </div>
                    <div class="p-3 bg-red-100 rounded-full">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
        <!-- ----------------------------------------------- -->
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600">Total Cours</p>
                        <h3 class="text-3xl font-bold">5</h3>
                        <p class="text-green-600 text-sm mt-1">+2 today</p>
                    </div>
                    <div class="p-3 bg-red-100 rounded-full">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                </div>
            </div>
        <!-- ----------------------------------------------- -->
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600">Total hours</p>
                        <h3 class="text-3xl font-bold">256</h3>
                        <p class="text-green-600 text-sm mt-1">+3 today</p>
                    </div>
                    <div class="p-3 bg-red-100 rounded-full">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
  <!-- -------------------------------------------------------------------------------------------------------------------------- -->
      <div id="last-courses-enrollements-section" class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- --------------------------------------------- Last Courses ------------------------------------------------- -->
            <div class="bg-white rounded-lg shadow-sm border p-4 lg:p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold">Recent Courses</h2>
                    <button id="seeMoreCourses" class="text-red-600 hover:text-red-700 flex items-center space-x-2">
                        <span>See More</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center space-x-4 p-4 hover:bg-gray-50 rounded-lg transition">
                        <div class="p-3 bg-red-100 rounded-lg">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold">Laravel - Formation Complète</h3>
                            <p class="text-sm text-gray-600">Added 2 hours ago</p>
                        </div>
                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm">Published</span>
                    </div>
                    <!-- --------------------------------------------------------------------------------- -->
                    <div class="flex items-center space-x-4 p-4 hover:bg-gray-50 rounded-lg transition">
                        <div class="p-3 bg-red-100 rounded-lg">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold">React JS Masterclass</h3>
                            <p class="text-sm text-gray-600">Added 1 day ago</p>
                        </div>
                        <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">Draft</span>
                    </div>
                </div>
            </div>
          <!-- --------------------------------------------- Last Enrollments ------------------------------------------------- -->
            <div class="bg-white rounded-lg shadow-sm border p-4 lg:p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold">Recent Enrollments</h2>
                    <button id="seeMoreEnroll" class="text-red-600 hover:text-red-700 flex items-center space-x-2">
                        <span>See More</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center space-x-4 p-4 hover:bg-gray-50 rounded-lg transition">
                        <div class="p-3 bg-red-100 rounded-lg">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold">Med Boukab</h3>
                            <p class="text-sm text-gray-600">Enrolled in Laravel - Formation Complète</p>
                            <p class="text-sm text-gray-500">2 hours ago</p>
                        </div>
                    </div>
                      <!-- --------------------------------------------------------------------------------- -->
                    <div class="flex items-center space-x-4 p-4 hover:bg-gray-50 rounded-lg transition">
                        <div class="p-3 bg-red-100 rounded-lg">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold">Souhail</h3>
                            <p class="text-sm text-gray-600">Enrolled in React JS Masterclass</p>
                            <p class="text-sm text-gray-500">5 hours ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  <!-- -------------------------------------------------- All Courses ------------------------------------------------------ -->
        <div id="allCourses" class="bg-white rounded-lg shadow-sm border p-4 lg:p-6 hidden">
            <div  class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-6 ">
                <h2 class="text-xl font-semibold mb-4 lg:mb-0">All Courses</h2>
                <div class="w-full lg:w-auto">
                    <div class="relative">
                        <input
                            type="text"
                            placeholder="Rechercher un cours..."
                            class="w-full lg:w-auto pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:border-red-500 focus:outline-none"
                            id="searchCourse"
                        >
                        <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto -mx-4 lg:mx-0">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-gray-600">Course Title</th>
                            <th class="px-6 py-3 text-left text-gray-600">Level</th>
                            <th class="px-6 py-3 text-left text-gray-600">Students</th>
                            <th class="hidden md:table-cell px-6 py-3 text-left text-gray-600">Duree</th>
                            <th class="px-6 py-3 text-left text-gray-600">Status</th>
                            <th class="px-6 py-3 text-left text-gray-600">Actions</th>
                        </tr>
                    </thead>
      
                    <tbody class="divide-y" id="coursesTable">
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">Laravel - Formation Complète</td>
                            <td class="px-6 py-4">Advanced</td>
                            <td class="px-6 py-4">120</td>
                            <td class="px-6 py-4">2h 30min</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                                Published
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-3">
                                    <button class="text-blue-600 hover:text-blue-800">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                        </svg>
                                    </button>
                                    <button class="text-red-600 hover:text-red-800">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
<!-- ----------------------------------------------- Students List --------------------------------------------------- -->
        <div id="studentsList" class="bg-white rounded-lg shadow-sm border p-4 lg:p-6 hidden">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-6">
                <h2 class="text-xl font-semibold mb-4 lg:mb-0">Students List</h2>
                <div class="w-full lg:w-auto flex flex-col sm:flex-row gap-4">
                    <select class="w-full sm:w-auto pl-4 pr-8 py-2 border border-gray-300 rounded-md focus:border-red-500 focus:outline-none">
                        <option value="">All courses</option>
                        <option value="1">Laravel - The Complete Course</option>
                        <option value="2">React JS Masterclass</option>
                    </select>
                </div>
            </div>

            <div class="overflow-x-auto -mx-4 lg:mx-0">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-gray-600">Student Name</th>
                            <th class="hidden sm:table-cell px-6 py-3 text-left text-gray-600">Email</th>
                            <th class="px-6 py-3 text-left text-gray-600">Course Enrolled</th>
                            <th class="hidden md:table-cell px-6 py-3 text-left text-gray-600">Enrollement Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">Med Boukab</td>
                            <td class="hidden sm:table-cell px-6 py-4">mohamedbk@gmail.com</td>  
                            <td class="px-6 py-4">Laravel - The Complete Course</td>
                            <td class="hidden md:table-cell px-6 py-4">15 Jan 2025</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">souhail</td>
                            <td class="hidden sm:table-cell px-6 py-4">souhail@gmail.com</td>  
                            <td class="px-6 py-4">Laravel - The Complete Course</td>
                            <td class="hidden md:table-cell px-6 py-4">15 Jan 2025</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">merouan</td>
                            <td class="hidden sm:table-cell px-6 py-4">merouan@gmail.com</td>  
                            <td class="px-6 py-4">Laravel - The Complete Course</td>
                            <td class="hidden md:table-cell px-6 py-4">15 Jan 2025</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  <!-- ------------------------------------------- Add Course Modal -------------------------------------------------- -->
      <div id="addCourseModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
      <div class="bg-white rounded-lg w-full max-w-3xl mx-4 max-h-[90vh] overflow-y-auto custom-scrollbar">
            <div class="flex justify-between items-center p-6 border-b">
                <h3 class="text-xl font-semibold">Add new course</h3>
                <button id="closeModal" class="text-gray-600 hover:text-gray-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <form class="p-6">
                <div class="mb-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                              Title
                            </label>
                            <input 
                                type="text" 
                                required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                              Description
                            </label>
                            <input 
                                type="text" 
                                required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                            >
                        </div>
                      
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                              Content 
                            </label>
                            <textarea 
                                required
                                rows="4" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500" -->
                            </textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                              Video URL
                            </label>
                            <input 
                                type="text" 
                                required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                            >
                        </div>
                    </div>
                </div>
                <div class="mb-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Catégorie
                            </label>
                            <select required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
                                <option value="web">Web Development</option>
                                <option value="mobile">Cyber Security</option>
                                <option value="data">Data Science</option>
                                <option value="design">Design</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Tags
                            </label>
                            <input 
                                type="text" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                            >
                        </div>
                    </div>
                </div>
                <div class="mb-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Duration
                            </label>
                            <input 
                                type="number" 
                                required
                                min="1"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Level
                            </label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
                                <option value="beginner">Beginner</option>
                                <option value="intermediate">Intermediate</option>
                                <option value="advanced">Advanced</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end space-x-4">
                    <button 
                        type="button"
                        id="cancelButton"
                        class="px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-50"
                    >
                        Save Draft
                    </button>
                    <button 
                        type="submit"
                        class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700"
                    >
                        Publish Course
                    </button>
                </div>
            </form>
        </div>
    </div>


    <script>

      const menuButton = document.getElementById('menuButton');
      const closeSidebarButton = document.getElementById('closeSidebar');
      const sidebar = document.getElementById('sidebar');
      const menuButtonContainer = menuButton.parentElement; 

      menuButton.addEventListener('click', () => {
          sidebar.classList.remove('-translate-x-full');
          menuButtonContainer.classList.add('hidden');
      });

      closeSidebarButton.addEventListener('click', () => {
          sidebar.classList.add('-translate-x-full');
          menuButtonContainer.classList.remove('hidden'); 
      });

      window.addEventListener('resize', () => {
          if (window.innerWidth >= 1024) { 
              menuButtonContainer.classList.add('hidden');
          } else if (sidebar.classList.contains('-translate-x-full')) {
              menuButtonContainer.classList.remove('hidden');
          }
      });
        // --------------------------------------------------------------------
        const addCourseButton = document.getElementById('newCourse');
        const modal = document.getElementById('addCourseModal');
        const closeModal = document.getElementById('closeModal');
        const cancelButton = document.getElementById('cancelButton');

        function openModal() {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function hideModal() {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        addCourseButton.addEventListener('click', openModal);
        closeModal.addEventListener('click', hideModal);
        cancelButton.addEventListener('click', hideModal);

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                hideModal();
            }
        });
        // --------------------------------------------------------------------
        const coursesButton = document.getElementById('coursesButton');
        const allCourses = document.getElementById('allCourses');
        const studentsButton = document.getElementById('studentsButton');
        const studentsList = document.getElementById('studentsList');
        const lastCrsEnroll = document.getElementById('last-courses-enrollements-section');
        const seeMoreEnroll = document.getElementById('seeMoreEnroll');
        const seeMoreCourses = document.getElementById('seeMoreCourses');

        coursesButton.addEventListener('click', () => {
          allCourses.style.display = 'block';
          studentsList.style.display = 'none';
          lastCrsEnroll.style.display = 'none';
        });

        studentsButton.addEventListener('click', () => {
          allCourses.style.display = 'none';
          studentsList.style.display = 'block';
          lastCrsEnroll.style.display = 'none';
        });
        seeMoreCourses.addEventListener('click', () => {
          allCourses.style.display = 'block';
          studentsList.style.display = 'none';
          lastCrsEnroll.style.display = 'none';
        });
        seeMoreEnroll.addEventListener('click', () => {
          allCourses.style.display = 'none';
          studentsList.style.display = 'block';
          lastCrsEnroll.style.display = 'none';
        });

        

    </script>
</body>
</html>

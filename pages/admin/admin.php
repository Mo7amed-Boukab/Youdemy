<?php 
    session_start();
    $admin_id = $_SESSION['admin_id'];
    $admin_name = $_SESSION['admin_name'];

    require_once "../../config/conn.php";


    $db = new Database();
    $conn = $db->connect();
    require_once "./../../models/user.php";
    $users = new User($conn);
    $getLastUsers = $users->getLastUsers();
    $getLastTeachers = $users->getLastTeachers();
    $getTeachers = $users->getAllTeachers();
    $getAllUsers = $users->getAllUsers();
    
    require_once "../../controllers/adminController.php";
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Admin Dashboard</title>
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
                <a href="admin.php" class="flex items-center space-x-3 p-3 bg-red-600 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span>Dashboard</span>
                </a>
                <a href="#" id="usersManagement" class="flex items-center space-x-3 p-3 hover:bg-gray-800 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <span>Users Management</span>
                </a>
                <a href="#" id="courseManagement" class="flex items-center space-x-3 p-3 hover:bg-gray-800 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    <span>Courses</span>
                </a>
                <a href="#" class="flex items-center space-x-3 p-3 hover:bg-gray-800 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                    <span>Categories & Tags</span>
                </a>
                <a href="#" id="teacherValidation" class="flex items-center space-x-3 p-3 hover:bg-gray-800 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>Teachers Validation</span>
                </a>
                <a href="#" class="flex items-center space-x-3 p-3 hover:bg-gray-800 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    <span>Statistics</span>
                </a>
                <a href="./../auth/logout.php" class="flex items-center space-x-3 p-3 hover:bg-gray-800 rounded-lg text-red-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    <span>Logout</span>
                </a>
            </nav>
        </div>
    </div>

<!-- ------------------------------------------------------- Main Content --------------------------------------------------- -->
    <div class="lg:ml-64 p-4 lg:p-8">
      <!-- ---------------------------------------------------- Header --------------------------------------------------- -->
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8 mt-16 lg:mt-0">
            <div class="mb-4 lg:mb-0">
                <h1 class="text-2xl font-bold">Admin Dashboard</h1>
                <p class="text-gray-600">Welcome back, <?php echo $admin_name; ?></p>
            </div>
            <div class="flex space-x-4">
                <button class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>Add Category</span>
                </button>
                <button class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                    <span>Add Tags</span>
                </button>
            </div>
        </div>

    <!-- ------------------------------------------------ Statistics Cards ---------------------------------------------------- -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600">Total Users</p>
                        <h3 class="text-3xl font-bold">3</h3>
                        <p class="text-green-600 text-sm mt-1">+2 today</p>
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
                        <p class="text-gray-600">Total Courses</p>
                        <h3 class="text-3xl font-bold">5</h3>
                        <p class="text-green-600 text-sm mt-1">+3 today</p>
                    </div>
                    <div class="p-3 bg-red-100 rounded-full">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"/>
                        </svg>
                    </div>
                </div>
            </div>
          <!-- ----------------------------------------------- -->
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600">Pending Teachers</p>
                        <h3 class="text-3xl font-bold">2</h3>
                        <p class="text-yellow-600 text-sm mt-1">Needs review</p>
                    </div>
                    <div class="p-3 bg-red-100 rounded-full">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
          <!-- ----------------------------------------------- -->
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <div class="flex items-center justify-between">
                <div>
                        <p class="text-gray-600">Categories</p>
                        <h3 class="text-3xl font-bold">8</h3>
                        <p class="text-blue-600 text-sm mt-1">4 main categories</p>
                    </div>
                    <div class="p-3 bg-red-100 rounded-full">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
  <!-- -------------------------------------------------------------------------------------------------------------------------- -->
        <div  class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
          <!-- ------------------------------------------------------------------------------------------ Teacher Validation ---- -->
            <div id="seeAllTeachers-section" class="bg-white p-6 rounded-lg shadow-sm border">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Teachers Validation</h3>
                    <button id="seeAllTeachers" class="text-sm text-red-600 hover:text-red-800">View All</button>
                </div>
                <div class="space-y-4">
                        <?php foreach ($getLastTeachers as $teacher) : ?>
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                        
                                <span class="text-red-600 font-semibold"><?php echo $teacher['name'][0] . $teacher['name'][1] ?></span>
                            </div>
                            <div>
                                <p class="font-medium"> <?php echo $teacher['name'] ?> </p>
                                <div class="text-sm text-gray-500"><?php echo $teacher['email'] ?></div>
                            </div>
                      
                        </div>
                        <div class="flex space-x-2 flex items-center justify-end flex-wrap">
                        <?php if($teacher['status'] != 'rejected'): ?>
                          <form action="" method="post">
                            <input type="hidden" name="teacher_id" value="<?php echo $teacher['id'] ?>">
                            <button type="submit" name="approve_teacher" class="text-green-600 hover:text-green-900 mr-3 text-sm sm:text-base px-2 py-1 sm:px-3 sm:py-2">  <?php echo ($teacher['status'] === 'active')?  "Approved" : "Approve"; ?> </button>
                        </form>
                        <?php endif; ?>
                        <?php if($teacher['status'] != 'active'): ?>
                          <form action="" method="post">
                            <input type="hidden" name="teacher_id" value="<?php echo $teacher['id'] ?>">
                            <button type="submit" name="reject_teacher" class="text-red-600 hover:text-red-900 mr-3 text-sm sm:text-base px-2 py-1 sm:px-3 sm:py-2"><?php echo ($teacher['status'] === 'pending')?  "Reject" : "Rejected"; ?></button>
                        </form>
                        <?php endif; ?>
                        <?php if($teacher['status'] != 'pending'): ?>
                          <form action="" method="post">
                            <input type="hidden" name="teacher_id" value="<?php echo $teacher['id'] ?>">
                            <button type="submit" name="restart_status" class="text-blue-600 hover:text-blue-900 mr-3 text-sm sm:text-base px-2 py-1 sm:px-3 sm:py-2">Restart</button>
                        </form>
                        <?php endif; ?>
                        </div>
                    </div>
                    <?php  endforeach; ?>
                  </div>
            </div>
        <!-- ------------------------------------------------------------------------------------------ Users Management ---- -->
            <div id="seeAllUsers-section" class="bg-white p-6 rounded-lg shadow-sm border">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">User Management</h3>
                    <button id="seeAllUsers" class="text-sm text-red-600 hover:text-red-800">View All</button>
                </div>
                <?php foreach ($getLastUsers as $user) : if ($user['role'] != 'admin') : ?>
                <div class="space-y-4 mb-4 ">
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                                <span class="text-red-600 font-semibold"><?php echo $user['name'][0] . $user['name'][1] ?></span>
                            </div>
                            <div>
                                <p class="font-medium"><?php echo $user['name'] ?></p>
                                <p class="text-sm text-gray-500"><?php echo $user['role'] ?></p>
                            </div>
                        </div>
                        <div class="flex items-center justify-end flex-wrap">
                        <?php if($user['status'] != 'suspended'): ?> 
                          <form action="" method="post">
                            <input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
                            <button type="submit" name="suspend_user" class="text-blue-600 hover:text-blue-900 mr-3 text-sm sm:text-base px-2 py-1 sm:px-3 sm:py-2">Suspend</button>
                          </form>
                        <?php endif; ?>
                        <?php if($user['status'] === 'suspended'): ?> 
                          <form action="" method="post">
                            <input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
                            <button type="submit" name="restart_user" class="text-blue-600 hover:text-blue-900 mr-3 text-sm sm:text-base px-2 py-1 sm:px-3 sm:py-2"> Restart </button>
                          </form>
                        <?php endif; ?>
                        <form action="" method="post">
                            <input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
                            <button type="submit" name="delete_user" class="text-red-600 hover:text-red-900 text-sm sm:text-base px-2 py-1 sm:px-3 sm:py-2">Delete</button>
                        </form>
                        </div>
                    </div>
                </div>
                <?php endif; endforeach; ?>
            </div>
        </div>
  <!-- ------------------------------------------------------------------------------------------------------------------------------ -->
        <div class="grid grid-cols-1 gap-8 mb-8">
        <!-- ---------------------------------------------- List of All Teachers -------------------------------------------------- -->
            <div id="listAllTeachers" class="bg-white p-6 rounded-lg shadow-sm border hidden">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Teachers Validation</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Appied Date</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <?php foreach ($getTeachers as $teacher) : ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                                            <span class="text-red-600 font-semibold"><?php echo $teacher['name'][0] . $teacher['name'][1] ?></span>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900"><?php echo $teacher['name'] ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500"><?php echo $teacher['email'] ?></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo date('Y-m-d', strtotime($teacher['created_at'])); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    <?php echo $teacher['status'] ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end">
                                      <?php if($teacher['status'] != 'rejected'): ?>
                                        <form action="" method="post">
                                          <input type="hidden" name="teacher_id" value="<?php echo $teacher['id'] ?>">
                                          <button type="submit" name="approve_teacher" class="text-green-600 hover:text-green-900 mr-3 text-sm sm:text-base px-2 py-1 sm:px-3 sm:py-2">  <?php echo ($teacher['status'] === 'active')?  "Approved" : "Approve"; ?> </button>
                                        </form>
                                      <?php endif; ?>
                                      <?php if($teacher['status'] != 'active'): ?>
                                        <form action="" method="post">
                                          <input type="hidden" name="teacher_id" value="<?php echo $teacher['id'] ?>">
                                          <button type="submit" name="reject_teacher" class="text-red-600 hover:text-red-900 mr-3 text-sm sm:text-base px-2 py-1 sm:px-3 sm:py-2"><?php echo ($teacher['status'] === 'pending')?  "Reject" : "Rejected"; ?></button>
                                        </form>
                                      <?php endif; ?>
                                      <?php if($teacher['status'] === 'active' || $teacher['status'] === 'rejected'): ?>
                                        <form action="" method="post">
                                          <input type="hidden" name="teacher_id" value="<?php echo $teacher['id'] ?>">
                                          <button type="submit" name="restart_status" class="text-blue-600 hover:text-blue-900 mr-3 text-sm sm:text-base px-2 py-1 sm:px-3 sm:py-2">Restart</button>
                                        </form>
                                      <?php endif; ?>
                                </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

              <!-- --------------------------------------------- List of All Users -------------------------------------------------- -->
            <div id="listAllUsers" class="bg-white p-6 rounded-lg shadow-sm border hidden">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">User Management</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Join Date</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <?php foreach ($getAllUsers as $user) : if ($user['role'] != 'admin') : ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                                            <span class="text-red-600 font-semibold"><?php echo $user['name'][0] . $user['name'][1] ?></span>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900"><?php echo $user['name'] ?></div>
                                            <div class="text-sm text-gray-500"><?php echo $user['email'] ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                     <?php echo $user['role'] ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo date('Y-m-d', strtotime($user['created_at'])); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    <?php echo $user['status'] ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end">
                                    <?php if($user['status'] != 'suspended'): ?> 
                                      <form action="" method="post">
                                        <input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
                                        <button type="submit" name="suspend_user" class="text-blue-600 hover:text-blue-900 mr-3 text-sm sm:text-base px-2 py-1 sm:px-3 sm:py-2">Suspend</button>
                                      </form>
                                    <?php endif; ?>
                                    <?php if($user['status'] === 'suspended'): ?> 
                                      <form action="" method="post">
                                        <input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
                                        <button type="submit" name="restart_user" class="text-blue-600 hover:text-blue-900 mr-3 text-sm sm:text-base px-2 py-1 sm:px-3 sm:py-2"> Restart </button>
                                      </form>
                                    <?php endif; ?>
                                        <form action="" method="post">
                                            <input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
                                            <button type="submit" name="delete_user" class="text-red-600 hover:text-red-900 text-sm sm:text-base px-2 py-1 sm:px-3 sm:py-2">Delete</button>
                                        </form>
                                </div>
                                </td>
                            </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
              
        </div>

<script>
  
            const menuButton = document.getElementById('menuButton');
            const closeSidebar = document.getElementById('closeSidebar');
            const sidebar = document.getElementById('sidebar');

            menuButton.addEventListener('click', () => {
                sidebar.classList.remove('-translate-x-full');
            });

            closeSidebar.addEventListener('click', () => {
                sidebar.classList.add('-translate-x-full');
            });
            const seeAllTeachersBtn = document.getElementById('seeAllTeachers');
            const listAllTeachers = document.getElementById('listAllTeachers');
            const seeAllUsersBtn = document.getElementById('seeAllUsers');
            const listAllUsers = document.getElementById('listAllUsers');
            const seeAllTeachers_section = document.getElementById('seeAllTeachers-section');
            const seeAllUsers_section = document.getElementById('seeAllUsers-section');
            const usersManagement = document.getElementById('usersManagement');
            const teacherValidation = document.getElementById('teacherValidation');

            seeAllTeachersBtn.addEventListener('click', () => {
                seeAllTeachers_section.style.display = 'none';
                seeAllUsers_section.style.display = 'none';
                listAllTeachers.style.display = 'block';
                listAllUsers.style.display = 'none';
            });

            seeAllUsersBtn.addEventListener('click', () => {
                seeAllTeachers_section.style.display = 'none';
                seeAllUsers_section.style.display = 'none';
                listAllTeachers.style.display = 'none';
                listAllUsers.style.display = 'block';
            });

            usersManagement.addEventListener('click', () => {
                seeAllTeachers_section.style.display = 'none';
                seeAllUsers_section.style.display = 'none';
                listAllTeachers.style.display = 'none';
                listAllUsers.style.display = 'block';
            });

            teacherValidation.addEventListener('click', () => {
              seeAllTeachers_section.style.display = 'none';
                seeAllUsers_section.style.display = 'none';
                listAllUsers.style.display = 'none';
                listAllTeachers.style.display = 'block';
          
            });          
</script>

</body>
</html>
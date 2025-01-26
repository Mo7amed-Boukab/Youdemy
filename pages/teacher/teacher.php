<?php 
    session_start();
    $teacher_id = $_SESSION['teacher_id'];
    $teacher_name = $_SESSION['teacher_name'];

    if(!isset($_SESSION['teacher_id']) && !isset($_SESSION['teacher_name'])){
       header('Location: ../auth/login.php');
       exit;
    }
  
    require_once "../../config/conn.php";
    $db = new Database();
    $conn = $db->connect();

    require_once "../../models/teacher.php";
    require_once "./../../models/admin.php";
    require_once "../../models/courses.php";
    require_once "../../controllers/teacherController.php";

    $teacher = new Teacher($conn);
    $allCourses = $teacher->getAllCourses($teacher_id);
    $lastCourses = $teacher->getLastCourses($teacher_id);
    $enrollments = $teacher->getEnrollments($teacher_id);
    $lastEnrollments = $teacher->getLastEnrollments($teacher_id);
    $totalStudents = $teacher->totalStudents($teacher_id);
    $totalCourses = $teacher->totalCourses($teacher_id);
    $totalCategories = $teacher->totalCategories($teacher_id);
  
    $getData = new Admin($conn);
    $allTags = $getData->getallTags();
    $allCategories = $getData->getAllCategories();
  
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Teacher Dashboard </title>
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
                <a href="./../auth/logout.php" class="flex items-center space-x-3 p-3 hover:bg-gray-800 rounded-lg text-red-500">
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
                <h1 class="text-2xl font-bold">Teacher Dashboard</h1>
                <p class="text-gray-600">Bienvenue, <?php echo $teacher_name; ?></p>
            </div>
            <div class="flex space-x-4">
                <button id="newCourse" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    <span>Add Course</span>
                </button>
            </div>
        </div>
  <!-- ------------------------------------------------ Statistics ---------------------------------------------------- -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600">Total Students</p>
                        <h3 class="text-3xl font-bold"><?php if($totalStudents): echo $totalStudents['total_students']; endif; ?></h3>
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
                        <h3 class="text-3xl font-bold"><?php if($totalCourses): echo $totalCourses['total_courses']; endif; ?></h3>
                        <p class="text-green-600 text-sm mt -1">+2 today</p>
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
                        <p class="text-gray-600">Total Categories</p>
                        <h3 class="text-3xl font-bold"><?php if($totalCategories): echo $totalCategories['total_categories']; endif; ?></h3>
                        <p class="text-green-600 text-sm mt-1">+3 today</p>
                    </div>
                    <div class="p-3 bg-red-100 rounded-full">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"/>
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
                <?php foreach($lastCourses AS $course): ?>
                <div class="space-y-4">
              
                    <div class="flex items-center space-x-4 p-4 hover:bg-gray-50 rounded-lg transition">
                        <div class="p-3 bg-red-100 rounded-lg">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold"><?php echo $course['title']; ?></h3>
                            <p class="text-sm text-gray-600"><?php echo $course['created_at']; ?></p>
                        </div>
                      <?php if($course['status'] === 'Published'): ?>
                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm">Published</span>
                     <?php elseif($course['status'] === 'Draft'): ?>
                        <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">Draft</span>
                     <?php endif; ?>
                    </div>            
               </div>
              <?php endforeach; ?>
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

            <?php foreach($lastEnrollments AS $enroll): ?>
                <div class="space-y-4">
                    <div class="flex items-center space-x-4 p-4 hover:bg-gray-50 rounded-lg transition">
                        <div class="p-3 bg-red-100 rounded-lg">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold"><?php echo $enroll['name']; ?></h3>
                            <p class="text-sm text-gray-600"><?php echo $enroll['course_title']; ?></p>
                            <p class="text-sm text-gray-500"><?php echo $enroll['enrolled_at'] ?></p>
                        </div>
                    </div>      
                </div>
            <?php endforeach; ?>  
          
        </div>
    </div>
      <!-- ------------------------------------------ Enrollments by Course ---------------------------------------------- -->
<?php if (isset($_GET['courseId']) && isset($_GET['action']) && $_GET['action'] === 'seeEnrollments'):
    $enrollmentsCourse = $teacher->enrollmentsByCourse($_GET['courseId']); ?>

<div id="enrollmentsModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 ">
    <div class="bg-white rounded-lg w-full max-w-4xl mx-4 max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center p-6 border-b">
            <h2 class="text-xl font-semibold">Course Enrollments</h2>
            <button 
                id ="closeEnrollModal"
                class="text-gray-600 hover:text-gray-800"
            >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                      <tr>
                          <th class="px-6 py-3 text-left text-gray-600">Student Name</th>
                          <th class="hidden sm:table-cell px-6 py-3 text-left text-gray-600">Email</th>
                          <th class="hidden md:table-cell px-6 py-3 text-left text-gray-600">Enrolled At</th>
                          <th class="px-6 py-3 text-left text-gray-600">Status</th>
                      </tr>
                  </thead>
                  <tbody class="divide-y">
                        <?php if (!empty($enrollmentsCourse)): ?>
                            <?php foreach($enrollmentsCourse as $student): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4"><?php echo $student['student_name']; ?></td>
                                    <td class="hidden sm:table-cell px-6 py-4"><?php echo $student['student_email']; ?></td>
                                    <td class="hidden md:table-cell px-6 py-4">
                                        <?php echo date("d M Y", strtotime($student['enrolled_at'])); ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex px-2 py-1 text-sm rounded-full bg-blue-100 text-blue-700">
                                            <?php echo $student['status']; ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center hover:bg-gray-50">No enrollments yet</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
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
                            <th class="px-6 py-3 text-left text-gray-600">Category</th>
                            <th class="hidden md:table-cell px-6 py-3 text-left text-gray-600">Duree</th>
                            <th class="px-6 py-3 text-left text-gray-600">Status</th>
                            <th class="px-6 py-3 text-left text-gray-600">Actions</th>
                        </tr>
                    </thead>    
                    <tbody class="divide-y" id="coursesTable">
                            <?php foreach($allCourses AS $course): ?>
                              <tr class="hover:bg-gray-50">
                                  <td class="px-6 py-4"><?php echo $course['title']; ?></td>
                                  <td class="px-6 py-4"><?php echo $course['level']; ?></td>
                                  <td class="px-6 py-4"><?php echo $course['category']; ?></td>
                                  <td class="px-6 py-4"><?php echo $course['duration']; ?></td>
                                  <td class="px-6 py-4">
                                    <?php if($course['status'] == 'Published'): ?>
                                      <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                                          Published
                                      </span>
                                    <?php elseif($course['status'] == 'Draft'): ?>
                                      <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">
                                          Draft
                                      </span>
                                    <?php endif; ?>
                                  </td>
                                  <td class="px-6 py-4">
                                      <div class="flex space-x-3">
                                           
                                              <a href="./teacher.php?action=editCourse&courseId=<?php  echo $course['id'] ?>" class="text-blue-600 hover:text-blue-800">
                                                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                  </svg>
                                              </a>
                                          <form action="" method="POST">
                                              <input type="hidden" name="course_id" value="<?php  echo $course['id'] ?>">   
                                              <button type="submit" name="delete_course" class="text-red-600 hover:text-red-800">
                                                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                  </svg>
                                              </button>
                                          </form>
                         
                                              <a href="./teacher.php?action=seeEnrollments&courseId=<?php  echo $course['id'] ?>"  class="text-green-600 hover:text-green-800">
                                                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                  </svg>
                                              </a>

                                      </div>
                                  </td>
                              </tr>
                            <?php endforeach; ?>
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
                  <?php foreach($enrollments AS $enroll): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4"><?php echo $enroll['name'] ?></td>
                            <td class="hidden sm:table-cell px-6 py-4"><?php echo $enroll['email'] ?></td>  
                            <td class="px-6 py-4"><?php echo $enroll['course_title'] ?></td>
                            <td class="hidden md:table-cell px-6 py-4"><?php echo date("d M Y", strtotime($enroll['enrolled_at'])) ?></td>
                        </tr>
                <?php endforeach; ?>        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  <!-- --------------------------------------------- Add Course Modal ------------------------------------------------------ -->
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
            <form class="p-6" action="" method="POST">
                <div class="mb-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                              Title
                            </label>
                            <input 
                                type="text" 
                                name="title"
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
                                name="description"
                                required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                              Image
                            </label>
                            <input 
                                type="text" 
                                name="image_url"
                                required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Content Type
                            </label>
                                <select 
                                    id="contentType" 
                                    required 
                                    name="content_type"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                                    onchange="toggleContentInputs()"
                                >
                                    <option value="video">video</option>
                                    <option value="document">document</option>
                                </select>
                        </div>
                        <div id="videoInput" class="hidden">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Video URL
                            </label>
                            <input 
                                type="text" 
                                name="video_url"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                            >
                        </div>
                        <div id="textInput" class="hidden">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Content
                            </label>
                            <textarea 
                                name="content"
                                rows="4" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
                            </textarea>
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
                                type="time" 
                                name="duration"
                                required
                                min="1"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Level
                            </label>
                            <select name="level" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
                                <option value="beginner" selected>Beginner</option>
                                <option value="intermediate">Intermediate</option>
                                <option value="advanced">Advanced</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Catégorie
                            </label>
                            <select required name="category" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
                              <?php foreach($allCategories as $category): ?>
                                <option value="<?php echo $category['id']; ?>" selected><?php echo $category['name']; ?></option>
                              <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                    <div class="space-y-4">
                      <label class="block text-sm font-medium text-gray-700 mb-1">
                          Tags
                      </label>
                      <div class="flex flex-wrap gap-2 p-4 border border-gray-200 rounded-md bg-gray-50 max-h-48 overflow-y-auto">
                          <?php foreach($allTags as $tag): ?>
                              <label class="tag-container">
                                  <input 
                                      type="checkbox" 
                                      name="selected_tags" 
                                      value="<?php echo $tag['id']; ?>"
                                      class="hidden"
                                  >
                                  <span class="px-3 py-1 rounded-full text-sm cursor-pointer transition-colors duration-200 
                                      peer-checked:bg-red-500 peer-checked:text-white peer-checked:border-red-500
                                      bg-white border border-gray-300 hover:bg-gray-100
                                      [input:checked+&]:bg-red-500 [input:checked+&]:text-white [input:checked+&]:border-red-500">
                                      <?php echo $tag['name']; ?>
                                  </span>
                              </label>
                          <?php endforeach; ?>
                      </div>
                </div>
                <div class="flex justify-end space-x-4 mt-6">
                  <input type="hidden" name="teacher_id" value="<?php echo $teacher_id ;?>">
                    <button 
                        type="submit"
                        type="button"
                        name="save_draft"
                        class="px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-50"
                    >
                        Save Draft
                    </button>
                    <button 
                        type="submit"
                        name="publish_course"
                        class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700"
                    >
                        Publish Course
                    </button>
                </div>
            </form>
        </div>
    </div>
<!-- ----------------------------------------------- Edit Course Modal --------------------------------------------------------- -->
<?php if(isset($_GET['courseId']) && isset($_GET['action']) && $_GET['action'] === 'editCourse' ):
    $course_id = $_GET['courseId'];
    $editCourse = $teacher->getCourseForEdit($course_id);
    if($editCourse):
  ?>
<div id="editCourseModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 ">
      <div class="bg-white rounded-lg w-full max-w-3xl mx-4 max-h-[90vh] overflow-y-auto custom-scrollbar">
            <div class="flex justify-between items-center p-6 border-b">
                <h3 class="text-xl font-semibold">Edit course</h3>
                <button id="closeEditCourseModal" class="text-gray-600 hover:text-gray-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <form class="p-6" action="" method="POST">
                <div class="mb-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                              Title
                            </label>
                            <input 
                                type="text" 
                                name="new_title"
                                value="<?php echo $editCourse['title'] ?>"
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
                                name="new_description"
                                value="<?php echo $editCourse['description'] ?>"
                                required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                              Image
                            </label>
                            <input 
                                type="text" 
                                name="new_image_url"
                                value="<?php echo $editCourse['image'] ?>"
                                required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Content Type
                            </label>
                                <select 
                                    id="contentType" 
                                    required 
                                    name="new_content_type"
                                      value="<?php echo $editCourse['content_type'] ?>"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                                    onchange="toggleContentInputs()"
                                >
                                    <option value="video">video</option>
                                    <option value="document">document</option>
                                </select>
                        </div>
                        <div class="videoInput" class="hidden">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Video URL
                            </label>
                            <input 
                                type="text" 
                                name="new_video_url"
                                value="<?php echo $editCourse['content_video'] ?>"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                            >
                        </div>
                        <div class="textInput" class="hidden">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Content
                            </label>
                            <textarea 
                                name="new_content"
                                rows="4" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
                                <?php echo $editCourse['content_text'] ?>
                              </textarea>
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
                                type="time" 
                                name="new_duration"
                                value="<?php echo $editCourse['duration'] ?>"
                                required
                                min="1"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Level
                            </label>
                            <select name="level" value="<?php echo $editCourse['level'] ?>" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
                                <option <?php if( $editCourse['level'] === 'Beginner'): ?> selected <?php endif; ?> value="beginner">Beginner</option>
                                <option <?php if( $editCourse['level'] === 'Intermediate'): ?> selected <?php endif; ?> value="intermediate">Intermediate</option>
                                <option <?php if( $editCourse['level'] === 'Advanced'): ?> selected <?php endif; ?> value="advanced">Advanced</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Catégorie
                            </label>
                            <select required name="new_category" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
                              <?php foreach($allCategories as $category): ?>
                                <option <?php if($category['id'] === $editCourse['category_id'] ): ?> selected <?php endif; ?> value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                              <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                    <div class="space-y-4">
                      <label class="block text-sm font-medium text-gray-700 mb-1">
                          Tags
                      </label>
                      <div class="flex flex-wrap gap-2 p-4 border border-gray-200 rounded-md bg-gray-50 max-h-48 overflow-y-auto">
                          <?php foreach($allTags as $tag): ?>
                              <label class="tag-container">
                                  <input 
                                      type="checkbox" 
                                      name="new_selected_tags" 
                                      value="<?php echo $tag['id']; ?>"
                                      class="hidden"
                                      <?php if( in_array($tag['id'], explode(',', $editCourse['tag_id']))): ?>  checked <?php endif;?>
                                  >
                                  <span class="px-3 py-1 rounded-full text-sm cursor-pointer transition-colors duration-200 
                                      peer-checked:bg-red-500 peer-checked:text-white peer-checked:border-red-500
                                      bg-white border border-gray-300 hover:bg-gray-100
                                      [input:checked+&]:bg-red-500 [input:checked+&]:text-white [input:checked+&]:border-red-500">
                                      <?php echo $tag['name']; ?>
                                  </span>
                              </label>
                          <?php endforeach; ?>
                      </div>
                </div>
                <div class="flex justify-end space-x-4 mt-6">
                  <input type="hidden" name="teacher_id" value="<?php echo $teacher_id ;?>">
                  <input type="hidden" name="course_id" value="<?php echo $course_id ;?>">
                    <!-- <button 
                        id ="cancelEditCourse"
                        class="px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-50"
                    >
                      Cancel
                    </button> -->
                    <button 
                        type="submit"
                        type="button"
                        name="new_save_draft"
                        class="px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-50"
                    >
                        Save Draft
                    </button>
                    <button 
                        type="submit"
                        name="update_course"
                        class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700"
                    >
                        Update Course
                    </button>
                </div>
            </form>
        </div>
    </div>
    <?php endif; endif; ?>
<!-- --------------------------------------------------------------------------------------------------- -->
<script src="../../assets/js/teacher.js"></script>
</body>
</html>
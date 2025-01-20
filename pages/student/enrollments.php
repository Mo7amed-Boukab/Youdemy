<?php   
    session_start();

    $student_id =  $_SESSION['student_id'];

    require_once "../../config/conn.php";

    $db = new Database();
    $conn = $db->connect();

    require_once "../../models/student.php";

   $student = new Student($conn);
   $allEnrollments = $student->getMyEnrollments($student_id);

   require_once "../../controllers/studentController.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Courses - Youdemy</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
  .active-btn {
      color: #dc2626 !important;
      border-bottom: 2px solid #dc2626 !important;
    }
</style>
</head>

<body class="bg-gray-50">
    <nav class="bg-white border-b fixed top-0 left-0 right-0 shadow-md z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div>
                    <a href="index.php" class="flex items-center space-x-2">
                        <span class="text-2xl font-bold text-red-600">YOUDEMY</span>
                    </a>
                </div>
                <div class="flex items-center space-x-4 md:space-x-8">
                    <div class="flex items-center space-x-4">
                          <a href="./student.php" class="text-gray-600 hover:text-red-600 transition-colors">Home</a>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="./../auth/logout.php" class="bg-red-600 text-white px-6 py-2 rounded-md hover:bg-red-700">Log Out</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="bg-slate-950 py-16 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-start space-y-4">
                <div class="flex items-center text-white/80 space-x-2">
                    <a href="/" class="hover:text-red-500">Youdemy</a>
                    <span>/</span>
                    <span>My Courses</span>
                </div>
                <h1 class="text-4xl font-bold text-white mb-4">My Enrolled Courses</h1>
            </div>
        </div>
    </div>
>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 ">
        <div class="flex space-x-2 mb-6 border-b">
            <button id="allCoursesBtn" class="px-4 py-2 text-gray-500 active-btn">
                All Courses
            </button>
            <button id="inProgressBtn" class="px-4 py-2 text-gray-500">
                In Progress
            </button>
            <button id="completedBtn" class="px-4 py-2 text-gray-500 ">
                Completed
            </button>
        </div>
<!-- --------------------------------------------------- All My Course  ------------------------------------------------- -->
        <div id="toStartCourses" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-12">
             <?php foreach($allEnrollments AS $enroll): if($enroll['enrollment_status'] != 'completed'): ?>
            <div class="bg-white rounded-lg overflow-hidden shadow-sm border hover:shadow-md transition-shadow">
                <div class="relative">
                    <img src="../../assets/images/cart-img1.png" alt="" class="w-full h-48 object-cover">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2"><?php echo $enroll['course_title']; ?></h3>
                    
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <div class="flex items-center space-x-4">
                            <span class="bg-gray-100 px-2 py-1 rounded"><?php echo $enroll['course_level']; ?></span>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                                </svg>
                                <span><?php echo $enroll['total_enrollments']; ?> students</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                <span><?php echo $enroll['course_duration']; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center space-x-4">
                      <form action="" method="POST" class="flex-1">
                            <input type="hidden" name="course_enrolled_id" value="<?php echo $enroll['course_id'] ?>">
                            <button type="submit" name="start_course" class="w-full border border-red-600 text-red-600 py-2 px-4 rounded-md hover:bg-red-50 transition-colors duration-200 flex items-center justify-center">
                            <?php echo ($enroll['enrollment_status'] == 'to start')? "Start Learning": "Continue Learning" ?>
                            </button>
                        </form>
                        <form action="" method="POST" class="flex-1">
                            <input type="hidden" name="course_enrolled_id" value="<?php echo $enroll['course_id'] ?>">
                            <button type="submit" name="delete_course" class="w-full bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 transition-colors duration-200 flex items-center justify-center">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endif; endforeach; ?>
        </div>
        <!-- ---------------------------------------- Courses In Progress ------------------------------------------------- -->
        <div id="inProgressCourses" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-12 hidden">
             <?php foreach($allEnrollments AS $enroll):if($enroll['enrollment_status'] == 'in progress'): ?>
            <div class="bg-white rounded-lg overflow-hidden shadow-sm border hover:shadow-md transition-shadow">
                <div class="relative">
                    <img src="../../assets/images/cart-img1.png" alt="" class="w-full h-48 object-cover">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2"><?php echo $enroll['course_title']; ?></h3>
                    
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <div class="flex items-center space-x-4">
                            <span class="bg-gray-100 px-2 py-1 rounded"><?php echo $enroll['course_level']; ?></span>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                                </svg>
                                <span><?php echo $enroll['total_enrollments']; ?> students</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                <span><?php echo $enroll['course_duration']; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center space-x-4">
                      <form action="" method="POST" class="flex-1">
                            <input type="hidden" name="course_enrolled_id" value="<?php echo $enroll['course_id'] ?>">
                            <button type="submit" name="complete_course" class="w-full border border-red-600 text-red-600 py-2 px-4 rounded-md hover:bg-red-50 transition-colors duration-200 flex items-center justify-center">
                            Completed
                            </button>
                        </form>
                        <form action="" method="POST" class="flex-1">
                            <input type="hidden" name="course_enrolled_id" value="<?php echo $enroll['course_id'] ?>">
                            <button type="submit" name="delete_course" class="w-full bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 transition-colors duration-200 flex items-center justify-center">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endif; endforeach; ?>
        </div>
        <!-- ---------------------------------------- Courses completed ------------------------------------------------- -->
        <div id="completedCourses" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-12 hidden">
             <?php foreach($allEnrollments AS $enroll):if($enroll['enrollment_status'] == 'completed'): ?>
            <div class="bg-white rounded-lg overflow-hidden shadow-sm border hover:shadow-md transition-shadow">
                <div class="relative">
                    <img src="../../assets/images/cart-img1.png" alt="" class="w-full h-48 object-cover">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2"><?php echo $enroll['course_title']; ?></h3>
                    
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <div class="flex items-center space-x-4">
                            <span class="bg-gray-100 px-2 py-1 rounded"><?php echo $enroll['course_level']; ?></span>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                                </svg>
                                <span><?php echo $enroll['total_enrollments']; ?> students</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                <span><?php echo $enroll['course_duration']; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center space-x-4">
                      <form action="" method="POST" class="flex-1">
                            <input type="hidden" name="course_enrolled_id" value="<?php echo $enroll['course_id'] ?>">
                            <button type="submit" name="uncomplete_course" class="w-full border border-red-600 text-red-600 py-2 px-4 rounded-md hover:bg-red-50 transition-colors duration-200 flex items-center justify-center">
                              Uncompleted
                            </button>
                        </form>
                        <form action="" method="POST" class="flex-1">
                            <input type="hidden" name="course_enrolled_id" value="<?php echo $enroll['course_id'] ?>">
                            <button type="submit" name="delete_course" class="w-full bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 transition-colors duration-200 flex items-center justify-center">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endif; endforeach; ?>
        </div>
  </div>
  <script>
          const allCoursesBtn = document.getElementById('allCoursesBtn');
          const inProgressBtn = document.getElementById('inProgressBtn');
          const completedBtn = document.getElementById('completedBtn'); 
          const inProgressCourses = document.getElementById('inProgressCourses');
          const toStartCourses = document.getElementById('toStartCourses');
          const completedCourses = document.getElementById('completedCourses');

          allCoursesBtn.addEventListener('click', () => {
            inProgressBtn.classList.remove('active-btn');
            completedBtn.classList.remove('active-btn');
            allCoursesBtn.classList.add('active-btn');
            toStartCourses.classList.remove('hidden');
            inProgressCourses.classList.add('hidden');
            completedCourses.classList.add('hidden');
          });

          inProgressBtn.addEventListener('click', () => {
            allCoursesBtn.classList.remove('active-btn');
            completedBtn.classList.remove('active-btn');
            inProgressBtn.classList.add('active-btn');
            toStartCourses.classList.add('hidden');
            completedCourses.classList.add('hidden');
            inProgressCourses.classList.remove('hidden');    
          });

          completedBtn.addEventListener('click', () => {
            allCoursesBtn.classList.remove('active-btn');
            inProgressBtn.classList.remove('active-btn');
            completedBtn.classList.add('active-btn');
            toStartCourses.classList.add('hidden');
            inProgressCourses.classList.add('hidden');
            completedCourses.classList.remove('hidden');
          });

  </script>
</body>
</html>
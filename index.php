<?php 

    require_once "./config/conn.php";

    $db = new Database();
    $conn = $db->connect();

    require_once "./models/courses.php";

    $courses = new Courses($conn);
    $courseInfo = $courses->getAll();
  
    require_once "./controllers/courseController.php";
  
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Online Courses Platform</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
<body class="bg-white">
    <nav class="bg-white border-b fixed top-0 left-0 right-0  shadow-md z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
            <div class="flex justify-between h-16 items-center">
                <div>
                    <a href="index.php" class="flex items-center space-x-2">
                        <span class="text-2xl font-bold text-red-600">YOUDEMY</span>
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="./pages/auth/signup.php" class="text-red-600 px-4 py-2 rounded-md hover:text-red-700">Sign In</a>
                    <a href="./pages/auth/login.php" class="bg-red-600 text-white px-6 py-2 rounded-md hover:bg-red-700">Log In</a>
                </div>
            </div>
        </div>
    </nav>
<!--------------------------------------------------Hero Section ---------------------------------------------->
    <div class="bg-slate-950 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-start space-y-8">
                <div class="flex items-center text-white/80 space-x-2">
                    <a href="/" class="hover:text-red-500">Youdemy</a>
                    <span>/</span>
                    <span>Online self learning platform</span>
                </div>
                
                <div>
                    <h1 class="text-6xl font-bold text-white mb-2">Welcom to <span class="text-red-600">Youdemy</span> Platform</h1>
                </div>
                <div class="w-5/6">
                    <p class="text-white/90 text-xl">
                    Youdemy is your gateway to free, high-quality online courses across diverse fields. Start your learning journey today and unlock new opportunities with just a click !
                    </p>
                </div>
                <button class="bg-red-600 text-white px-6 py-3 rounded-md hover:bg-red-700 flex items-center space-x-2">
                    <span>Discover Our Courses</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
<!----------------------------------------------- end hero section ---------------------------------------------->

    <div class="border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
          <!-- search bar------------------------------------- -->
            <div class="mb-6 flex items-center justify-between">
                <div class="relative w-full">
                    <input type="text" 
                           placeholder="Search ..." 
                           class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:border-red-500">
                    <div class="absolute left-3 top-2.5 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
            </div>

          <!-- Categories --------------------------------- -->
            <div class="flex items-center">
                <button class="p-2 rounded-full hover:bg-gray-100 text-gray-500 hover:text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <div class="flex-1 overflow-x-auto scrollbar-hide">
                    <div class="flex space-x-8 px-4">
                        <a href="#" class="text-gray-600 hover:text-red-600 whitespace-nowrap">Web Development</a>
                        <a href="#" class="text-gray-600 hover:text-red-600 whitespace-nowrap">Mobile Development</a>
                        <a href="#" class="text-red-600 border-b-2 border-red-600 whitespace-nowrap">Programming Language</a>
                        <a href="#" class="text-gray-600 hover:text-red-600 whitespace-nowrap">Game Development</a>
                        <a href="#" class="text-gray-600 hover:text-red-600 whitespace-nowrap">Database Administration</a>
                        <a href="#" class="text-gray-600 hover:text-red-600 whitespace-nowrap">Data Science</a>
                        <a href="#" class="text-gray-600 hover:text-red-600 whitespace-nowrap">Design</a>
                        <a href="#" class="text-gray-600 hover:text-red-600 whitespace-nowrap">cyber security</a>
                    </div>
                </div>
                <button class="p-2 rounded-full hover:bg-gray-100 text-gray-500 hover:text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

  <!---------------------------------------------- Courses Section ------------------------------------------------->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="mb-8">
            <h2 class="text-xl font-semibold">Programming Language</h2>
        </div>
      <!-- Courses Container ------------------------------------------------ -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Course Card ---------------------------------------------------------------------------------------------->
       <?php foreach($courseInfo AS $course): ?>
              <div class="bg-white rounded-lg overflow-hidden shadow-sm border hover:shadow-md transition-shadow">
                  <div class="relative">
                      <img src="<?php echo $course['image']; ?>" alt="" class="w-full h-48 object-cover">
                  </div>
                  <div class="p-4">
                      <h3 class="text-lg font-semibold mb-2"><?php echo $course['title']; ?></h3>
                      
                      <div class="flex items-center text-sm text-gray-500 mb-4">
                          <div class="flex items-center space-x-4">
                              <span class="bg-gray-100 px-2 py-1 rounded"><?php echo $course['level']; ?></span>
                              <div class="flex items-center">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                      <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                                  </svg>
                                  <span><?php echo $course['total_enrollments']; ?></span>
                              </div>
                              <div class="flex items-center">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                  </svg>
                                  <span><?php echo $course['course_duration']; ?></span>
                              </div>
                          </div>
                      </div>
                      <div class="flex justify-between items-center space-x-4">
                          <button class="flex-1 border border-red-600 text-red-600 py-2 px-4 rounded-md hover:bg-red-50 transition-colors duration-200 flex items-center justify-center">
                              Enroll Now
                          </button>
                          <form action="" method="POST">
                              <input type="hidden" name="course_id" value="<?php echo $course['id'] ?>">
                              <button name="view-course-details" class="flex-1 bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 transition-colors duration-200 flex items-center justify-center">
                                  View Details
                              </button>
                          </form>
                      </div>
                  </div>
              </div>
              <?php endforeach; ?>
          <!-- -------------------------------------------------------------------------------------------- -->
      <!-- Course Card ---------------------------------------------------------------------------------------------->
              <div class="bg-white rounded-lg overflow-hidden shadow-sm border hover:shadow-md transition-shadow">
                  <div class="relative">
                      <img src="./assets/images/cart-img1.png" alt="" class="w-full h-48 object-cover">
                  </div>
                  <div class="p-4">
                      <h3 class="text-lg font-semibold mb-2">Laravel - The Complete Laravel Course</h3>
                      
                      <div class="flex items-center text-sm text-gray-500 mb-4">
                          <div class="flex items-center space-x-4">
                              <span class="bg-gray-100 px-2 py-1 rounded">Laravel</span>
                              <div class="flex items-center">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                      <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                                  </svg>
                                  <span>120 students</span>
                              </div>
                              <div class="flex items-center">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                  </svg>
                                  <span>2h 30min</span>
                              </div>
                          </div>
                      </div>
                      <div class="flex justify-between items-center space-x-4">
                          <button class="flex-1 border border-red-600 text-red-600 py-2 px-4 rounded-md hover:bg-red-50 transition-colors duration-200 flex items-center justify-center">
                              Enroll Now
                          </button>
                          <button class="flex-1 bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 transition-colors duration-200 flex items-center justify-center">
                              View Details
                          </button>
                      </div>
                  </div>
              </div>
          <!-- -------------------------------------------------------------------------------------------- -->

    
        </div>
    
    </div>
<!-- Pagination -->
<div class="flex justify-center items-center space-x-2 mt-12 border border-gray-200 p-4 rounded-lg">
    <!-- First page button -->
    <a href="#" class="p-2 text-gray-700 hover:text-red-700 hover:border-red-600 rounded-md transition-colors border border-gray-600">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M9.707 4.293a1 1 0 010 1.414L5.414 10l4.293 4.293a1 1 0 11-1.414 1.414l-5-5a1 1 0 010-1.414l5-5a1 1 0 011.414 0z" clip-rule="evenodd"/>
            <path fill-rule="evenodd" d="M15.707 4.293a1 1 0 010 1.414L11.414 10l4.293 4.293a1 1 0 11-1.414 1.414l-5-5a1 1 0 010-1.414l5-5a1 1 0 011.414 0z" clip-rule="evenodd"/>
        </svg>
    </a>


    <!-- Current/Active page -->
    <a href="#" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors">
        1
    </a>

    <!-- Other pages -->
    <a href="#" class="px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-md transition-colors">
        2
    </a>
    <a href="#" class="px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-md transition-colors">
        3
    </a>
    <a href="#" class="px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-md transition-colors">
        4
    </a>

    <!-- Last page button -->
    <a href="#" class="p-2 text-gray-700 hover:text-red-700 hover:border-red-600 rounded-md transition-colors border border-gray-600">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
        </svg>
    </a>
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
<script src="./assets/js/script.js"></script>
</body>
</html>
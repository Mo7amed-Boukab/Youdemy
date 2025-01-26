<?php 
    
        
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      if(isset($_POST['view-course-details']) && isset($_POST['course_id'])) {
          session_start();
          $_SESSION['course_id'] = $_POST['course_id'];
          if(isset($_POST['student_id'])){
            header('Location: ./../courses/course-details.php');
            exit;
          }
          else{
            header('Location: ./pages/courses/course-details.php');
            exit;
          }
      }
      if(isset($_POST['enroll-course']) && isset($_POST['course_id']) && !isset($_POST['student_id'])) {
        session_start();
        $_SESSION['course_id'] = $_POST['course_id'];
        $_SESSION['enroll_course'] = $_POST['enroll-course'];
        header('Location: ./pages/auth/login.php');
        exit;
      }
      if(isset($_POST['show-course']) && isset($_POST['course_id']) && isset($_POST['student_id'])) {
        session_start();
        $_SESSION['course_id'] = $_POST['course_id'];
        $_SESSION['student_id'] = $_POST['student_id'];
        header('Location: ./show-course.php');
        exit;
      }
      
    }
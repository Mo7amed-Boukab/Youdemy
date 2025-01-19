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
      
    }
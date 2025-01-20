<?php 
          
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      if(isset($_POST['my_courses']) && isset($_POST['student_id'])) {
          session_start();
          $_SESSION['student_id'] = $_POST['student_id'];
         header('Location: ./enrollments.php');
         exit;
      
      }
      if(isset($_POST['enroll-course']) && isset($_POST['course_id']) && isset($_POST['student_id'])) {
          $course_id = $_POST['course_id'];
          $student_id = $_POST['student_id'];
          $sql ="INSERT INTO enrollments (user_id, course_id) VALUES (:student_id, :course_id)";
          $stmt = $conn->prepare($sql);
          $stmt->execute([':student_id' => $student_id, ':course_id' => $course_id]);

          header('Location: ' . $_SERVER['PHP_SELF']);
          exit;
      
      }
      if (isset($_POST['delete_course']) && isset($_POST['course_enrolled_id'])) {
        $course_id = $_POST['course_enrolled_id'];
        $sql = "DELETE FROM enrollments WHERE course_id = :course_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':course_id' => $course_id]);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
      if (isset($_POST['start_course']) && isset($_POST['course_enrolled_id'])) {
        $course_id = $_POST['course_enrolled_id'];
        session_start();
        $_SESSION['course_id'] = $course_id;
        $sql = "UPDATE enrollments SET status = 'in progress' WHERE course_id = :course_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':course_id' => $course_id]);
        header('Location: ../courses/course-details.php');
        exit;
    }
      if (isset($_POST['complete_course']) && isset($_POST['course_enrolled_id'])) {
        $course_id = $_POST['course_enrolled_id'];
        session_start();
        $_SESSION['course_id'] = $course_id;
        $sql = "UPDATE enrollments SET status = 'completed' WHERE course_id = :course_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':course_id' => $course_id]);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }

    if (isset($_POST['uncomplete_course']) && isset($_POST['course_enrolled_id'])) {
      $course_id = $_POST['course_enrolled_id'];
      session_start();
      $_SESSION['course_id'] = $course_id;
      $sql = "UPDATE enrollments SET status = 'in progress' WHERE course_id = :course_id";
      $stmt = $conn->prepare($sql);
      $stmt->execute([':course_id' => $course_id]);
      header('Location: ' . $_SERVER['PHP_SELF']);
      exit;
  }
    
}
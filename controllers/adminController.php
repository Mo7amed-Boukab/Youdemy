<?php 
        require_once  __DIR__ . "/../config/conn.php";

        $db = new Database();
        $conn = $db->connect();
        
// ------------------------------------------------------------------ Teachers Validations
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      if(isset($_POST['approve_teacher']) && isset($_POST['teacher_id'])) {
        $teacher_id = $_POST['teacher_id'];
        $sql = "UPDATE users SET status = 'active' WHERE id = :teacher_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':teacher_id' => $teacher_id]);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
      }
      if(isset($_POST['reject_teacher']) && isset($_POST['teacher_id'])) {
        $teacher_id = $_POST['teacher_id'];
        $sql = "UPDATE users SET status = 'rejected' WHERE id = :teacher_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':teacher_id' => $teacher_id]);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
      }
      if(isset($_POST['restart_status']) && isset($_POST['teacher_id'])) {
        $teacher_id = $_POST['teacher_id'];
        $sql = "UPDATE users SET status = 'pending' WHERE id = :teacher_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':teacher_id' => $teacher_id]);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
      }
    }
    // -------------------------------------------------------------------- Users Management 
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      if(isset($_POST['suspend_user']) && isset($_POST['user_id'])) {
        $user_id = $_POST['user_id'];
        $sql = "UPDATE users SET status = 'suspended' WHERE id = :user_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':user_id' => $user_id]);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
      }
      if(isset($_POST['restart_user']) && isset($_POST['user_id'])) {
        $user_id = $_POST['user_id'];
        $sql = "UPDATE users SET status = 'active' WHERE id = :user_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':user_id' => $user_id]);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
      }
      if(isset($_POST['delete_user']) && isset($_POST['user_id'])) {
        $user_id = $_POST['user_id'];
        $sql = "DELETE FROM users WHERE id = :user_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':user_id' => $user_id]);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
      }
  // ------------------------------------------------------------ Delete courses
      if(isset($_POST['delete_course']) && isset($_POST['course_id'])) {
        $course_id = $_POST['course_id'];
        $sql = "DELETE FROM courses WHERE id = :course_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['course_id' => $course_id]);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
   }
  //  -------------------------------------------------------------- Tags & Categories
   if(isset($_POST['addTag']) && isset($_POST['tag'])){
      $allTags = $_POST['tag'];
      $tags = explode(",", $allTags);
      foreach($tags AS $tag):
          $sql = "INSERT INTO tags (name) VALUES(:tag)";
          $stmt = $conn->prepare($sql);  
          $stmt->execute([':tag' => $tag]);
      endforeach;    
      header('Location: ' . $_SERVER['PHP_SELF']);
      exit;
    }
   if(isset($_POST['addCategory']) && isset($_POST['category'])){
      $category = $_POST['category'];

      $sql = "INSERT INTO category (name) VALUES(:category)";
      $stmt = $conn->prepare($sql);  
      $stmt->execute([':category' => $category]);   
      header('Location: ' . $_SERVER['PHP_SELF']);
      exit;
    }
   if(isset($_POST['delete_category']) && isset($_POST['category_id'])){
      $category_id = $_POST['category_id'];

      $sql = "DELETE FROM category WHERE id = :category_id ";
      $stmt = $conn->prepare($sql);  
      $stmt->execute([':category_id' => $category_id]);   
      header('Location: ' . $_SERVER['PHP_SELF']);
      exit;
    }
   if(isset($_POST['delete_tag']) && isset($_POST['tag_id'])){
      $tag_id = $_POST['tag_id'];

      $sql = "DELETE FROM tags WHERE id = :tag_id ";
      $stmt = $conn->prepare($sql);  
      $stmt->execute([':tag_id' => $tag_id]);   
      header('Location: ' . $_SERVER['PHP_SELF']);
      exit;
    }

  }
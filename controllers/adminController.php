<?php 
        require_once  __DIR__ . "/../config/conn.php";
        
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
    
    }
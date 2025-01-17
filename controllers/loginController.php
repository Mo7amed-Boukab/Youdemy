<?php 

  require_once __DIR__ . "/../config/conn.php";
  require_once __DIR__ . "/../models/user.php";

  $db = new Database();
  $conn = $db->connect();

  $error = '';

  if(isset($_POST['login'])){
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    if (empty($email) || empty($password)) {
        $error = "All field are required!";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "email form is not valid!";
    }
    else {
        $user = new User($conn);
        $return = $user->login($email, $password);

        if ($return['verify'] == false) {
            $error = $return['message'];
        } 
        else {
            if($return['role'] === 'teacher' && $return['status'] === 'pending') {
              $error = "This account is not activated yet!";
              header('Location: '. $_SERVER['PHP_SELF']);
              exit;
            }
            else if($return['role'] === 'teacher' && $return['status'] === 'active') {
                session_start();
                $_SESSION['teacher_id'] = $return['user_id'];
                $_SESSION['teacher_name'] = $return['user_name'];
                header('Location: ../teacher/teacher.php');
                exit;
            } 
            else if($return['role'] === 'student') {
                session_start();  
                $_SESSION['student_id'] = $return['user_id'];
                $_SESSION['student_name'] = $return['user_name'];
                header('Location: ../student/student.php');
                exit;  
            }
            else if($return['role'] === 'admin') {
                session_start();
                $_SESSION['admin_id'] = $return['user_id'];
                $_SESSION['admin_name'] = $return['user_name'];
                header('Location: ../admin/admin.php');
                exit;
            }
      } 
    }
  }

  ?>
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
            if($return['role'] === 'teacher') {
                session_start();
                $_SESSION['teacher_id'] = $return['user_id'];
                header('Location: teacher.php');
                exit;
            } 
            else if($return['role'] === 'student') {
                session_start();  
                $_SESSION['student_id'] = $return['user_id'];
                header('Location: profile.php');
                exit;  
            }
            else {
                session_start();
                $_SESSION['admin_id'] = $return['user_id'];
                header('Location: admin.php');
                exit;
            }
      } 
    }
  }

  ?>
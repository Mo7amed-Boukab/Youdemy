<?php 

  require_once  __DIR__ . "/../config/conn.php";
  require_once  __DIR__ . "/../models/user.php";

  $db = new Database();
  $conn = $db->connect();
  $user = new User($conn);
  $error = '';

  if(isset($_POST['signup'])){
    $username = htmlspecialchars(trim($_POST['username']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $role = htmlspecialchars(trim($_POST['role']));

    if(empty($username) || empty($email) || empty($password) || empty($role)) {
      $error = "All fields are required!";
      exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = "Email form is not valid!";
      exit();
    }
    elseif (strlen($password) < 8) {
      $error = "Password must be at least 8 characters";
      exit();
    }
    else{
      $return = $user->signup($username,$email,$password,$role);
      if (isset($return['message'])) {
        $error = $return['message']; 
        exit();
      }
      else {
        header("Location: login.php"); 
        exit(); 
    }
      
    }
  }  

?>
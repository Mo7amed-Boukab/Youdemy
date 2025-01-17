<?php

    class User
    {
      private $conn;
      public function __construct($connection)
      {
          $this->conn = $connection;
      }

      public function signup($name, $email, $password, $role, $status)
      {
          $sql = "SELECT id FROM users WHERE name = :name";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([':name' => $name]);

          if ($stmt->rowCount() > 0) {
              return ['message' => 'Username already exist!'];
          }

          $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
          try {
              $sql = "INSERT INTO users (name, email, password, role, status) VALUES (:name, :email, :password, :role, :status)";
              $stmt = $this->conn->prepare($sql);
              $stmt->execute([':name' => $name, ':email' => $email, ':password' => $hashedPassword, ':role' => $role , ':status' => $status]);
              return true;
          } catch (PDOException $e) {
             die("Erreur in signup : " . $e->getMessage()) ;
          }
      }

      public function login($email, $password)
      {
          try {
              $sql = "SELECT id, name, email, password, role, status FROM users WHERE email = :email";
              $stmt = $this->conn->prepare($sql);
              $stmt->execute(['email' => $email]);

              if ($stmt->rowCount() > 0) {
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                  if (password_verify($password, $row['password'])) {
                      return ['verify' => true, 'user_id' => $row['id'], 'user_name' => $row['name'], 'role' => $row['role'], 'status' => $row['status']];
                  } else {
                      return ['verify' => false, 'message' => "Password incorrect"];
                  }
              } else {
                  return ['verify' => false, 'message' => "This user is not found"];
              }
          } catch (Exception $e) {
              return ['message' => "Error in login: " . $e->getMessage()];
          }
      }
 
      public function getLastUsers(){
        try{
          $sql = "SELECT * FROM users WHERE status = 'active' OR status = 'suspended' ORDER BY created_at DESC LIMIT 4";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute();
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
           die("Error in getting last users: " . $e->getMessage());
        }
      }

      public function getLastTeachers(){
        try{
          $sql = "SELECT * FROM users WHERE role = 'teacher' AND status != 'suspended' ORDER BY created_at DESC LIMIT 4";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute();
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
           die("Error in getting last teachers: " . $e->getMessage());
        }
      }
      
      public function getAllUsers(){
        try{
          $sql = "SELECT * FROM users WHERE status = 'active' OR status = 'suspended'";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute();
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
           die("Error in getting all users: " . $e->getMessage());
        }
      }

      public function getAllTeachers()
      {
        try{
          $sql = "SELECT * FROM users WHERE role = 'teacher' AND status != 'suspended'";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute();
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
           die("Error in getting all teachers: " . $e->getMessage());
        }
      }

      public function getAllStudents()
      {
        try{
          $sql = "SELECT * FROM users WHERE role = 'student'";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute();
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
           die("Error in getting all students: " . $e->getMessage());
        }
      }
    
    }

?>
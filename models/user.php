<?php

    class User
    {
      private $pdo;
      public function __construct($conn)
      {
          $this->pdo = $conn;
      }

      public function signup($name, $email, $password, $role)
      {
          $sql = "SELECT id FROM users WHERE name = :name";
          $stmt = $this->pdo->prepare($sql);
          $stmt->execute([':name' => $name]);

          if ($stmt->rowCount() > 0) {
              return ['message' => 'Username already exist!'];
          }

          $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
          $sql = "INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, ':role')";
          $stmt = $this->pdo->prepare($sql);
          try {
              $stmt->execute([':name' => $name, ':email' => $email, ':password' => $hashedPassword, ':role' => $role]);
              return true;
          } catch (PDOException $e) {
              echo "Erreur : " . $e->getMessage();
              return false;
          }
      }

      public function login($email, $password)
      {
          try {
              $sql = "SELECT id, email, password, role FROM users WHERE email = :email";
              $stmt = $this->pdo->prepare($sql);
              $stmt->execute(['email' => $email]);

              if ($stmt->rowCount() > 0) {
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                  if (password_verify($password, $row['password'])) {
                      return ['verify' => true, 'user_id' => $row['id'], 'role' => $row['role']];
                  } else {
                      return ['verify' => false, 'message' => "Password incorrect"];
                  }
              } else {
                  return ['verify' => false, 'message' => "This user is not found"];
              }
          } catch (Exception $e) {
              return ['message' => "Error: " . $e->getMessage()];
          }
      }
        
    }

?>
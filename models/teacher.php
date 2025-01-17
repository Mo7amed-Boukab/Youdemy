<?php

    class Teacher extends Courses
    {
      private $conn;
      private $teacherId;
      public function __construct($connection)
      {
          $this->conn = $connection;
      }
      
      public function getAllCourses() {
        try{
            $sql = "SELECT * FROM course WHERE user_id = :teacher_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':teacher_id' => $this->teacherId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            die("Error in getting courses by teacher: " . $e->getMessage());
        }
      }

    }




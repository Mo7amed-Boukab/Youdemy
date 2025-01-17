<?php

    class Courses
    {
      private $conn;
      protected $teacherId;
      public function __construct($connection)
      {
          $this->conn = $connection;
      }
    
      public function CreateCourse($title, $description, $content_type, $content_text, $content_video, $duration, $level, $category_id, $tag_id){
        try{
            $sql = "INSERT INTO courses (title, description, content_type, content_text, content_video, duration, level, category_id, tag_id
                     VALUES (:title, :description, :content_type, :content_text, :content_video, :duration, :level, :category_id, :tag_id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':title' => $title, ':description' => $description, ':content_type' => $content_type, ':content_text' => $content_text,
                            ':content_video' => $content_video, ':duration' => $duration, ':level' => $level, ':category_id' => $category_id, ':tag_id' => $tag_id]);
            return true;
        }
        catch(Exception $e){
          die("Error in creating course: " . $e->getMessage());
        }
      }
      
    public function getAllCourses() {
      try{
          $sql = "SELECT * FROM courses WHERE user_id = :teacher_id";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([':teacher_id' => $teacherid]);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
      catch(Exception $e){
          die("Error in getting courses by teacher: " . $e->getMessage());
      }
        
    }

    
    }



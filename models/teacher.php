<?php
 
   require_once __DIR__ . "/../models/courses.php";

    class Teacher extends Courses
    {
      public function __construct($connection)
      {
          parent::__construct($connection); 
      }
      
      public function createCourse($title, $description, $image, $content_type, $content_text, $content_video, $duration, $level, $category_id, $user_id, $status) {
        try{
            $sql = "INSERT INTO courses (title, description, image, content_type, content_text, content_video, duration, level, category_id, user_id, status)
                     VALUES (:title, :description, :image, :content_type, :content_text, :content_video, :duration, :level, :category_id, :user_id, :status)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':title' => $title, ':description' => $description, ':image' => $image, ':content_type' => $content_type, ':content_text' => $content_text,
                            ':content_video' => $content_video, ':duration' => $duration, ':level' => $level, ':category_id' => $category_id , ':user_id' => $user_id, ':status' => $status]);
            return $this->conn->lastInsertId();
        }
        catch(Exception $e){
          error_log("Error in creating course: " . $e->getMessage());
          return false;
        }
      }
      public function selectTags($course_id, $tags){
        try{
         foreach($tags as $tag):
              $sql = "INSERT INTO course_tags (course_id, tag_id) VALUES (:course_id, :tag_id)";
              $stmt = $this->conn->prepare($sql);
              $stmt->execute([':course_id' => $course_id, ':tag_id' => $tag]);
         endforeach;
          return true;
        }
        catch(Exception $e){
          error_log("Error in adding tags to course: " . $e->getMessage());
          return false;
        }
      }
      
      public function getAllCourses($teacherId) {
        try{
            $sql = "SELECT courses.*, category.name as category FROM courses INNER JOIN category ON courses.category_id = category.id WHERE courses.user_id = :teacher_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':teacher_id' => $teacherId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            error_log("Error in getting courses by teacher: " . $e->getMessage());
            return false;
        }
      }
      public function getLastCourses($teacherId) {
        try{
            $sql = "SELECT * FROM courses WHERE user_id = :teacher_id ORDER BY created_at DESC LIMIT 3";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':teacher_id' => $teacherId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            error_log("Error in getting last courses by teacher: " . $e->getMessage());
            return false;
        }
      }

    }




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
      public function getCourseForEdit($courseId) {
        try {
            $sql = "SELECT courses.*, course_tags.tag_id AS tag_id, category.id AS category_id, category.name AS category_name
                    FROM courses 
                    LEFT JOIN category ON courses.category_id = category.id 
                    LEFT JOIN course_tags ON courses.id = course_tags.course_id
                    WHERE courses.id = :course_id";
  
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':course_id' => $courseId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error in getting course for editing: " . $e->getMessage());
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
      public function getEnrollments($teacherId){
        try{
          $sql = "SELECT enrollments.*, courses.title AS course_title, users.name, users.email FROM enrollments JOIN courses ON enrollments.course_id = courses.id JOIN users ON courses.user_id = users.id WHERE users.id = :teacher_id";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([':teacher_id' => $teacherId]);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
          error_log("Error in getting enrollments : " . $e->getMessage());
          return false;
        }
      }
      public function getLastEnrollments($teacherId){
        try{
          $sql = "SELECT enrollments.*, courses.title AS course_title, users.name FROM enrollments JOIN courses ON enrollments.course_id = courses.id JOIN users ON courses.user_id = users.id WHERE users.id = :teacher_id ORDER BY enrollments.enrolled_at DESC LIMIT 3";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([':teacher_id' => $teacherId]);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
          error_log("Error in getting last enrollments : " . $e->getMessage());
          return false;
        }
      }
      public function enrollmentsByCourse($course_id){
        try{
          $sql = "SELECT enrollments.*, users.name AS student_name, users.email AS student_email  FROM enrollments JOIN users ON enrollments.user_id = users.id WHERE enrollments.course_id = :course_id";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([':course_id' => $course_id]);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
          error_log("Error in getting enrollments by course: " . $e->getMessage());
          return false;
        }
      }    
      public function totalStudents($teacherId){
        try{
            $sql = "SELECT COUNT(enrollments.user_id) AS total_students FROM enrollments JOIN courses on enrollments.course_id = courses.id JOIN users ON courses.user_id = users.id WHERE users.id = :teacher_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':teacher_id' => $teacherId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            error_log("Error in getting total students: " .$e->getMessage());
            return false;
        }
      }
      public function totalCourses($teacherId){
        try{
            $sql = "SELECT COUNT(courses.id) AS total_courses FROM courses JOIN users ON courses.user_id = users.id WHERE users.id = :teacher_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':teacher_id' => $teacherId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            error_log("Error in getting total courses: " .$e->getMessage());
            return false;
        }
      }
      public function totalCategories($teacherId){
        try{
            $sql = "SELECT COUNT(category.id) AS total_categories FROM category JOIN courses ON category.id = courses.category_id WHERE courses.user_id = :teacher_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':teacher_id' => $teacherId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            error_log("Error in getting total courses: " .$e->getMessage());
            return false;
        }
      }

    }




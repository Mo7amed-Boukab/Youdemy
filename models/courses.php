<?php

class Courses
{
  protected $conn;

  public function __construct($connection)
  {
      $this->conn = $connection;
  }

  public function createCourse($title, $description, $image, $content_type, $content_text, $content_video, $duration, $level, $category_id, $user_id, $status){}

  public function getAllCourses($teacherId){}
  public function getLastCourses($teacherId){}

  public function getAll(){
    try{
      $sql = "SELECT courses.*, CONCAT(HOUR(courses.duration), 'h ',  MINUTE(courses.duration), 'min') AS course_duration, COUNT(enrollments.course_id) AS total_enrollments
              FROM 
                  courses 
              LEFT JOIN 
                  enrollments ON courses.id = enrollments.course_id
              GROUP BY 
                  courses.id;";

      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  catch(Exception $e){
      error_log("Error in getting all courses: " . $e->getMessage());
      return false;
  }
  }

  public function course_details($courseId){
    try{
      $sql = "SELECT courses.*, category.name AS category_name, CONCAT(HOUR(courses.duration), 'h ',  MINUTE(courses.duration), 'min') AS course_duration, COUNT(enrollments.course_id) AS total_enrollments
              FROM 
                  courses 
              LEFT JOIN 
                  enrollments ON courses.id = enrollments.course_id
              LEFT JOIN 
                  category ON courses.category_id = category.id    
              WHERE courses.id = :course_id
              GROUP BY 
                  courses.id";

      $stmt = $this->conn->prepare($sql);
      $stmt->execute([':course_id' => $courseId]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      error_log("Error in getting course details: " . $e->getMessage());
      return false;
    }
  }
  public function getEnrollments(){
    try{
      $sql = "SELECT enrollments.*, courses.title AS course_title, users.name, users.email FROM enrollments JOIN courses ON enrollments.course_id = courses.id JOIN users ON enrollments.user_id = users.id";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      error_log("Error in getting enrollments : " . $e->getMessage());
      return false;
    }
  }
  public function getLastEnrollments(){
    try{
      $sql = "SELECT enrollments.*, courses.title AS course_title, users.name FROM enrollments JOIN courses ON enrollments.course_id = courses.id JOIN users ON enrollments.user_id = users.id ORDER BY enrolled_at DESC LIMIT 3";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      error_log("Error in getting last enrollments : " . $e->getMessage());
      return false;
    }
  }
  

}






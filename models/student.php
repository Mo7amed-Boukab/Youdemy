
<?php
 
   require_once __DIR__ . "/../models/courses.php";

    class Student extends Courses
    {
      
      public function __construct($connection)
      {
          parent::__construct($connection); 
      }

      public function getMyEnrollments($student_id){
        try{
          $sql = "SELECT enrollments.course_id AS course_id, enrollments.status AS enrollment_status, courses.title AS course_title, courses.level AS course_level, CONCAT(HOUR(courses.duration), 'h ',  MINUTE(courses.duration), 'min') AS course_duration, COUNT(enrollments.course_id) AS total_enrollments 
                  FROM enrollments 
                  JOIN courses 
                  ON enrollments.course_id = courses.id
                  WHERE enrollments.user_id = :student_id
                  GROUP BY courses.id";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([':student_id' => $student_id]);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
          error_log("Error in getting enrollments : " . $e->getMessage());
          return false;
        }
      }

      public function isEnrolled($student_id, $course_id){
        try{
          $sql = "SELECT * FROM enrollments WHERE user_id = :student_id AND course_id = :course_id";  
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([':student_id' => $student_id, ':course_id' => $course_id]);
          return $stmt->fetch(PDO::FETCH_ASSOC);
        } 
        catch(Exception $e){
          error_log("Error in getting enrollments : " . $e->getMessage());
          return false;
        }

    }

  }





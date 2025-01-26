<?php

class Courses
{
  protected $conn;
  
  public function __construct($connection){
      $this->conn = $connection;
    }

  public function createCourse($title, $description, $image, $content_type, $content_text, $content_video, $duration, $level, $category_id, $user_id, $status){}
  public function getAllCourses($teacherId){}
  public function getLastCourses($teacherId){}
  public function getAll($limit1, $limit2) {
    try {
        $sql = "SELECT courses.*, 
                        CONCAT(HOUR(courses.duration), 'h ', MINUTE(courses.duration), 'min') AS course_duration, 
                        COUNT(enrollments.course_id) AS total_enrollments
                FROM 
                    courses 
                LEFT JOIN 
                    enrollments ON courses.id = enrollments.course_id
                WHERE 
                    courses.status = 'published'    
                GROUP BY 
                    courses.id 
                LIMIT :limit1, :limit2";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':limit1', (int)$limit1, PDO::PARAM_INT);
        $stmt->bindValue(':limit2', (int)$limit2, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        error_log("Error in getting all courses: " . $e->getMessage());
        return false;
    }
    }

  public function getPublishedCoursesCount() {
      try {
          $sql = "SELECT COUNT(*) AS total_published FROM courses WHERE status = 'published'";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute();
  
          $result = $stmt->fetch(PDO::FETCH_ASSOC);
          return $result['total_published'];
      } catch (Exception $e) {
          error_log("Error in getting published courses count: " . $e->getMessage());
          return false;
      }
     }
  public function getAllCategories() {
    try {
        $sql = "SELECT * FROM category";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        error_log("Error in getting all categories: " . $e->getMessage());
        return false;
    }
   }

  public function searchedCourses($searchValue){
        try{
          $sql = "SELECT courses.*, CONCAT(HOUR(courses.duration), 'h ',  MINUTE(courses.duration), 'min') AS course_duration, COUNT(enrollments.course_id) AS total_enrollments
                  FROM 
                      courses 
                  LEFT JOIN 
                      enrollments ON courses.id = enrollments.course_id
                  WHERE 
                      courses.status = 'published'    
                  AND courses.title LIKE :search   
                  GROUP BY 
                      courses.id";

          $stmt = $this->conn->prepare($sql);
          $stmt->execute([':search' => "%$searchValue%"]);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }catch(Exception $e){
          error_log("Error in search courses: " . $e->getMessage());
          return false;
      }
      }
  public function coursesByCategorySelected($categoryName){
        try{
          $sql = "SELECT courses.*, category.name AS category_name, CONCAT(HOUR(courses.duration), 'h ',  MINUTE(courses.duration), 'min') AS course_duration, COUNT(enrollments.course_id) AS total_enrollments
                  FROM 
                      courses 
                  INNER JOIN 
                      category ON courses.category_id = category.id    
                  LEFT JOIN 
                      enrollments ON courses.id = enrollments.course_id
                  WHERE 
                      courses.status = 'published'    
                  AND category.name = :category_name
                  GROUP BY 
                      courses.id";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([':category_name' => $categoryName]);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }catch(Exception $e){
          error_log("Error in getting courses by category: " . $e->getMessage());
          return false;
      }
    }
  public function course_details($courseId){
      try{
        $sql = "SELECT courses.*, category.name AS category_name, tags.name AS tag_name,  CONCAT(HOUR(courses.duration), 'h ',  MINUTE(courses.duration), 'min') AS course_duration, COUNT(enrollments.course_id) AS total_enrollments
                FROM 
                    courses 
                LEFT JOIN 
                    enrollments ON courses.id = enrollments.course_id
                LEFT JOIN 
                    category ON courses.category_id = category.id  
                LEFT JOIN 
                    course_tags ON courses.id = course_tags.course_id
                LEFT JOIN 
                    tags ON course_tags.tag_id = tags.id    
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
  public function getEnrollments($teacherId){}
  public function getLastEnrollments($teacherId){}
  public function allCourses_details(){}
  public function getMyEnrollments($student_id){}  
  public function enrollmentsByCourse($course_id){}
  public function getCourseForEdit($courseId) {}
  public function updateCourse($courseId, $title, $description, $image, $content_type, $content_text, $content_video, $duration, $level, $category_id, $user_id, $status) {
      try {
          $sql = "UPDATE courses 
                  SET title = :title, 
                      description = :description, 
                      image = :image, 
                      content_type = :content_type, 
                      content_text = :content_text, 
                      content_video = :content_video, 
                      duration = :duration, 
                      level = :level, 
                      category_id = :category_id, 
                      user_id = :user_id, 
                      status = :status 
                  WHERE id = :course_id";

          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
              ':title' => $title,
              ':description' => $description,
              ':image' => $image,
              ':content_type' => $content_type,
              ':content_text' => $content_text,
              ':content_video' => $content_video,
              ':duration' => $duration,
              ':level' => $level,
              ':category_id' => $category_id,
              ':user_id' => $user_id,
              ':status' => $status,
              ':course_id' => $courseId
          ]);

          return true;
      } catch (Exception $e) {
          error_log("Error in update course: " . $e->getMessage());
          return false;
      }
     }


   }





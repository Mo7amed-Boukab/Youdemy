<?php

    require_once __DIR__ . "/../models/courses.php";

class Admin extends Courses
{
  public function __construct($connection){
      parent::__construct($connection); 
    }

  public function allCourses_details(){
    try{
      $sql = "SELECT courses.id, courses.title AS course_title, category.name AS category_name, users.name AS teacher_name, CONCAT(HOUR(courses.duration), 'h ',  MINUTE(courses.duration), 'min') AS course_duration, COUNT(enrollments.course_id) AS total_enrollments
              FROM 
                  courses 
              LEFT JOIN 
                  enrollments ON courses.id = enrollments.course_id
              LEFT JOIN 
                  category ON courses.category_id = category.id  
              LEFT JOIN 
                  users ON courses.user_id = users.id      
              GROUP BY 
                  courses.id";

      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      error_log("Error in getting all courses details: " . $e->getMessage());
      return false;
    }
    }
  public function getAllTags(){
    try{
      $sql ="SELECT tags.*, COUNT(course_tags.tag_id) AS total_courses FROM tags LEFT JOIN course_tags ON tags.id = course_tags.tag_id GROUP BY tags.id";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      error_log("Error in getting all Tags: " . $e->getMessage());
      return false;
   }
    }
  public function getAllCategories(){
    try{
      $sql ="SELECT category.*, COUNT(courses.id) AS total_courses FROM category LEFT JOIN courses ON category.id = courses.category_id GROUP BY category.id";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      error_log("Error in getting all Categories: " . $e->getMessage());
      return false;
   }
  
    }
  public function totalCourses(){
    try{
      $sql = "SELECT COUNT(id) AS total_courses FROM courses";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      error_log("Error in getting total courses: " . $e->getMessage());
      return false;
    }
    }
  public function totalUsers(){
    try{
      $sql = "SELECT COUNT(id) AS total_users FROM users";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      error_log("Error in getting total users: " . $e->getMessage());
      return false;
    }
    }
  public function totalPendingTeachers(){
    try{
      $sql = "SELECT COUNT(id) AS total_pending_teachers FROM users WHERE role = 'teacher' AND status = 'pending'";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      error_log("Error in getting total pending teachers: " . $e->getMessage());
      return false;
    }
    }
  public function totalCategories(){
    try{
      $sql = " SELECT COUNT(id) AS total_categories FROM category";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      error_log("Error in getting titalk categories:" . $e->getMessage());
      return false;
    }
    }

  public function topTeachers(){
    try{
      $sql = "SELECT users.name AS teacher_name, COUNT(enrollments.user_id) AS total_students FROM users LEFT JOIN courses ON users.id = courses.user_id LEFT JOIN enrollments ON courses.id = enrollments.course_id WHERE users.role = 'teacher' GROUP BY users.name ORDER BY total_students DESC LIMIT 3";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      error_log("error in getting top 3 Teachers : ". $e->getMessage());
      return false;
    }
    }
  
  public function coursesByCategory(){
    try{
        $sql="SELECT category.name AS category_name, COUNT(courses.id) AS total_courses FROM category LEFT JOIN courses ON category.id = courses.category_id GROUP BY category_name";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      error_log("error in getting course by category" . $e->getMessage());
    }
      }
  
}
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

}






<?php 
        require_once  __DIR__ . "/../config/conn.php";

// -------------------------------------------------------------------- Add Course
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      if(isset($_POST['publish_course']) || isset($_POST['save_draft'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $image = $_POST['image_url'];
        $content_type = $_POST['content_type'];

        if ($content_type === 'video') {
          $content_video = $_POST['video_url'];
          $content_text = null;
        } elseif ($content_type === 'document') {
          $content_text = $_POST['content'];
          $content_video = null;
        }
        $duration = $_POST['duration'];
        $level = $_POST['level'];

        $category_id = $_POST['category'];
        $user_id = $_POST['teacher_id'];

        $tags = $_POST['selected_tags'];

        if(isset($_POST['publish_course'])) {
          $status = 'Published';
        }
        elseif(isset($_POST['save_draft'])) {
          $status = 'Draft';
        }

        $teacher = new Teacher($conn);
        $course_id = $teacher->createCourse($title, $description, $image, $content_type, $content_text, $content_video, $duration, $level, $category_id, $user_id, $status);
        if($course_id){
          $teacher->selectTags($course_id, $tags);
          header('Location: ' . $_SERVER['PHP_SELF']);
          exit;
        }
      
      }

    
    
    }
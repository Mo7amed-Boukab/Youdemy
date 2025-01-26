<?php 
        require_once  __DIR__ . "/../config/conn.php";
        require_once  __DIR__ . "/../models/courses.php";

        $db = new Database();
        $conn = $db->connect();
// -------------------------------------------------------------------- Add Course
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      if(isset($_POST['publish_course']) || isset($_POST['save_draft'])) {
        $title = htmlspecialchars(trim($_POST['title'])); 
        $description = htmlspecialchars(trim($_POST['description']));
        $image = htmlspecialchars(trim($_POST['image_url']));
        $content_type = htmlspecialchars(trim($_POST['content_type']));

        if ($content_type === 'video') {
          $content_video = htmlspecialchars(trim($_POST['video_url']));
          $content_text = null;
        } elseif ($content_type === 'document') {
          $content_text = htmlspecialchars(trim($_POST['content']));
          $content_video = null;
        }
        $duration = htmlspecialchars(trim($_POST['duration']));
        $level = htmlspecialchars(trim($_POST['level']));

        $category_id = htmlspecialchars(trim($_POST['category']));
        $user_id = htmlspecialchars(trim($_POST['teacher_id']));

        $tags = htmlspecialchars(trim($_POST['selected_tags']));

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
      // --------------------------------------------------------------- Courses Management
      if(isset($_POST['delete_course']) && isset($_POST['course_id'])){
        $course_id = $_POST['course_id'];
        $sql = "DELETE FROM courses WHERE id = :course_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':course_id' => $course_id]);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
      }

      if(isset($_POST['update_course']) || isset($_POST['new_save_draft'])) {
        $course_id = htmlspecialchars(trim($_POST['course_id']));
        $title = htmlspecialchars(trim($_POST['new_title']));
        $description = $_POST['new_description'];
        $image = $_POST['new_image_url'];
        $content_type = htmlspecialchars(trim($_POST['new_content_type']));

        if ($content_type === 'video') {
          $content_video = htmlspecialchars(trim($_POST['new_video_url']));
          $content_text = null;
        } elseif ($content_type === 'document') {
          $content_text = htmlspecialchars(trim($_POST['new_content']));
          $content_video = null;
        }
        $duration = htmlspecialchars(trim($_POST['new_duration']));
        $level = htmlspecialchars(trim($_POST['level']));
        $category_id = htmlspecialchars(trim($_POST['new_category']));
        $user_id = htmlspecialchars(trim( $_POST['teacher_id']));
        $tags = htmlspecialchars(trim($_POST['new_selected_tags']));
        if(isset($_POST['new_save_draft'])){
          $status = 'Draft';
        }
        else{
          $status = 'Published';
        }
        $update = new Courses($conn);

        $update->updateCourse($course_id, $title, $description, $image, $content_type, $content_text, $content_video, $duration, $level, $category_id, $user_id, $status);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
      }  
    
    }
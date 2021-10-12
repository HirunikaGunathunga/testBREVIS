<?php
  class Course {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Add Course
      public function addcourse($data){
      $this->db->query('INSERT INTO course (course_id, duration, course_name ) VALUES(:course_id, :duration, :course_name)');
      // Bind values
      $this->db->bind(':course_id', $data['course_id']);
      $this->db->bind(':duration', $data['duration']);
      $this->db->bind(':course_name', $data['course_name']);
      

          // Execute
      if($this->db->execute()){
        return true;
        
      } else {
        return false;
      }
  
    }

    // Add recomendedcourse1
    public function recomendedCourse1($data){
      if(!empty($data['recomended_course1'])){
      $this->db->query('INSERT INTO course_recomended (course_id, recomended_id, recomended_course ) VALUES(:course_id, 1, :recomended_course1)');
      // Bind values
      $this->db->bind(':course_id', $data['course_id']);
      $this->db->bind(':recomended_course1', $data['recomended_course1']);
      
      if($this->db->execute()){
        return true;
        
      } else {
        return false;
      }
     }
     else 
     return true;
  
    }

    // Add recomendedcourse2
    public function recomendedCourse2($data){
      if(!empty($data['recomended_course2'])){
      $this->db->query('INSERT INTO course_recomended (course_id, recomended_id, recomended_course ) VALUES(:course_id, 2, :recomended_course2)');
      // Bind values
      $this->db->bind(':course_id', $data['course_id']);
      $this->db->bind(':recomended_course2', $data['recomended_course2']);
      if($this->db->execute()){
        return true;
        
      } else {
        return false;
      }
      }
      else 
      return true;
  
    }

    
    // Find course by Course_ID
    public function findCourse($course_id){
      $this->db->query('SELECT * FROM course WHERE course_id = :course_id');
      // Bind value
      $this->db->bind(':course_id', $course_id);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() == 0){
        return true;
      } else {
        return false;
      }
    }

    // Get course by Course_ID
    public function getCourseById($id){
      $this->db->query('SELECT * FROM course WHERE course_id = :course_id');
      $this->db->bind(':course_id', $id);

      $row = $this->db->single();

      return $row;
    }

    public function getrecomendedCourse($id){
      $this->db->query('SELECT * FROM course_recomended WHERE course_id = :course_id ');
      $this->db->bind(':course_id', $id);

      $results = $this->db->resultSet();

      return $results;
    }

    public function findrecomendedCourse1($id){
      $this->db->query('SELECT * FROM course_recomended WHERE course_id = :course_id AND recomended_id= 1');
      $this->db->bind(':course_id', $id);

      $row = $this->db->single();

      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    public function getrecomendedCourse1($id){
      $this->db->query('SELECT * FROM course_recomended WHERE course_id = :course_id AND recomended_id= 1');
      $this->db->bind(':course_id', $id);

      $results = $this->db->single();

      return $results;
    }

    public function findrecomendedCourse2($id){
      $this->db->query('SELECT * FROM course_recomended WHERE course_id = :course_id AND recomended_id= 2');
      $this->db->bind(':course_id', $id);

      $row = $this->db->single();

      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    public function getrecomendedCourse2($id){
      $this->db->query('SELECT * FROM course_recomended WHERE course_id = :course_id AND recomended_id= 2');
      $this->db->bind(':course_id', $id);

      $results = $this->db->single();

      return $results;
    }

    // Update Course
    public function updatecourse($data){
      $this->db->query('UPDATE course SET duration = :duration, course_name = :course_name WHERE course_id = :course_id');
      // Bind values
      $this->db->bind(':course_id', $data['course_id']);
      $this->db->bind(':duration', $data['duration']);
      $this->db->bind(':course_name', $data['course_name']);
      

      // Execute
      if($this->db->execute()){
        return true;
        
      } else {
        return false;
      }

    }

    // Add recomendedcourse1
    public function updaterecomendedCourse1($data){
        $this->db->query('UPDATE course_recomended SET recomended_course = :recomended_course1 WHERE course_id = :course_id AND recomended_id= 1' );
        // Bind values
        $this->db->bind(':course_id', $data['course_id']);
        $this->db->bind(':recomended_course1', $data['recomended_course1']);
        if($this->db->execute()){
          return true; 
        } else {
          return false;
        } 
    }
    
    // Add recomendedcourse2
    public function updaterecomendedCourse2($data){
        $this->db->query('UPDATE course_recomended SET recomended_course = :recomended_course2 WHERE course_id = :course_id AND recomended_id= 2' );
        // Bind values
        $this->db->bind(':course_id', $data['course_id']);
        $this->db->bind(':recomended_course2', $data['recomended_course2']);
        if($this->db->execute()){
          return true; 
        } else {
          return false;
        } 
    }

    public function deletecourse($id){
      $this->db->query('DELETE FROM course WHERE course_id = :id');
      // Bind values
      $this->db->bind(':id', $id);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Find course by Course_ID
    public function searchcourse($id){
      $this->db->query('SELECT * FROM course WHERE course_id = :course_id LIKE ? order by course_id');  //course name
      // Bind value
      $this->db->bind(':course_id', $id);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount()){
        return $row;
      }
      else {
        return false;
      }
        
    }



  }
<?php
  class Courses extends Controller {
    public function __construct(){
      $this->courseModel = $this->model('Course');
    }

    public function index(){
      // Get courses
      $data = [];

      $this->view('courses/index', $data);
    }

    public function addcourse(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data =[
          'course_id' => trim($_POST['course_id']),
          'course_name' => trim($_POST['course_name']),
          'duration' => trim($_POST['duration']),
          'recomended_course1' => trim($_POST['recomended_course1']),
          'recomended_course2' => trim($_POST['recomended_course2']),
          'course_id_err' => '',
          'course_name_err' => '',
          'duration_err' => '',
          'recomended_err1' => '',
          'recomended_err2' => ''
        ];

        // Validate Course ID
        if(empty($data['course_id'])){
          $data['course_id_err'] = 'Please enter Course Id';
        } else {
          // Check Course ID
          if($this->courseModel->findCourse($data['course_id'])){
          }
          else{
            $data['course_id_err'] = 'This Course Id is already taken';
          }
        }

        // Validate Course Name
        if(empty($data['course_name'])){
          $data['course_name_err'] = 'Please enter Coursename';
        }

        // Validate Course duration
        if(empty($data['duration'])){
          $data['duration_err'] = 'Please enter Duration';
        } 

        // Validate recomended courses
        if(!empty($data['recomended_course1'])){
          // Check course_ID
          if($this->courseModel->findCourse($data['recomended_course1'])){
            $data['recomended_err1'] = 'This Course ID doesn\'t exist';
          }
        }   
        
        // Validate recomended courses
        if(!empty($data['recomended_course2'])){
          // Check course_ID
          if($this->courseModel->findCourse($data['recomended_course2'])){
            $data['recomended_err2'] = 'This Course ID doesn\'t exist';
          }
          elseif($data['recomended_course2']==$data['recomended_course1']){
            $data['recomended_err2'] = 'This course is recomended already';
          }
        }   

        // Make sure errors are empty
        if (!empty($data['recomended_course1'])|| !empty($data['recomended_course2'])){

          if(empty($data['course_id_err']) && empty($data['course_name_err']) && empty($data['duration_err']) && empty($data['recomended_err1']) && empty($data['recomended_err2']) ){
            // Validated
          
            // Register User
            if($this->courseModel->addcourse($data) && $this->courseModel->recomendedCourse1($data) && $this->courseModel->recomendedCourse2($data)){
              flash('course_register_success', 'Course is added successfully');
              redirect('courses/addcourse');
            } else {
              die('Something went wrong');
            }

          } else {
            // Load view with errors
            $this->view('courses/addcourse', $data);
          }
        }

      else {
        if(empty($data['course_id_err']) && empty($data['course_name_err']) && empty($data['duration_err'])){
          // Validated
        
          // Register User
          if($this->courseModel->addcourse($data)){
            flash('course_register_success', 'Course is added successfully');
            redirect('courses/addcourse');
          } else {
            die('Something went wrong');
          }

        } else {
          // Load view with errors
          $this->view('courses/addcourse', $data);
        }
      }

      } else {
        // Init data
        $data =[
          'course_id' => '',
          'course_name' => '',
          'duration' => '',
          'recomended_course1' => '',
          'recomended_course2' => '',
          'course_id_err' => '',
          'course_name_err' => '',
          'duration_err' => '',
          'recomended_err1' => '',
          'recomended_err2' => ''
        ];

        // Load view
        $this->view('courses/addcourse', $data);

       }
      }

    public function updatecourse($id){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data =[
          'course_id' => $id,
          'course_name' => trim($_POST['course_name']),
          'duration' => trim($_POST['duration']),
          'recomended_course1' => trim($_POST['recomended_course1']),
          'recomended_course2' => trim($_POST['recomended_course2']),
          'course_name_err' => '',
          'duration_err' => '',
          'recomended_err1' => '',
          'recomended_err2' => ''
        ];

        // Validate Course Name
        if(empty($data['course_name'])){
          $data['course_name_err'] = 'Please enter Coursename';
        }

        // Validate Course duration
        if(empty($data['duration'])){
          $data['duration_err'] = 'Please enter Duration';
        } 

        // Validate recomended courses
        if(!empty($data['recomended_course1'])){
          // Check course_ID
          if($this->courseModel->findCourse($data['recomended_course1'])){
            $data['recomended_err1'] = 'This Course ID doesn\'t exist';
          }
          if($data['recomended_course1']==$data['course_id']){
            $data['recomended_err1'] = 'This Course ID is this course\'s ID';
          }
        }   
        
        // Validate recomended courses
        if(!empty($data['recomended_course2'])){
          // Check course_ID
          if($this->courseModel->findCourse($data['recomended_course2'])){
            $data['recomended_err2'] = 'This Course ID doesn\'t exist';
          }
          if($data['recomended_course2']==$data['recomended_course1']){
            $data['recomended_err2'] = 'This course is recomended already';
          }
          if($data['recomended_course2']==$data['course_id']){
            $data['recomended_err2'] = 'This Course ID is this course\'s ID';
          }
        }   

        if($this->courseModel->findrecomendedCourse1($data['course_id'])){

              if($this->courseModel->findrecomendedCourse2($data['course_id'])){

                    if(empty($data['course_name_err']) && empty($data['duration_err']) && empty($data['recomended_err1']) && empty($data['recomended_err2']) ){
                        if($this->courseModel->updatecourse($data) && $this->courseModel->updaterecomendedCourse1($data) && $this->courseModel->updaterecomendedCourse2($data)){
                          flash('course_update_success', 'Course is updated successfully');
                          redirect('admin/index');
            
                        }else {
                            die('Something went wrong');
                        }
                    
                    }
                    else {
                      // Load view with errors
                      $this->view('courses/updatecourse', $data);
                    }
                
              }

              else{
                    if(empty($data['course_name_err']) && empty($data['duration_err']) && empty($data['recomended_err1']) && empty($data['recomended_err2']) ){
                        if($this->courseModel->updatecourse($data) && $this->courseModel->updaterecomendedCourse1($data)&& $this->courseModel->recomendedCourse2($data)) {
                          flash('course_update_success', 'Course is updated successfully');
                          redirect('admin/index');
            
                        }else {
                            die('Something went wrong');
                        }
                    
                    }
                    else {
                      // Load view with errors
                      $this->view('courses/updatecourse', $data);
                    }

              }
              

            }
            else{
              if(!empty($data['recomended_course1'])|| !empty($data['recomended_course2'])){
                if(empty($data['course_name_err']) && empty($data['duration_err']) && empty($data['recomended_err1']) && empty($data['recomended_err2']) ){
                      if($this->courseModel->updatecourse($data) && $this->courseModel->recomendedCourse1($data) && $this->courseModel->recomendedCourse2($data)) {
                        flash('course_update_success', 'Course is updated successfully');
                        redirect('admin/index');
          
                      }else {
                          die('Something went wrong');
                      }
              
                    }
                    else {
                      // Load view with errors
                      $this->view('courses/updatecourse', $data);
                    }
                  
                }
                else{
                  if(empty($data['course_name_err']) && empty($data['duration_err']) && empty($data['recomended_err1']) && empty($data['recomended_err2']) ){
                    if($this->courseModel->updatecourse($data)) {
                      flash('course_update_success', 'Course is updated successfully');
                      redirect('admin/index');
        
                    }else {
                        die('Something went wrong');
                    }
            
                  }
                  else {
                    // Load view with errors
                    $this->view('courses/updatecourse', $data);
                  }
                
                }

            }

      } else {

         // Get existing course from model
         $course = $this->courseModel->getCourseById($id);
         if($this->courseModel->findrecomendedCourse1($id)){
          $value = $this->courseModel->getrecomendedCourse1($id);
          $val =$value-> recomended_course;
         }
        else{
          $val='';
        }
         
         if($this->courseModel->findrecomendedCourse2($id)){
          $value1 = $this->courseModel->getrecomendedCourse2($id);
          $val1 =$value1-> recomended_course;
         }
        else{
          $val1='';
        }
         
 
        // Init data
        $data =[
          'course_id' => $id,
          'course_name' => $course-> course_name,
          'duration' => $course-> duration,
          'recomended_course1' => $val,
          'recomended_course2' => $val1,
          'course_name_err' => '',
          'duration_err' => '',
          'recomended_err1' => '',
          'recomended_err2' => ''
        ];

        // Load view
        $this->view('courses/updatecourse', $data);

        }
      }

    public function viewcourse($id){
      $course = $this->courseModel->getCourseById($id);
      $recomended = $this->courseModel->getrecomendedCourse($id);

      $data = [
        'course' => $course,
        'recomended' => $recomended
      ];

      $this->view('courses/viewcourse', $data);
    }


    public function deletecourse($id){
      
      // Get existing course from model
      $course = $this->courseModel->getCourseById($id);
      $recomended = $this->courseModel->getrecomendedCourse($id);

      $data = [
        'course' => $course,
        'recomended' => $recomended
      ];
   
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){


        if($this->courseModel->deletecourse($id)){
          flash('delete_message', 'Course Deleted');
          redirect('admin/index');

        } else {
          die('Something went wrong');
        } 

      } 
    
      $this->view('courses/deletecourse', $data);

        
      }

    
    public function searchcourse(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data =[
          'search' => trim($_POST['search'])
        ];
       
        // Search
          if($this->courseModel->searchcourse($data)){

            $course= $this->courseModel->searchcourse($data);

            $id= $course-> course_id;

            redirect('courses/viewcourse/$id');
            
          } 

          else {
            redirect('admin/index');
        }
      }
    }

  }   





  


    
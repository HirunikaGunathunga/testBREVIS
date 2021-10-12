<?php

class Admin extends Controller{
    public function __construct(){

         $this->adminModel = $this->model('Admins');
    }
    
    public function index(){
      $courses = $this->adminModel->getcourse();
      $lecturers = $this->adminModel->getlecturer();
      $batches = $this->adminModel->getbatch();


      $data = [
        'courses' => $courses,
        'lecturers' => $lecturers,
        'batches' => $batches

      ];
        $this->view('admin/index', $data);
    }
}

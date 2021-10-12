<?php

class Admin extends Controller{
    public function __construct(){

         $this->adminModel = $this->model('Admins');
    }
    
    public function index(){
      $courses = $this->adminModel->getcourse();

      $data = [
        'courses' => $courses
      ];
        $this->view('admin/index', $data);
    }
}

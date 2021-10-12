<?php
class Lecturers extends Controller{
    public function __construct(){
         $this->lecturerModel = $this->model('Lecturer');
    }
  

    public function addLecturer(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data =[
                'firstname' => trim($_POST['firstname']),
                'lastname' => trim($_POST['lastname']),
                'nic' => trim($_POST['nic']),
                'birthday' => trim($_POST['birthday']),
                'homeaddress' => trim($_POST['homeaddress']),
                'occupation' => trim($_POST['occupation']),
                'workaddress' => trim($_POST['workaddress']),
                'email' => trim($_POST['email']),
                'contact' => trim($_POST['contact']),
                'password' => trim($_POST['password']),
                'nic_err' => '',
                'password_err' =>''
            ];

            // Validate nic
            if(empty($data['nic'])){
                $data['nic_err'] = 'Please enter NIC';
            } else {
                // Check nic
                if($this->lecturerModel->findLecturer($data['nic'])){
                    $data['nic_err'] = 'Nic is already taken';
                }
            }

            //Validate password
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
            } elseif(strlen($data['password']) < 6){
                $data['password_err'] = 'Password must be at least 6 characters';
            }



            if(empty($data['nic_err']) && empty($data['password_err'])){
                // Validated

                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if($this->lecturerModel->addLecturer($data) && $this->lecturerModel->addUser($data)){
                    flash('register_success', 'Successfully registered the lecturer');
                    redirect('lecturers/addLecturer');
                } else {
                    die('Something went wrong');
                }

            } else {
                // Load view with errors
                $this->view('lecturers/addLecturer', $data);
            }

        } else {
            // Init data
            $data =[
                'firstname' => '',
                'lastname' => '',
                'nic' => '',
                'birthday' => '',
                'homeaddress' => '',
                'workaddress' => '',
                'occupation' => '',
                'email' => '',
                'password' => '',
                'contact' => '',
                'nic_err' => '',
                'password_err' =>''
            ];

            // Load view
            $this->view('lecturers/addLecturer', $data);
        }
    }

}
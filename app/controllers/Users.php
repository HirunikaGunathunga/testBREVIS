<?php
class Users extends Controller {
    public function __construct(){
      $this->userModel = $this->model('User');
    }

    public function register(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data =[
          'firstname' => trim($_POST['firstname']),
          'lastname' => trim($_POST['lastname']),
          'username' => trim($_POST['username']),
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'cpassword' => trim($_POST['cpassword']),
          'role' => '',
          'firstname_err' => '',
          'lastname_err' => '',
          'username_err' => '',
          'email_err' => '',
          'password_err' => '',
          'cpassword_err' => ''
        ];

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Please enter email';
        }

        // Validate firstName
        if(empty($data['firstname'])){
          $data['firstname_err'] = 'Please enter firstname';
        }

        // Validate lastName
        if(empty($data['lastname'])){
          $data['lastname_err'] = 'Please enter lastname';
        }

        // Validate Nic
        if(empty($data['username'])){
          $data['username_err'] = 'Please enter NIC';
        } else {
          // Check nic
          if($this->userModel->findUserByNic($data['username'])){
            $data['username_err'] = 'Nic is already taken';
          }
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
        } elseif(strlen($data['password']) < 6){
          $data['password_err'] = 'Password must be at least 6 characters';
        }

        // Validate Confirm Password
        if(empty($data['cpassword'])){
          $data['cpassword_err'] = 'Please confirm password';
        } else {
          if($data['password'] != $data['cpassword']){
            $data['cpassword_err'] = 'Passwords do not match';
          }
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['firstname_err']) && empty($data['lastname_err']) && empty($data['username_err']) && empty($data['password_err']) && empty($data['cpassword_err'])){
          // Validated
          
          // Hash Password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          // Register User
          if($this->userModel->register($data)){
            flash('register_success', 'You are registered and can log in');
            redirect('users/login');
          } else {
            die('Something went wrong');
          }

        } else {
          // Load view with errors
          $this->view('users/register', $data);
        }

      } else {
        // Init data
        $data =[
          'firstname' => '',
          'lastname' => '',
          'username' => '',
          'email' => '',
          'role' => '',
          'password' => '',
          'cpassword' => '',
          'firstname_err' => '',
          'lastname_err' => '',
          'username_err' => '',
          'email_err' => '',
          'password_err' => '',
          'cpassword_err' => ''
        ];

        // Load view
        $this->view('users/register', $data);
      }
    }

    public function login(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'username' => trim($_POST['username']),
          'password' => trim($_POST['password']),
          'role' => '',
          'username_err' => '',
          'password_err' => '',      
        ];

         // Validate Username
         if(empty($data['username'])){
          $data['username_err'] = 'Please enter Username';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
        }

        // Check for user
        if($this->userModel->findUserByNic($data['username'])){
          // User found
        } else {
          // User not found
          $data['username_err'] = 'No user found';
        }

        // Make sure errors are empty
        if(empty($data['username_err']) && empty($data['password_err'])){
          // Validated
          // Check and set logged in user
          $loggedInUser = $this->userModel->login($data['username'], $data['password']);

          if($loggedInUser){
            // Create Session
            $this->createUserSession($loggedInUser);

          } else {
            $data['password_err'] = 'Password incorrect';

            $this->view('users/login', $data);
          }
        } else {
          // Load view with errors
          $this->view('users/login', $data);
        }


      } else {
        // Init data
        $data =[    
          'username' => '',
          'password' => '',
          'username_err' => '',
          'password_err' => '',        
        ];

        // Load view
        $this->view('users/login', $data);
      }
    }

    public function createUserSession($user){
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_username'] = $user->username;
      $_SESSION['user_email'] = $user->email;
      $_SESSION['user_role'] = $user->role;
      if($_SESSION['user_role'] == 'Student'){ $_SESSION['controller'] ='student'; $_SESSION['roleName'] = 'Student'; }
      if($_SESSION['user_role'] == 'Admin'){ $_SESSION['controller'] ='admin'; $_SESSION['roleName'] = 'Admin'; }
      redirect('includes/index');
    }

    public function logout(){
      unset($_SESSION['user_id'], $_SESSION['user_username'], $_SESSION['user_email']);
      session_destroy();
      redirect('users/login');
    }

    function isLoggedIn(){
      if(isset($_SESSION['user_id'])){
        return true;
      } else {
        return false;
      }
    }

  }

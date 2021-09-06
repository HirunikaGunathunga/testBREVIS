<?php

class homeController extends Controller{

    public function index(){           // This is how load the view of login
        $this->view('includes/nav');
        $this->view->render();
    }

    public function indexModel(){     // This is how load the model for login
        $this->model('home/loginModel');
        $this->model->load();
    }


}
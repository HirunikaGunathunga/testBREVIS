<?php

class Includes extends Controller{
    public function index(){
        $data = [];

        $this->view('includes/index', $data);
    }

}

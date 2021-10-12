<?php
  class Admins {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Get Course
    public function getcourse(){
        $this->db->query('SELECT course_id, course_name FROM course');
        $results = $this->db->resultSet();

    return $results;
    }


}
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

    public function getlecturer(){
      $this->db->query('SELECT ID, firstname, lastname FROM lecturer');
      $results = $this->db->resultSet();

    return $results;
    }

    public function getbatch(){
      $this->db->query('SELECT course_id, course_name FROM course');
      $results = $this->db->resultSet();

    return $results;
  }



}
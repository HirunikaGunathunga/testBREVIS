<?php
class Lecturer{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function addLecturer($data){
        $this->db->query('INSERT INTO lecturer(firstname,lastname,nic,email,occupation,birthday,homeaddress,workaddress,contact ) VALUES(:firstname, :lastname,:nic,:email,:occupation,:birthday,:homeaddress,:workaddress, :contact)');
        // Bind values
        $this->db->bind(':firstname', $data['firstname']);
        $this->db->bind(':lastname', $data['lastname']);
        $this->db->bind(':nic', $data['nic']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':occupation', $data['occupation']);
        $this->db->bind(':birthday', $data['birthday']);
        $this->db->bind(':homeaddress', $data['homeaddress']);
        $this->db->bind(':workaddress', $data['workaddress']);
        $this->db->bind(':contact', $data['contact']);

        if($this->db->execute()){
            return true;

        } else {
            return false;
        }
    }

    public function addUser($data){
        $this->db->query('INSERT INTO users (firstname, lastname,username,email,role,password ) VALUES(:firstname, :lastname,:nic,:email,"Lecturer",:password)');
        // Bind values
        $this->db->bind(':firstname', $data['firstname']);
        $this->db->bind(':lastname', $data['lastname']);
        $this->db->bind(':nic', $data['nic']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        if($this->db->execute()){
            return true;

        } else {
            return false;
        }
    }
    
    public function findLecturer($nic){
        $this->db->query('SELECT * FROM lecturer WHERE nic = :nic');
        // Bind value
        $this->db->bind(':nic', $nic);

        $row = $this->db->single();

        // Check row
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

}
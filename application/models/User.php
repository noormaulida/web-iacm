<?php
class User extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_user($username, $password)
    {
        $this->db->select("*");
        $this->db->from('users');
        $this->db->where("email", $email);
        $this->db->where("password", $password);
        $query = $this->db->get();
        return $query->row_array();
   }
}
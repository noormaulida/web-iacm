<?php
class User extends CI_Model {
    var $full_name = '';
    var $nick_name = '';
    var $cm_generation = '';
    var $email = '';
    var $password = '';
    var $address = '';
    var $phone = '';
    var $date_of_birth = '';
    var $company = '';
    var $occupation = '';
    var $institution = '';
    var $avatar = '';
    var $login_count = '';
    var $is_admin = '';
    var $validated_with = '';
    var $validated_at = '';
    var $created_at = '';
    var $updated_at = '';

    public function __construct()
    {
        parent::__construct();
    }

    public function sign_in($email, $password)
    {
        $this->db->select('id, login_count, is_admin, full_name, nick_name');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('password', $this->_hash($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            $result = $query->result();
            $this->update_detail_login($result);
            return $result;
        } else {
            return false;
        }
    }

    public function find($id, $param = null)
    {
        $this->db->select(!is_null($param) ? '*' : $param);
        $this->db->from('users');
        $this->db->where('id', $id);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    private function update_detail_login($result)
    {
        foreach ($result as $value) {
            $id = $value->id;
            $count = $value->login_count;
        }
        $count++;
        $data = array(
           'login_count' => $count,
           'last_login_ip' => $this->input->ip_address(),
        );
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    private function _hash($password)
    {
        return sha1(md5($password));
    }
}

<?php
class User extends CI_Model {
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

    public function is_email_exist($email)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function store($data)
    {
        return $this->db->insert('users', $data);
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

    public function _hash($password)
    {
        return sha1(md5($password));
    }
}

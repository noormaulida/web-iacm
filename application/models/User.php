<?php
class User extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function sign_in($email, $password)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('password', $this->_hash($password));
        $this->db->where('validated_at IS NOT NULL', null);
        $this->db->where('validated_with IS NOT NULL', null);
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

    public function all()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->order_by('validated_at', 'asc');

        $query = $this->db->get();
        return $query->result();
    }

    public function all_admin()
    {
        $this->db->select('id, full_name');
        $this->db->from('users');
        $this->db->where('is_admin', true);

        $query = $this->db->get();
        return $query->result();
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

    public function count_unvalidated_members()
    {
        $this->db->select('COUNT(id) as count');
        $this->db->from('users');
        $this->db->where('validated_at', null);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            foreach ($query->result() as $value) {
                $count = $value->count;
            }
            return $count;
        } else {
            return "0";
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
           'updated_at' => date('Y-m-d H:i:s'),
        );
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function _hash($password)
    {
        return sha1(md5($password));
    }
    
    public function get_univ_list()//get univ list
    {
        $this->db->select('univ_name');
        $this->db->from('univ');

        $query = $this->db->get();
        return $query->result();
    }
}

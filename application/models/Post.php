<?php
class Post extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
    }

    public function all()
    {
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->order_by('created_at', 'desc');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_slug($slug, $exactly = true)
    {
        $this->db->select('*');
        $this->db->from('posts');
        if ($exactly == true) {
            $this->db->where('slug', $slug);
            $this->db->limit(1);
        } else {
            $this->db->like('slug', $slug);
        }

        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function create_slug($title)
    {
        $slug = strtolower(url_title(($title), "-", true));
        // $result = $this->get_by_slug($title, false);
        return $slug;
    }
}

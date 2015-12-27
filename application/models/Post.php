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

    public function store($data)
    {
        return $this->db->insert('posts', $data);
    }

    public function get_by_slug($slug, $exactly = true)
    {
        $this->db->select('*');
        $this->db->from('posts');
        if ($exactly == true) {
            $this->db->where('slug', $slug);
            $this->db->limit(1);
            $query = $this->db->get();
            if ($query->num_rows() >= 1) {
                return $query->result();
            } else {
                return false;
            }
        } else {
            $this->db->like('slug', $slug);
            $query = $this->db->get();
            return $query->num_rows();
        }
    }

    public function create_unique_slug($title)
    {
        $slug = strtolower(url_title(($title), "-", true));
        $count = $this->get_by_slug($slug, false);
        // var_dump($count); return;
        if ($count == 1) {
            $result = $this->get_by_slug($slug, true);
            $current_slug = "";
            if ($result) {
                    foreach ($result as $value) {
                        $current_slug = $value->slug;
                    }
                    if ($current_slug == $slug) {
                        return $slug . "-" . ($count+1);
                    } else {
                        return $slug;
                    }
                } else {
                    return $slug;
                }
        } elseif ($count > 1) {
            $current_slug = null;
            $loop = $count + 2;
            while ($loop--) {
                if ($loop > 1) {
                    $result = $this->get_by_slug($slug . '-' . $loop, true);
                    if ($result) {
                        if ($current_slug != null) { break; }
                    } else {
                        $current_slug = $slug . '-' . $loop;
                        if ($loop == 2) {
                            if (!$this->get_by_slug($slug, true)) {
                                $current_slug = $slug;
                            }
                            break;
                        }
                    }
                } else {
                    $current_slug = $slug;
                }
            }
            return $current_slug;
        } else {
            return $slug;
        }
    }
}

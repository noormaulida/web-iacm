<?php
class Post extends CI_Model {
    var $user_id = '';
    var $title = '';
    var $content = '';
    var $slug = '';
    var $type = '';
    var $published_at = '';
    var $created_at = '';
    var $updated_at = '';
    var $updated_with = '';
    var $deleted_at = '';
    var $deleted_with = '';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
}

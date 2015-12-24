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
        $this->load->database();
    }
}

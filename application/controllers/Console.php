<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Console extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->input->is_cli_request()) {
            exit('Direct access is not allowed');
        }
        $this->load->model('user');
    }

    function new_admin($email, $password)
    {
        if (!$this->user->is_email_exist($email)) {
            $data = array(
                "full_name" => "Super Admin",
                "nick_name" => "Super Admin",
                "cm_generation" => 1,
                "email" => $email,
                "password" => $this->user->_hash($password),
                "address" => "default",
                "phone" => "default",
                "date_of_birth" => "",
                "company" => "",
                "occupation" => "",
                "institution" => "",
                "avatar" => "assets/uploads/avatar/default.png",
                "login_count" => 0,
                "is_admin" => 1,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
                "validated_at" => date('Y-m-d H:i:s'),
                "validated_with" => 1
            );
            $this->user->store($data);
            echo "Data administrator baru berhasil disimpan" . PHP_EOL;
        } else {
            echo "Email sudah ada di dalam database" . PHP_EOL;
        }
    }
}
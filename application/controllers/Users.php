<?php
class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');
    }

    public function login()
    {
        // $ip = $this->input->ip_address();
        // echo $ip;
        if (is_admin_session()) {
            $this->load->view('dashboard/_include/header');
            $this->load->view('dashboard/index');
            $this->load->view('dashboard/_include/footer');
        } elseif (is_user_session()) {
            redirect('pages/index', 'refresh');
        }
        $this->form_validation->set_rules("email", "email", "trim|required");
        $this->form_validation->set_rules("password", "password", "trim|required");
        if ($this->form_validation->run() == false) {
            $this->load->view('users/login');
        } else {
            $email = $this->input->post("email");
            $password = $this->input->post("password");
            $result = $this->user->sign_in($email, $password);
            if ($result) {
                foreach ($result as $value) {
                    $session_data = [
                        'id' => $value->id,
                        'full_name' => $value->full_name,
                        'nick_name' => $value->nick_name,
                    ];
                    $this->session->set_userdata('logged_in', $session_data);
                    $this->session->set_userdata('role', $value->is_admin == true ? "admin" : "user");
                    if ($value->is_admin) {
                        $this->load->view('dashboard/_include/header');
                        $this->load->view('dashboard/index');
                        $this->load->view('dashboard/_include/footer');
                    } else {
                        redirect('pages/index', 'refresh');
                    }
                }
            } else {
                $this->form_validation->set_message('check_database', 'Invalid username or password');
                $this->load->view('users/login');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('users/login', 'refresh');
    }

    public function create()
    {
        $this->load->view('dashboard/_include/header');
        $this->load->view('dashboard/users/create');
        $this->load->view('dashboard/_include/footer');
    }
}

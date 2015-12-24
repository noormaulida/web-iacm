<?php
class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');
    }

    public function login()
    {
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
                    $this->session->set_userdata('logged_in', $value->id);
                    $this->load->view('dashboard/_include/header');
                    $this->load->view('dashboard/index');
                    $this->load->view('dashboard/_include/footer');
                }
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

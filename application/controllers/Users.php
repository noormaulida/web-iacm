<?php
class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');
    }

    public function login()
    {
        if (is_admin_session()) {
            $this->session->set_userdata('tab', "dashboard-index");
            $this->load->view('dashboard/_include/header');
            $this->load->view('dashboard/index');
            $this->load->view('dashboard/_include/footer');
            return;
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
                        $this->session->set_userdata('tab', "dashboard-index");
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

    public function index()
    {
        if (is_user_session()) {
            redirect('pages/index', 'refresh');
        }
        $this->session->set_userdata('tab', "users-index");
        $this->load->view('dashboard/_include/header');
        $this->load->view('dashboard/users/index');
        $this->load->view('dashboard/_include/footer');
    }

    public function create()
    {
        if (is_user_session()) {
            redirect('pages/index', 'refresh');
        }
        $this->form_validation->set_rules("full_name", "full_name", "trim|required");
        $this->form_validation->set_rules("nick_name", "nick_name", "trim|required");
        $this->form_validation->set_rules("cm_generation", "cm_generation", "trim|required");
        $this->form_validation->set_rules("email", "email", "trim|required");
        $this->form_validation->set_rules("password", "password", "trim|required");
        $this->form_validation->set_rules("address", "address", "trim|required");
        $this->form_validation->set_rules("phone", "phone", "trim|required");
        $this->form_validation->set_rules("date_of_birth", "date_of_birth", "trim|required");
        if ($this->form_validation->run() == false) {
            $this->session->set_userdata('tab', "users-create");
            $this->load->view('dashboard/_include/header');
            $this->load->view('dashboard/users/create');
            $this->load->view('dashboard/_include/footer');
        } else {
            $data = array(
                "full_name" => $this->input->post('full_name'),
                "nick_name" => $this->input->post('nick_name'),
                "cm_generation" => $this->input->post('cm_generation'),
                "email" => $this->input->post('email'),
                "password" => $this->user->_hash($this->input->post('password')),
                "address" => $this->input->post('address'),
                "phone" => $this->input->post('phone'),
                "date_of_birth" => $this->input->post('date_of_birth'),
                "company" => $this->input->post('company'),
                "occupation" => $this->input->post('occupation'),
                "institution" => $this->input->post('institution'),
                "avatar" => "assets/uploads/avatar/default.png",
                "login_count" => 0,
                "is_admin" => 1, //$this->input->post('is_admin');
                "created_at" => time(),
                "updated_at" => time(),
            );
            $result = $this->user->store($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            } else {
                $this->session->set_flashdata('error', 'Data Gagal Disimpan');
            }
            $this->session->set_userdata('tab', "users-create");
            $this->load->view('dashboard/_include/header');
            $this->load->view('dashboard/users/create');
            $this->load->view('dashboard/_include/footer');
        }
    }
}

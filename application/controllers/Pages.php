<?php
class Pages extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');
    }

    public function index()
    {
    	echo "Under construction";
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
        if ($this->input->post('login_hidden')) {
            $this->form_validation->set_rules("email_login", "email_login", "trim|required");
            $this->form_validation->set_rules("password_login", "password_login", "trim|required");
            if ($this->form_validation->run() == false) {
                $this->session->set_userdata('tab', "login");
                $this->load->view('pages/login');
            } else {
                $email = $this->input->post("email_login");
                $password = $this->input->post("password_login");
                $result = $this->user->sign_in($email, $password);
                if ($result) {
                    foreach ($result as $value) {
                        $session_data = [
                            'id' => $value->id,
                            'avatar ' => $value->avatar,
                            'full_name' => $value->full_name,
                            'nick_name' => $value->nick_name,
                        ];
                        $this->session->set_userdata('logged_in', $session_data);
                        $this->session->set_userdata('role', $value->is_admin == true ? "admin" : "user");
                        $this->session->set_userdata('unvalidated_member', $this->user->count_unvalidated_members());
                        if ($value->is_admin) {
                            $this->session->set_flashdata('success', 'Login Berhasil');
                            $this->session->set_userdata('tab', "dashboard-index");
                            $this->load->view('dashboard/_include/header');
                            $this->load->view('dashboard/index');
                            $this->load->view('dashboard/_include/footer');
                        } else {
                            redirect('pages/index', 'refresh');
                        }
                    }
                } else {
                    $this->session->set_userdata('tab', "login");
                    if ($this->user->is_email_exist($this->input->post("email_login"))) {
                        $this->session->set_flashdata('error_login', 'Data Anda belum divalidasi');
                    } else {
                        $this->session->set_flashdata('error_login', 'Username/Password salah');
                    }
                    $this->load->view('pages/login');
                }
            }
        } elseif ($this->input->post('registration_hidden')) {
            $this->form_validation->set_rules("full_name", "full_name", "trim|required");
            $this->form_validation->set_rules("nick_name", "nick_name", "trim|required");
            $this->form_validation->set_rules("cm_generation", "cm_generation", "trim|required");
            $this->form_validation->set_rules("email_regis", "email_regis", "trim|required");
            $this->form_validation->set_rules("password_regis", "password_regis", "trim|required");
            $this->form_validation->set_rules("address", "address", "trim|required");
            $this->form_validation->set_rules("phone", "phone", "trim|required");
            $this->form_validation->set_rules("date_of_birth", "date_of_birth", "trim|required");
            if ($this->form_validation->run() == false) {
                $this->session->set_userdata('tab', "register");
                $this->load->view('pages/login');
            } else {
                $data = array(
                    "full_name" => $this->input->post('full_name'),
                    "nick_name" => $this->input->post('nick_name'),
                    "cm_generation" => $this->input->post('cm_generation'),
                    "email" => $this->input->post('email_regis'),
                    "password" => $this->user->_hash($this->input->post('password_regis')),
                    "address" => $this->input->post('address'),
                    "phone" => $this->input->post('phone'),
                    "date_of_birth" => $this->input->post('date_of_birth'),
                    "company" => $this->input->post('company'),
                    "occupation" => $this->input->post('occupation'),
                    "institution" => $this->input->post('institution'),
                    "avatar" => "assets/uploads/avatar/default.png",
                    "login_count" => 0,
                    "is_admin" => 0,
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s'),
                );
                $result = $this->user->store($data);
                if ($result) {
                    $this->session->set_flashdata('success_register', 'Registrasi berhasil. Kami akan menghubungi Anda melalui Email apabila data Anda sudah divalidasi');
                } else {
                    $this->session->set_flashdata('error_register', 'Registrasi gagal. Silahkan coba kembali');
                }
                redirect(current_url());
            }

        } else {
            $this->session->set_userdata('tab', "login");
            $this->load->view('pages/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('pages/login', 'refresh');
    }

}
<?php
class News extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');
        $this->load->model('post');
    }

    public function index()
    {
        if (is_user_session()) {
            redirect('pages/index', 'refresh');
        }
        $data['users'] = $this->user->all();
        $this->session->set_userdata('tab', "news-index");
        $this->load->view('dashboard/_include/header');
        $this->load->view('dashboard/news/index', $data);
        $this->load->view('dashboard/_include/footer');
    }

    public function create()
    {
        if (is_user_session()) {
            redirect('pages/index', 'refresh');
        }
        // $this->form_validation->set_rules("full_name", "full_name", "trim|required");
        // $this->form_validation->set_rules("nick_name", "nick_name", "trim|required");
        // $this->form_validation->set_rules("cm_generation", "cm_generation", "trim|required");
        // $this->form_validation->set_rules("email", "email", "trim|required");
        // $this->form_validation->set_rules("password", "password", "trim|required");
        // $this->form_validation->set_rules("address", "address", "trim|required");
        // $this->form_validation->set_rules("phone", "phone", "trim|required");
        // $this->form_validation->set_rules("date_of_birth", "date_of_birth", "trim|required");
        if ($this->form_validation->run() == false) {
            $this->session->set_userdata('tab', "news-create");
            $this->load->view('dashboard/_include/header');
            $this->load->view('dashboard/news/create');
            $this->load->view('dashboard/_include/footer');
        } else {
        }
    }

    public function generate_slug()
    {
        // var_dump($title);
        $title = $this->input->get('title');
        $result = $this->post->create_slug($title);
        $data = [
            'status' => 'ok',
            'slug' => $result,
        ];
        echo json_encode($data);
    }
}

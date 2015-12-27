<?php
class News extends CI_Controller {

    protected $type = "news";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');
        $this->load->model('post');
    }

    public function index()
    {
        if (is_user_session() || is_guest_session()) {
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
        if (is_user_session() || is_guest_session()) {
            redirect('pages/index', 'refresh');
        }
        $this->session->set_userdata('tab', "news-create");
        $this->load->view('dashboard/_include/header');
        $this->load->view('dashboard/news/create');
        $this->load->view('dashboard/_include/footer');
    }

    public function store()
    {
        if (is_user_session() || is_guest_session()) {
            redirect('pages/index', 'refresh');
        }
        $session_data = $this->session->userdata('logged_in');
        $data = [
            'user_id' => $session_data['id'],
            'title' => $this->input->post('title'),
            'slug' => $this->input->post('slug'),
            'content' => $this->input->post('content'),
            'type' => $this->type,
            'created_at' => date('Y-m-d H:i:s'),
            'published_at' => $this->input->post('action') == 'submit' ? date('Y-m-d H:i:s') : '',
        ];
        $data = [
            'status' => $this->post->store($data) ? 'ok' : 'failed',
        ];
        if ($data['status'] == "ok") {
            $this->session->set_flashdata('success',
                'Berita berhasil ' .
                $this->input->post('action')=='draft' ? ' disimpan sebagai draft' :
                ' di-<i>publish</i>'
            );
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
        }
        echo json_encode($data);

    }

    public function generate_slug()
    {
        $title = $this->input->get('title');
        $result = $this->post->create_unique_slug($title);
        $data = [
            'status' => 'ok',
            'slug' => $result,
        ];
        echo json_encode($data);
    }
}

<?php
class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (!is_admin_session()) {
            echo "You're not authorize";
            return;
        }
        $this->session->set_userdata('tab', "dashboard-index");
    	$this->load->view('dashboard/_include/header');
    	$this->load->view('dashboard/index');
    	$this->load->view('dashboard/_include/footer');
    }
}
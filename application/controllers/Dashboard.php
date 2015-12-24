<?php
class Dashboard extends CI_Controller {

    public function index()
    {
    	$this->load->view('dashboard/_include/header');
    	$this->load->view('dashboard/index');
    	$this->load->view('dashboard/_include/footer');
    }
}
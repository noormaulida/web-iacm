<?php

class Migrate extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->input->is_cli_request()) {
            exit('Direct access is not allowed');
        }
    }

    public function index()
    {
        $this->load->library('migration');

        if ($this->migration->current() === FALSE) {
            show_error($this->migration->error_string());
        } else {
          	echo "Berhasil melakukan migrasi" . PHP_EOL;
        }
    }
}
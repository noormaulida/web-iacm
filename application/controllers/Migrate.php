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
            echo "\033[32mBerhasil melakukan migrasi\033[0m" . PHP_EOL;
        }
    }
}

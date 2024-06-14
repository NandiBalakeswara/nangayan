<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Pastikan hanya dapat diakses melalui CLI untuk alasan keamanan
        if (!$this->input->is_cli_request()) {
            show_error('Migration can only be run from the command line');
        }
        $this->load->library('migration');
        // Logging untuk debugging
        log_message('debug', 'Migration Path: ' . APPPATH . 'migrations/');
        log_message('debug', 'Migration Files: ' . print_r(glob(APPPATH . 'migrations/*'), true));
    }

    public function latest()
    {
        if ($this->migration->latest() === FALSE)
        {
            echo $this->migration->error_string();
        }
        else
        {
            echo "Migration to latest version was successful!";
        }
    }

    public function version($version)
    {
        if ($this->migration->version($version) === FALSE)
        {
            echo $this->migration->error_string();
        }
        else
        {
            echo "Migration to version $version was successful!";
        }
    }
    
}

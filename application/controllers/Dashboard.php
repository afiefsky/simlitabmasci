<?php

class Dashboard extends CI_Controller
{
    /**
     * The Constructor
    */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->session->set_userdata([
            'active_page' => 'dashboard'
        ]);

        $this->template->load('template/main', 'dashboard/index');
        // $this->load->view('dashboard/index');
    }
}
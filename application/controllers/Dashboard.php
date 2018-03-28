<?php

class Dashboard extends CI_Controller
{
    /**
     * The Constructor
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Document_model');
        $this->document = $this->Document_model;
    }

    public function index()
    {
        $this->session->set_userdata([
            'active_page' => 'dashboard'
        ]);

        $data['record'] = $this->db->get('documents');

        $this->template->load('template/main', 'dashboard/index', $data);
        // $this->load->view('dashboard/index');
    }
}
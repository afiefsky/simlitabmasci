<?php

class Proposal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // load database
        $this->load->model('Proposal_model');
        $this->proposal = $this->Proposal_model;
    }

    public function index()
    {
        $data['record'] = $this->Proposal_model->getPosts(); // calling Post model method getPosts()
        $this->session->set_userdata([
            'active_page' => 'proposal'
        ]);
        $this->template->load('template/main','proposal/index', $data); // load the view file , we are passing 
    }
}
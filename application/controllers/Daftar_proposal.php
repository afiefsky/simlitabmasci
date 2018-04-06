<?php

class Daftar_proposal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->database(); // load database
        $this->load->model('Daftar_proposal_model');
        $this->daftar_proposal = $this->Daftar_proposal_model;
    }

   public function index()
    {
        {
			$this->data['documents'] = $this->Daftar_proposal_model->getPosts(); // calling Post model method getPosts()
			$this->session->set_userdata([
                'active_page' => 'daftar_proposal'
            ]);
			$this->template->load('template/main','daftar_proposal/index', $this->data); // load the view file , we are passing $data array to view file
 
			
            

            //$this->template->load('template/main', 'daftar_proposal/index');
        
    }
}
}
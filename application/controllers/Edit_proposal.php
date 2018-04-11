<?php
class Edit_proposal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->model('Document_model');
        //$this->document = $this->Document_model;
    }
	
	public function index()
    {
        

            $this->template->load('template/main', 'edit_proposal/index');
        }
    }


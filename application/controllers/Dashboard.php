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
        $this->load->view('dashboard/index');
    }
}
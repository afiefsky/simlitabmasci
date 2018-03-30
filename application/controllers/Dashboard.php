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
        $level_number = $this->session->userdata('level_number');

        $this->session->set_userdata([
            'active_page' => 'dashboard'
        ]);

        if (isset($_POST['submit'])) {
            $keyword = str_replace(' ', '_', $this->input->post('keyword'));

            if ($level_number == 1 || $level_number == 2) {
                $data['record'] = $this->document->getByKeyword($keyword);
            } else {
                $data['record'] = $this->document->getAcceptedByKeyword($keyword);
            }
        } else {
            if ($level_number == 1 || $level_number == 2) {
                $data['record'] = $this->document->get();
            } else {
                $data['record'] = $this->document->getAccepted();
            }
        }

        $this->template->load('template/main', 'dashboard/index', $data);
        // $this->load->view('dashboard/index');
    }
}
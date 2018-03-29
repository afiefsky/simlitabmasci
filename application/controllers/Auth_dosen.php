<?php

class Auth_dosen extends CI_Controller
{
    /**
     * The Constructor
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_dosen_model');
        $this->auth_dosen = $this->Auth_dosen_model;
    }

    /**
     * Index
     * var username
     * var password
     */
    public function index()
    {
        if (isset($_POST['submit'])) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $result = $this->auth_dosen->login_dosen($username, $password);

            if ($result == 2) {
                $this->session->set_userdata([
                    'login_status' => 2,
                    'username' => $username
                ]);

                redirect('dashboard');
            } else {
                echo "Login error!!!";
            }

        } else {
            $this->load->view('login_dosen/index');
        }
    }
    /* End of Index */

    /**
     * Logout
     */
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth_dosen');
    }
}